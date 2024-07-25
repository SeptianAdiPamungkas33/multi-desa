<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .content {
            background-color: white;
            padding: 32px 48px;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .underline {
            text-decoration: underline;
        }

        .bold {
            font-weight: 600;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

</head>

<body class="w-full flex flex-col justify-center items-center">
    <div class="w-full flex py-4 gap-x-4">
        <div class="lg:w-full flex justify-end">
            <img src="{{ url('img/Logo_Dinas_Kra.png') }}" class="w-16 h-20 lg:w-24 lg:h-32" alt="logo">
        </div>
        <div style="width: 100%; text-align: center; margin-bottom: 12px" class="w-fit lg:w-fit text-md">
            <p class="bold uppercase text-sm lg:text-lg">pemerintah kabupaten karanganyar</p>
            <p class="bold uppercase text-md lg:text-xl">Permuda air minum tirto negoro</p>
            <p class="text-xs lg:text-xs text cnter">jalan Ronggowaristo No. 18 Sragen 57214 telepon:(0271) 891590 Fax. (0271)00000</p>
            <p class="text-xs lg:text-xs text cnter">www.ronggorwarsito mail:........... call cntre: ..........</p>
        </div>
        <div class=" lg:w-full flex justify-start">
            <img src="{{ url('img/Logo_Dinas_Kra.png') }}" class="w-16 h-20 lg:w-24 lg:h-32" alt="logo">
        </div>
    </div>
    <div class="flex justify-center items-center py-4 text-sm">
        <div class="flex w-full lg:flex justify-center lg:justify-between gap-x-6">
            <div class="w-full">
                <div class="flex text-md gap-1 w-full">
                    <p class="w-24">Nama</p>
                    <p class="w-4">:</p>
                    <p class="w-32">winarno</p>
                </div>
                <div class="flex text-md gap-1 w-full">
                    <p class="w-24">Alamat</p>
                    <p class="w-4">:</p>
                    <p class="w-32">jln wkwas</p>
                </div>
                <div class="flex text-md gap-1 w-full">
                    <p class="w-24">no req</p>
                    <p class="w-4">:</p>
                    <p class="w-32">0121212</p>
                </div>
                <div class="flex text-md gap-1 w-full">
                    <p class="w-24">no sumb</p>
                    <p class="w-4">:</p>
                    <p class="w-32">--</p>
                </div>
                <div class="flex text-md gap-1 w-full">
                    <p class="w-24">Tanggal</p>
                    <p class="w-4">:</p>
                    <p class="w-32">Desember 2023</p>
                </div>
                <div class="flex text-md gap-1 w-full">
                    <p class="w-24">no bulti</p>
                    <p class="w-4">:</p>
                    <p class="w-32">DFHNSIS 100</p>
                </div>
            </div>
            <div class="">
                <div class="flex text-md gap-1 w-full">
                    <p class="w-24">Tanggal bayar/lokt</p>
                    <p class="w-4">:</p>
                    <p class="w-32">21 mei 2024 / 0</p>
                </div>
                <div class="flex text-md gap-1 w-full">
                    <p class="w-24">Jam</p>
                    <p class="w-4">:</p>
                    <p class="w-32">17.65.12</p>
                </div>
                <div class="flex text-md gap-1">
                    <p class="w-24">KAsir</p>
                    <p class="w-4">:</p>
                    <p class="w-32">ss</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex text-md justify-center px-8 py-4 ml-[600px]">
        <div class="w-full flex-col justify-center items-center">
            <div class="flex">
                <div class="w-full flex flex-col justify-center py-4 text-md">
                    <p>Guna membayar</p>
                    <p>pendaftarab/registrasi sambunganbaru</p>
                </div>
            </div>
            <div class="flex">
                <div class="w-full flex flex-col justify-center py-4 text-md">
                    <p>sejumlah :</p>
                    <p class="h-40 flex items-center">Rp. 23.000</p>
                    <p>Dua puluh tiga ribu</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full py-4 text-lg flex justify-center">
        <div class="flex flex-col justify-center">
            <p>Guanakan air secukupnya untuk kehidupan yang akan datang</p>
            <p>wariskan mata air bukan air mata</p>
            <p>air sumber kehidupan maka pergunakan dengan binaksana</p>
            <p class="text-xl py-2 uppercase bold">#kwkitansi ini berlaku sebagai bukti sah#</p>
        </div>
    </div>
    </div>
</body>

</html>