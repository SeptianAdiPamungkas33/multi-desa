<!-- Carousel Section OR SLIDER -->
<div id="indicators-carousel" class="relative w-full bg-red-500" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative w-full rounded-lg object-cover md:min-h-[550px] overflow-hidden">
        @foreach ($website->slider as $index => $item)
        <a href="{{$item->link}}" target="_blank" class="carousel-item duration-700 ease-in-out w-full " data-carousel-item>
            <!-- <a href="/{{$website->url}}/{{$item->link}}"> -->
            <img src="{{ asset($item->image) }}" class=" absolute block object-contain w-full overflow-hidden -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $item->title }}">
            <div class="absolute w-full text-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                <h1 class="text-3xl font-black leading-tight text-white lg:text-6xl">{{ $item->title }}</h1>
                <p class="mt-4 text-sm lg:text-xl text-white">{{ $item->description }}</p>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-20 left-1/2">
        @foreach ($website->slider as $index => $item)
        <button type="button" class="w-3 h-3 rounded-full bg-gray-500 hover:bg-blue-500" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>

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