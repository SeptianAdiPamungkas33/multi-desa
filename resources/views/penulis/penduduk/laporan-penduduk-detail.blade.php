@extends('layouts.dashboard')

@section('container')

<div class="p-4 mt-16 sm:ml-64">
    <p class="text-3xl font-bold text-blue-600 uppercase">Detail Laporan Penduduk {{ $user->nama_desa ?? 'Unknown' }}</p>
    <div class="flex flex-wrap bg-white rounded shadow w-full">
        <div class="w-full lg:w-1/2 p-4">
            <form action="{{ route('penduduk.update', $penduduk->id ?? '') }}" method="post" class="max-w-xl" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $penduduk->id ?? '' }}">

                <div class="mb-5">
                    <x-label for="laki">Laki Laki</x-label>
                    <input type="number" id="laki" name="laki" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->laki ?? '' }}" disabled />
                </div>

                <div class="mb-5">
                    <x-label for="perempuan">Perempuan</x-label>
                    <input type="number" id="perempuan" name="perempuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->perempuan ?? '' }}" disabled />
                </div>

                <div class="mb-5">
                    <x-label for="total_penduduk">Total Penduduk</x-label>
                    <input type="number" id="total_penduduk" name="total_penduduk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->total_penduduk ?? '' }}" disabled />
                </div>

                <div class="mb-5">
                    <x-label for="persen_laki">Persentase Laki-Laki</x-label>
                    <input type="text" id="persen_laki" name="persen_laki" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->total_penduduk ? number_format(($penduduk->laki / $penduduk->total_penduduk) * 100, 2) . '%' : '0%' }}" disabled />
                </div>

                <div class="mb-5">
                    <x-label for="persen_perempuan">Persentase Perempuan</x-label>
                    <input type="text" id="persen_perempuan" name="persen_perempuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $penduduk->total_penduduk ? number_format(($penduduk->perempuan / $penduduk->total_penduduk) * 100, 2) . '%' : '0%' }}" disabled />
                </div>
                <div class="flex items-center gap-x-4">
                    <div class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        <a href="/penduduk-export" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                    </div>
                    <div class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                        <a href="javascript:history.back()">Back</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-full lg:w-1/2 p-4 flex items-center justify-center">
            <div class="w-full max-w-lg">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
</div>

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
@endsection