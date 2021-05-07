<!doctype html>
<html class="no-js"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Faça o seu login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"
        type="{{ ('painel/image/png" href="assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ url('painel/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('painel/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ url('painel/css/style.css') }}">
    <!-- modernizr css -->
    <script src="{{ ('painel/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="{{ route('login.send') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="login-form-head">
                        <h4 class="login-title">painel de controle</h4>
                    </div>
                    <div class="login-form-body">
                        @if( session('errorMessage') )
                            <ul class="alert alert-danger " role="alert">
                                <li><i class="fa fa-times" aria-hidden="true"></i>
                                    {{ session('errorMessage') }}</li>
                            </ul>
                            <br>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <br>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                            <input type="email" id="email" placeholder="Email" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i></label>
                            <input type="password"  placeholder="Senha" id="password" name="password"
                                value="{{ old('password') }}">
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{ url('painel/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ url('painel/assets/js/popper.min.js') }}"></script>
    <script src="{{ url('painel/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('painel/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('painel/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('painel/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('painel/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- others plugins -->
    <script src="{{ url('painel/assets/js/plugins.js') }}"></script>
    <script src="{{ url('painel/assets/js/scripts.js') }}"></script>
    <script>
        setTimeout(() => {
            $('.alert').alert('close').removeClass("fadeInDown").addClass(" fadeOutDown");
        }, 4000); //depois de 3 segundos

    </script>
</body>

</html>
