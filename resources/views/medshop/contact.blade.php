@extends('layouts.main')

@section('content')
    <section class="breadcrumb-area" style="background-image: url(/medshop/images/resources/breadcrumb-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h1>Контакт</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="left pull-left">
                            <ul>
                                <li><a href="index-2.html">Глваная</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">Контакт</li>
                            </ul>
                        </div>
                        <div class="right pull-right">
                            <a href="#">
                                <span><i class="fa fa-share-alt" aria-hidden="true"></i>Share</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form">
                        <form id="contact-form" name="contact_form" class="default-form" action="http://st.ourhtmldemo.com/new/Hospitals/inc/sendmail.php" method="post">
                            <h2>Записаться</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="form_name" value="" placeholder="Имя*" required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="form_email" value="" placeholder="ЕMail*" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="form_phone" value="" placeholder="Телефон">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="form_subject" value="" placeholder="Тема">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="form_message" placeholder="Текст" required=""></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button class="thm-btn bgclr-1" type="submit" data-loading-text="Please wait...">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="quick-contact">
                        <div class="title">
                            <h2>Быстрый контакт</h2>
                            <p>Если у вас есть какие-либо вопросы, просто используйте следующие контактные данные.</p>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-pin"></span>
                                </div>
                                <div class="text-holder">
                                    <h5><span>Адрес</span> 121, Армения <br>Армения</h5>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-technology"></span>
                                </div>
                                <div class="text-holder">
                                    <h5><span>Телефон:</span> (123) 0200 12345 &<br>1800-45-678-9012</h5>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-interface"></span>
                                </div>
                                <div class="text-holder">
                                    <h5><span>Электронная почта:</span> Армения@Армения.com</h5>
                                </div>
                            </li>
                        </ul>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="contact-map-area">
        <div class="container-fluid">
            <div class="google-map-inner">
                <div class="google-map" id="contact-google-map" data-map-lat="44.529688" data-map-lng="-72.933009" data-icon-path="images/resources/map-marker.png" data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="12" data-markers='{
                    "marker-1": [44.529688, -72.933009, "<h4>Head Office</h4><p>44/77 Alabama, a western U.S.A</p>"]
                }'>
                </div>
            </div>
        </div>
    </section>

@endsection