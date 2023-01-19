<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::denies('isSecretary')) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        if ($request->wantsJson()) {
            return Event::paginate(10);
        }

        return inertia('Events/Index', [
            'events' => Event::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('isSecretary')) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        return inertia('Events/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('isSecretary')) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date'
        ]);

        $new = Event::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => Carbon::parse($request->date),
            'status' => 'Upcoming',
        ]);

        return redirect()->route('events.index')->with([
            'type' => 'success', 
            'message' => 'Event added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if (Gate::denies('isSecretary')) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        return inertia('Events/Edit', [
            'event' => $event,
            'hasPost' => $event->post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if (Gate::denies('isSecretary')) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
            'status' => 'required'
        ]);

        $event->title = $request->title;
        $event->content = $request->content;
        $event->date = $request->date;
        $event->status = $request->status;

        $event->update();

        if ($request->status == 'Done' && $request->post) {
            return redirect()->route('post.create', $event->id)->with([
                'type' => 'success',
                'message' => 'Edit successful'
            ]);
        }

        return redirect()->route('events.index')->with([
            'type' => 'success',
            'message' => 'Edit successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if (Gate::denies('isSecretary')) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }
        
        $event->delete();

        return redirect()->route('events.index')->with([
            'type' => 'error',
            'message' => 'Event deleted'
        ]);
    }
}
