<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BeneficiaryController extends Controller
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
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $request->validate([
            'name' => 'required',
            'relation' => 'required',
            'birthday' => 'required|date',
            'phone' => 'required',
        ]);

        $beneficiary = Beneficiary::create([
            'member_id' => $request->member_id,
            'name' => $request->name,
            'relation' => $request->relation,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        return inertia('Beneficiary/Edit', [
            'beneficiaries' => Beneficiary::where('member_id',$member->id)->get(),
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiary $beneficiary)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $beneficiary->update([
            'name' => $request->name,
            'relation' => $request->relation,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiary $beneficiary)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }
        
        $beneficiary->delete();

        return redirect()->back();
    }
}
