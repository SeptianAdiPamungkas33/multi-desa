@extends ('layouts.dashboard')

@section('container')
<div class="p-4 mt-16 sm:ml-64">
    <p class="text-3xl font-bold text-blue-600 uppercase">Halaman Tambah Admin</p>
    <form action="/admin-desa" method="post" class="max-w-xl">
        @csrf
        @method('post')
        <div class="mb-5">
            <x-label for="nama">Username</x-label>
            <input type="text" id="nama" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <x-label for="urllink">Url</x-label>
            <input type="text" id="urllink" name="urllink" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <x-label for="email">Email</x-label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="flex w-full mb-4" x-data="{ show: true }">
            <div class="relative w-full">
                <x-label for="password">Password</x-label>
                <input type="password" id="password" name="password" :type="show ? 'password' : 'text'" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5 mt-7">
                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show" :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                        <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                    </svg>

                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show" :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                        <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="mb-5">
            <x-label for="nomor_telepon" :required="false">Nomor Telepon</x-label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        {{-- <div class="mb-5">
                <x-label for="desa_id">Desa</x-label>
                <select id="desa_id" name="desa_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    @foreach ($desa as $item)
                        <option value="{{ $item->id }}" {{ in_array($item->id, $assignedDesaIds) ? 'disabled' : '' }}>
        {{ $item->nama }} {{ in_array($item->id, $assignedDesaIds) ? '(Sudah memiliki admin)' : '' }}
        </option>
        @endforeach
        </select>
</div> --}}
<div class="mb-5">
    <x-label for="kecamatan_id">Kecamatan</x-label>
    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="kecamatan_id" id="kecamatan_id">
        <option>Pilih</option>
    </select>
</div>
<div class="mb-5">
    <x-label for="desa_id">Desa</x-label>
    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="desa_id" id="desa_id">
        <option>Pilih</option>
    </select>
    <input type="hidden" name="nama_desa" id="nama_desa">
</div>
<div class="flex items-center gap-x-4">
    <button type="submit" class="w-full px-5 py-4 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-800 dark:focus:ring-blue-800">Submit</button>
    <div class="w-full px-5 py-4 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 sm:w-auto dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
        <a href="javascript:history.back()">Back</a>
    </div>
</div>
</form>
</div>

<script>
    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/3313.json`)
        .then(response => response.json())
        .then(districts => {
            // var data = districts;
            var selectKecamatan = '<option>Pilih</option>';
            districts.forEach(element => {
                selectKecamatan +=
                    `<option data-vill="${element.id}" value="${element.id}">${element.name}</option>`;
            });
            document.getElementById('kecamatan_id').innerHTML = selectKecamatan;
        });
</script>

<script>
    document.getElementById('kecamatan_id').addEventListener('change', (e) => {
        var kecamatan_id = e.target.value;
        // console.log(kecamatan_id);
        fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatan_id}.json`)
            .then(response => response.json())
            .then(villages => {
                console.log(villages);
                var selectDesa = '<option>Pilih</option>';
                villages.forEach(element => {
                    selectDesa +=
                        `<option value="${element.id}">${element.name}</option>`;
                });
                document.getElementById('desa_id').innerHTML = selectDesa;
            });
    });

    document.getElementById('desa_id').addEventListener('change', (e) => {
        var desa_name = e.target.options[e.target.selectedIndex].text;
        document.getElementById('nama_desa').value = desa_name;

        console.log(document.getElementById('nama_desa').value);
    });
</script>
@endsection