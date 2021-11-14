<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/libs.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @yield('styles')

</head>

<body>
    <!-- Header: START -->
    <header class="header">
        <!-- Navbar: START -->
        @include('partials.site-navbar')
        <!-- Navbar: END -->
    </header>
    <!-- Header: END -->


    <div class="main">
        @yield('content')
    </div>



    <!-- Footer: START -->
    @include('partials.site-footer')
    <!-- Footer: END -->
    
    <!-- JS Libraries -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/libs.js') }}"></script>
    <script src="{{ asset('js/smooth-scroll.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @yield('scripts')
</body>

</html>