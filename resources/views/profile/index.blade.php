@extends('layouts.dashboard')

@section('container')
    <div class="px-5 py-8 mt-[75px] lg:py-12 lg:px-8 sm:ml-64 text-white relative">
        <p class="text-2xl lg:text-4xl mb-2 font-semibold z-40">Selamat Datang</p>
        <p class="text-neutral-200">Multisite Desa Kabupaten Karanganyar</p>

        <div class="overflow-hidden bg-primary-600 -z-10 h-64 rounded-b-2xl absolute top-0 left-0 w-full">
            <div class="w-[2400px] h-[2400px] rounded-full bg-primary-500 absolute -left-96 -top-40"
                style="box-shadow: 24px 32px 184px 24px rgba(6, 8, 89, 0.75) inset;">
            </div>
            <div class="w-[1600px] h-[1600px] rounded-full bg-primary-500 absolute -left-48 top-8"
                style="box-shadow: 24px 32px 184px 24px rgba(6, 8, 89, 0.75) inset;">
            </div>
            <div class="w-[800px] h-[800px] rounded-full bg-primary-500 absolute left-48 top-40"
                style="box-shadow: 24px 32px 184px 24px rgba(6, 8, 89, 0.75) inset;">
            </div>
        </div>

        <div class="bg-white flex flex-col w-full p-4 mt-20 py-6 rounded-xl shadow-lg text-black relative">
            <img src="{{ url('img/user_default.png') }}" alt=""
                class="absolute -translate-y-3/4 left-8 w-28 h-28 rounded-full border border-neutral-300">
            <div class="mt-12 space-y-8 lg:mt-0 lg:pl-40 w-full flex-responsive pr-8 justify-between">
                <div>
                    <p class="text-2xl font-semibold mb-1">
                        Asep Mulyadi
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-4 w-full mt-6 gap-6 text-black">
            <div class="col-span-4 p-8 shadow-lg border border-neutral-200 bg-white rounded-xl">
                <h1 class="font-bold text-xl mb-2">Akun Saya</h1>
                <div class="flex w-full gap-4">
                    <div class="text-neutral-500">
                        <p class="text-base">Username</p>
                        <p class="text-base">Nama Lengkap</p>
                        <p class="text-base">No. Telepon</p>

                        @cannot('superadmin')
                            <p class="text-base">Instansi</p>
                        @endcannot
                    </div>
                    <div class="text-primary-500">
                        <p class="text-base">: Kominfo</p>
                        <p class="text-base">: Asep Mulyadi</p>
                        <p class="text-base">: Belum Ada</p>

                        @cannot('superadmin')
                            <p class="text-base">: </p>
                        @endcannot
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
