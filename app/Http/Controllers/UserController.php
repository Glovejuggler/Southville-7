<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Client;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index ()
    {
        // $users = User::get(['id', 'name']);

        // return inertia('Users/Index', [
        //     'users' => $users
        // ]);
    }

    public function show (User $user)
    {
        // return inertia('Users/Show', [
        //     'user' => $user
        // ]);
    }

    public function store (Request $request)
    {
        if(Gate::none(['isChairman', 'isViceChairman', 'isSecretary'])) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }
        
        $member = Member::find($request->member_id);
        $pw = Str::random(8);

        $user = User::create([
            'member_id' => $member->id,
            'name' => $member->name,
            'email' => $member->email,
            'password' => Hash::make($pw),
        ]);

        $data = array('name' => $user->name, 'email' => $user->email, 'pw' => $pw);
   
        Mail::send('mail.test', $data, function($message) use ($user) {
            $message->to($user->email)
                    ->subject('Welcome to Southville 7 Credit Cooperative');
        });

        return redirect()->route('members.show', $member);
    }

    /**
     * This shows the settings page where users
     * can change their password
     */
    public function settings ()
    {
        return inertia('User/Settings', [
            'self' => Auth::user()
        ]);
    }

    /**
     * Check password
     */
    public function checkpass (Request $request)
    {
        return redirect()->back()->with([
            'message' => Hash::check($request->password, Auth::user()->password)
        ]);
    }

    /**
     * Change password
     */
    public function changepassword (Request $request)
    {
        User::find(Auth::user()->id)->update([
            'password' => Hash::make($request->confirmpassword)
        ]);

        return redirect()->route('dashboard')->with([
            'type' => 'success',
            'message' => 'Password changed'
        ]);
    }
}
