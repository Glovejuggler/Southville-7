@extends('layouts.master')

@section('content')
<div class="lg:h-auto h-auto bg-theme-800 text-white flex justify-start p-8 lg:p-20">
    <div
        class="max-w-screen-2xl mx-auto px-8 flex lg:flex-row flex-col lg:items-center justify-center lg:justify-around">
        <img src="images/logo.png" class="rounded-full w-1/2 lg:w-1/3 self-center" alt="">
        <div class="w-full lg:w-1/3">
            <span class="flex text-lg mb-10 leading-tight">
                Slogan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa velit quis nulla debitis
                nemo
                officia. Architecto quod enim neque maiores dolores fugiat cumque aliquid
            </span>
            <a href="#start"
                class="p-3 lg:w-1/3 w-full border-2 text-sm border-white rounded-lg uppercase hover:bg-white hover:text-theme-800 font-semibold ease-in-out duration-300">Get
                started</a>
        </div>
    </div>
</div>

<div class="my-12 p-1" id="start">
    <div class="max-w-7xl mx-auto bg-white rounded-lg p-8">
        <div class="flex items-center">
            <div class="lg:w-1/2 flex flex-col">
                <span class="font-extrabold text-4xl text-theme-800">Best loan options</span>
                <span class="mt-8 text-lg font-semibold italic">Ang pautang ng kooperatiba ay may pinakamababang
                    interest
                    na
                    3% sa mga
                    miyembro</span>
            </div>
            <img src="images/loan.png" alt="">
        </div>
    </div>
</div>

<div class="my-8">
    <div class="max-w-screen-2xl mx-auto px-8">
        <div class="flex justify-center">
            <span class="text-black/50 leading-tight w-full lg:w-10/12">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus voluptatum amet odio consectetur?
                Aliquam delectus odio distinctio vitae voluptas ipsa quod voluptate dolore error placeat, culpa hic
                explicabo, sapiente possimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque perferendis
                magni, iure suscipit corporis natus, obcaecati mollitia maxime recusandae hic cupiditate. Nemo
                aspernatur accusamus numquam deserunt? Quisquam dolores neque cumque? Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Cupiditate accusantium quod ducimus officia saepe eveniet velit dolore
                iste ullam voluptatem laudantium deleniti ipsam, doloribus quisquam iure! Quaerat fugiat veniam saepe!
            </span>
        </div>
        <div class="flex justify-center mt-12">
            <span class="text-black leading-tight w-full lg:w-10/12">
                <p class="uppercase font-semibold block mb-3">Requirements to become a member</p>
                <span class="block">
                    1. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus optio inventore doloremque?
                    Similique, asperiores dolorem? Facere reprehenderit eaque laborum accusamus impedit optio quisquam
                    blanditiis dolore, corporis dicta at adipisci dolorem.
                </span>
                <span class="block">
                    2. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione quia voluptas, soluta doloribus
                    incidunt nulla deserunt tenetur aspernatur porro, aliquam quo nihil. Quis optio eum dolores aperiam
                    similique dignissimos laborum.
                </span>
                <span class="block">
                    3. Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sunt unde eligendi tempore
                    molestiae reiciendis rem harum adipisci quo assumenda debitis quod aliquam ducimus ipsam culpa,
                    consectetur ullam quae voluptate?
                </span>
                <span class="block">
                    4. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod saepe, hic cumque tempore ipsa
                    aspernatur. Beatae, nostrum earum dolores aspernatur consequuntur voluptatum nulla quia aliquid
                    harum in, eius quo nisi?
                </span>
            </span>
        </div>
    </div>
</div>
@endsection