@extends('layouts.app')

@section('content')
<div id="login-page">
    <div class="container">
        <form class="form-login" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            <h2 class="form-login-heading">Sign up</h2>
            <div class="login-wrap">

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name" autofocus="">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" autofocus="">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" autofocus="">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" autofocus="">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-user"></i> REGISTER</button>
                <hr>
                <div class="login-social-link centered">
                    <p style="text-align: center">-OR-</p>
                    <div class="center-button">
                        <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                        <a href="url('/auth/twitter') }}" class="btn btn-twitter" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                        <a href="url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
                    </div>
                </div>
                <div class="registration">
                    Don't have an account yet?
                    <br>
                    <a class="" href="#">
                        Create an account
                        </a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript" src="{{ url('/js/jquery.backstretch.min.js') }}"></script>
<script>
$.backstretch("{{ url('/images/hero.jpg') }}", {
    speed: 500
});
</script>
<div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 805px; z-index: -999999; position: fixed;"><img src="{{ url('/images/hero.jpg') }}" style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1207.27px; height: 805px; max-width: none; z-index: -999999; left: -212.636px; top: 0px;"></div>
@endsection
