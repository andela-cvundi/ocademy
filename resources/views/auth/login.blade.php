@extends('layouts.app')

@section('content')
<div id="login-page">
    <div class="container">
        <form class="form-login" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <h2 class="form-login-heading">sign in now</h2>
            <div class="login-wrap">
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

                <label class="checkbox">
                    <span class="pull-right">
                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
                    </span>
                </label>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                <hr>
                <div class="login-social-link centered">
                    <p style="text-align: center">-OR-</p>
                    <div class="center-button">
                        <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                        <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                        <a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
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
            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <!-- <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix"> -->
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
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
