<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>    
    @include('template._head') 
    <title>EDHIL System - @yield('title')</title>   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    @include('template._preloader')

    <div id="main-wrapper">
        @include('template._header')
        @include('template._left_sidebar')        

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">@yield('page-title')</h3>
                    </div>
                </div>
                <div class="row">
                    @yield('content')
                </div>               
            </div>
            @include('template._footer')
        </div>
    </div>
    @include('template._js')

    <script>
        // https://www.jacklmoore.com/notes/rounding-in-javascript/
        function round(value, decimals) {
            return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
        }
    </script>

    @yield('custom-js')
</body>

</html>