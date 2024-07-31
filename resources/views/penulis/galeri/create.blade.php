@extends('layouts.dashboard')

@section('container')
<div class="p-4 mt-16 sm:ml-64">
    <form action="{{ route('galeri.store') }}" method="post" class="max-w-xl" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <x-label for="judul_galeri">Judul Galeri</x-label>
            <input type="text" id="judul_galeri" name="judul_galeri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>

        <div class="w-full flex flex-col">
            <div class="mb-3">
                <x-label for="filename">Images/Video</x-label>
                <input type="file" name="filename[]" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000|multiple</p>
            </div>

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