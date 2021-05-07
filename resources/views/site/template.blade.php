<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- displays site properly based on user's device -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ url('site/images/favicon-32x32.png') }}">
    <link rel="stylesheet" href="{{ url('site/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('site/css/responsive.css') }}">
    @stack('css')

    <title>Sequele iMobi</title>

    <!-- Feel free to remove these styles or customise in your own stylesheet 👍 -->
</head>

<body>
    <!-- CONTAINER -->
    @yield('container')
    <!-- END CONTAINER -->
    <!-- MENU MOBILE -->
    @include('site.partials.menu-mobile')
    <!-- END MENU MOBILE -->

    <script src="{{ url('site/js/scripts.js') }}"></script>
</body>

</html>
