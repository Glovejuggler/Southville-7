@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:flex">
        <div class="bg-white rounded-lg p-8 lg:w-9/12">
            <span
                class="font-bold text-center text-4xl block text-theme-900 transition-all duration-1000 ease-out opacity-0 -translate-y-5"
                id="bod">Board of Directors</span>

            <div id="details" class="transition-all duration-1000 ease-out opacity-0 translate-y-5">
                <div class="pt-12 flex lg:grid grid-cols-2 flex-col justify-center space-y-4">
                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Desiree_Gamo_BOD.jpg') }}" class="rounded-full h-28 w-28" alt="">
                        <span>Desiree Gamo</span>
                    </div>

                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Rodalyn_Glorioso_BOD.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <span>Rodalyn Glorioso</span>
                    </div>

                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Melanie_Galapo_BOD.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <span>Melanie Galapo</span>
                    </div>

                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Celestina_Lumpas_BOD.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <span>Celestina Lumpas</span>
                    </div>

                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Olivia_Albario_BOD.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <span>Olivia Albario</span>
                    </div>

                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Ma._Lourdes_Cambosa_BOD.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <span>Ma. Lourdes Cambosa</span>
                    </div>

                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Clarita_Delos_Santos_BOD.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <span>Clarita Delos Santos</span>
                    </div>

                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Gemma_Quirante_BOD.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <span>Gemma Quirante</span>
                    </div>

                    <div class="text-theme-800 font-bold text-xl flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Nelfa_Gabriel_BOD.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <span>Nelfa Gabriel</span>
                    </div>
                </div>

                <span class="mt-12 text-center font-bold text-4xl block text-theme-900">Officers</span>

                <div class="pt-12 flex justify-center flex-col space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Dominador_De_Meza.jpg') }}" class="rounded-full h-28 w-28"
                            alt="">
                        <div class="flex-col flex">
                            <span class="text-theme-800 font-bold text-xl">Dominador De Meza</span>
                            <span class="font-semibold text-black/80">Chairman</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Rodel_Rubias.jpg') }}" class="rounded-full h-28 w-28" alt="">
                        <div class="flex-col flex">
                            <span class="text-theme-800 font-bold text-xl">Rodel Rubias</span>
                            <span class="font-semibold text-black/80">Vice Chairman</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/bod/Wilma_Vibar.jpg') }}" class="rounded-full h-28 w-28" alt="">
                        <div class="flex-col flex">
                            <span class="text-theme-800 font-bold text-xl">Wilma Vibar</span>
                            <span class="font-semibold text-black/80">Treasurer/Secretary</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.about.partials.contents')
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.addEventListener('load', function () {
        document.querySelector('#bod').classList.remove('opacity-0', '-translate-y-5');
        document.querySelector('#details').classList.remove('opacity-0', 'translate-y-5');
    })
</script>
@endsection