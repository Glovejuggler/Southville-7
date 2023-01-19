<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\ShareCapital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShareCapitalController extends Controller
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

        return inertia('Share Capital/Create', [
            'member' => $member,
            'transactions' => ShareCapital::where('member_id', $member->id)->latest()->paginate(10),
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
            'amount' => 'required|numeric'
        ]);

        ShareCapital::create([
            'member_id' => $request->member_id,
            'amount' => $request->amount,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SharedCapital  $sharedCapital
     * @return \Illuminate\Http\Response
     */
    public function show(SharedCapital $sharedCapital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SharedCapital  $sharedCapital
     * @return \Illuminate\Http\Response
     */
    public function edit(SharedCapital $sharedCapital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SharedCapital  $sharedCapital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SharedCapital $sharedCapital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SharedCapital  $sharedCapital
     * @return \Illuminate\Http\Response
     */
    public function destroy(SharedCapital $sharedCapital)
    {
        //
    }
}
