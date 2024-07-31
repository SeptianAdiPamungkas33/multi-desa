@extends ('layouts.dashboard')

@section ('container')
<div class="p-4 mt-16 sm:ml-64">
    <p class="text-3xl font-bold text-blue-600 uppercase">Halaman Edit Tentang kami</p>
    <form action="/website/tentangkami/{{$tentangkami->id}}" method="post" class="max-w-xl" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-5">
            <x-label for="judul_tentangkami">Media</x-label>
            <input type="text" id="judul" value="{{$tentangkami->judul}}" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <x-label for="deskripsi_tentangkami">Deskripsi Tentangkami</x-label>
            <input id="deskripsi" type="hidden" name="deskripsi" class="text-8xl" value="{{$tentangkami->deskripsi}}" required>
            <trix-editor input="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></trix-editor>
        </div>
        <div class="px-4 py-3">
            <img src="{{ $tentangkami->gambar ? url($tentangkami->gambar) : url('img/default.png') }}" alt="{{ $tentangkami->judul }}" class="w-20 h-20 object-cover">
        </div>
        <div>
            <x-label for="gambar">Gambar</x-label>
            <input name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">image|mimes:jpeg,png,jpg,gif,svg|max:2048</p>

        </div>
        <div class="flex items-center gap-x-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <div class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="javascript:history.back()">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection