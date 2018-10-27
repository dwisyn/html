@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="login-box">
              <div class="login-logo">
                <p><b>NovaLock</b>@</p>
              </div>

              <div class="login-box-body">
                <form class="form-horizontal" method="POST" action="{{ url(env('APP_URL').'login') }}">
                        {{ csrf_field() }}
                      <div  class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                            <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                      </div>

                      <div class="row">
                        <div class="col-xs-8">
                          <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                          </div>
                        </div>
                        <div class="col-xs-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>
                      </div>
<!-- 
                      <div class="form-group center-all" style="margin-top: 8%;">
                          <a class="btn btn-link center-all" href="{{ route('password.request') }}" >Forgot Your Password?</a><br>
                      </div> -->

                    </form>
              </div>

            </div>
        </div>
    </div>
</div>
@endsection
