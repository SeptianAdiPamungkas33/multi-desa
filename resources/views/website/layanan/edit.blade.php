@extends ('layouts.dashboard')

@section ('container')
<div class="p-4 mt-16 sm:ml-64">
    <p class="text-3xl font-bold text-blue-600 uppercase">Halaman Edit Layanan</p>
    <form action="/website/layanan/{{$layanan->id}}" method="post" class="max-w-xl">
        @csrf
        @method('put')
        <div class="mb-5">
            <label for="judul1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layanan 1</label>
            <input type="text" id="judul1" value="{{$layanan->judul1}}" name="judul1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="deskripsi1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Layanan 1</label>
            <input type="text" id="deskripsi1" name="deskripsi1" value="{{$layanan->deskripsi1}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="gambar1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Layanan 1</label>
            <input type="text" id="gambar1" name="gambar1" value="{{$layanan->gambar1}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="judul2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layanan 2</label>
            <input type="text" id="judul2" value="{{$layanan->judul2}}" name="judul2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="deskripsi2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Layanan 2</label>
            <input type="text" id="deskripsi2" name="deskripsi2" value="{{$layanan->deskripsi2}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="gambar2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar2 Layanan 3</label>
            <input type="text" id="gambar2" name="gambar2" value="{{$layanan->gambar2}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="judul3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layanan 3</label>
            <input type="text" id="judul3" value="{{$layanan->judul3}}" name="judul3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="deskripsi3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Layanan 3</label>
            <input type="text" id="deskripsi3" name="deskripsi3" value="{{$layanan->deskripsi3}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="gambar3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Layanan 3</label>
            <input type="text" id="gambar3" name="gambar3" value="{{$layanan->gambar3}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
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