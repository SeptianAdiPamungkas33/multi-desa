@extends('layouts.dashboard')

@section('container')
<div class="p-4 mt-16 sm:ml-64">
    <p class="text-3xl font-bold text-blue-600 uppercase">Halaman Edit Data Penduduk {{$user->nama_desa}}</p>
    <form action="{{ route('penduduk.update', $penduduk->id ?? '') }}" method="post" class="max-w-xl" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $penduduk->id ?? '' }}">
        <div class="mb-5">
            <x-label for="laki">Laki Laki</x-label>
            <input type="number" id="laki" name="laki" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->laki ?? '' }}" required />
        </div>
        <div class="mb-5">
            <x-label for="perempuan">Perempuan</x-label>
            <input type="number" id="perempuan" name="perempuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->perempuan ?? '' }}" required />
        </div>
        <div class="mb-5">
            <x-label for="total_penduduk">Total Penduduk</x-label>
            <input type="number" id="total_penduduk" name="total_penduduk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->total_penduduk ?? '' }}" readonly />
        </div>
        <div class="mb-5">
            <x-label for="persen_laki">Persentase Laki-Laki</x-label>
            <input type="text" id="persen_laki" name="persen_laki" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->persen_laki ?? '' }}" readonly />
        </div>
        <div class="mb-5">
            <x-label for="persen_perempuan">Persentase Perempuan</x-label>
            <input type="text" id="persen_perempuan" name="persen_perempuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->persen_perempuan ?? '' }}" readonly />
        </div>
        <div class="flex items-center gap-x-4">
            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-800 dark:focus:ring-blue-800">Submit</button>
            <div class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                <a href="javascript:history.back()">Back</a>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lakiInput = document.getElementById('laki');
        const perempuanInput = document.getElementById('perempuan');
        const totalInput = document.getElementById('total_penduduk');
        const persenLakiInput = document.getElementById('persen_laki');
        const persenPerempuanInput = document.getElementById('persen_perempuan');

        function calculate() {
            const laki = parseFloat(lakiInput.value) || 0;
            const perempuan = parseFloat(perempuanInput.value) || 0;
            const total = laki + perempuan;

            totalInput.value = total;
            persenLakiInput.value = total ? ((laki / total) * 100).toFixed(2) + '%' : '0%';
            persenPerempuanInput.value = total ? ((perempuan / total) * 100).toFixed(2) + '%' : '0%';
        }

        lakiInput.addEventListener('input', calculate);
        perempuanInput.addEventListener('input', calculate);
    });
</script>
@endsection