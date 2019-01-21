<html>
    <head>
    <title>edX | Online courses from the world's best universities</title>
        <link rel="shortcut icon" href="/vendor/metronic/assets/demo/default/media/img/logo/favicon.ico">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="css/homepage.css">

        @stack('css')           
    </head>

    <body>
        <div class="container-fuild">
        @include('homepages.menu')
        @yield('content')
        <script src="{{ asset('vendor/jquery/dist/jquery.slim.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        @stack('js')    
        </div>
        @include('homepages.footer')
    </body>
</html>
