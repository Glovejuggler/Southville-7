<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Loan;
use App\Models\User;
use App\Models\Client;
use App\Models\Saving;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Client::with(['loan' => function ($query) {
        //     $query->orderBy('id', 'asc');
        // }])->get());

        return inertia('Clients/Index', [
            'clients' => Client::query()
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
        return inertia('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = Client::create([
            'name' => $request->name,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->route('clients.show', $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $loan = Loan::where('client_id','=',$client->id)->latest()->first();

        return inertia('Clients/Show', [
            'client' => $client,
            'history' => Loan::onlyTrashed()
                                ->where('client_id', $client->id)
                                ->count(),
            'loan' => $loan,
            'bal' => $loan?->receivable - $loan?->total_payments(),
            'pics' => File::where('loan_id', $loan?->id)->get(),
            'user' => User::where('name', 1000000 + $client->id)->get(),
            'savings' => Saving::where('client_id', $client->id)->sum('amount'),
        ]);
    }

    /**
     * Shows the statement of accounts of the client
     */
    public function view(Client $client)
    {
        // dd($client->history);
        return inertia('Clients/View', [
            'history' => $client->history,
            'client' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return inertia('Clients/Edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, Client $client)
    {
        $client->name = $request->name;
        $client->address = $request->address;
        $client->birthdate = $request->birthdate;
        $client->contact_number = $request->contact_number;

        $client->update();

        return redirect()->route('clients.show', $client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}
