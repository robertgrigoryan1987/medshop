@extends('layouts.main')

@section('content')
<section class="login-form-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h4 class="pt-20 pl-20 backfff">@lang('main.registered-customers')</h4>
                <h5  class="pt-20 pl-20 backfff">@lang('main.if-have-acc')</h5>
                <div class="login-form backfff">
                    <form method="POST" action="{{ route('login') }}" class="default-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label text-md-right logincol">{{ __('E-Mail Address') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="password" class="col-form-label text-md-right logincol">{{ __('Password') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check ml-80 ml-xs-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-20">
                                <button class="thm-btn bgclr-1 logw" type="submit">{{ __('Login') }}</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ url('auth/facebook') }}" class="loginBtn loginBtn--facebook ml-10 ml-xs-0"> Login with Facebook</a>
                    <a href="" class="loginBtn loginBtn--google  ml-10 ml-xs-0"> Login with Google</a>

                    <h4 class="ml-30 mt-30">@lang('main.dont-have-an-account-yet') <a href="{{route('register')}}" class="thm-btn bgclr-1 regist ml-5" type="submit">@lang('main.register') </a></h4>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

@endsection
