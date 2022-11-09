<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home.home');
    }

    public function about()
    {
        return view('pages.about.about_us');
    }

    public function vm()
    {
        return view('pages.about.vm');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }
}
