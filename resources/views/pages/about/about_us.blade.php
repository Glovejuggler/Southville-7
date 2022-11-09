@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:flex">
        <div class="bg-white rounded-lg p-8 lg:w-9/12">
            <span class="font-bold text-xl block text-theme-900">About us</span>

            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas fugit unde corporis possimus, optio
                maiores! Error magnam quia odio officiis impedit aliquam provident quos voluptatem! Maiores illo rem sed
                eos.</span>
        </div>
        @include('pages.about.partials.contents')
    </div>
</div>
@endsection