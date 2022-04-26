
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FrontEnd</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="images/icono.jpg">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/cssFancybox/jquery.fancybox.css">
    <!--estilos propios-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">

    @yield('css')
</head>

<body>

    <div class="container-fluid">

        @include('front-end.menu')
        @yield('content')

    </div>






    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/animatescroll.js"></script>
    <script src="js/jquery.scrollUp.js"></script>
    <script src="js/script.js"></script>

    @yield('scripts')



</body>
</html>


