<!DOCTYPE html>
<html lang="{!! session('locale') !!}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="Q65peJEa0gelkheVOIbosNiHLIkluEI6g17_ir3HzOM" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="{{ url(Request::url()) }}" />
    <title> @yield('title')</title>
    <!-- Favicon img -->
    <link rel="shortcut icon" href="{!! asset('assets/images/favico.png') !!}">
    <!-- Bootstarp min css -->
    <link rel="stylesheet" href="{!! asset('assets/css/dashlite.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/theme.css') !!}">

</head>

<body class="nk-body npc-invest bg-lighter ">
<div class="nk-app-root">
    <div class="nk-wrap ">
    <div class="nk-content nk-content-fluid">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    </div>
<!-- Jquery 3. 7. 1 Min Js -->
<script src="{!! asset('assets/js/bundle.js') !!}"></script>
<!-- Bootstrap min Js -->
<script src="{!! asset('assets/js/scripts.js') !!}"></script>

@stack('js')
</body>

</html>
