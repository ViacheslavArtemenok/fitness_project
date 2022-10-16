<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AggTrainers: @section('title') @show
    </title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- MAIN CSS -->
    <link href="{{ asset('assets/css/templatemo-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet">

</head>

<body class="body_back" id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <x-header></x-header>
    <main class="main_back">
        @yield('content')
    </main>

    <x-footer></x-footer>
    <script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>
    <!-- SCRIPTS -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
