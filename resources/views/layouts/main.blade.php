<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Medshop</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- master stylesheet -->

    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('/medshop/css/custom-bootstrap-margin-padding.css') }}">
    <link rel="stylesheet" href="{{ asset('/medshop/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('/medshop/css/style.css') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/medshop/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/medshop/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/medshop/images/favicon/favicon-16x16.png" sizes="16x16">

</head>
<body>
<?php
use App\Http\Controllers\UrlController;
$iso = UrlController::geturl();
$languages = UrlController::languages();
$set_lang = UrlController::set_language();
?>

<div class="boxed_wrapper">

{{--    <div class="preloader"></div>--}}

    <section class="top-bar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 mb-xs-10 mb-sm-10">
                    <div class="top-left">
                        <p><span class="flaticon-phone"></span>@lang('main.24-hour') +321 789 01 2345</p>
                    </div>
                </div>
                <div class="col-lg-0 col-md-2 col-sm-12 col-xs-12">
                    <div class="top-right clearfix">

                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                    <div class="top-right  social-links" >
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <ul class="social-links">
                            @foreach($languages as $language)
                                <li id="langu">
                                    <a href="/{{$language->iso}}/{{$set_lang}}" class="nav-link {{ strtoupper($language->iso) }}" @if (app()->getLocale() == $language->iso)  @endif><span class="hid">{{ strtoupper($language->iso) }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('order'))
        <div class="alert alert-success">
            {{ session('order') }}
        </div>
    @endif

    <section class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="logo">
                        <a href="/">
                            <img src="/medshop/images/resources/logo.png" alt="Awesome Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 hidden-xs">
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-technology"></span>
                                </div>
                                <div class="text-holder">
                                    <h4>@lang('main.call-us-now')</h4>
                                    <span>+1-888-987-6543</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-pin"></span>
                                </div>
                                <div class="text-holder">
                                    <h4>Парк Драйв</h4>
                                    <span>Армения 1006</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-agenda"></span>
                                </div>
                                <div class="text-holder">
                                    <h4>@lang('main.week')</h4>
                                    <span>09.00am - 18.00pm</span>
                                </div>
                            </li>
                        </ul>
                        <div class="search-button pull-right">
                            <div class="toggle-search">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="header-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="search-form pull-right">
                        <form action="/search" method="get">
                            @csrf
                            <div class="search">
                                <input type="search" name="search" value="" placeholder="@lang('main.search')" autocomplete="off">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mainmenu-area stricky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <nav class="main-menu pull-left">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="current"><a href="{{route('home')}}">@lang('main.general')</a></li>
                                <li><a href="{{route('about')}}">@lang('main.about-us')</a></li>
                                <li><a href="{{route('blog')}}">@lang('main.blog')</a></li>
                                <li><a href="{{route('shop')}}">@lang('main.store')</a></li>
                                <li><a href="{{route('contact')}}">@lang('main.contact-us')</a></li>
                                <li class="dropdown"><a>@lang('main.account')</a>
                                    <ul>
                                        @guest
                                            <li><a class="login social-links" href="{{ route('login') }}"><i class="fa fa-sign-in"> @lang('main.login')</i></a></li>
                                        @else
                                            <li><a href="/profile">{{ Auth::user()->name }}</a></li>
                                            <li><a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                            </li>
                                            <form id="logout-form"  action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endguest
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="mainmenu-right-box pull-right">
                        <div class="cart_select">
                            <button><a href="{{route('product_order')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>(<span  class="count-product">{{$ordering_products_count ?? 0}}</span>)</span></a></button>
                        </div>
{{--                        <div class="consultation-button">--}}
{{--                            <a href="#">+374 00 00 00 00</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

            @if (session('status'))
                <div class="alert alert-danger pl-150">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')

        <footer class="footer-area">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-widget pd-bottom50">
                            <div class="title">
                                <h3>@lang('main.about-us')</h3>
                                <span class="border"></span>
                            </div>
                            <div class="our-info">
                                <p>Неуклонное обслуживание больниц за последние 25 лет позволило вывести здравоохранение на самый современный уровень в регионе, обслуживая городские и сельские районы..</p>
                                <a href="#">@lang('main.learn-more')<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-widget pd-bottom50">
                            <div class="title">
                                <h3>@lang('main.links')</h3>
                                <span class="border"></span>
                            </div>
                            <ul class="usefull-links fl-lft">
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Награды</a></li>
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Вопросы</a></li>
                            </ul>
                            <ul class="usefull-links">
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-widget mar-bottom">
                            <div class="title">
                                <h3>@lang('main.contact-information')</h3>
                                <span class="border"></span>
                            </div>
                            <ul class="footer-contact-info">
                                <li>
                                    <div class="icon-holder">
                                        <span class="flaticon-pin"></span>
                                    </div>
                                    <div class="text-holder">
                                        <h5>Армения  01 25</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-holder">
                                        <span class="flaticon-interface"></span>
                                    </div>
                                    <div class="text-holder">
                                        <h5>Армения@Армения.com</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-holder">
                                        <span class="flaticon-technology-1"></span>
                                    </div>
                                    <div class="text-holder">
                                        <h5>(123) 0200 12345 & 7890</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-holder">
                                        <span class="flaticon-clock"></span>
                                    </div>
                                    <div class="text-holder">
                                        <h5>@lang('main.week'): 9am - 18pm</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-widget clearfix">
                            <div class="title">
                                <h3>@lang('main.message')</h3>
                                <span class="border"></span>
                            </div>
                            <form class="appointment-form" action="#">
                                <div class="input-box">
                                    <input type="text" name="form_name" value="" placeholder="@lang('main.your-name')" required="">
                                    <div class="icon-box">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <input type="email" name="form_email" value="" placeholder="@lang('main.email')" required="">
                                    <div class="icon-box">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <textarea name="form_message" placeholder="@lang('main.text')" required="" aria-required="true"></textarea>
                                </div>
                                <button type="submit">@lang('main.send')</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <section class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright-text">
                            <p>Copyrights © 2020 <a href="#">Армения.</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="footer-social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        </div>

        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-triangle-inside-circle"></span></div>

        <!-- main jQuery -->
        <script src="{{asset('/medshop/js/jquery-1.11.1.min.js')}}"></script>
        <!-- Wow Script -->
        <script src="{{asset('/medshop/js/wow.js')}}"></script>
        <!-- bootstrap -->
        <script src="{{asset('/medshop/js/bootstrap.min.js')}}"></script>
        <!-- bx slider -->
        <script src="{{asset('/medshop/js/jquery.bxslider.min.js')}}"></script>
        <!-- count to -->
        <script src="{{asset('/medshop/js/jquery.countTo.js')}}"></script>
        <!-- owl carousel -->
        <script src="{{asset('/medshop/js/owl.carousel.min.js')}}"></script>
        <!-- validate -->
        <script src="{{asset('/medshop/js/validation.js')}}"></script>
        <!-- mixit up -->
        <script src="{{asset('/medshop/js/jquery.mixitup.min.js')}}"></script>
        <!-- easing -->
        <script src="{{asset('/medshop/js/jquery.easing.min.js')}}"></script>

        <script src="{{asset('/medshop/js/map-helper.js')}}"></script>
        <!-- fancy box -->
        <script src="{{asset('/medshop/js/jquery.fancybox.pack.js')}}"></script>
        <script src="{{asset('/medshop/js/jquery.appear.js')}}"></script>
        <!-- isotope script-->
        <script src="{{asset('/medshop/js/isotope.js')}}"></script>
        <script src="{{asset('/medshop/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('/medshop/js/jquery.bootstrap-touchspin.js')}}"></script>
        <!-- jQuery timepicker js -->
        <script src="{{asset('/medshop/assets/timepicker/timePicker.js')}}"></script>
        <!-- Bootstrap select picker js -->
        <script src="{{asset('assets/bootstrap-sl-1.12.1/bootstrap-select.js')}}"></script>
        <!-- Bootstrap bootstrap touchspin js -->
        <!-- jQuery ui js -->
        <script src="{{asset('/medshop/assets/jquery-ui-1.11.4/jquery-ui.js')}}"></script>
        <!-- Language Switche  -->
        <script src="{{asset('/medshop/assets/language-switcher/jquery.polyglot.language.switcher.js')}}"></script>
        <!-- Html 5 light box script-->
        <script src="{{asset('/medshop/assets/html5lightbox/html5lightbox.js')}}"></script>

        <!-- revolution slider js -->
        <script src="{{asset('/medshop/assets/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script src="{{asset('/medshop/assets/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>

        <!-- thm custom script -->
        <script src="{{asset('/medshop/js/custom.js')}}"></script>
        <script src="{{asset('/medshop/js/shop_cart.js')}}"></script>
</body>
</html>
