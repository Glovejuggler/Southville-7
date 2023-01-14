@extends('layouts.master')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="bg-white rounded-lg p-8">
            <span class="text-xl font-bold text-theme-800">Contact Us</span>
            <div class="mt-8 flex justify-between">
                <div>
                    <span class="text-black/80 italic">
                        Please get in touch with us should there be any inquiries.
                    </span>
                    <div class="mt-4 text-lg font-semibold text-theme-800">
                        Contact Information
                    </div>
                    <div class="flex items-center">
                        <i class="bx bx-phone text-2xl text-theme-800 mx-1"></i>
                        <span>Wilma Vibar (0967-597-5552)</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bx bx-envelope text-2xl text-theme-800 mx-1"></i>
                        <span>admin@southville7cc.online</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bx bx-home-heart text-2xl text-theme-800 mx-1"></i>
                        <span>Lot 15, Block 5, Site 2, Southville 7, Brgy. Dayap, Calauan, Laguna</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-row items-center justify-center max-w-7xl mx-auto">
                <div class="gmap_canvas self-center"><iframe width="600" height="500" class="gmap_canvas"
                        src="https://maps.google.com/maps?q=southville%207&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500px;
                            width: 600px;
                            max-width: 90vw;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection