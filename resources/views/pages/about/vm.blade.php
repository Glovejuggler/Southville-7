@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:flex">
        <div class="bg-white rounded-lg p-8 lg:w-9/12 duration-1000 transition-all ease-out opacity-0 translate-y-5 text-center"
            id="details">
            <span class="font-bold text-4xl block text-theme-900 pb-2">Vision (Bisyon)</span>

            <span>
                Isang maunlad at masayang Southville 7 na may aktibo at nagkakaisang mamamayan. Isang komunidad na may
                mayabong na ekonomiya na napapakinabangan ng karamihan, maraming oportunidad sa kabuhayan at hanapbuhay,
                may katiyakan sa paninirahan at may sapat na batayan at panlipunang serbisyo.
            </span>

            <span class="font-bold text-4xl block text-theme-900 pt-8 pb-2">Mission (Misyon)</span>

            <span>
                Pagpapaunlad ng komunidad ng mahihirap ng Southville 7 sa pamamagitan ng dagdag na kabuhayan, pautang
                at pagkilos upang masolusyonan ang mga kakulangan sa batayan at panlipunang serbisyo.
            </span>

            <span class="font-bold text-4xl block text-theme-900 pt-8 pb-2">Values (Pagpapahalaga)</span>

            <span>
                Katapatan, Mapagkakatiwalaan, Pagkakaisa, May Disiplin at Maka-Diyos.
            </span>
        </div>
        @include('pages.about.partials.contents')
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.addEventListener('load', function () {
        document.querySelector('#details').classList.remove('opacity-0', 'translate-y-5');
    })
</script>
@endsection