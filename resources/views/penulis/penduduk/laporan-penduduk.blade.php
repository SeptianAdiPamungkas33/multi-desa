@extends('layouts.dashboard')

@section('container')

<div class="ml-64 mt-20 p-4">
    <p class="text-xl font-bold uppercase mb-8">Laporan Penduduk</p>

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
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 w-80 py-3">Desa / Wbesite</th>
                        <th scope="col" class="px-4 w-80 py-3">Laki-laki</th>
                        <th scope="col" class="px-4 w-80 py-3">Perempuan</th>
                        <th scope="col" class="px-4 w-80 py-3">Total Penduduk</th>
                        <th scope="col" class="px-4 w-80 py-3">Laki-laki dalam persen</th>
                        <th scope="col" class="px-4 w-80 py-3">Perempuan dalam persen</th>
                        <th scope="col" class="px-4 w-80 py-3 text-center">Detail</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penduduk as $item)
                    <tr>
                        <th scope="col" class="px-4 w-80 py-3">{{$item->website->user->nama_desa ?? ''}}</th>
                        <th scope="col" class="px-4 w-80 py-3">{{$item->laki}}</th>
                        <th scope="col" class="px-4 w-80 py-3">{{$item->perempuan}}</th>
                        <th scope="col" class="px-4 w-80 py-3">{{$item->total_penduduk}}</th>
                        <th scope="col" class="px-4 w-80 py-3">{{$item->persen_laki}}</th>
                        <th scope="col" class="px-4 w-80 py-3">{{$item->persen_perempuan}}</th>
                        <th scope="col" class="px-4 max-w-80 py-3 items-center flex justify-center">
                            <a href="{{ route('laporan-penduduk-detail', $item->id) }}" class="w-80 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-4 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-800 dark:focus:ring-blue-800"">
                                <span class=" text-xl whitespace-nowrap">Detail</span>
                            </a>
                        </th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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

<script>
    $(document).ready(function() {

        var table = $('#example').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
@endsection