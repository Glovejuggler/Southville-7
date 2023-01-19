<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Saving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SavingController extends Controller
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

        return inertia('Savings/Create', [
            'member' => $member,
            'transactions' => Saving::where('member_id', $member->id)->latest()->paginate(10),
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
            'amount' => 'required|numeric',
            'member_id' => 'required|numeric',
            'method' => 'required',
        ]);

        $new = Saving::create([
            'amount' => $request->amount,
            'member_id' => $request->member_id,
            'method' => $request->method,
        ]);

        return redirect()->back()->with([
            'type' => 'success',
            'message' => $new->method.' successful',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function show(Saving $saving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function edit(Saving $saving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saving $saving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saving $saving)
    {
        //
    }
}
