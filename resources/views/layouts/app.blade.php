<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CpManager') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <section id="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'CpManager') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"><a class="nav-link" href="/competitions">Competitions</a></li>
                            @if (!Auth::guest())
                                @if (auth()->user()->name === 'admin' && auth()->user()->email === 'admin@admin.com')
                                    <li class="nav-item"><a class="nav-link" href="/users">Users</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/competitors">Competitors</a></li>
                                @endif
                            @endif
                            @if (!Auth::guest())
                                @if (auth()->user()->name !== 'admin' || auth()->user()->email !== 'admin@admin.com')
                                    <li class="nav-item"><a class="nav-link" href="/competitors/{{auth()->user()->id}}">My Competitions</a></li>
                                @endif
                            @endif
                        </ul>


                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if (!Auth::guest())
                                        @if (auth()->user()->name !== 'admin' || auth()->user()->email !== 'admin@admin.com')
                                            <a class="dropdown-item" href="/users/{{auth()->user()->id}}">Profile</a>
                                        @endif
                                    @endif

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        @if (\Request::is('/'))
        <main class="py-4">
            <div class="container">
            @include('inc.messages')
            @yield('content')
            </div>
        </main>
        @else
        <main class="my-background">
            <div class="container">
            @include('inc.messages')
            @yield('content')
            </div>
        </main>
        @endif

        @yield('img')
    </div>
</body>
</html>
