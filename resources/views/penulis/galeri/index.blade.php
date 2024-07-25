@extends('layouts.dashboard')

@section('container')

<div class="ml-64 mt-20 p-4">
    <p class="text-xl font-bold uppercase mb-8">Manajemen Galeri</p>

    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                    </div>
                </form>
            </div>
            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="/galeri/create" class="flex items-center justify-center text-white bg-blue-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add product
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 w-80 py-3">Nama</th>
                        <th scope="col" class="px-4 w-80 py-3">Media</th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeri as $item)
                    <tr class="border-b dark:border-gray-700">
                        <td scope="row" class="px-4 py-3 w-80 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->judul_galeri}}</td>
                        <td class="px-4 py-3 w-80">
                            @if ($item->media->count() == 1)
                            @foreach ($item->media as $media)
                            @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->file_path))
                            <img src="{{ asset($media->file_path) }}" class="w-80 object-cover">
                            @elseif (preg_match('/\.mp4$/i', $media->file_path))
                            <video controls class="w-80 object-cover">
                                <source src="{{ asset($media->file_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @endif
                            @endforeach
                            @elseif ($item->media->count() > 1)
                            <div class="splide" id="splide{{$item->id}}">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach ($item->media as $media)
                                        <li class="splide__slide">
                                            @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->file_path))
                                            <img src="{{ asset($media->file_path) }}" class="w-80 object-cover">
                                            @elseif (preg_match('/\.mp4$/i', $media->file_path))
                                            <video controls class="w-80 object-cover">
                                                <source src="{{ asset($media->file_path) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    new Splide('#splide{{$item->id}}', {
                                        type: 'loop',
                                        perPage: 1,
                                        autoplay: true,
                                    }).mount();
                                });
                            </script>
                            @else
                            <span class="text-gray-500">No media available</span>
                            @endif
                        </td>
                        <td class="mb-5">
                            <form action="{{ route('galeri.updateStatus', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required onchange="this.form.submit()">
                                    <option value="aktif" {{ $item->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="inaktif" {{ $item->status == 'inaktif' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3 flex items-center justify-end">
                            <button id="toggle{{$item->id}}" data-dropdown-toggle="toggles{{$item->id}}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                            <div id="toggles{{$item->id}}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="toggle{{$item->id}}">
                                    <li>
                                        <a href="{{ route('galeri.edit', $item->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="block py-2 px-4 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- No data message -->
            @if($galeri->isEmpty())
            <div class="p-4">
                <p class="text-gray-500 dark:text-gray-400">No gallery items found.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection