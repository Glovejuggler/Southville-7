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

    protected $appends = ['balance','principal','interest','is_late'];

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

        $payments = Payment::where('loan_id','=',$this->loan_id)->whereDate('date_paid','<=',$dp)->get();
        foreach ($payments as $payment) {
            $bal -= $payment->payment;
        }

        return $bal > 0 ? $bal : 0;
    }

    public function getIsLateAttribute()
    {
        if ($this->payment) {
            return $this->date_paid > $this->month;
        }
    }
}
