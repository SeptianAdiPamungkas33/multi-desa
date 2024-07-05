@extends ('layouts.dashboard')

@section ('container')
<div class="p-4 mt-16 sm:ml-64">
    <div class="relative px-2 py-2 bg-white border-t border-gray-200 md:py-16 lg:py-4 xl:py-4 xl:px-0">
        <h3 class="w-full px-6 mt-2 text-xl font-black text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl md:px-0">Halaman Utama</h3>
        <div class="w-full flex justify-center items-center p-4 mx-auto mb-0 sm:mb-16 lg:mb-0 lg:w-1/3">
            @can('superadmin')
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
                <h4 class="relative mt-6 text-xl w-fit text-center font-bold">Desa</h4>
                </p>
                <a href="/desa" class=" relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
            </div>
            @endcan
            @can('superadmin')
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
                <h4 class="relative mt-6 text-xl w-fit text-center font-bold">Admin Desa</h4>
                </p>
                <a href="/admin-desa" class=" relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
            </div>
            @endcan
            @can('admin')
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
                <h4 class="relative mt-6 text-xl w-fit text-center font-bold">Penulis</h4>
                </p>
                <a href="/editor-penulis" class=" relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
            </div>
            @endcan
            @can('admin')
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
                <h4 class="relative mt-6 text-xl w-fit text-center font-bold">Website</h4>
                </p>
                <a href="/website" class=" relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
            </div>
            @endcan
            @can('penulis')
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
                <h4 class="relative mt-6 text-xl w-fit text-center font-bold">Galeri</h4>
                </p>
                <a href="/galeri" class=" relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
            </div>
            @endcan
            @can('penulis')
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
                <h4 class="relative mt-6 text-xl w-fit text-center font-bold">Kategori</h4>
                </p>
                <a href="/katgori" class=" relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
            </div>
            @endcan
            @can('penulis')
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
                <h4 class="relative mt-6 text-xl w-fit text-center font-bold">Artikel</h4>
                </p>
                <a href="/postingan" class=" relative flex mt-2 text-sm font-medium text-indigo-500 underline">Selengkapnya</a>
            </div>
            @endcan
        </div>
    </div>
    <!-- End Pricing GALERI Section -->
</div>
@endsection