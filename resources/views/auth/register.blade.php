@extends('layouts.main')

@section('content')

<section class="contact-form-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h4 class="ml-30">{{ __('Register') }}</h4>
                <div class="contact-form">
                    <form method="POST" action="{{ route('register') }}" class="default-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name" class="col-form-label text-md-right logincol">{{ __('Name') }}</label>
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
                                <label for="phone" class="col-form-label text-md-right logincol">{{ __('Phone') }}</label>
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
                                <label for="address" class="col-form-label text-md-right logincol">{{ __('Address') }}</label>
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
                                <label for="password-confirm" class="col-form-label text-md-right logincol">{{ __('Confirm Password') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-20">
                                <button class="thm-btn bgclr-1" type="submit">{{ __('Register') }}</button>
                            </div>
                        </div>
                    </form>
                    <button class="loginBtn loginBtn--facebook ml-10 ml-xs-0">
                        Login with Facebook
                    </button>
                    <button class="loginBtn loginBtn--google ">
                        Login with Google
                    </button>
                    <h3 class="ml-30 mt-30">@lang('main.do-you-have-an-account') <a href="{{route('login')}}" class="thm-btn bgclr-1 regist ml-5" type="submit">Login now</a></h3>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
@endsection
