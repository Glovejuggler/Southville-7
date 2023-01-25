<?php

namespace App\Http\Controllers;

use App\Models\Loanable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LoanableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        if ($request->wantsJson()) {
            return Loanable::paginate(20);
        }
        
        return inertia('Loan Services/Index', [
            'loanables' => Loanable::paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        return inertia('Loan Services/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'equivalent' => 'required|numeric',
            'requirement' => 'required|numeric',
        ]);

        $loanable = Loanable::create([
            'name' => $request->name,
            'type' => $request->type,
            'equivalent' => $request->equivalent,
            'requirement' => $request->requirement,
        ]);
        
        return redirect()->route('loanables.index')->with([
            'type' => 'success',
            'message' => 'Loan service added'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loanable  $loanable
     * @return \Illuminate\Http\Response
     */
    public function show(Loanable $loanable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loanable  $loanable
     * @return \Illuminate\Http\Response
     */
    public function edit(Loanable $loanable)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        return inertia('Loan Services/Edit', [
            'loanable' => $loanable,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loanable  $loanable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loanable $loanable)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'equivalent' => 'required|numeric',
            'requirement' => 'required|numeric'
        ]);

        $loanable->name = $request->name;
        $loanable->type = $request->type;
        $loanable->equivalent = $request->equivalent;
        $loanable->requirement = $request->requirement;

        $loanable->update();

        return redirect()->route('loanables.index')->with([
            'type' => 'success', 
            'message' => 'Edit successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loanable  $loanable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loanable $loanable)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isTreasurer'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $loanable->delete();

        return redirect()->route('loanables.index')->with([
            'type' => 'error', 
            'message' => 'Loan service deleted'
        ]);
    }
}
