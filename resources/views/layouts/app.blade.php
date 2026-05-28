<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiObat</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/obatsampah.css') }}">
    <link rel="stylesheet" href="{{ asset('css/input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/relokasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/obat.css') }}">
</head>
<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">

            <div class="brand-text">
                <h2>SiOBAT</h2>
                <p>Sistem Informasi Manajemen Obatt</p>
            </div>
        </a>

        <div class="divider-side"></div>

        <ul class="side-menu">

            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="material-icons-round">home</i>
                    Beranda
                </a>
            </li>

            <li class="{{ request()->routeIs('input.index') ? 'active' : '' }}">
                <a href="{{ route('input.index') }}">
                    <i class="material-icons-round">edit</i>
                    Input Data
                </a>
            </li>

            <li class="{{ request()->routeIs('persediaan') ? 'active' : '' }}">
                <a href="#">
                    <i class="material-icons-round">bar_chart</i>
                    Persediaan Obat
                </a>
            </li>

            <li class="{{ request()->routeIs('obat.index') ? 'active' : '' }}">
                <a href="{{ route('obat.index') }}">
                    <i class="material-icons-round">medication</i>
                    Data Obat
                </a>
            </li>

            <li class="{{ request()->routeIs('laporan') ? 'active' : '' }}">
                <a href="#">
                    <i class="material-icons-round">text_snippet</i>
                    Laporan
                </a>
            </li>

        </ul>
    </section>

    <section id="content">

        <!-- NAVBAR -->
        <nav class="topbar">

            <div class="left">
                <h2>input</h2>
            </div>

            <div class="right">

                <form action="#">
                    <div class="search-container">

                        <span class="material-icons-round search-icon">
                            search
                        </span>

                        <input type="text" placeholder="Ketik nama obat disini...">

                    </div>
                </form>

                <a href="#" class="nav-link">

                    <i class="material-icons-round">
                        notifications
                    </i>

                    <span class="badge">5</span>

                </a>

                <span class="divider"></span>

                <!-- PROFILE -->
                <div class="profile">

                    <div class="profile-info">

                        <img src="{{ asset('img/fotoprofil.jpg') }}" alt="User">

                        <div class="user-text">
                            <h4>Runi</h4>
                            <p>Apoteker</p>
                        </div>

                    </div>

                    <ul class="profile-link">

                        <li>
                            <a href="#">
                                <i class="material-icons-round">person</i>
                                Profile
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="material-icons-round">settings</i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <form action="/logout" method="POST">
                                @csrf

                                <button type="submit" class="logout-btn">
                                    <i class="material-icons-round">logout</i>
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>

                </div>
                <!-- PROFILE -->

            </div>

        </nav>
        <!-- NAVBAR -->

        
    <!-- CONTENT -->
    <main class="flex-1 p-6">

        @yield('content')

    </main>

    <script>
        const profile = document.querySelector('.profile-info');
        const profileLink = document.querySelector('.profile-link');

        profile.addEventListener('click', () => {
            profileLink.classList.toggle('show');
        });
    </script>

</div>

</body>
</html>