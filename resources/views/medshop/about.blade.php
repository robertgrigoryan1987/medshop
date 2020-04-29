@extends('layouts.main')

@section('content')
    <section class="breadcrumb-area" style="background-image: url(images/resources/breadcrumb-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h1>@lang('main.about-us')</h1>
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
                                <li><a href="index-2.html">@lang('main.general')</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">@lang('main.about-us')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="welcome-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-holder">
                        <img src="/medshop/images/resources/welcome.jpg" alt="Awesome Image">
                    </div>
                    <div class="inner-content">
                        <p>В качестве третичного направления ICU, чтобы обеспечить современное обслуживание с помощью очень хороших</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-holder">
                        <div class="title">
                            <h1>@lang('main.welcome')</h1>
                            <p>Это давно установленный факт, что читатель будет отвлечен читаемым контентом, более или менее нормальным распределением букв против.</p>
                        </div>
                        <ul>
                            <li>
                                <div class="single-item">
                                    <div class="iocn-box">
                                        <span class="flaticon-shapes"></span>
                                    </div>
                                    <div class="text-box">
                                        <h3>Добро пожаловать</h3>
                                        <p>Это давно установленный факт, что читатель будет отвлечен читаемым контентом, более или менее нормальным распределением букв против.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-item">
                                    <div class="iocn-box">
                                        <span class="flaticon-technology-2"></span>
                                    </div>
                                    <div class="text-box">
                                        <h3>Добро пожаловать</h3>
                                        <p>Это давно установленный факт, что читатель будет отвлечен читаемым контентом, более или менее нормальным распределением букв против.</p>
                                        <div class="text">
                                            <p><i class="fa fa-hand-o-right"></i>Идея осуждения удовольствия и восхваления.</p>
                                            <p><i class="fa fa-hand-o-right"></i>Идея осуждения удовольствия и восхваления.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="special-features-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-item">
                        <div class="icon-box">
                            <span class="flaticon-transport"></span>
                        </div>
                        <div class="text-box">
                            <h3>Служба поддержки</h3>
                            <p>Есть кто-нибудь, кто любит или преследует или получает боль от себя, потому что это только потому, что иногда.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single-item">
                        <div class="icon-box">
                            <span class="flaticon-drink"></span>
                        </div>
                        <div class="text-box">
                            <h3>Служба поддержки</h3>
                            <p>Есть кто-нибудь, кто любит или преследует или получает боль от себя, потому что это только потому, что иногда.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single-item">
                        <div class="icon-box">
                            <span class="flaticon-avatar"></span>
                        </div>
                        <div class="text-box">
                            <h3>Служба поддержки</h3>
                            <p>Есть кто-нибудь, кто любит или преследует или получает боль от себя, потому что это только потому, что иногда.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-item">
                        <div class="icon-box">
                            <span class="flaticon-church"></span>
                        </div>
                        <div class="text-box">
                            <h3>Служба поддержки</h3>
                            <p>Есть кто-нибудь, кто любит или преследует или получает боль от себя, потому что это только потому, что иногда.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-item">
                        <div class="icon-box">
                            <span class="flaticon-phone"></span>
                        </div>
                        <div class="text-box">
                            <h3>Служба поддержки</h3>
                            <p>Есть кто-нибудь, кто любит или преследует или получает боль от себя, потому что это только потому, что иногда.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-item">
                        <div class="icon-box">
                            <span class="flaticon-medical-2"></span>
                        </div>
                        <div class="text-box">
                            <h3>Служба поддержки</h3>
                            <p>Есть кто-нибудь, кто любит или преследует или получает боль от себя, потому что это только потому, что иногда.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="slogan-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title pull-left">
                        <h2>Если вы пациент, ищущий качественную медицинскую помощь по доступным ценам!</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="project-faq-area sec-padding">
        <div class="container">
            <div class="sec-title mar0auto text-center">
                <h1>@lang('main.frequently-questions')</h1>
                <span class="border"></span>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="latest-project">
                        <div class="single-project-item">
                            <div class="img-holder">
                                <img src="/medshop/images/projects/latest-project-1.jpg" alt="Awesome Image">

                            </div>
                        </div>
                        <div class="single-project-item">
                            <div class="img-holder">
                                <img src="/medshop/images/projects/latest-project-2.jpg" alt="Awesome Image">
                            </div>
                        </div>
                        <div class="single-project-item">
                            <div class="img-holder">
                                <img src="/medshop/images/projects/latest-project-3.jpg" alt="Awesome Image">
                            </div>
                        </div>
                        <div class="single-project-item">
                            <div class="img-holder">
                                <img src="/medshop/images/projects/latest-project-4.jpg" alt="Awesome Image">
                            </div>
                        </div>
                        <div class="single-project-item">
                            <div class="img-holder">
                                <img src="/medshop/images/projects/latest-project-5.jpg" alt="Awesome Image">
                            </div>
                        </div>
                        <div class="single-project-item">
                            <div class="img-holder">
                                <img src="/medshop/images/projects/latest-project-6.jpg" alt="Awesome Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="faq-content">
                        <div class="accordion-box">
                            <div class="accordion accordion-block">
                                <div class="accord-btn">
                                    <h4>Какие часы работы?</h4>
                                </div>
                                <div class="accord-content">
                                    <p>Если вы пациент, ищущий качественную медицинскую помощь по доступным ценам</p>
                                </div>
                            </div>
                            <div class="accordion accordion-block">
                                <div class="accord-btn active">
                                    <h4>Какие часы работы?</h4>
                                </div>
                                <div class="accord-content collapsed">
                                    <p>Если вы пациент, ищущий качественную медицинскую помощь по доступным ценам</p>
                                </div>
                            </div>
                            <div class="accordion accordion-block last">
                                <div class="accord-btn last">
                                    <h4>Какие часы работы?</h4>
                                </div>
                                <div class="accord-content">
                                    <p>Если вы пациент, ищущий качественную медицинскую помощь по доступным ценам</p>
                                </div>
                            </div>
                            <div class="accordion accordion-block">
                                <div class="accord-btn">
                                    <h4>Какие часы работы?</h4>
                                </div>
                                <div class="accord-content">
                                    <p>Если вы пациент, ищущий качественную медицинскую помощь по доступным ценам</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fact-counter-area black-bg" style="background-image:url(images/resources/fact-counter-bg-v2.jpg);">
        <div class="container">
            <div class="sec-title text-center">
                <h1>Держите <span>Голову</span> И Будьте Терпеливы</h1>
                <p>Как родилась вся эта ошибочная идея осуждения удовольствия и восхваления боли, и я дам вам полный отчет о
                    <br> системе и изложу истинные учения великого.</p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul>
                        <li>
                            <div class="single-item text-center">
                                <div class="icon-holder">
                                    <span class="flaticon-medical"></span>
                                </div>
                                <h1><span class="timer" data-from="1" data-to="25" data-speed="5000" data-refresh-interval="50">25</span></h1>
                                <h3>Годы Опыта</h3>
                            </div>
                        </li>
                        <li>
                            <div class="single-item text-center">
                                <div class="icon-holder">
                                    <span class="flaticon-smile"></span>
                                </div>
                                <h1><span class="timer" data-from="1" data-to="284" data-speed="5000" data-refresh-interval="50">284</span></h1>
                                <h3>Годы Опыта</h3>
                            </div>
                        </li>
                        <li>
                            <div class="single-item text-center">
                                <div class="icon-holder">
                                    <span class="flaticon-medical-1"></span>
                                </div>
                                <h1><span class="timer" data-from="1" data-to="176" data-speed="5000" data-refresh-interval="50">176</span></h1>
                                <h3>Годы Опыта</h3>
                            </div>
                        </li>
                        <li>
                            <div class="single-item text-center">
                                <div class="icon-holder">
                                    <span class="flaticon-ribbon"></span>
                                </div>
                                <h1><span class="timer" data-from="1" data-to="142" data-speed="5000" data-refresh-interval="50">142</span></h1>
                                <h3>Годы Опыта</h3>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <section class="certificates-area">
        <div class="container">
            <div class="sec-title">
                <h1>@lang('main.awards')</h1>
                <span class="border"></span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="certificates">
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/1.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/2.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/3.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/4.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/1.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/2.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/3.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/4.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/1.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/2.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/3.jpg" alt="Awesome Image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="single-item">
                                <img src="/medshop/images/certificates/4.jpg" alt="Awesome Image">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
