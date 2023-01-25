<?php

namespace App\Models;

use App\Models\Loan;
use App\Models\Saving;
use App\Models\Beneficiary;
use App\Models\ShareCapital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    protected $fillable = [
        'name',
        'address',
        'prov_address',
        'contact_number',
        'email',
        'facebook',
        'birthdate',
        'birthplace',
        'religion',
        'sss',
        'tin',
        'education',
        'skills',
        'employment',
        'income'
    ];

    protected $appends = [
        'has_history', 'savings', 'share_capital'
    ];

    use HasFactory;

    public function user()
    {
        $user = User::where('name', $this->id + 1000000)->get();

        return $user;
    }

    public function loan()
    {
        return $this->hasOne(Loan::class)->latestOfMany();
    }

    public function history()
    {
        return $this->hasMany(Loan::class)->onlyTrashed()->with('payments');
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function getHasHistoryAttribute()
    {
        return $this->hasMany(Loan::class)->onlyTrashed()->count();
    }

    public function getSavingsAttribute()
    {
        return $this->hasMany(Saving::class)
                    ->where('method','Deposit')
                    ->sum('amount') - 
                $this->hasMany(Saving::class)
                    ->where('method','Withdrawal')
                    ->sum('amount');
    }

    public function getShareCapitalAttribute()
    {
        return $this->hasMany(ShareCapital::class)->sum('amount');
    }

    // Search filter
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            });
        })->when($filters['status'] ?? null, function ($query, $status) {
            if ($status === 'active') {
                $query->whereHas('loan');
            } elseif ($status === 'inactive') {
                $query->whereDoesntHave('loan');
            } elseif ($status === 'overdue') {
                $query->whereHas('loan', function ($q) {
                    $q->whereHas('payments', function ($q) {
                        $q->whereDate('month','<',now())
                            ->where('payment',null);
                    });
                });
            } elseif ($status === 'dueToday') {
                $query->whereHas('loan', function ($q) {
                    $q->whereHas('payments', function ($q) {
                        $q->whereDate('month','=',now());
                    });
                });
            }
        })->when($filters['sortBy'] ?? null, function ($query, $sort) {
            if ($sort === 'nameAsc') {
                $query->orderBy('name', 'asc');
            } elseif ($sort === 'nameDesc') {
                $query->orderBy('name', 'desc');
            } elseif ($sort === 'dateAddedDesc') {
                $query->orderBy('created_at', 'desc');
            }
        });
    }
}
