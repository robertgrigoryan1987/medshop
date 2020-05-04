@extends('layouts.main')

@section('content')

<section class="login-form-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h4 class="pt-20 pl-20 backfff">@lang('main.register')</h4>
                <div class="login-form backfff">
                    <form method="POST" action="{{ route('register') }}" class="default-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name" class="col-form-label text-md-right logincol">@lang('main.name')</label>
                            </div>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="phone" class="col-form-label text-md-right logincol">@lang('main.phone')</label>
                            </div>
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address" class="col-form-label text-md-right logincol">@lang('main.address')</label>
                            </div>
                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label text-md-right logincol">@lang('main.email')</label>
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
                                <label for="password" class="col-form-label text-md-right logincol">@lang('main.password')</label>
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
                                <label for="password-confirm" class="col-form-label text-md-right logincol">@lang('main.confirm-password')</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-20">
                                <button class="thm-btn bgclr-1" type="submit">@lang('main.register')</button>
                            </div>
                        </div>
                    </form>
                    <button class="loginBtn loginBtn--facebook ml-10 ml-xs-0">
                        Login with Facebook
                    </button>
                    <button class="loginBtn loginBtn--google ">
                        Login with Google
                    </button>
                    <h3 class="p-15 mt-30 pb-30">@lang('main.do-you-have-an-account') <a href="{{route('login')}}" class="log-btn bgclr-1 regist ml-5" type="submit">@lang('main.login-now')</a></h3>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
@endsection
