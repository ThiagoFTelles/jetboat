<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MarinaWave</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img 
                style="width: 10%; height: auto; min-width:70px"
                src="https://lh3.googleusercontent.com/fiHblddydIDlTK2XzRj7Fu_Fqm5rwtnkZx8lJkPNNzgvaJQK7SyYXHrynfnTbpdm80O4KSKNd-X5kOVEUNzWf7pCtBTBuec8owwtEFAbvQbZ3CPSBVM47uXzq8AkssZCbFIlaDdfTgQL3VDuW-4rX5Gz7vRVFkk7sZD_oQCbm_rXRJeDkhiKKsUEgnxo0d0C-Ed7KnYMgJwRUK8Ec7nI2P5RD09fktbkHRCsnSQwfEj2bSDtsFFMit2VE-WUU10__vJwMF6Zc7rEkYkXI7S6nxvElMgIZNf7zSU9aJZQPByPrOLm1NituxWHJ0_cT6FAwJto5Tnzp0I_nc8JlAQwD1XMgIkLeLGwaR7Tp1ELXxTtZb2T8o1l_fBuDp7Qg2ADMESrbdMGb2fyNRD250cI2hEkkrhI17zADkygsIumopRHGWJbW_m3HyxKiFBGlY-KH6wBywmI0_rMhSpM_wmy2ukRjv71vPEWoxAkce8k3cQfEtZxUQtvlfZHZWnYiGYfM5FOG7Y0fGYgTWAJ5OGQczTdP-f6D3-sipfYGupxJzr6esg_wDCpzgtCQMp81PHs50hUMFk9I_ddVlFbhIMGYo8xss07WiiJbqEnRlg=w1600-h758" alt="Marina Wave">
                </a>
                <button style="display:none" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
