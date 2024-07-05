    <!-- Carousel Section OR SLIDER -->
    <div id="indicators-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative w-full h-fit rounded-lg md:h-96 py-[480px]">
            <!-- Item 1 -->
            @forelse ($website->slider as $item)
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="{{ asset($item->image) }}" class="absolute block w-6/12 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            @empty
            <div class="">Kosong</div>
            @endforelse
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-20 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full bg-gray-500 hover:bg-blue-500" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-500 hover:bg-blue-500" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-500 hover:bg-blue-500" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-500 hover:bg-blue-500" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-500 hover:bg-blue-500" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>

        <!-- slider content -->
        @forelse ($website->slider as $item)
        <div class="absolute z-30 -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-0 left-1/2 flex flex-col items-center justify-center w-full h-full text-center py-6">
            <div class="w-fit p-6 backdrop-blur-md" style="background-color: rgba(0, 0, 0, 0.6);">
                <h1 class="text-6xl font-black leading-tight text-white sm:text-4xl">{{$item->title}}</h1>
                <p class="mt-4 text-2xl text-white">{{($item->description)}}</p>
            </div>
        </div>
        @empty
        <div class="">Kosong</div>
        @endforelse

        <!-- Slider controls -->
        <button type="button" class="absolute top-0 ml-fit start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-600 dark:bg-gray-800/30 group-hover:bg-blue-500 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 mr-fit end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-600 dark:bg-gray-800/30 group-hover:bg-blue-500 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <!-- End Carousel Section -->