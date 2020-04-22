<?php use App\Language;
$langages = Language::all();

?>
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
    <link rel="stylesheet" href="{{ asset('/medshop/css/style.css') }}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('/medshop/css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/medshop/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/medshop/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/medshop/images/favicon/favicon-16x16.png" sizes="16x16">

</head>
<body>

<div class="boxed_wrapper">

    <div class="preloader"></div>

    <section class="top-bar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                    <div class="top-left">
                        <p><span class="flaticon-phone"></span>Круглосуточная служба +321 789 01 2345</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="top-right clearfix">

                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                    <div class="top-right  social-links" >
                        <ul class="social-links"> <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <ul class="social-links">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="login" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="login" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest

                            <a href="profile.html" class="login" class="social-links"><i class="fa fa-sign-in"> Войти</i></a>
                            <select id="flag">
                                @foreach($langages as $langage)
                                    <option value="{{strtoupper($langage->iso)}}">
                                        <a class="nav-link"
                                           href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $langage->iso) }}"
                                           @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($langage->iso) }}</a>

                                @endforeach
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="/medshop/images/resources/logo.png" alt="Awesome Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-technology"></span>
                                </div>
                                <div class="text-holder">
                                    <h4>Позвоните нам сейчас</h4>
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
                                    <h4>Пн - суббота</h4>
                                    <span>09.00am to 18.00pm</span>
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
                        <form action="#">
                            <div class="search">
                                <input type="search" name="search" value="" placeholder="Поиск">
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
                                <li class="current"><a href="{{route('home')}}">Главная</a></li>
                                <li class="dropdown"><a href="{{route('about')}}">О нас</a>
                                    <ul>
                                        <li><a href="faq.html">Вопросы</a></li>
                                        <li><a href="faq.html">Вопросы</a></li>
                                        <li><a href="faq.html">Вопросы</a></li>
                                        <li><a href="faq.html">Вопросы</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{route('service')}}">Услуги</a>
                                    <ul>
                                        <li><a href="laborotory.html">Услуги</a></li>
                                        <li><a href="laborotory.html">Услуги</a></li>
                                        <li><a href="laborotory.html">Услуги</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{route('blog')}}">Блог</a>
                                    <ul>
                                        <li><a href="blog-single.html">Блог Сингл</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{route('shop')}}">Магазин</a>
                                    <ul>
                                        <li><a href="shop-single.html">Продукт</a></li>
                                        <li><a href="shopping-cart.html">Корзина</a></li>
                                        <li><a href="checkout.html">Чекаут</a></li>
                                        <li><a href="account.html">Аккаунт</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('contact')}}">Контакт</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="mainmenu-right-box pull-right">
                        <div class="cart_select">
                            <button><a href="{{route('product_order')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>(<span  class="count-product">{{$ordering_products_count}}</span>)</span></a></button>
                        </div>
                        <div class="consultation-button">
                            <a href="#">ТЕКСТ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>
                <li data-transition="rs-20">
                    <img src="/medshop/images/slides/1.jpg" alt="" width="1920" height="450" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

                    <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="0" data-y="top" data-voffset="220" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="1500">
                        <div class="slide-content-box mar-lft">
                            <h1>Пищевая <br> Добавка <span>Добавка</span></h1>
                            <p>Пищевая Добавка <br>Пищевая Добавка.</p>

                        </div>
                    </div>

                </li>
                <li data-transition="fade">
                    <img src="/medshop/images/slides/2.jpg" alt="" width="1920" height="450" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

                    <div class="tp-caption  tp-resizeme" data-x="right" data-hoffset="0" data-y="top" data-voffset="220" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="1500">
                        <div class="slide-content-box">
                            <h1>Глянцевая <br> Железная <span>Таблетка.</span></h1>
                            <p>Глянцевая Железная Таблетка <br>Глянцевая Железная Таблетка.</p>

                        </div>
                    </div>

                </li>
                <li data-transition="fade">
                    <img src="/medshop/images/slides/3.jpg" alt="" width="1920" height="450" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

                    <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="0" data-y="top" data-voffset="220" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="1500">
                        <div class="slide-content-box mar-lft">
                            <h1>Флакон <br> Для <span>Инъекций.</span></h1>
                            <p>Флакон Для Инъекций <br>Флакон Для Инъекций.</p>

                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </section>


            @yield('content')

        <footer class="footer-area">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-widget pd-bottom50">
                            <div class="title">
                                <h3>О НАС</h3>
                                <span class="border"></span>
                            </div>
                            <div class="our-info">
                                <p>Неуклонное обслуживание больниц за последние 25 лет позволило вывести здравоохранение на самый современный уровень в регионе, обслуживая городские и сельские районы..</p>
                                <p class="mar-top">Неуклонное обслуживание больниц за последние 25 лет позволило вывести здравоохранение на самый современный уровень в регионе, обслуживая городские и сельские районы.</p>
                                <a href="#">Узнать больше<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-widget pd-bottom50">
                            <div class="title">
                                <h3>Полезные Ссылки</h3>
                                <span class="border"></span>
                            </div>
                            <ul class="usefull-links fl-lft">
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Награды</a></li>
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Вопросы</a></li>
                                <li><a href="#">Вопросы</a></li>
                            </ul>
                            <ul class="usefull-links">
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы News</a></li>
                                <li><a href="#">Сервисы</a></li>
                                <li><a href="#">Сервисы</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-widget mar-bottom">
                            <div class="title">
                                <h3>Контактная Информация</h3>
                                <span class="border"></span>
                            </div>
                            <ul class="footer-contact-info">
                                <li>
                                    <div class="icon-holder">
                                        <span class="flaticon-pin"></span>
                                    </div>
                                    <div class="text-holder">
                                        <h5>Армения <br> 01 25</h5>
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
                                        <h5>Пн-суббота: 9am to 18pm</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-widget clearfix">
                            <div class="title">
                                <h3>Подписатся</h3>
                                <span class="border"></span>
                            </div>
                            <form class="appointment-form" action="#">
                                <div class="input-box">
                                    <input type="text" name="form_name" value="" placeholder="Имя" required="">
                                    <div class="icon-box">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <input type="email" name="form_email" value="" placeholder="Email" required="">
                                    <div class="icon-box">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <textarea name="form_message" placeholder="Текст" required="" aria-required="true"></textarea>
                                </div>
                                <button type="submit">Отправить</button>
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
        <!-- gmap helper -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>
        <!--gmap script-->
        <script src="{{asset('/medshop/js/gmaps.js')}}"></script>
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
