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
                            <a href="/"
                                class="nav-link text-white {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"
                                aria-current="page">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.projects.index') }}"
                                class="nav-link text-white {{ Route::currentRouteName() === 'admin.projects.index' ? 'active' : '' }}">
                                View All Projects
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.projects.create') }}"
                                class="nav-link text-white {{ Route::currentRouteName() === 'admin.projects.create' ? 'active' : '' }}">
                                Create New Project
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.types.index') }}"
                                class="nav-link text-white {{ Route::currentRouteName() === 'admin.types.index' ? 'active' : '' }}">
                                View All Types
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.types.create') }}"
                                class="nav-link text-white {{ Route::currentRouteName() === 'admin.types.create' ? 'active' : '' }}">
                                Create New Type
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.technologies.index') }}"
                                class="nav-link text-white {{ Route::currentRouteName() === 'admin.technologies.index' ? 'active' : '' }}">
                                View All Technologies
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.technologies.create') }}"
                                class="nav-link text-white {{ Route::currentRouteName() === 'admin.technologies.create' ? 'active' : '' }}">
                                Create New Technology
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.publishings.index') }}"
                                class="nav-link text-white {{ Route::currentRouteName() === 'admin.publishings.index' ? 'active' : '' }}">
                                View All Publishing
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.publishings.create') }}"
                                class="nav-link text-white {{ Route::currentRouteName() === 'admin.publishings.create' ? 'active' : '' }}">
                                Create New Publishing
                            </a>
                        </li>

                    </ul>
                </div>
                <div>
                    <ul>
                        <li> <a class="text-white text-decoration-none"
                                href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li><a class="text-white text-decoration-none"
                                href="{{ url('profile') }}">{{ __('Profile') }}</a></li>
                        <li><a class="text-white text-decoration-none" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></li>
                    </ul>
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
                <div>
                    <ul class="list-unstyled text-center">
                        <li> <a class="text-white text-decoration-none " href="{{ route('admin.dashboard') }}"><i
                                    class="fa-solid fa-house"></i></a>
                        </li>
                        <li><a class="text-white text-decoration-none"
                                href="{{ url('profile') }}">{{ __('Profile') }}</a></li>
                        <li><a class="text-white text-decoration-none" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></li>
                    </ul>
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
