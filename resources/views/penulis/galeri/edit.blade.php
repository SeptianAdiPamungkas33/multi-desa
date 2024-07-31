edit galeri
@extends('layouts.dashboard')

@section('container')
<div class="p-4 mt-16 sm:ml-64">
    <form action="/galeri/{{$galeri->id}}" method="post" class="max-w-xl" enctype="multipart/form-data">
        @csrf
        @method('put')
        @if ($errors->any())
        <div class="alert alert-danger">
            <div class="alert-title">
                <h4>Whoops!</h4>
            </div>
            There are some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-5">
            <x-label for="judul_galeri">Judul Galeri</x-label>
            <input type="text" id="judul_galeri" value="{{$galeri->judul_galeri}}" name="judul_galeri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="w-full flex flex-col">
            <div class="mb-3">
                <x-label for="judul_galeri">Images / Video</x-label>
                <input class="" type="file" name="filename[]" multiple required>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000|multiple</p>
            </div>
            <td class="px-4 py-3">
                <!-- <img src="{{ $galeri->image }}" alt="{{ $galeri->judul_galeri }}" class="w-20 h-20 object-cover"> -->
                @if ($galeri->media->count() == 1)
                @foreach ($galeri->media as $media)
                @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->file_path))
                <img src="{{ asset($media->file_path) }}" class="w-80 py-4 object-cover">
                @elseif (preg_match('/\.mp4$/i', $media->file_path))
                <video controls class="w-80 object-cover py-4">
                    <source src="{{ asset($media->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                @endif
                @endforeach
                @elseif ($galeri->media->count() > 1)
                <div class="splide" id="splide{{$galeri->id}}">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($galeri->media as $media)
                            <li class="splide__slide">
                                @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->file_path))
                                <img src="{{ asset($media->file_path) }}" class="w-80 py-4 object-cover">
                                @elseif (preg_match('/\.mp4$/i', $media->file_path))
                                <video controls class="w-80 py-4 object-cover">
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
                        new Splide('#splide{{$galeri->id}}', {
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
            <div class="flex items-center gap-x-4">
                <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-800 dark:focus:ring-blue-800">Submit</button>
                <div class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                    <a href="javascript:history.back()">Back</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection