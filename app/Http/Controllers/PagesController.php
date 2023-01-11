<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home.home', [
            'stories' => Post::latest()->take(3)->get()
        ]);
    }

    public function about()
    {
        return view('pages.about.about_us');
    }

    public function vm()
    {
        return view('pages.about.vm');
    }

    public function history()
    {
        return view('pages.about.history');
    }

    public function bod()
    {
        return view('pages.about.bod');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function events()
    {
        return view('pages.events.index', [
            'events' => Event::where('status', 'Upcoming')
                                ->where('date','>=',now())
                                ->paginate(5),
            'posts' => Post::latest()->paginate(5),
        ]);
    }

    public function event(Event $event)
    {
        return view('pages.events.view', [
            'event' => $event
        ]);
    }

    public function events_archive()
    {
        return view('pages.events.archive', [
            'events' => Event::where('status', 'Done')->paginate(10)
        ]);
    }

    public function stories()
    {
        return view('pages.posts.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    public function post(Post $post)
    {
        return view('pages.posts.view', [
            'post' => $post,
            'latests' => Post::latest()->take(5)->get(),
        ]);
    }
}
