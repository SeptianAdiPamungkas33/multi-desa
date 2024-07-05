@extends ('layouts.dashboard')

@section ('container')
<div class="p-4 mt-16 sm:ml-64">
    <p class="text-3xl font-bold text-blue-600 uppercase mb-4">Halaman Edit Template Footer</p>
    <form action="/website/footer/{{$footer->id}}" method="post" class="max-w-full">
        @csrf
        @method('put')
        <footer x-data="{ navbarColor: '{{ $footer->navbar_color }}' }" class="py-6 text-white font-semibold border-t border-gray-200">
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
                        <ul class="flex flex-col w-full p-0 font-medium text-left text-white list-none">
                            <li class="inline-block px-3 py-2 mt-5 font-bold tracking-wide text-gray-800 uppercase md:mt-0">Jadwal</li>
                            <li><a href="#_" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->jadwal1}}</a></li>
                            <li><a href="#_" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->jadwal2}}</a></li>
                            <li><a href="#_" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->jadwal3}}</a></li>
                        </ul>
                        <ul class="flex flex-col w-full p-0 font-medium text-left text-white list-none">
                            <li class="inline-block px-3 py-2 mt-5 font-bold tracking-wide text-gray-800 uppercase md:mt-0">Link Terkait</li>
                            <li><a href="{{ $footer->link_url1 }}" target="_blank" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->link_terkait1}}</a></li>
                            <li><a href="{{ $footer->link_url2 }}" target="_blank" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->link_terkait2}}</a></li>
                            <li><a href="{{ $footer->link_url3 }}" target="_blank" class="inline-block px-3 py-2 text-black-500 no-underline hover:text-gray-600">{{$footer->link_terkait3}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="pt-4 mt-10 text-center text-white border-t border-gray-100">© 2024 Landmark. All rights reserved.</div>
                <div class="pt-2 mt-2 text-center text-white border-t border-gray-100">
                    Distributed By
                    <a href="https://diskominfo.karanganyarkab.go.id/" target="_blank">
                        Kominfo Karanganyar
                    </a>
                </div>
                <div class="mx-4 my-4">
                    <select x-model="navbarColor" name="navbar_color" class="p-2 border bg-white text-black rounded overflow-y-auto">
                        <option value="bg-gradient-to-br from-blue-800 to-blue-400" :selected="navbarColor === 'bg-gradient-to-br from-blue-800 to-blue-400'">Blue</option>
                        <option value="bg-gradient-to-br from-red-800 to-red-400" :selected="navbarColor === 'bg-gradient-to-br from-red-800 to-red-400'">Red</option>
                        <option value="bg-gradient-to-br from-green-800 to-green-400" :selected="navbarColor === 'bg-gradient-to-br from-green-800 to-green-400'">Green</option>
                        <option value="bg-gradient-to-br from-yellow-800 to-yellow-400" :selected="navbarColor === 'bg-gradient-to-br from-yellow-800 to-yellow-400'">Yellow</option>
                        <option value="bg-gradient-to-br from-purple-800 to-purple-400" :selected="navbarColor === 'bg-gradient-to-br from-purple-800 to-purple-400'">Purple</option>
                        <option value="bg-gradient-to-br from-blue-600 to-red-400" :selected="navbarColor === 'bg-gradient-to-br from-blue-600 to-blue-400'">Blue Red</option>
                        <option value="bg-gradient-to-br from-red-600 to-orange-400" :selected="navbarColor === 'bg-gradient-to-br from-red-600 to-orange-400'">Red Orange</option>
                        <option value="bg-gradient-to-br from-green-600 to-blue-400" :selected="navbarColor === 'bg-gradient-to-br from-green-600 to-blue-400'">Green</option>
                        <option value="bg-gradient-to-br from-slate-600 to-gray-400" :selected="navbarColor === 'bg-gradient-to-br from-slate-600 to-gray-400'">Yellow</option>
                        <option value="bg-gradient-to-br from-blue-600 to-purple-300" :selected="navbarColor === 'bg-gradient-to-br from-blue-600 to-purple-300'">Purple</option>
                    </select>
                </div>
            </div>
        </footer>
        <div class="max-w-xl">
            <div class="mb-5">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{$footer->alamat}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="sosmed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sosmed</label>
                <input type="text" id="sosmed" name="sosmed" value="{{$footer->sosmed}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" id="email" name="email" value="{{$footer->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                <input type="number" id="no_telepon" name="no_telepon" value="{{$footer->no_telepon}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="jadwal1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal</label>
                <input type="text" id="jadwal1" name="jadwal1" value="{{$footer->jadwal1}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="jadwal2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal 2</label>
                <input type="text" id="jadwal2" name="jadwal2" value="{{$footer->jadwal2}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="jadwal3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal 3</label>
                <input type="text" id="jadwal3" name="jadwal3" value="{{$footer->jadwal3}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
        </div>
        <div class="w-full">
            <div class="mb-5 flex items-center w-full gap-x-4">
                <div class="w-full">
                    <label for="link_terkait1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">link terkait 1</label>
                    <input type="text" id="link_terkait1" name="link_terkait1" value="{{$footer->link_terkait1}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="w-full">
                    <label for="link_url1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan URL:</label>
                    <input type="url" id="link_url1" name="link_url1" value="{{$footer->link_url1}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="mb-5 flex items-center w-full gap-x-4">
                <div class="w-full">
                    <label for="link_terkait2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">link terkait 2</label>
                    <input type="text" id="link_terkait2" name="link_terkait2" value="{{$footer->link_terkait2}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="w-full">
                    <label for="link_url2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan URL:</label>
                    <input type="url" id="link_url2" name="link_url2" value="{{$footer->link_url2}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="mb-5 flex items-center w-full gap-x-4">
                <div class="w-full">
                    <label for="link_terkait3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">link terkait 3</label>
                    <input type="text" id="link_terkait3" name="link_terkait3" value="{{$footer->link_terkait3}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="w-full">
                    <label for="link_url3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan URL:</label>
                    <input type="url" id="link_url3" name="link_url3" value="{{$footer->link_url3}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
        </div>
        <div class="flex items-center gap-x-4 px-4 py-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <div class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="javascript:history.back()">Back</a>
            </div>
        </div>
    </form>
</div>
@endsections