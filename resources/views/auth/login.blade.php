<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>EDHIL System - Login</title>
    @include('template._head')    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @include('template._preloader')

    <section id="wrapper" class="login-register login-sidebar" 
             style="background-image:url({{ asset('assets/edhil/images/background/login.jpg') }});">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    <a href="javascript:void(0)" class="text-center db">
                            <a href="javascript:void(0)" class="text-center db">
                                <img src="{{ asset('assets/edhil/images/logo-icon.png') }}" alt="Home" /><br/>
                                <img src="{{ asset('assets/edhil/images/logo-text.png') }}" alt="Home" />
                            </a>
                    </a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input id="login"
                                   type="text"
                                   class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" 
                                   name="login" 
                                   value="{{ old('username') ?: old('email') }}" 
                                   required="" 
                                   placeholder="Username / Email" 
                                   autofocus>
                            @if ($errors->has('username') || $errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required="" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                </form>
            </div>
        </div>
    </section>

    @include('template._js')
    @yield('custom-js')
</body>

</html>
