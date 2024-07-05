@extends('layouts.dashboard')

@section('container')

<div class="m-64 mt-20 p-4">
    <p class="text-xl font-bold uppercase mb-8">Manajemen Konten</p>
    <div class="">
        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Informasi Konten</span>
        </a>
    </div>
    <div class="">
        <a href="/konten/galeri/index" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Galeri</span>
        </a>
    </div>
    <div class="">
        <a href="/konten/artikel/index" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <span class="flex-1 ms-3 whitespace-nowrap">Artikel</span>
        </a>
    </div>
</div>

@endsection