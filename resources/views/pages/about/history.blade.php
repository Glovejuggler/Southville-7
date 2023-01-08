@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:flex">
        <div class="bg-white rounded-lg p-8 lg:w-9/12">
            <span class="font-bold text-xl block text-theme-900">History</span>

            <span class="mt-4">The Southville 7 Credit Cooperative was established through the help of Congressman
                Benitez, the chairman of housing.
                The Congressman approached and talked to the National Housing Authority (NHA) to help the issue of the
                relocation and
                come up with the idea of building a cooperative that will help and give the members a loan with the
                lowest interest rate
                of three percent (3%). As the cooperative started, it was connected and trained multiple times by the
                Polytechnic
                University of the Philippines Sta. Mesa through the memorandum of agreement between Jolly Homes
                Foundation and PUP Main
                to help and guide the cooperative. As a starting plan, each member of the cooperative gave two thousand
                pesos as shared
                capital, but due to financial issues, the Jolly Homes Foundation helped the cooperative to reached
                financial support to
                “Angat Buhay Foundation” by the former Vice President Leni Robredo. The Cooperative will continue to
                give quality
                service to its members for a better future.</span>
        </div>
        @include('pages.about.partials.contents')
    </div>
</div>
@endsection