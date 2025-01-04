<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plantify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Menghilangkan gap di navbar */
        .navbar {
            padding-top: 0;
            padding-bottom: 0;
            margin: 0;
        }
        
        .container-fluid {
            padding-top: 0;
            padding-bottom: 0;
        }

        /* Menyesuaikan tinggi navbar dengan logo */
        .navbar-brand {
            padding: 0;
        }

        /* Menyesuaikan posisi item navbar */
        .navbar-nav .nav-item {
            display: flex;
            align-items: center;
        }

        .nav-link {
            padding: 1rem !important;
        }

        /* Gaya untuk navbar saat hover */
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            transition: color 0.3s ease;
        }

        /* Gaya untuk navbar saat halaman aktif */
        .nav-link.active {
            color: black;
            font-weight: bold;
            text-decoration: underline;
            text-decoration-color: white;
            text-decoration-thickness: 3px;
            text-underline-offset: 4px;
            transition: color 0.3s ease;
        }
    </style>
</head>

<body class="m-0">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light m-0">
    <!-- Container wrapper -->
    <div class="container-fluid" style="background-color:#76DD8D;">
        <!-- Toggle button -->
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">
                <img
                src="{{ asset('assets/logo.png') }}"
                height="60"
                alt="Plantify"
                loading="lazy"
                />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-0">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('home.show') ? 'active' : '' }}" style="font-weight: bold;" href="{{ route('home.show') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('about') ? 'active' : '' }}" style="font-weight: bold;" href="#">About us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white {{ request()->routeIs('product.*') ? 'active' : '' }}" href="#" id="navbarDropdown" style="font-weight: bold;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Our Product
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('product.buy') }}">Alat Pertanian</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.sewa') }}">Sewa Alat Pertanian</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.pupuk') }}">Pupuk</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('consultation.show') ? 'active' : '' }}" style="font-weight: bold;" href="{{ route('consultation.show') }}">Consultation</a>
                </li>
            </ul>
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="{{ route('carts.index') }}">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <!-- Avatar -->
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow"
                   href="#"
                   id="navbarDropdownMenuAvatar"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false"
                >
                    <img src="{{ asset('assets/putih.jpg') }}"
                         class="rounded"
                         height="30"
                         loading="lazy"
                    />
                </a>
                <ul class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuAvatar"
                >   
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.show') }}">
                            <i class=""></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('monitoring.show')}}">Monitoring</a>
                    </li>
                    <li>
                        <form action="{{ route('feedback.index') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Feedback</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <!-- Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
