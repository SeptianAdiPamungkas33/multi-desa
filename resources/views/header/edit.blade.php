@extends ('layouts.dashboard')

@section ('container')
<div class="p-4 mt-16 sm:ml-64">
    <p class="text-3xl font-bold text-blue-600 uppercase mb-4">Halaman Edit Template Header</p>
    <form action="/website/header/{{$header->id}}" method="post" class="max-w-full">
        @csrf
        @method('put')
        <div x-data="{ navbarColor: '{{ $header->navbar_color }}' }" class="container flex items-center justify-center max-w-full h-full py-6 sm:justify-between">
            <div :class="navbarColor" class="container flex items-center justify-center max-w-full h-full px-8 sm:justify-between xl:px-4">
                <a href="#" class="relative flex items-center w-full h-full font-black leading-none">
                    <img src="{{ url('img/Logo_Dinas_Kra.png') }}" alt="Logo Diskominfo Karanganyar" class="w-8">
                    <span class="ml-3 text-xl text-gray-800">{{$header->title}}</span>
                </a>
                <nav id="nav" class="absolute top-0 w-full left-0 z-50 flex flex-col items-center justify-between h-64 pt-5 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 md:w-full md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:flex md:relative">
                    <a href="/beranda/{{$website->url}}" name="nama_menu1" class="ml-0 mr-0 font-bold duration-100 md:ml-12 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu1}}</a>
                    <a href="/tentang-kami/{{$website->url}}" name="nama_menu2" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu2}}</a>
                    <a href="/layanan/{{$website->url}}" name="nama_menu3" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu3}}</a>
                    <a href="/artikel/{{$website->url}}" name="nama_menu4" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu4}}</a>
                    <a href="/galeri/{{$website->url}}" name="nama_menu5" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu5}}</a>
                    <a href="/potensi/{{$website->url}}" name="nama_menu6" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">{{$website->header->nama_menu6}}</a>
                </nav>
                <div class="mx-4 my-4">
                    <select x-model="navbarColor" name="navbar_color" class="p-2 border border-gray-300 rounded">
                        <option value="bg-gradient-to-br from-blue-800 to-blue-400" :selected="navbarColor === 'bg-gradient-to-br from-blue-800 to-blue-400'">Blue</option>
                        <option value="bg-gradient-to-br from-red-800 to-red-400" :selected="navbarColor === 'bg-gradient-to-br from-red-800 to-red-400'">Red</option>
                        <option value="bg-gradient-to-br from-green-800 to-green-400" :selected="navbarColor === 'bg-gradient-to-br from-green-800 to-green-400'">Green</option>
                        <option value="bg-gradient-to-br from-yellow-800 to-yellow-400" :selected="navbarColor === 'bg-gradient-to-br from-yellow-800 to-yellow-400'">Yellow</option>
                        <option value="bg-gradient-to-br from-purple-800 to-purple-400" :selected="navbarColor === 'bg-gradient-to-br from-purple-800 to-purple-400'">Purple</option>
                        <option value="bg-gradient-to-br from-blue-600 to-red-400" :selected="navbarColor === 'bg-gradient-to-br from-blue-600 to-blue-400'">Blue Red</option>
                        <option value="bg-gradient-to-br from-red-600 to-orange-400" :selected="navbarColor === 'bg-gradient-to-br from-red-600 to-orange-400'">Red Orange</option>
                        <option value="bg-gradient-to-br from-green-600 to-blue-400" :selected="navbarColor === 'bg-gradient-to-br from-green-600 to-blue-400'">Green blue</option>
                        <option value="bg-gradient-to-br from-gray-600 to-gray-400" :selected="navbarColor === 'bg-gradient-to-br from-gray-600 to-gray-400'">Gray</option>
                        <option value="bg-gradient-to-br from-blue-600 to-purple-400" :selected="navbarColor === 'bg-gradient-to-br from-blue-600 to-purple-400'">Purple Blue</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="max-w-xl">
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Website</label>
                <input type="text" id="title" name="title" value="{{$header->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="nama_menu1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu 1</label>
                <input type="text" id="nama_menu1" name="nama_menu1" value="{{$header->nama_menu1}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="nama_menu2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu 2</label>
                <input type="text" id="nama_menu2" name="nama_menu2" value="{{$header->nama_menu2}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="nama_menu3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu 3</label>
                <input type="text" id="nama_menu3" name="nama_menu3" value="{{$header->nama_menu3}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="nama_menu4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu 4</label>
                <input type="text" id="nama_menu4" name="nama_menu4" value="{{$header->nama_menu4}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="nama_menu5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu 5</label>
                <input type="text" id="nama_menu5" name="nama_menu5" value="{{$header->nama_menu5}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <!-- <div class="mb-5">
                <label for="nama_menu6" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu 6</label>
                <input type="text" id="nama_menu6" name="nama_menu6" value="{{$header->nama_menu6}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div> -->
        </div>
        <div class="flex items-center gap-x-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <div class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="javascript:history.back()">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection