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

    <!-- Pricing GALERI Section -->
    <div class="relative px-8 py-10 bg-white border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
        <div id="pricing" class="container flex flex-col items-center h-full max-w-6xl mx-auto">
            <h3 class="w-full px-6 mt-2 text-2xl font-black text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl md:px-0">{{$website->header->nama_menu4}}</h3>
            <div class="container w-full mx-auto px-5 py-2 lg:px-16 lg:pt-8">
                <div class="w-full flex flex-wrap md:-m-2">
                    @foreach($website->galeris->where('status', 'aktif') as $item)
                    <div class="flex w-1/2 flex-wrap lg:w-1/4">
                        <div class="w-full p-1 md:p-2">
                            <a href="/{{$website->url}}/{{$website->header->nama_menu4}}/{{$item->id}}">
                                <p>{{$item->judul_galeri}}</p>
                                <div class="w-full">
                                    @if ($item->media->count() == 1)
                                    @foreach ($item->media as $media)
                                    @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->file_path))
                                    <img src="{{ asset($media->file_path) }}" class="w-full h-40 object-cover object-center">
                                    @elseif (preg_match('/\.mp4$/i', $media->file_path))
                                    <div class="">
                                        <video controls class="w-full h-40 object-cover object-center">
                                            <source src="{{ asset($media->file_path) }}" type="video/mp4" class="px-4 py-32">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    @else
                                    <div class="px-4 py-3">
                                        <span class="text-gray-500">No media available</span>
                                    </div>
                                    @endif
                                    @endforeach
                                    @elseif ($item->media->count() > 1)
                                    <div class="splide" id="splide{{$item->id}}">
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                @foreach ($item->media as $media)
                                                <li class="splide__slide">
                                                    @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $media->file_path))
                                                    <img src="{{ asset($media->file_path) }}" class="w-full h-40 object-cover">
                                                    @elseif (preg_match('/\.mp4$/i', $media->file_path))
                                                    <video controls class="w-full h-40 object-cover">
                                                        <source src="{{ asset($media->file_path) }}" type="video/mp4" class="px-4 py-3">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            new Splide('#splide{{$item->id}}', {
                                                type: 'loop',
                                                perPage: 1,
                                                autoplay: true,
                                            }).mount();
                                        });
                                    </script>
                                    @else
                                    <span class="text-gray-500">No media available</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing GALERI Section -->

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