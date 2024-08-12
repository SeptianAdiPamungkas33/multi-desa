@extends('layouts.dashboard')

@section('container')
<div class="m-0 w-full font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-5/12">
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                                <div class="flex items-center justify-center w-full py-2">
                                    <img src="{{ url('img/Logo_Dinas_Kra.png') }}" alt="">
                                </div>
                                <div class="p-6 pb-0 mb-0">
                                    <h4 class="font-bold">Masuk atau Sign In</h4>
                                    <p class="mb-0">Masukkan username dan password untuk masuk</p>
                                    <p class="mb-0"> Enter your username and password to sign in</p>
                                </div>
                                <div class="flex-auto p-6">

                                    <!-- @if (Session::has('error'))
                                    <div class="mb-4 w-full p-3 bg-red-500 text-white rounded-lg">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif -->

                                    @if ($errors->any())
                                    <div class="mb-4 w-full p-3 bg-red-500 text-white rounded-lg">
                                        @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                    @endif

                                    <form action="{{ route('prosesLogin') }}" method="post">
                                        @csrf
                                        <div class="mb-4">
                                            <x-label for="username">Username</x-label>
                                            <input type="text" name="username" placeholder="username" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 
                                            dark:text-white/80 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid 
                                            border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 
                                            focus:border-fuchsia-300 focus:outline-none @error('username') is-invalid @enderror" value="{{ old('username') }}" />
                                        </div>
                                        <div class="mb-4 w-full flex" x-data="{ show: true }">
                                            <div class="relative w-full">
                                                <x-label for="password">Password</x-label>
                                                <input :type="show ? 'password' : 'text'" name="password" placeholder="password" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80  dark:text-white/80 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none 
                                                @error('password') is-invalid @enderror" value="{{ old('password') }}" />
                                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 mt-8">
                                                    <svg class="h-6 text-gray-700 cursor-pointer" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                        <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                        </path>
                                                    </svg>

                                                    <svg class="h-6 text-gray-700 cursor-pointer" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                                        <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="">Ketentuan password</div>
                                            <div class="">
                                                <ul class="list-disc list-inside">
                                                    <li>Minimal 8 karakter</li>
                                                    <li>Harus mengandung huruf besar</li>
                                                    <li>Harus mengandung huruf kecil</li>
                                                    <li>Harus mengandung angka</li>
                                                    <li>Harus mengandung karakter khusus</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500">Masuk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex lg:items-center lg:justify-center">
                            <div class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden rounded-xl">
                                <!-- <p style="background-image: url('img/Logo_Dinas_Kra.png'); width: 500px; height: 625px;"></p> -->
                                <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-br from-blue-800 to-blue-300 opacity-80"></span>
                                <h4 class="z-20 mt-12 font-bold text-black">Website Desa Kabupaten Karanganyar</h4>
                                <p class="z-20 text-black ">Dinas Komunikasi dan Informatika Kabupaten Karanganyar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection