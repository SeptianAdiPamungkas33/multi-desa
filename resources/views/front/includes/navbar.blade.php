<!-- Header Section -->
<div class="relative z-50 w-full h-24">
    <div x-data="{ navbarColor: '{{ $header->navbar_color }}' }" class="container flex items-center justify-center max-w-full h-full sm:justify-between">
        <div :class="navbarColor" class="container flex items-center justify-center max-w-full h-full px-8 sm:justify-between xl:px-4">
            <a href="#" class="relative flex items-center w-full h-full font-black leading-none">
                <img src="{{ url('img/Logo_Dinas_Kra.png') }}" alt="Logo Diskominfo Karanganyar" class="w-8">
                <span class="ml-3 text-xl text-gray-800">{{$header->title}}</span>
            </a>
            <nav id="nav" class="absolute top-0 w-full left-0 z-50 flex flex-col items-center justify-between h-64 pt-5 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 md:w-full md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:flex md:relative">
                <!-- <a href="/{{$website->url}}/beranda" name="nama_menu1" class="ml-0 mr-0 font-bold duration-100 md:ml-12 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu1}}</a>
                <a href="/{{$website->url}}/tentang-kami" name="nama_menu2" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu2}}</a>
                <a href="/{{$website->url}}/layanan" name="nama_menu3" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu3}}</a>
                <a href="/{{$website->url}}/artikel" name="nama_menu4" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu4}}</a>
                <a href="/{{$website->url}}/galeri" name="nama_menu5" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu5}}</a> -->
                <!-- <a href="/{{$website->url}}/potensi" name="nama_menu6" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu6}}</a> -->

                <a href="/{{$website->url}}/{{$website->header->nama_menu1}}" name="nama_menu1" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu1}}</a>
                <a href="/{{$website->url}}/{{$website->header->nama_menu2}}" name="nama_menu2" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu2}}</a>
                <a href="/{{$website->url}}/{{$website->header->nama_menu3}}" name="nama_menu3" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu3}}</a>
                <a href="/{{$website->url}}/{{$website->header->nama_menu4}}" name="nama_menu4" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu4}}</a>
                <a href="/{{$website->url}}/{{$website->header->nama_menu5}}" name="nama_menu5" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu5}}</a>
                <a href="/{{$website->url}}/{{$website->header->nama_menu6}}" name="nama_menu6" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu6}}</a>


            </nav>
        </div>
    </div>
</div>
<!-- End Header Section-->