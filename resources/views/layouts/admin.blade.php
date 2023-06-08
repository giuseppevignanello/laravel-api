<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('partials.header')
    <div class="admin d-flex">

        <div class="sidebar">
            <div class="flex-column justify-content-between flex-shrink-0 bg-dark d-none d-md-flex large_sidebar">
                <div>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link active" aria-current="page">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.projects.index') }}" class="nav-link text-white">
                                View All Projects
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.projects.create') }}" class="nav-link text-white">
                                Create New Project
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.types.index') }}" class="nav-link text-white">
                                View All Types
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.types.create') }}" class="nav-link text-white">
                                Create New Type
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.technologies.index') }}" class="nav-link text-white">
                                View All Technologies
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown pb-5">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                            class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- large sidebar --}}

            <div class="d-flex flex-column flex-shrink-0 bg-dark d-md-none text-white small_sidebar"
                style="width: 4.5rem;">
                <a href="/" class="d-block p-3 link-dark text-decoration-none" title="Icon-only"
                    data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi text-white" width="40" height="14">

                    </svg>
                </a>
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                    <li class="nav-item home_button">
                        <a href="/" class="nav-link active py-3 border-bottom" aria-current="page" title="Home"
                            data-bs-toggle="tooltip" data-bs-placement="right">
                            <svg class="bi" width="24" height="24" role="img" aria-label="Home">
                                <i class="fa-solid fa-house"></i>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.projects.index') }}" class="nav-link py-3 border-bottom text-white"
                            title="Projects" data-bs-toggle="tooltip" data-bs-placement="right">
                            <svg class="bi" width="24" height="24" role="img" aria-label="Projects">
                                <i class="fa-solid fa-eye"></i>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.projects.create') }}" class="nav-link py-3 border-bottom text-white"
                            title="Add" data-bs-toggle="tooltip" data-bs-placement="right">
                            <svg class="bi me-1 mb-3" width="24" height="24" role="img" aria-label="Add">
                                <i class="fa-solid fa-plus"></i>
                            </svg>
                        </a>
                    </li>

                </ul>
                <div class="dropdown border-top">
                    <a href="#"
                        class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24"
                            class="rounded-circle">
                    </a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- small sidebar --}}

        {{-- /sidebars --}}


        <div>
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</body>

</html>
