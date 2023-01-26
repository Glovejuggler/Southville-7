<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Payment;
use App\Models\Loanable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
    public function create(Member $member)
    {
        if (Gate::none(['isChairman', 'isSecretary', 'isViceChairman', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $loan = Loan::where('member_id','=',$member->id)->with('payments')->latest()->first();

        return inertia('Loan/Create', [
            'loan' => $loan,
            'history' => Loan::onlyTrashed()
                                ->where('member_id', $member->id)
                                ->orderBy('created_at', 'desc')
                                ->get(),
            'member' => $member,
            'loanables' => Loanable::where('requirement', '<=', $member->share_capital)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('isTreasurer')) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }
        
        $request->validate([
            'member_id' => 'required',
            'rate' => 'required|numeric|max:100',
            'term' => 'required|numeric|max:100',
            'amortization' => 'required|numeric|max:100',
            'maturity' => 'required|date'
        ]);

        $member = Member::find($request->member_id);

        $loanable = Loanable::find($request->loanable);

        $loan = Loan::create([
            'member_id' => $request->member_id,
            'loan_name' => $loanable->name,
            'principal' => $loanable->equivalent,
            'rate' => $request->rate,
            'term' => $request->term,
            'amortization' => $request->amortization,
            'maturity' => $request->maturity,
        ]);
        
        $pays = $loan->amortization / $loan->term;
        $date = Carbon::parse($loan->maturity);
        $day = $date->day;

        for ($x = 1; $x <= $loan->amortization; $x++) {
            $payment = new Payment;

            $payment->loan_id = $loan->id;

            if ($pays == 1) {
                $month = Carbon::parse($loan->maturity);
                $payment->month = $month->addMonthsNoOverflow($x - 1);
            } else {
                if ($x % 2 != 0) {
                    $monthDate = Carbon::parse($loan->maturity)->addMonthsNoOverflow($x / 2);
                    $payment->month = Carbon::create(
                        $monthDate->year,
                        $monthDate->month,
                        $day < 16 ? 15 : ($monthDate->daysInMonth >= 30 ? 30 :
                            $monthDate->daysInMonth)
                    );
                } else {
                    $monthDate = Carbon::parse($loan->maturity)->addMonthsNoOverflow($day < 16 ?
                        ($x / 2) - 1 :
                        $x / 2);
                    $payment->month = Carbon::create(
                        $monthDate->year,
                        $monthDate->month,
                        $day < 16 ?
                            ($monthDate->daysInMonth < 30 ?
                                $monthDate->daysInMonth : 30) :
                            15
                    );
                }
            }

            $payment->save();
        }

        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Loan successful'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $loan = Loan::onlyTrashed()->with('payments')->find($id);

        if (Gate::none(['isChairman','isViceChairman','isTreasurer'])) {
            if(Auth::user()->member_id != $loan->member_id) {
                return redirect()->back()->with([
                    'type' => 'error',
                    'message' => 'Unauthorized access'
                ]);
            }
        }

        return inertia('Loan/View', [
            'loan' => $loan,
            'member' => $loan->member
        ]);
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
