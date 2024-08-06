<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Admin Desa Anda</title>
</head>

<body>
    <div>
        <p>Nama Pengguna: {{ $data['username'] ?? 'Tidak tersedia' }}</p>
        <p>Kata Sandi: {{ $data['password'] ?? 'Tidak tersedia' }}</p>
    </div>
</body>

</html>