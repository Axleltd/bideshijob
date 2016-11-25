@extends('layouts.login')

@section('title')
    Login
@stop
@section('content')
    <div class="row login">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Login</span>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="left btn">
                        Login
                    </button>

                    <div class="form-group right" style="padding-top: 10px">
                        <input type="checkbox" class="filled-in" id="filled-in-box" {{-- checked="checked" --}} name="remember" />
                         <label for="filled-in-box">Remember</label>
                    </div>
                </form>
            </div>
            <div class="card-action">
                <a class="" href="{{ url('/password/reset') }}">
                    Forgot Your Password?
                </a>
            </div>                
        </div>
    </div>
@endsection
