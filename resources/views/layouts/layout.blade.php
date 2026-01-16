<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Komail Computer Shop</title>

    <link rel="icon" href="{{asset('assets/images/aria-kcs_logo.jpg')}}">
    <!-- css frame works -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css style sheets -->
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/product.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">



    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap");

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>

    <header>

        @yield('header')
    </header>

    <main>
        @yield('main')

    </main>


    <footer class="site-footer">
        @yield('footer')

    </footer>




    <script src="{{asset('assets/js/header.js')}}"></script>
    <script src="{{asset('assets/js/carousel.js')}}"></script>
    <script src="{{asset('assets/js/filter.js')}}"></script>
</body>

</html>
