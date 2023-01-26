<?php

namespace App\Models;

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

    public function total_payments()
    {
        $total = 0;
        foreach ($this->payments as $payment) {
            $total += $payment->payment;
        }

        return $total;
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
    ];

    public function getReceivableAttribute()
    {
        return $this->principal * (1 + ($this->rate/100));
        // $receivable = (($this->principal)*(($this->rate/100)/12)*(1+(($this->rate/100)/12))**$this->amortization)/((1+(($this->rate/100)/12))**$this->amortization-1);
    }

    public function getInterestAttribute()
    {
        return $this->principal * ($this->rate/100);
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
        return $this->principal * (1 + ($this->rate/100)) - $this->hasMany(Payment::class)->sum('payment');
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
}
