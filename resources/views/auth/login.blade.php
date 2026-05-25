<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SiObat</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 via-cyan-50 to-emerald-100 flex items-center justify-center font-[Nunito]">

    <!-- CONTAINER -->
    <div class="w-full max-w-7xl px-6 grid lg:grid-cols-2 gap-10 items-center">

        <!-- Background Wave -->
        <svg viewBox="0 0 1440 320" class="absolute bottom-0 left-0 w-full z-0 drop-shadow-lg pointer-events-none">
            <path fill="#6FD3C7" fill-opacity="1"
                d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,144C672,139,768,181,864,197.3C960,213,1056,203,1152,176C1248,149,1344,107,1392,85.3L1440,64L1440,320L0,320Z">
            </path>
            <path fill="#0F9F8F" fill-opacity="0.9"
                d="M0,256L48,229.3C96,203,192,149,288,149.3C384,149,480,203,576,213.3C672,224,768,192,864,170.7C960,149,1056,139,1152,149.3C1248,160,1344,192,1392,208L1440,224L1440,320L0,320Z">
            </path>
        </svg>

        <!-- LEFT -->
        <div class="hidden lg:flex flex-col items-center justify-center text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo SiObat"
                        class="w-28 mx-auto drop-shadow-xl mb-6">
            <h1 class="text-3xl font-black text-black leading-none mb-1">
                    SiObat</h1>
            <h2 class="text-1xl text-black font-medium mb-4">
                    Sistem Informasi Manajemen Obat</h2>
            <p class="text-gray-800 text-sm leading-relaxed max-w-md">
                    Sistem terintegrasi untuk pengelolaan data obat,
                    persediaan, pemesanan, dan pelaporan secara
                    efisien dan akurat.
            </p>
        </div>

        <!-- LOGIN CARD -->
        <div class="relative z-10  -right-10 w-full max-w-md">
        <div class="floating-card bg-white rounded-2xl shadow-2xl p-8 sm:p-10 border border-gray-100">

        <!-- Avatar -->
                    <div class="flex justify-center mb-6">
                        <div class="w-28 h-28 rounded-full bg-indigo-900 flex items-center justify-center shadow-xl">

                            <!-- Icon User -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-14 h-14 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0" />
                            </svg>

                        </div>
                    </div>

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-blue-900 mb-2">Selamat Datang</h1>
                <p class="text-gray-500 text-sm">Silakan masuk untuk melanjutkan</p>
            </div>

            <!-- FORM LARAVEL -->
            <form method="POST" action="/login" class="space-y-5">
                @csrf

                <div>
                    <label for="nama_pengguna" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Pengguna</label>
                    <input type="text" name="nama_pengguna" id="nama_pengguna" placeholder="Masukkan nama pengguna"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Kata Sandi</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan kata sandi"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-900 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
                    Masuk
                </button>
            </form>

        </div>
        </div>

    </div>

</body>
</html>