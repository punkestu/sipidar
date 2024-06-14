<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body class="bg-gray-100">
    @include('components.header')
    <main class="border p-4 m-4 bg-white rounded-md">
        <div class="w-full relative flex items-center justify-center bg-gray-100">
            <img class="w-full opacity-50 blur-md" src="/welcome-bg.jpg" alt="welcome">
            <div class="absolute text-white flex flex-col items-center gap-2 drop-shadow-lg">
                <img src="/Logo.svg" alt="Logo">
                <p class="font-medium text-lg text-center">Sistem Informasi Peminjaman Kendaraan</p>
                <a href="/login" class="font-semibold bg-[#2602FF] text-white px-4 py-2 rounded-md">Mulai Aplikasi &raquo;</a>
            </div>
        </div>
    </main>
</body>

</html>
