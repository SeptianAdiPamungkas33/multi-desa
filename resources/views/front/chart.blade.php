<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Website</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <style>
        @media(max-width:1520px) {
            .left-svg {
                display: none;
            }
        }

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
    @include('front.includes.navbar')

    <div class="items-center justify-center w-full overflow-x-hidden mx-8 pt-0 lg:pt-12 pb-12 xl:pt-12 xl:pb-24">
        <div class="flex flex-col w-full text-center font-bold">
            <p class="text-black text-6xl pb-8">{{$website->header->nama_menu6}}</p>
        </div>
        <div class="flex justify-center items-center">
            <div class="w-[400px] flex flex-col gap-2">
                <p class="font-bol text-3xl uppercase text-left">Keterangan</p>
                <div class="w-fit flex items-cente py-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white overflow-hidden">
                    <label for="" class="w-[200px]">Total Laki-Laki</label>
                    <div class="">
                        {{ $totalLaki }}
                    </div>
                </div>
                <div class="w-fit flex items-cente py-1 text-2xl font-bold text-gray-700 dark:text-gray-400 overflow-hidden">
                    <label for="" class="w-[200px]">Total Perempuan</label>
                    <div class="">
                        {{ $totalPerempuan }}
                    </div>
                </div>
                <div class="w-fit flex items-cente py-1 text-2xl font-bold text-gray-700 dark:text-gray-400 overflow-hidden">
                    <label for="" class="w-[200px]">Total Penduduk</label>
                    <div class="">
                        {!! $totalPenduduk !!}
                    </div>
                </div>
                <div class="w-fit flex items-cente py-1 text-2xl font-bold text-gray-700 dark:text-gray-400 overflow-hidden">
                    <label for="" class="w-[200px]">Total Penduduk</label>
                    <div class="">
                        {!! $persenLaki !!} %
                    </div>
                </div>
                <div class="w-fit flex items-cente py-1 text-2xl font-bold text-gray-700 dark:text-gray-400 overflow-hidden">
                    <label for="" class="w-[200px]">Total Penduduk</label>
                    <div class="">
                        {!! $persenPerempuan !!} %
                    </div>
                </div>
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
</body>

</html>