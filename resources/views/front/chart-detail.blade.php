<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Website</title>
    <!--
        For more customization options, we would advise
        you to build your TailwindCSS from the source.
        https://tailwindcss.com/docs/installation
    -->
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>

    <!-- Add these lines in your main layout or within the <head> section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

    <!-- Small CSS to Hide elements at 1520px size -->
    <style>
        @media(max-width:1520px) {
            .left-svg {
                display: none;
            }
        }

        /* small css for the mobile nav close */
        #nav-mobile-btn.close span:first-child {
            transform: rotate(45deg);
            top: 4px;
            position: relative;
            background: #a0aec0;
        }

        #nav-mobile-btn.close span:nth-child(2) {
            transform: rotate(-45deg);
            margin-top: 0px;
            background: #a0aec0;
        }
    </style>
</head>

<body class="overflow-x-hidden w-full antialiased">
    <!-- Header Section -->
    @include('front.includes.navbar')

    <div class="p-4 mt-16 sm:ml-64">
        <p class="text-3xl font-bold text-blue-600 uppercase">Chart</p>
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
                        <input type="text" id="persen_laki" name="persen_laki" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ number_format(($penduduk->laki / $penduduk->total_penduduk) * 100, 2) ?? ''}}%" disabled />
                    </div>

                    <div class="mb-5">
                        <x-label for="persen_perempuan">Persentase Perempuan</x-label>
                        <input type="text" id="persen_perempuan" name="persen_perempuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ number_format(($penduduk->perempuan / $penduduk->total_penduduk) * 100, 2) ?? '' }}%" disabled />
                    </div>
                    <div class="flex items-center gap-x-4">
                        <div class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                            <a href="/penduduk">Back</a>
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
</body>

</html>