<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoanRequest;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $member = Member::find($id);

        return inertia('Loan/Create', [
            'member' => $member
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanRequest $request)
    {
        $member = Member::find($request->member_id);

        $loan = Loan::create($request->validated());
        $pays = $loan->amortization / $loan->term;
        $date = Carbon::parse($loan->maturity);
        $day = $date->day;

        for ($x = 1; $x <= $loan->amortization; $x++) {
            $payment = new Payment;

            $payment->loan_id = $loan->id;

            if ($pays == 1) {
                $month = Carbon::parse($loan->maturity);
                $payment->month = $month->addMonthsNoOverflow($x-1);
            } else {
                if ($x % 2 != 0) {
                    $monthDate = Carbon::parse($loan->maturity)->addMonthsNoOverflow($x/2);
                    $payment->month = Carbon::create($monthDate->year,
                                                    $monthDate->month,
                                                    $day < 16 ? 15 :
                                                    ($monthDate->daysInMonth >= 30 ? 30 :
                                                    $monthDate->daysInMonth));
                } else {
                    $monthDate = Carbon::parse($loan->maturity)->addMonthsNoOverflow($day < 16 ?
                                                                            ($x/2) - 1 :
                                                                            $x/2);
                    $payment->month = Carbon::create($monthDate->year,
                                                    $monthDate->month,
                                                    $day < 16 ?
                                                    ($monthDate->daysInMonth < 30 ?
                                                    $monthDate->daysInMonth : 30) :
                                                    15);
                }
            }

            $payment->save();
        }

        return redirect()->route('members.show', $member->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect()->back();
    }
}
