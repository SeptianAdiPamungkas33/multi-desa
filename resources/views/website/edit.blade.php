@extends('layouts.dashboard')

@section('container')

<div class="m-64 mt-20 p-4">
    <p class="text-xl font-bold uppercase mb-8">Manajemen Website</p>
    <a href="/{{$website->url}}/beranda" target="_blank">Kunjungi website</a>
    <!-- <div class="">
        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Informasi Website</span>
        </a>
    </div> -->
    <div class="">
        <a href="/website/header" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Header</span>
        </a>
    </div>
    <div class="">
        <a href="/website/slider" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Slider</span>
        </a>
    </div>
    <div class="">
        <a href="/website/footer" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Footer</span>
        </a>
    </div>
    <div class="">
        <a href="/website/tentangkami" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Tentang Kami</span>
        </a>
    </div>
    <div class="">
        <a href="/website/layanan" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Layanan</span>
        </a>
    </div>
</div>

@endsection