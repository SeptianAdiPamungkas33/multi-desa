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
    <!-- Navbar Section -->
    @include('front.includes.navbar')

    <!-- Content Section -->
    <div class="w-full mt-12 flex flex-col">
        <div class="flex flex-col w-full text-center font-bold">
            <p class="text-black text-6xl pb-8">{{$website->header->nama_menu3}}</p>
        </div>
        <div class="items-center justify-center w-full overflow-x-hidden pt-0 lg:py-5">
            <div class=" w-full items-center justify-between h-full lg:flex-row py-16">
                <div class="relative flex items-center justify-center w-full h-full">
                    <div class="relative w-full flex items-center justify-center">
                        <img src="{{ url('img/ktp.png') }}" class="w-5/12 lg:h-full">
                    </div>
                </div>
                <div class="flex flex-col items-center w-full pt-5 text-center lg:items-start lg:w-full lg:pt-5 xl:pt-10 xl:px-40 lg:text-left">
                    <h1 class="relative text-2xl font-black leading-tight text-gray-900 sm:text-4xl">{{ $website->layanan->judul1 }}</h1>
                    <p class="pr-0 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">{{ $website->layanan->deskripsi1 }}</p>
                </div>
            </div>
        </div>
        <div class="items-center justify-center w-full overflow-x-hidden pt-0 lg:py-5">
            <div class="w-full items-center justify-between h-full lg:flex-row py-16">
                <div class="relative flex items-center justify-center w-full h-full">
                    <div class="relative w-full flex items-center justify-center">
                        <img src="{{ url('img/kk.png') }}" class="w-5/12 lg:h-full">
                    </div>
                </div>
                <div class="flex flex-col items-center w-full pt-5 text-center lg:items-start lg:w-full lg:pt-5 xl:pt-10 xl:px-40 lg:text-left">
                    <h1 class="relative text-2xl font-black leading-tight text-gray-900 sm:text-4xl">{{ $website->layanan->judul2 }}</h1>
                    <p class="pr-0 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">{{ $website->layanan->deskripsi2 }}</< /p>
                    </p>
                </div>
            </div>
        </div>
        <div class="items-center justify-center w-full overflow-x-hidden pt-0 lg:py-5">
            <div class="w-full items-center justify-between h-full lg:flex-row py-16">
                <div class="relative flex items-center justify-center w-full h-full">
                    <div class="relative w-full flex items-center justify-center">
                        <img src="{{ url('img/akte.png') }}" class="w-5/12 lg:h-full">
                    </div>
                </div>
                <div class="flex flex-col items-center w-full pt-5 text-center lg:items-start lg:w-full lg:pt-5 xl:pt-10 xl:px-40 lg:text-left">
                    <h1 class="relative text-2xl font-black leading-tight text-gray-900 sm:text-4xl">{{ $website->layanan->judul3 }}</h1>
                    <p class="pr-0 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">{{ $website->layanan->deskripsi3 }}</p>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Content Section -->

    @include('front.includes.footer')

    <!-- a little JS for the mobile nav button -->
    <script>
        if (document.getElementById('nav-mobile-btn')) {
            document.getElementById('nav-mobile-btn').addEventListener('click', function() {
                if (this.classList.contains('close')) {
                    document.getElementById('nav').classList.add('hidden');
                    this.classList.remove('close');
                } else {
                    document.getElementById('nav').classList.remove('hidden');
                    this.classList.add('close');
                }
            });
        }

        const carouselElement = document.getElementById('carousel-example');

        const items = [{
                position: 0,
                el: document.getElementById('carousel-item-1'),
            },
            {
                position: 1,
                el: document.getElementById('carousel-item-2'),
            },
            {
                position: 2,
                el: document.getElementById('carousel-item-3'),
            },
            {
                position: 3,
                el: document.getElementById('carousel-item-4'),
            },
        ];

        // options with default values
        const options = {
            defaultPosition: 1,
            interval: 3000,

            indicators: {
                activeClasses: 'bg-white dark:bg-gray-800',
                inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
                items: [{
                        position: 0,
                        el: document.getElementById('carousel-indicator-1'),
                    },
                    {
                        position: 1,
                        el: document.getElementById('carousel-indicator-2'),
                    },
                    {
                        position: 2,
                        el: document.getElementById('carousel-indicator-3'),
                    },
                    {
                        position: 3,
                        el: document.getElementById('carousel-indicator-4'),
                    },
                ],
            },

            // callback functions
            onNext: () => {
                console.log('next slider item is shown');
            },
            onPrev: () => {
                console.log('previous slider item is shown');
            },
            onChange: () => {
                console.log('new slider item has been shown');
            },
        };

        // instance options object
        const instanceOptions = {
            id: 'carousel-example',
            override: true
        };
    </script>
</body>

</html>