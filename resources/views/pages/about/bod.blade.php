@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:flex">
        <div class="bg-white rounded-lg p-8 lg:w-9/12">
            <span class="font-bold text-xl block text-theme-900">Board of Directors</span>

            <div class="pt-12 flex justify-center flex-col space-y-4">
                <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                    <img src="{{ asset('images/photo.jpg') }}" class="rounded-full h-28 w-28" alt="">
                    <span>Desiree Gamo</span>
                </div>

                <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                    <img src="{{ asset('images/photo.jpg') }}" class="rounded-full h-28 w-28" alt="">
                    <span>Rodalyn Glorioso</span>
                </div>

                <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                    <img src="{{ asset('images/photo.jpg') }}" class="rounded-full h-28 w-28" alt="">
                    <span>Melanie Galapo</span>
                </div>

                <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                    <img src="{{ asset('images/photo.jpg') }}" class="rounded-full h-28 w-28" alt="">
                    <span>Celestina Lumpas</span>
                </div>

                <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                    <img src="{{ asset('images/photo.jpg') }}" class="rounded-full h-28 w-28" alt="">
                    <span>Olivia Albario</span>
                </div>
            </div>

            <span class="mt-12 font-bold text-xl block text-theme-900">Officers</span>

            <div class="pt-12 flex justify-center flex-col space-y-4">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/photo.jpg') }}" class="rounded-full h-28 w-28" alt="">
                    <div class="flex-col flex">
                        <span class="text-theme-800 font-bold text-xl">Dominador De Meza</span>
                        <span class="font-semibold text-black/80">Chairman</span>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/photo.jpg') }}" class="rounded-full h-28 w-28" alt="">
                    <div class="flex-col flex">
                        <span class="text-theme-800 font-bold text-xl">Rodel Rubias</span>
                        <span class="font-semibold text-black/80">Vice Chairman</span>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/photo.jpg') }}" class="rounded-full h-28 w-28" alt="">
                    <div class="flex-col flex">
                        <span class="text-theme-800 font-bold text-xl">Wilma Vibar</span>
                        <span class="font-semibold text-black/80">Treasurer</span>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.about.partials.contents')
    </div>
</div>
@endsection