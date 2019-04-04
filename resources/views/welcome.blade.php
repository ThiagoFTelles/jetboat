<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <img
                style="width: 70%; height: auto;"
                src="https://lh3.googleusercontent.com/FF1B64RN1FHJzKOQO3Oww6qRUj1Dwft9atCMyrqnSDfc1JLKKdddcMytKalYqDHNvXf0nWgPst1-6VuEZuIClU5lvtaQ2nqEfnobO9WiJhvec1aQ8pSwOFcJCrjId1viCrgHSx_1wesAOVj-u-P-57RTqHoZYS_wLF7JffvNaWl02wePUsiRNxk-WLVMH2VjT90t60f0URow1balXR9nVl-zlJF9Ki6Z97nUgMITug3xsUq-nfP3yRiZWZAuk9gx3MfLc4yqTHNe4jNMrBQ9LSZu0yh9QCJBhOUlZEqWrlvfzRHDKMMALaRap746IcLKJry5_x8QI4JgQFRKd-ZM0djX62wwX0Rj4Nz3PFaHdsYgCINCyZ90A3qhCaVqk5ggLW_hBPbfbgBpEpeNw-j6ujvNzLUnFhqsHWGLCtcleACje1kZJcvQvYYciIo5wrMz7pYnECnNmE1toi8j4Q-PfDBc6NSwMxHfzfbPGMrWpOrp7iHJAcuDBJUW8aA70t-fPX4nEmbo8mq4AdNT0GzUDyEwXTJpbSxtCUkz6B-P4SvP8DxOt228ITRjitrR9Oyuoa0eSZBxd5R626M-f-xsx5BvI6pii7DlIA-zWak=w1600-h758" alt="Marina Wave">
            </div>
        </div>
    </body>
</html>
