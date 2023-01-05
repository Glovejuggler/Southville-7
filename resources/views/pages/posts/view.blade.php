@extends('layouts.master')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
    {{-- Title --}}
    <div class="font-bold text-2xl text-theme-800 mb-6">
        {{ $post->title }}
    </div>

    {{-- Content --}}
    <div>
        <span>{!! nl2br($post->content) !!}</span>
    </div>

    {{-- Gallery/Photos --}}
    <div class="font-bold text-lg text-theme-800 my-6">
        Gallery
    </div>
    <div class="grid gap-2 lg:grid-cols-4 grid-cols-2">
        @forelse ($post->photos as $photo)
        <div onclick="viewPhoto({{ $loop->index }})" class="rounded-lg overflow-hidden cursor-pointer">
            <img class="rounded-lg hover:scale-125 ease-in-out duration-200 object-cover h-48 w-full"
                src="../../{{ $photo->path }}" alt="">
        </div>
        @empty
        No photos
        @endforelse
    </div>
</div>

<div id="viewPhoto" class="fixed inset-0 z-50 h-screen justify-center items-center hidden">
    <div class="relative">
        <img id="modalImage" class="relative z-50 max-h-[80vh] lg:max-w-4xl max-w-[90vw] ease-in-out" src="" alt="">
    </div>

    <div id="modalBg" onclick="closeModal()" class="inset-0 fixed z-40 bg-black/75 backdrop-blur-md ease-in-out">
    </div>
    <button type="button" onclick="closeModal()"
        class="fixed right-0 top-0 z-[9999] bg-white hover:opacity-90 p-3 h-12 w-12 rounded-full inline-flex justify-center items-center m-4">
        <i class="bx bx-x text-black text-2xl leading-none"></i>
    </button>

    <button id="btn-next" onclick="nextImage()" type="button"
        class="text-white/50 hover:text-white active:text-white fixed right-0 inset-y-0 pr-7 z-[60] active:translate-y-1">
        <i class="bx bx-right-arrow-alt text-4xl"></i>
    </button>

    <button id="btn-prev" onclick="prevImage()" type="button"
        class="text-white/50 hover:text-white active:text-white fixed left-0 inset-y-0 pl-7 z-[60] active:translate-y-1">
        <i class="bx bx-left-arrow-alt text-4xl"></i>
    </button>
</div>
@endsection

@section('scripts')
<script>
    var photos = @json($post->photos);
    const modal = document.getElementById('viewPhoto');
    const image = document.getElementById('modalImage');
    const modalBg = document.getElementById('modalBg');
    var index = 0;

    function viewPhoto(photo) {
        index = photo;
        modal.classList.replace('hidden', 'flex');
        image.src = '../../' + photos[photo].path
        image.classList.add('fade-in', 'scale-in');
        image.addEventListener('animationend', function() {
            image.classList.remove('fade-in', 'scale-in')
        }, {
            once: true
        });
        modalBg.classList.add('fade-in');
        modalBg.addEventListener('animationend', function() {
            modalBg.classList.remove('fade-in')
        });
    }

    function closeModal() {
        image.classList.add('fade-out', 'scale-out');
        modalBg.classList.add('fade-out');
        image.addEventListener('animationend', function() {
            image.classList.remove('fade-out', 'scale-out')
            modal.classList.replace('flex', 'hidden')
        }, {
            once: true
        });
        modalBg.addEventListener('animationend', function() {
            modalBg.classList.remove('fade-out')
        }, {
            once: true
        })
    }

    function nextImage() {
        if (index < photos.length - 1) {
            index++;
        } else {
            index = 0
        }
        image.src = '../../' + photos[index].path
    }

    function prevImage() {
        if (index > 0) {
            index--;
        } else {
            index = photos.length - 1
        }
        image.src = '../../' + photos[index].path
    }

    window.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight') {
            document.querySelector('#btn-next').click()
        }

        if (e.key === 'ArrowLeft') {
            document.querySelector('#btn-prev').click()
        }
    })

    window.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    })
</script>
@endsection

@section('styles')
<style>
    @keyframes fade-out {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    @keyframes fade-in {
        to {
            opacity: 1;
        }

        from {
            opacity: 0;
        }
    }

    @keyframes scale-out {
        from {
            transform: scale(1);
            opacity: 1;
        }

        to {
            transform: scale(0.75);
            opacity: 0;
        }
    }

    @keyframes scale-in {
        to {
            transform: scale(1);
            opacity: 1;
        }

        from {
            transform: scale(0.75);
            opacity: 0;
        }
    }

    .fade-out {
        animation-name: fade-out;
        animation-duration: 200ms;
    }

    .fade-in {
        animation-name: fade-in;
        animation-duration: 200ms;
    }

    .scale-out {
        animation-name: scale-out;
        animation-duration: 200ms;
    }

    .scale-in {
        animation-name: scale-in;
        aimation-duration: 2000ms;
    }
</style>
@endsection