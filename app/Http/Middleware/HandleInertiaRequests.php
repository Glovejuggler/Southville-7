<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Helpers\Configurations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
                'position' => function () {
                    if (Auth::user()?->id != 1) {
                        return Auth::user()?->role->pluck('position')->toArray();
                    } else {
                        return ['Chairman', 'Vice Chairman', 'Secretary', 'Treasurer'];
                    }
                },
            ],
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
            'flash' => [
                'message' => fn () => $request->session()->get('message'),
                'type' => fn () => $request->session()->get('type'),
            ],
        ]);
    }
}
