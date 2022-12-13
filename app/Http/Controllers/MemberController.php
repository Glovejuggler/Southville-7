<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Loan;
use App\Models\User;
use App\Models\Member;
use App\Models\Saving;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Member::with(['loan' => function ($query) {
        //     $query->orderBy('id', 'asc');
        // }])->get());

        return inertia('Members/Index', [
            'members' => Member::query()
                            ->filter(Request::only('search', 'status'))
                            ->with('loan')
                            ->paginate(10)
                            ->withQueryString(),
            'filters' => Request::only(['search', 'status']),
            'today' => now(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Members/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $member = Member::create([
            'name' => $request->name,
            'address' => $request->address,
            'prov_address' => $request->prov_address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
            'religion' => $request->religion,
            'sss' => $request->sss,
            'tin' => $request->tin,
            'education' => $request->education,
            'skills' => $request->skills,
            'employment' => $request->employment,
            'income' => $request->income,
        ]);

        return redirect()->route('members.show', $member->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $loan = Loan::where('member_id','=',$member->id)->latest()->first();

        return inertia('Members/Show', [
            'member' => $member,
            'history' => Loan::onlyTrashed()
                                ->where('member_id', $member->id)
                                ->count(),
            'loan' => $loan,
            'bal' => $loan?->receivable - $loan?->total_payments(),
            'pics' => File::where('loan_id', $loan?->id)->get(),
            'user' => User::where('name', 1000000 + $member->id)->get(),
        ]);
    }

    /**
     * Shows the statement of accounts of the Member
     */
    public function view(Member $member)
    {
        // dd($Member->history);
        return inertia('Members/View', [
            'history' => $member->history,
            'member' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return inertia('Members/Edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMemberRequest $request, Member $member)
    {
        $member->name = $request->name;
        $member->address = $request->address;
        $member->prov_address = $request->prov_address;
        $member->contact_number = $request->contact_number;
        $member->email = $request->email;
        $member->facebook = $request->facebook;
        $member->birthdate = $request->birthdate;
        $member->birthplace = $request->birthplace;
        $member->religion = $request->religion;
        $member->sss = $request->sss;
        $member->tin = $request->tin;
        $member->education = $request->education;
        $member->skills = $request->skills;
        $member->employment = $request->employment;
        $member->income = $request->income;

        $member->update();

        return redirect()->route('members.show', $member->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index');
    }
}
