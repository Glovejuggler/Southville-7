<?php

namespace App\Models;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    protected $fillable = [
        'name',
        'address',
        'birthdate',
        'contact_number'
    ];

    protected $appends = [
        'has_history'
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

    public function getHasHistoryAttribute()
    {
        return $this->hasMany(Loan::class)->onlyTrashed()->count();
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
        });
    }
}
