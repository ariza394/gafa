<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/14704a88d9.js" crossorigin="anonymous"></script>

    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="width: 100px;" class="img-fluid" src="{{ asset("/images/logo.png") }}" alt="recipe img">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('calculator') ? 'active' : '' }}" href="{{route('calculator')}}">Calculator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}" href="{{route('contact')}}">Contact Us</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="">My Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Adviser Hub</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Calculator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">dviserHome</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is(['booking.index','booking.create','booking.edit']) ? 'active' : '' }}" href="{{route('booking.index')}}">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Route::is(['manager.login']) ? 'active' : ''}}" href="{{route('manager.login')}}">Manager</a>
                            </li>
                        </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{Route::is(['login']) ? 'active' : ''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{Route::is(['register']) ? 'active' : ''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
