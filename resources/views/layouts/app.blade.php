<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plantify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <a class="nav-link text-white" style = "font-weight: bold;" href="{{ route('home.show') }}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white " style = "font-weight: bold;" href="#">About us</a>
                </li>
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" style = "font-weight: bold;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Our Product
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('product.buy') }}">Alat Pertanian</a></li>
                <li><a class="dropdown-item" href="{{ route('product.sewa') }}">Sewa Alat Pertanian</a></li>
                <li><a class="dropdown-item" href="{{ route('product.pupuk') }}">Pupuk</a></li>
              </ul>
            </li>
                <li class="nav-item">
                <a class="nav-link text-white" style = "font-weight: bold;" href="{{ route('consultation.show') }}">Consultation</a>
                </li>
            </ul>
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
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
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                         class="rounded-circle"
                         height="25"
                         alt="Black and White Portrait of a Man"
                         loading="lazy"
                    />
                </a>
                <ul class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuAvatar"
                >
                    <li>
                        <a class="dropdown-item" href="{{ route('monitoring.show')}}">Monitoring</a>
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

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
