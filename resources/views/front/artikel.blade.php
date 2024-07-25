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

<body class="overflow-x-hidden w-full  antialiased">
    <!-- Header Section -->
    @include('front.includes.navbar')

    <!-- BEGIN ARTIKEL SECTION -->
    <div class="items-center justify-center w-full overflow-x-hidden mx-8 pt-0 lg:pt-12 pb-12 xl:pt-12 xl:pb-24">
        <div class="flex flex-col w-full text-center font-bold">
            <p class="text-black text-6xl pb-8">{{$website->header->nama_menu4}}</p>
        </div>
        <div class="w-full flex flex-wrap justify-center items-center gap-4">
            @foreach($website->postingan->where('status', 'aktif') as $postingans)
            <div class="w-[300px] flex-wrap flex items-center p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="w-full p-6">
                    @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $postingans->gambar))
                    <div class="px-4 py-3">
                        <img src="{{ asset($postingans->gambar) }}" class="w-40 h-40 object-cover object-center">
                    </div>
                    @elseif (preg_match('/\.mp4$/i', $postingans->gambar))
                    <div class="px-4 py-3">
                        <video controls class="w-40 h-40 object-cover object-center">
                            <source src="{{ asset($postingans->gambar) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @else
                    <div class="px-4 py-3">
                        <span class="text-gray-500">No media available</span>
                    </div>
                    @endif
                </div>

                <div class="w-[300px] h-[40px] py-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white overflow-hidden">
                    {{$postingans->judul}}
                </div>
                <div class="w-[300px] h-[40px] py-1 font-normal text-yellow-400 overflow-hidden">
                    {{$postingans->kategori->nama}}
                </div>
                <div class="w-[300px] h-[58px] py-1 font-normal text-gray-700 dark:text-gray-400 overflow-hidden">
                    {!! $postingans->isi !!}
                </div>

                <a href="/{{$website->url}}/{{$website->header->nama_menu5}}/{{$postingans->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- TENTANG ARTIKEL END -->

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