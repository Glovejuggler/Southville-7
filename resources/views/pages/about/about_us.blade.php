@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:flex">
        <div class="bg-white rounded-lg p-8 lg:w-9/12">
            <span class="font-bold text-xl block text-theme-900">About us</span>

            <span class="mt-4">We are Southville 7 Credit Cooperative. We aim to build a wonderful community within
                Southville 7 residence, and
                eventually spread our ideals to other people and communities.</span>
        </div>
        @include('pages.about.partials.contents')
    </div>
</div>
@endsection