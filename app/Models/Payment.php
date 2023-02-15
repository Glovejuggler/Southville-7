<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['loan_id', 'month'];

    protected $appends = ['balance','principal','interest','is_late','short','ref','advance','paid_advance'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_paid' => 'datetime',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class)->withTrashed();
    }

    public function getPrincipalAttribute()
    {
        return $this->payment - $this->loan->interestm;
    }

    public function getInterestAttribute()
    {
        $interest = $this->payment - $this->loan->interestm >= 0 ?
                    $this->loan->interestm :
                    $this->payment - $this->loan->interestm;

        /**
         * P * (r/t)
         * 
         * This should be the calculation of the interest
         */

        return $interest;
    }

    public function getBalanceAttribute()
    {
        $bal = $this->loan->receivable;
        $dp = Carbon::parse($this->date_paid);

        $payments = Payment::where('loan_id','=',$this->loan_id)->where('id','<=',$this->id)->get();
        foreach ($payments as $payment) {
            $bal -= $payment->payment;
        }
        
        if ($this->paid_advance == true) {
            return 0;
        }

        return $bal > 0 ? $bal : 0;
    }

    public function getIsLateAttribute()
    {
        if ($this->payment) {
            return Carbon::parse($this->date_paid) > Carbon::parse($this->month.' 23:59:59');
        }
    }

    public function getShortAttribute()
    {
        if ($this->payment) {
            return $this->loan->payment_m > $this->payment ? $this->loan->payment_m - $this->payment : 0;
        }
    }

    public function getRefAttribute()
    {
        return $this->id.$this->loan_id.$this->loan->member_id;
    }

    public function getAdvanceAttribute()
    {
        // if ($this->payment == null || $this->payment == 0 || $this->date_paid == null) {
        //     if (now()->diffInMonths(Carbon::parse($this->month), false) > 0) {
        //         return $this->loan->payment_m - $this->loan->interest_m;
        //     } else {
        //         return $this->loan->payment_m;
        //     }
        // } else {
        //     return 0;
        // }

        $payments = Payment::where('loan_id','=',$this->loan_id)->where('id','>=',$this->id)->get();
        $advance = 0;

        foreach ($payments as $payment) {
            $advance += now()->diffInMonths(Carbon::parse($payment->month), false) > 0 ? $this->loan->principal_m : round($this->loan->payment_m);
        }

        return round($advance);
    }

    public function getPaidAdvanceAttribute()
    {
        return $this->payment >= $this->advance;
    }
}
