@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>My</b>BLOG</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">ログイン</p>

        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field()}}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <input type="email" class="form-control" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
            <span class="fa fa-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <input type="password" class="form-control" placeholder="パスワード" name="password">
            <span class="fa fa-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <!-- <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            </div> -->
            <!-- /.col -->
            <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">ログイン</button>
            </div>
            <!-- /.col -->
        </div>
        </form>

        <br>
        <a href="{{ route('password.request') }}">パスワードをお忘れですか?</a><br>
        <a href="facebook">Facebookでログイン</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
