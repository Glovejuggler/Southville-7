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
                                ->get(),
            'posts' => Post::latest()->get(),
        ]);
    }

    public function post(Post $post)
    {
        // dd($post);
        return view('pages.posts.view', [
            'post' => $post
        ]);
    }
}
