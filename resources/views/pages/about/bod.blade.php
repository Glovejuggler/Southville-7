@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:flex">
        <div class="bg-white rounded-lg p-8 lg:w-9/12">
            <span class="font-bold text-xl block text-theme-900">Board of Directors</span>

            <div class="pt-12 lg:flex">
                <div class="w-1/6">
                    <img src="/images/photo.jpg" alt="photo" class="rounded-full w-full p-2">
                </div>
                <div class="w-4/6">
                    <span class="font-bold text-theme-900">Name</span>
                    <p class="pt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum esse illum, veniam
                        soluta fuga
                        assumenda consequatur dicta earum eos quod? Ex magnam quibusdam ratione perferendis nihil omnis
                        quis nobis repudiandae.</p>
                </div>
            </div>

            <div class="pt-12 lg:flex">
                <div class="w-1/6">
                    <img src="/images/photo.jpg" alt="photo" class="rounded-full w-full p-2">
                </div>
                <div class="w-4/6">
                    <span class="font-bold text-theme-900">Name</span>
                    <p class="pt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum esse illum, veniam
                        soluta fuga
                        assumenda consequatur dicta earum eos quod? Ex magnam quibusdam ratione perferendis nihil omnis
                        quis nobis repudiandae.</p>
                </div>
            </div>

            <div class="pt-12 lg:flex">
                <div class="w-1/6">
                    <img src="/images/photo.jpg" alt="photo" class="rounded-full w-full p-2">
                </div>
                <div class="w-4/6">
                    <span class="font-bold text-theme-900">Name</span>
                    <p class="pt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum esse illum, veniam
                        soluta fuga
                        assumenda consequatur dicta earum eos quod? Ex magnam quibusdam ratione perferendis nihil omnis
                        quis nobis repudiandae.</p>
                </div>
            </div>

            <div class="pt-12 lg:flex">
                <div class="w-1/6">
                    <img src="/images/photo.jpg" alt="photo" class="rounded-full w-full p-2">
                </div>
                <div class="w-4/6">
                    <span class="font-bold text-theme-900">Name</span>
                    <p class="pt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum esse illum, veniam
                        soluta fuga
                        assumenda consequatur dicta earum eos quod? Ex magnam quibusdam ratione perferendis nihil omnis
                        quis nobis repudiandae.</p>
                </div>
            </div>
        </div>
        @include('pages.about.partials.contents')
    </div>
</div>
@endsection