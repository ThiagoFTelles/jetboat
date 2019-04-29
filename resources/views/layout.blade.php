<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MarinaWave</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/vue-qrcode-reader@1.3.1/dist/vue-qrcode-reader.css">
  <script src="https://unpkg.com/vue-qrcode-reader@1.3.1/dist/vue-qrcode-reader.browser.js"></script>
  <style>
    html{min-width: 100px !important;}
    .title {font-size: 10vw; }
    @media (min-width: 600px) {
      .title {font-size: 8vw; }
    }
    @media (min-width: 800px) {
      .title {font-size: 3vw; }
    }
    .marina-home-link{
      color: maroon;
      font-family: sans-serif;
      width: 100%;
    }
  </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
</head>
<body>

    <section class="hero is-info is-fullheight is-bold is-mobile">
        @include('header')
        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-centered">
                @yield('content')
            </div>
        </div>
        @include('footer')

    </section>
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- <script src="{{ mix('js/clipboard-1.7.1.min.js') }}"></script> -->
    <!-- <script src="https://bulma.io/vendor/js.cookie-2.1.4.min.js"></script> -->
    <!-- <script src="{{ mix('js/main.js') }}"></script> -->
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/manifest.js') }}"></script>
</body>
</html>