@extends ('layouts.dashboard')

@section ('container')
<div class="p-4 mt-16 sm:ml-64">
    <p class="text-3xl font-bold text-blue-600 uppercase mb-4">Halaman Tambah Desa</p>
    <form action="/desa" method="post" class="max-w-xl">
        @csrf
        @method('post')
        <div class="mb-5">
            <x-label for="nama">Nama Desa</x-label>
            <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <x-label for="alamat">Alamat</x-label>
            <input type="text" id="alamat" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <x-label for="nomor_telepon" :required="false">Nomor Telepon</x-label>
            <input type="number" id="no_telp" name="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="flex items-center gap-x-4">
            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-800 dark:focus:ring-blue-800">Submit</button>
            <div class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                <a href="javascript:history.back()">Back</a>
            </div>
        </div>
    </form>
</div>
@endsections