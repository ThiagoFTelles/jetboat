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
                src="https://lh3.googleusercontent.com/FF1B64RN1FHJzKOQO3Oww6qRUj1Dwft9atCMyrqnSDfc1JLKKdddcMytKalYqDHNvXf0nWgPst1-6VuEZuIClU5lvtaQ2nqEfnobO9WiJhvec1aQ8pSwOFcJCrjId1viCrgHSx_1wesAOVj-u-P-57RTqHoZYS_wLF7JffvNaWl02wePUsiRNxk-WLVMH2VjT90t60f0URow1balXR9nVl-zlJF9Ki6Z97nUgMITug3xsUq-nfP3yRiZWZAuk9gx3MfLc4yqTHNe4jNMrBQ9LSZu0yh9QCJBhOUlZEqWrlvfzRHDKMMALaRap746IcLKJry5_x8QI4JgQFRKd-ZM0djX62wwX0Rj4Nz3PFaHdsYgCINCyZ90A3qhCaVqk5ggLW_hBPbfbgBpEpeNw-j6ujvNzLUnFhqsHWGLCtcleACje1kZJcvQvYYciIo5wrMz7pYnECnNmE1toi8j4Q-PfDBc6NSwMxHfzfbPGMrWpOrp7iHJAcuDBJUW8aA70t-fPX4nEmbo8mq4AdNT0GzUDyEwXTJpbSxtCUkz6B-P4SvP8DxOt228ITRjitrR9Oyuoa0eSZBxd5R626M-f-xsx5BvI6pii7DlIA-zWak=w1600-h758" alt="Marina Wave">
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
