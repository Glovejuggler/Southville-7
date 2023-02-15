<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    protected $fillable = [
        'member_id',
        'loan_name',
        'principal',
        'rate',
        'term',
        'amortization',
        'maturity'
    ];

    protected $attributes = [
        'principal' => 0,
        'rate' => 0,
        'term' => 0,
        'amortization' => 0,
    ];

    use HasFactory;
    use SoftDeletes;

    /**
     * Relations
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->orderBy('created_at', 'asc');
    }

    /**
     * Appended attributes
     */
    protected $appends = [
        'receivable',
        'interest',
        'interestm',
        'principalm',
        'paymentm',
        'has_late_payment',
        'balance',
        'paid_all',
        'penalty',
        'advance',
        'unpaid'
    ];

    public function getReceivableAttribute()
    {
        // return $this->principal * (1 + ($this->rate/100 * $this->term));
        return $this->principal + $this->interest;
        // $receivable = (($this->principal)*(($this->rate/100)/12)*(1+(($this->rate/100)/12))**$this->amortization)/((1+(($this->rate/100)/12))**$this->amortization-1);
    }

    public function getInterestAttribute()
    {
        return $this->principal * ($this->rate/100 * $this->term);
    }

    public function getInterestMAttribute()
    {
        return $this->interest / $this->amortization;
    }

    public function getPaymentMAttribute()
    {
        return $this->receivable / $this->amortization;
    }

    public function getPrincipalMAttribute()
    {
        return $this->principal / $this->amortization;
    }

    public function getHasLatePaymentAttribute()
    {
        $count = 0;

        $payments = Payment::where('loan_id', $this->id)
                            ->whereNull('payment')
                            ->whereDate('month','!=',now())
                            ->get();
        foreach ($payments as $payment) {
            if ($payment->month < now()) {
                $count += 1;
            }
        }

        return $count;
    }

    public function getBalanceAttribute()
    {
        // $balance = $this->principal * (1 + ($this->rate/100 * $this->term)) - $this->hasMany(Payment::class)->sum('payment');
        $balance = $this->receivable - $this->hasMany(Payment::class)->sum('payment') + $this->penalty;
        $payments = Payment::where('loan_id',$this->id)->get();
        foreach ($payments as $payment) {
            if ($payment->paid_advance === true) {
                return 0 + $this->penalty;
            }
        }
        return $balance > 0 ? $balance: 0;
    }

    public function getPaidAllAttribute()
    {
        $payments = Payment::where('loan_id',$this->id)->get();
        foreach ($payments as $payment) {
            if ($payment->payment == null) {
                return false;
            }
        }

        return true;
    }

    public function getPenaltyAttribute()
    {
        $count = 0;
        $latest = null;
        
        $payments = Payment::where('loan_id',$this->id)->get();
        foreach ($payments as $payment) {
            if ($payment->date_paid == null || $payment->payment == null || $payment->payment == 0) {
                if (Carbon::parse($payment->month)->diffInDays($payment->date_paid, false) > 0) {
                    $count += 1;
                }
            } elseif (Carbon::parse($payment->month)->diffInDays($payment->date_paid, false) > 0) {
                $count += 1;
            }
            $latest = Carbon::parse($payment->month);
        }
        $latest = $latest?->diffInMonths(now(), false) > 0 ? $latest?->diffInMonths(now(), false) : 0;

        return ($count + $latest) * $this->interestm;
    }

    public function getAdvanceAttribute()
    {
        // $payments = Payment::where('loan_id',$this->id)->get();
        // $advance = 0;
        // foreach ($payments as $payment) {
        //     $advance += $payment->advance + $payment->short;
        // }
        // if ($this->unpaid <= 1) {
        //     return $this->balance;
        // }
        // return $advance ? $advance + $this->penalty : $this->balance;
        return Payment::where('loan_id',$this->id)->where(function ($query) {
            $query->where('payment',0)->orWhere('payment',null);
        })->first()?->advance + $this->penalty;
    }

    public function getUnpaidAttribute()
    {
        return Payment::where('loan_id',$this->id)->where(function ($query) {
            $query->where('payment',null)
                    ->orWhere('payment',0);
        })->count();
    }
}
