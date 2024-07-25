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

    <!-- judul -->
    <!-- <div class="">
        <div class="container flex items-center justify-center h-fit max-w-6xl px-8 mx-auto">
            <div class="flex flex-col items-center justify-center w-full h-full text-center py-6">
                <h1 class="text-4xl font-black leading-tight text-gray-900 sm:text-4xl">Selamat Datang di Website {{$header->title}} Kabupaten Karanganyar</h1>
                <p class="mt-4 text-lg text-gray-600">Website ini merupakan website resmi yang dikelola oleh Dinas Komunikasi dan Informatika Kabupaten Karanganyar</p>
            </div>
        </div>
    </div> -->
    <!-- end of judul -->

    <!-- Carousel Section OR SLIDER -->
    @include('front.includes.slider')
    <!-- End Carousel Section -->


    <!-- BEGIN TENTANG KAMI SECTION -->

    @php
    $imageUrl = $website->tentangkami->gambar ? url($website->tentangkami->gambar) : url('img/default.png');
    @endphp

    <div class="relative items-center justify-center w-full overflow-x-hidden py-4 lg:pt-40 lg:pb-40 xl:pt-40 xl:pb-64">
        <div class="container flex flex-col items-center justify-between h-full max-w-6xl px-8 mx-auto -mt-32 lg:flex-row xl:px-0">
            <div class="z-30 flex flex-col items-center w-full max-w-xl pt-48 text-center lg:items-start lg:w-1/2 lg:pt-20 xl:pt-40 lg:text-left">
                <h1 class="relative mb-4 text-3xl font-black leading-tight text-gray-900 sm:text-6xl xl:mb-8">{{ $website->tentangkami->judul }}</h1>
                <p class="pr-0 max-w-[400px] mb-8 text-base text-gray-600 sm:text-lg xl:text-md lg:pr-20">{!! \Illuminate\Support\Str::limit($website->tentangkami->deskripsi, 100, $end='...') !!}</p>
                <a href="/{{ $website->url }}/{{$website->header->nama_menu2}}" class="relative self-start inline-block w-auto px-8 py-4 mx-auto mt-0 text-base font-bold text-white bg-indigo-600 border-t border-gray-200 rounded-md shadow-xl sm:mt-1 fold-bold lg:mx-0">Lebih Lengkap...</a>
            </div>
            <div class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 ms:pl-10">
                <div class="container relative left-0 w-full lg:absolute">
                    <img src="{{ $imageUrl }}" class="w-full mt-20 mb-20 lg:mt-24 xl:mt-40 lg:mb-0 lg:h-full">
                </div>
            </div>
        </div>
    </div>

    <!-- TENTANG KAMI SECTION END -->

    <!-- BEGIN FEATURES LAYANAN SECTION -->
    <div id="features" class="relative w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
        <div class="container flex flex-col items-center justify-between h-full max-w-6xl mx-auto">
            <h3 class="max-w-2xl px-5 mt-2 text-3xl font-black leading-tight text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl">Layanan Kami</h3>
            <div class="flex flex-col w-full mt-0 lg:flex-row sm:mt-10 lg:mt-20">
                <div class="w-full max-w-md p-4 mx-auto py-12 mb-0 sm:mb-16 lg:mb-0 lg:w-1/3">
                    <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
                        <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 377 340" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path d="M342.8 3.7c24.7 14 18.1 75 22.1 124s18.6 85.8 8.7 114.2c-9.9 28.4-44.4 48.3-76.4 62.4-32 14.1-61.6 22.4-95.9 28.9-34.3 6.5-73.3 11.1-95.5-6.2-22.2-17.2-27.6-56.5-47.2-96C38.9 191.4 5 151.5.9 108.2-3.1 64.8 22.7 18 61.8 8.7c39.2-9.2 91.7 19 146 16.6 54.2-2.4 110.3-35.6 135-21.6z" />
                                </g>
                            </g>
                        </svg>
                        <!-- FEATURE Icon 1 -->
                        <svg class="relative w-20 h-20" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1TriangleIcon1">
                                    <stop stop-color="#9C09DB" offset="0%" />
                                    <stop stop-color="#1C0FD7" offset="100%" />
                                </linearGradient>
                                <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox" id="filter-3TriangleIcon1">
                                    <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                                    <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                                    <feColorMatrix values="0 0 0 0 0.141176471 0 0 0 0 0.031372549 0 0 0 0 0.501960784 0 0 0 0.15 0" in="shadowBlurOuter1" />
                                </filter>
                                <path d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z" id="path-2TriangleIcon1" />
                            </defs>
                            <g id="Page-1TriangleIcon1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Desktop-HDTriangleIcon1" transform="translate(-291 -1278)">
                                    <g id="FeaturesTriangleIcon1" transform="translate(170 915)">
                                        <g id="Group-9TriangleIcon1" transform="translate(0 365)">
                                            <g id="Group-8TriangleIcon1" transform="translate(125)">
                                                <g id="Rectangle-9TriangleIcon1">
                                                    <use fill="#000" filter="url(#filter-3TriangleIcon1)" xlink:href="#path-2TriangleIcon1" />
                                                    <use fill="url(#linearGradient-1TriangleIcon1)" xlink:href="#path-2TriangleIcon1" />
                                                </g>
                                                <g id="playTriangleIcon1" transform="translate(18 15)" fill="#FFF" fill-rule="nonzero">
                                                    <path d="M9.432 2.023l8.919 14.879a1.05 1.05 0 01-.384 1.452 1.097 1.097 0 01-.548.146H-.42A1.07 1.07 0 01-1.5 17.44c0-.19.052-.375.15-.538L7.567 2.023a1.092 1.092 0 011.864 0z" id="TriangleIcon1" transform="rotate(90 8.5 10)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <h4 class="relative mt-6 text-lg text-center font-bold">{{ $website->layanan->judul1 }}</h4>
                        <p class="relative mt-2 text-base text-center text-gray-600">{{ \Illuminate\Support\Str::limit($website->layanan->deskripsi1, 100, $end='...') }}</p>
                        </p>
                        <a href="/{{$website->url}}/layanan" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
                    </div>
                </div>

                <div class="w-full max-w-md p-4 mx-auto py-12 mb-0 sm:mb-16 lg:mb-0 lg:w-1/3">
                    <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
                        <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 358 372" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path d="M315.7 6.5c30.2 15.1 42.6 61.8 41.5 102.5-1.1 40.6-15.7 75.2-24.3 114.8-8.7 39.7-11.3 84.3-34.3 107.2-23 22.9-66.3 23.9-114.5 30.7-48.2 6.7-101.3 19.1-123.2-4.1-21.8-23.2-12.5-82.1-21.6-130.2C30.2 179.3 2.6 141.9.7 102c-2-39.9 21.7-82.2 57.4-95.6 35.7-13.5 83.3 2.1 131.2 1.7 47.9-.4 96.1-16.8 126.4-1.6z" />
                                </g>
                            </g>
                        </svg>
                        <svg class="relative w-20 h-20" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1Icon2">
                                    <stop stop-color="#F2C314" offset="0%" />
                                    <stop stop-color="#FC3832" offset="100%" />
                                </linearGradient>
                                <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox" id="filter-3Icon2">
                                    <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                                    <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                                    <feColorMatrix values="0 0 0 0 0.501960784 0 0 0 0 0.125490196 0 0 0 0 0 0 0 0 0.15 0" in="shadowBlurOuter1" />
                                </filter>
                                <path d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z" id="path-2Icon2" />
                            </defs>
                            <g id="Page-1Icon2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Desktop-HDIcon2" transform="translate(-691 -1278)">
                                    <g id="FeaturesIcon2" transform="translate(170 915)">
                                        <g id="Group-9-CopyIcon2" transform="translate(400 365)">
                                            <g id="Group-8Icon2" transform="translate(125)">
                                                <g id="Rectangle-9Icon2">
                                                    <use fill="#000" filter="url(#filter-3Icon2)" xlink:href="#path-2Icon2" />
                                                    <use fill="url(#linearGradient-1Icon2)" xlink:href="#path-2Icon2" />
                                                </g>
                                                <g id="machine-learningIcon2" transform="translate(14 12)" fill="#FFF" fill-rule="nonzero">
                                                    <path d="M10.554 21.418v-2.68c-1.1-.204-1.932-1.143-1.932-2.271 0-.468.143-.903.388-1.267l-2.32-1.662L4.367 15.2a2.254 2.254 0 01-.005 2.541l5.28 4.05c.268-.182.577-.311.911-.373zm.892 0c.334.062.643.191.912.373l5.28-4.05a2.254 2.254 0 01-.006-2.54l-2.321-1.663L12.99 15.2c.245.364.388.8.388 1.267 0 1.128-.832 2.067-1.932 2.27v2.681zm1.538.997c.25.365.394.803.394 1.274C13.378 24.965 12.314 26 11 26s-2.378-1.035-2.378-2.311c0-.471.145-.91.394-1.274l-5.28-4.05c-.385.26-.853.413-1.358.413C1.065 18.778 0 17.743 0 16.467c0-1.129.832-2.068 1.932-2.27v-2.393C.832 11.6 0 10.662 0 9.534c0-1.277 1.065-2.312 2.378-2.312.505 0 .973.153 1.358.414l5.28-4.05a2.254 2.254 0 01-.394-1.275C8.622 1.035 9.686 0 11 0s2.378 1.035 2.378 2.311c0 .471-.145.91-.394 1.274l5.28 4.05c.385-.26.853-.413 1.358-.413C20.935 7.222 22 8.257 22 9.533c0 1.129-.832 2.068-1.932 2.27v2.393c1.1.203 1.932 1.142 1.932 2.27 0 1.277-1.065 2.312-2.378 2.312-.505 0-.973-.153-1.358-.414l-5.28 4.05zm-9.243-7.843L5.937 13l-2.196-1.572c-.27.183-.58.314-.917.376v2.392c.336.062.647.193.917.376zm.627-3.772l2.321 1.662L9.01 10.8a2.254 2.254 0 01-.388-1.267c0-1.128.832-2.067 1.932-2.27V4.582a2.403 2.403 0 01-.912-.373l-5.28 4.05a2.254 2.254 0 01.006 2.54zm13.89 3.772c.27-.183.582-.314.918-.376v-2.392a2.403 2.403 0 01-.917-.376L16.063 13l2.196 1.572zm-.62-6.313l-5.28-4.05a2.403 2.403 0 01-.912.373v2.68c1.1.204 1.932 1.143 1.932 2.271 0 .468-.143.903-.388 1.267l2.32 1.662 2.322-1.662a2.254 2.254 0 01.005-2.541zm-8 6.313A2.415 2.415 0 0111 14.156c.507 0 .977.154 1.363.416L14.559 13l-2.196-1.572a2.415 2.415 0 01-1.363.416c-.507 0-.977-.154-1.363-.416L7.441 13l2.196 1.572zM11 10.978c.821 0 1.486-.647 1.486-1.445 0-.797-.665-1.444-1.486-1.444s-1.486.647-1.486 1.444c0 .798.665 1.445 1.486 1.445zm0 6.933c.821 0 1.486-.647 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.486.647-1.486 1.445c0 .797.665 1.444 1.486 1.444zm8.622-6.933c.82 0 1.486-.647 1.486-1.445 0-.797-.665-1.444-1.486-1.444s-1.487.647-1.487 1.444c0 .798.666 1.445 1.487 1.445zm0 6.933c.82 0 1.486-.647 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.487.647-1.487 1.445c0 .797.666 1.444 1.487 1.444zM2.378 10.978c.821 0 1.487-.647 1.487-1.445 0-.797-.666-1.444-1.487-1.444-.82 0-1.486.647-1.486 1.444 0 .798.665 1.445 1.486 1.445zm0 6.933c.821 0 1.487-.647 1.487-1.444 0-.798-.666-1.445-1.487-1.445-.82 0-1.486.647-1.486 1.445 0 .797.665 1.444 1.486 1.444zM11 25.133c.821 0 1.486-.646 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.486.647-1.486 1.445.665 1.444 1.486 1.444zm0-21.377c.821 0 1.486-.647 1.486-1.445S11.821.867 11 .867s-1.486.646-1.486 1.444c0 .798.665 1.445 1.486 1.445z" id="ShapeIcon2" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <!-- FEATURE Icon 2 -->
                        <h4 class="relative mt-6 text-lg text-center font-bold">{{ $website->layanan->judul2 }}</h4>
                        <p class="relative mt-2 text-base text-center text-gray-600">{{ \Illuminate\Support\Str::limit($website->layanan->deskripsi2, 100, $end='...') }}</p>
                        <a href="/{{$website->url}}/layanan" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
                    </div>
                </div>

                <div class="w-full max-w-md p-4 mx-auto py-12 mb-0 sm:mb-16 lg:mb-0 lg:w-1/3">
                    <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
                        <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 377 340" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path d="M342.8 3.7c24.7 14 18.1 75 22.1 124s18.6 85.8 8.7 114.2c-9.9 28.4-44.4 48.3-76.4 62.4-32 14.1-61.6 22.4-95.9 28.9-34.3 6.5-73.3 11.1-95.5-6.2-22.2-17.2-27.6-56.5-47.2-96C38.9 191.4 5 151.5.9 108.2-3.1 64.8 22.7 18 61.8 8.7c39.2-9.2 91.7 19 146 16.6 54.2-2.4 110.3-35.6 135-21.6z" />
                                </g>
                            </g>
                        </svg>
                        <!-- FEATURE Icon  -->
                        <svg class="relative w-20 h-20" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1TriangleIcon1">
                                    <stop stop-color="#9C09DB" offset="0%" />
                                    <stop stop-color="#1C0FD7" offset="100%" />
                                </linearGradient>
                                <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox" id="filter-3TriangleIcon1">
                                    <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                                    <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                                    <feColorMatrix values="0 0 0 0 0.141176471 0 0 0 0 0.031372549 0 0 0 0 0.501960784 0 0 0 0.15 0" in="shadowBlurOuter1" />
                                </filter>
                                <path d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z" id="path-2TriangleIcon1" />
                            </defs>
                            <g id="Page-1TriangleIcon1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Desktop-HDTriangleIcon1" transform="translate(-291 -1278)">
                                    <g id="FeaturesTriangleIcon1" transform="translate(170 915)">
                                        <g id="Group-9TriangleIcon1" transform="translate(0 365)">
                                            <g id="Group-8TriangleIcon1" transform="translate(125)">
                                                <g id="Rectangle-9TriangleIcon1">
                                                    <use fill="#000" filter="url(#filter-3TriangleIcon1)" xlink:href="#path-2TriangleIcon1" />
                                                    <use fill="url(#linearGradient-1TriangleIcon1)" xlink:href="#path-2TriangleIcon1" />
                                                </g>
                                                <g id="playTriangleIcon1" transform="translate(18 15)" fill="#FFF" fill-rule="nonzero">
                                                    <path d="M9.432 2.023l8.919 14.879a1.05 1.05 0 01-.384 1.452 1.097 1.097 0 01-.548.146H-.42A1.07 1.07 0 01-1.5 17.44c0-.19.052-.375.15-.538L7.567 2.023a1.092 1.092 0 011.864 0z" id="TriangleIcon1" transform="rotate(90 8.5 10)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <h4 class="relative mt-6 text-lg text-center font-bold">{{ $website->layanan->judul3 }}</h4>
                        <p class="relative mt-2 text-base text-center text-gray-600">{{ \Illuminate\Support\Str::limit($website->layanan->deskripsi3, 100, $end='...') }}</p>
                        <a href="/{{$website->url}}/layanan" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END FEATURES LAYANAN SECTION -->

    <!-- Pricing GALERI Section -->
    <div class="relative px-8 py-10 bg-white border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
        <div id="pricing" class="container flex flex-col items-center h-full max-w-6xl mx-auto">
            <h3 class="w-full px-6 mt-2 text-2xl font-black text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl md:px-0">Galeri</h3>
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

    <!-- Start ARTIKEL -->
    <div id="testimonials" class="flex items-center justify-center w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
        <div class="w-full flex flex-col items-center justify-center">
            <div class="flex flex-col items-center justify-center w-full h-full max-w-2xl pr-8 mx-auto text-center py-8">
                <h2 class="text-4xl font-extrabold text-center leading-10 tracking-tight text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">
                    Artikel
                </h2>
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
                    <!-- <td class="px-4 py-3 w-[200px]">{!! \Illuminate\Support\Str::limit($postingans->isi, 30, $end='...') !!}</td> -->


                    <a href="/{{$website->url}}/{{$website->header->nama_menu5}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End ARTIKEL-->

    @include('front.includes.footer')

    @include('front.includes.copyright')

    <!-- a little JS for the mobile nav button -->
    <script>
        // if (document.getElementById('nav-mobile-btn')) {
        //     document.getElementById('nav-mobile-btn').addEventListener('click', function() {
        //         if (this.classList.contains('close')) {
        //             document.getElementById('nav').classList.add('hidden');
        //             this.classList.remove('close');
        //         } else {
        //             document.getElementById('nav').classList.remove('hidden');
        //             this.classList.add('close');
        //         }
        //     });
        // }

        // const carouselElement = document.getElementById('carousel-example');

        // const items = [{
        //         position: 0,
        //         el: document.getElementById('carousel-item-1'),
        //     },
        //     {
        //         position: 1,
        //         el: document.getElementById('carousel-item-2'),
        //     },
        //     {
        //         position: 2,
        //         el: document.getElementById('carousel-item-3'),
        //     },
        //     {
        //         position: 3,
        //         el: document.getElementById('carousel-item-4'),
        //     },
        // ];

        // options with default values
        // const options = {
        //     defaultPosition: 1,
        //     interval: 3000,

        //     indicators: {
        //         activeClasses: 'bg-white dark:bg-gray-800',
        //         inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
        //         items: [{
        //                 position: 0,
        //                 el: document.getElementById('carousel-indicator-1'),
        //             },
        //             {
        //                 position: 1,
        //                 el: document.getElementById('carousel-indicator-2'),
        //             },
        //             {
        //                 position: 2,
        //                 el: document.getElementById('carousel-indicator-3'),
        //             },
        //             {
        //                 position: 3,
        //                 el: document.getElementById('carousel-indicator-4'),
        //             },
        //         ],
        //     },

        //     // callback functions
        //     onNext: () => {
        //         console.log('next slider item is shown');
        //     },
        //     onPrev: () => {
        //         console.log('previous slider item is shown');
        //     },
        //     onChange: () => {
        //         console.log('new slider item has been shown');
        //     },
        // };

        // instance options object
        // const instanceOptions = {
        //     id: 'carousel-example',
        //     override: true
        // };

        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('[data-carousel-item]');
            const indicators = document.querySelectorAll('[data-carousel-slide-to]');
            let currentIndex = 0;
            let intervalTime = 3000; // Set interval time in milliseconds

            // function showItem(index) {
            //     items.forEach((item, i) => {
            //         if (i === index) {
            //             item.classList.remove('hidden');
            //             item.classList.add('active');
            //         } else {
            //             item.classList.remove('active');
            //             item.classList.add('hidden');
            //         }
            //     });

            //     indicators.forEach((indicator, i) => {
            //         if (i === index) {
            //             indicator.setAttribute('aria-current', 'true');
            //             indicator.classList.add('bg-blue-500');
            //         } else {
            //             indicator.setAttribute('aria-current', 'false');
            //             indicator.classList.remove('bg-blue-500');
            //         }
            //     });
            // }

            document.querySelector('[data-carousel-prev]').addEventListener('click', function() {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : items.length - 1;
                showItem(currentIndex);
            });

            document.querySelector('[data-carousel-next]').addEventListener('click', function() {
                currentIndex = (currentIndex < items.length - 1) ? currentIndex + 1 : 0;
                showItem(currentIndex);
            });

            indicators.forEach((indicator, i) => {
                indicator.addEventListener('click', function() {
                    currentIndex = i;
                    showItem(currentIndex);
                });
            });

            // Auto slide
            setInterval(() => {
                currentIndex = (currentIndex < items.length - 1) ? currentIndex + 1 : 0;
                showItem(currentIndex);
            }, intervalTime); // Adjust the interval time as needed
        });
    </script>
</body>

</html>