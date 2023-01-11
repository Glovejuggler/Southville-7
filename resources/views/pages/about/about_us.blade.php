@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:flex">
        <div class="bg-white rounded-lg p-8 lg:w-9/12 text-center">
            <div class="font-bold text-4xl text-theme-900 duration-1000 transition ease-out opacity-0 -translate-y-5"
                id="about">
                About us</div>

            <div class="mt-4 duration-1000 transition ease-out opacity-0 translate-y-5" id="details">We are
                Southville 7 Credit
                Cooperative. We aim to build a wonderful community
                within
                Southville 7 residence, and
                eventually spread our ideals to other people and communities.</div>
        </div>
        @include('pages.about.partials.contents')
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.addEventListener('load', function () {
        document.querySelector('#about').classList.remove('opacity-0', '-translate-y-5');
        document.querySelector('#details').classList.remove('opacity-0', 'translate-y-5');
    })
</script>
@endsection