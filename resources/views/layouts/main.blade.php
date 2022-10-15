<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AggTrainers: @section('title') @show</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
     <!-- MAIN CSS -->
     <link href="{{ asset('assets/css/templatemo-style.css') }}" rel="stylesheet">
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>

    <x-header></x-header>
    <main>

        <div class="album py-5 bg-light">
            <div class="container">
                @yield('content')
            </div>
        </div>

    </main>
    <x-footer></x-footer>
    <script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>
     <!-- SCRIPTS -->
     <script src="{{ asset('assets/js/jquery.js') }}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('assets/js/smoothscroll.js') }}"></script>
     <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
