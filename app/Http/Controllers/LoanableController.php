<?php

namespace App\Http\Controllers;

use App\Models\Loanable;
use Illuminate\Http\Request;

class LoanableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Loan Services/Index', [
            'loanables' => Loanable::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // dd($request);
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
        
        return redirect()->route('loanables.index');
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

        return redirect()->route('loanables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loanable  $loanable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loanable $loanable)
    {
        //
    }
}
