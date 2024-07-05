<footer x-data="{ navbarColor: '{{ $footer->navbar_color }}' }" class="px-4 pt-12 pb-8 text-black font-semibold border-t border-gray-200">
    <div :class="navbarColor" class="px-4 pt-12 pb-8 border-t border-gray-200">
        <div class="container flex flex-col justify-between max-w-6xl px-4 mx-auto overflow-hidden lg:flex-row">
            <div class="w-full min-w-[400px] pl-12 mr-4 text-left lg:w-1/4 sm:text-center sm:pl-0 lg:text-left">
                <a href="/" class="flex justify-start text-left py-2 sm:text-center lg:text-left sm:justify-center lg:justify-start">
                    <span class="flex items-start sm:items-center">
                        <svg class="w-auto h-6 text-gray-800 fill-current" viewBox="0 0 194 116" xmlns="http://www.w3.org/2000/svg">
                            <g fill-rule="evenodd">
                                <path d="M96.869 0L30 116h104l-9.88-17.134H59.64l47.109-81.736zM0 116h19.831L77 17.135 67.088 0z">
                                </path>
                                <path d="M87 68.732l9.926 17.143 29.893-51.59L174.15 116H194L126.817 0z"></path>
                            </g>
                        </svg>
                    </span>
                </a>
                <div class="flex items-center w-full py-2 mr-4 text-base text-black-500 font-bold">
                    <p class="min-w-[100px]">Alamat</p>
                    <p class="px-2">:</p>
                    <p> {{$footer->alamat}}</p>
                </div>
                <div class="flex items-center w-full py-2 mr-4 text-base text-black-500 font-bold">
                    <p class="min-w-[100px]">Email</p>
                    <p class="px-2">:</p>
                    <p> {{$footer->email}}</p>
                </div>
                <div class="flex items-center w-full py-2 mr-4 text-base text-black-500 font-bold">
                    <p class="min-w-[100px]">No. Telepon</p>
                    <p class="px-2">:</p>
                    <p> {{$footer->no_telepon}}</p>
                </div>
                <div class="flex items-center w-full py-2 mr-4 text-base text-black-500 font-bold">
                    <p class="min-w-[100px]">Sosmed</p>
                    <p class="px-2">:</p>
                    <p> {{$footer->sosmed}}</p>
                </div>
            </div>
            <div class="block w-full pl-10 py-2 text-sm lg:w-3/4 sm:flex lg:mt-0">
                <ul class="flex flex-col w-full p-0 font-medium text-left text-black list-none">
                    <li class="inline-block px-3 py-2 mt-5 font-bold tracking-wide text-gray-800 uppercase md:mt-0">Jadwal</li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->jadwal1}}</a></li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->jadwal2}}</a></li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->jadwal3}}</a></li>
                </ul>
                <ul class="flex flex-col w-full p-0 font-medium text-left text-black list-none">
                    <li class="inline-block px-3 py-2 mt-5 font-bold tracking-wide text-gray-800 uppercase md:mt-0">Link Terkait</li>
                    <li><a href="{{ $footer->link_url1 }}" target="_blank" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->link_terkait1}}</a></li>
                    <li><a href="{{ $footer->link_url2 }}" target="_blank" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->link_terkait2}}</a></li>
                    <li><a href="{{ $footer->link_url3 }}" target="_blank" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->link_terkait3}}</a></li>
                </ul>
            </div>
        </div>
        <div class="pt-4 mt-10 text-center text-black border-t border-gray-100">© 2024 Landmark. All rights reserved.</div>
        <div class="pt-2 mt-2 text-center text-black border-t border-gray-100">
            Distributed By
            <a href="https://diskominfo.karanganyarkab.go.id/" target="_blank">
                Kominfo Karanganyar
            </a>
        </div>
    </div>
</footer>

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