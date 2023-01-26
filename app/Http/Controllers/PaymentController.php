<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
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
    public function create()
    {
        //
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

        $new = Payment::create([
            'loan_id' => $request->loan_id,
            'month' => Carbon::parse($request->month),
        ]);

        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return inertia('Payment/Edit', [
            'payment' => $payment,
            'client' => $payment->loan->client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('isTreasurer')) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }
        
        $request->validate([
            'payment' => 'required|numeric',
            'date_paid' => 'required'
        ]);

        // dd($request);

        $payment = Payment::find($id);

        $payment->payment = $request->payment;
        $payment->date_paid = Carbon::parse($request->date_paid);
        $payment->notes = $request->notes;

        $payment->update();

        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Payment successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
