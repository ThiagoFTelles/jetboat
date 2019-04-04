<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
  <!-- <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
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
  </style>
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
    <script src="{{ mix('js/clipboard-1.7.1.min.js') }}"></script>
    <script src="https://bulma.io/vendor/js.cookie-2.1.4.min.js"></script>
    <script src="{{ mix('js/main.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/manifest.js') }}"></script>
</body>
</html>