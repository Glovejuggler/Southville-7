<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Loan;
use App\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use App\Models\Member;
use App\Models\Saving;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\Illuminate\Http\Request $request)
    {
        // dd(Member::with(['loan' => function ($query) {
        //     $query->orderBy('id', 'asc');
        // }])->get());
        if (Gate::none(['isChairman', 'isViceChairman', 'isSecretary', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        if ($request->wantsJson()) {
            return Member::query()
                            ->filter(Request::only('search', 'status', 'sortBy'))
                            ->with('loan')
                            ->paginate(30)
                            ->withQueryString();
        }

        return inertia('Members/Index', [
            'members' => Member::query()
                            ->filter(Request::only('search', 'status', 'sortBy'))
                            ->with('loan')
                            ->paginate(30)
                            ->withQueryString(),
            'filters' => Request::only(['search', 'status', 'sortBy']),
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
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

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
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

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

        foreach ($request->beneficiaries as $beneficiary) {
            Beneficiary::create([
                'member_id' => $member->id,
                'name' => $beneficiary['name'],
                'relation' => $beneficiary['relation'],
                'birthday' => $beneficiary['birthday'],
                'phone' => $beneficiary['phone'],
            ]);
        }

        return redirect()->route('members.show', $member->id)->with([
            'type' => 'success', 
            'message' => 'Member added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        if (Gate::none(['isChairman', 'isViceChairman', 'isSecretary', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $loan = Loan::where('member_id','=',$member->id)->latest()->first();

        return inertia('Members/Show', [
            'member' => $member,
            'history' => Loan::onlyTrashed()
                                ->where('member_id', $member->id)
                                ->count(),
            'loan' => $loan,
            'bal' => $loan?->receivable - $loan?->total_payments(),
            'pics' => File::where('member_id', $member->id)->get(),
            'user' => User::where('member_id', $member->id)->get(),
            'beneficiaries' => Beneficiary::where('member_id', $member->id)->get(),
        ]);
    }

    /**
     * Shows the statement of accounts of the Member (not used omegalul)
     */
    public function view(Member $member)
    {
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
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

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
    public function update(UpdateMemberRequest $request, Member $member)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $user = User::where('member_id', $member->id)->first();

        if ($user) {
            if ($request->email != $user->email && $request->email != $member->email) {
                if (User::where('email',$request->email)->exists() || Member::where('email',$request->email)->exists()) {
                    return redirect()->back()->withErrors([
                        'email' => 'This email has been already taken'
                    ]);
                }
            }
        } else {
            if ($request->email != $member->email) {
                if (User::where('email',$request->email)->exists() || Member::where('email',$request->email)->exists()) {
                    return redirect()->back()->withErrors([
                        'email' => 'This email has been already taken'
                    ]);
                }
            }
        }

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

        if ($user) {
            $user->email = $request->email;
            $user->update();
        }

        return redirect()->route('members.show', $member->id)->with([
            'type' => 'success',
            'message' => 'Edit successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }
        
        $member->delete();

        return redirect()->route('members.index')->with([
            'type' => 'error',
            'message' => 'Member deleted'
        ]);
    }

    /**
     * 
     */
    public function download(\Illuminate\Http\Request $request)
    {
        $members = Member::query()->with('loan')->filter($request->only(['status', 'sortBy']))->get();

        $pdf = Pdf::loadView('pdf.members', [
            'members' => $members,
            'status' => $request->status
        ]);

        return $pdf->download('Members '.now().'.pdf');
        // return $pdf->stream();
    }
}
