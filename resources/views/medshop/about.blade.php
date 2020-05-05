@extends('layouts.main')

@section('content')
    <section class="breadcrumb-area" style="background-image: url(/medshop/images/resources/breadcrumb-bg.jpg);">
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
                        <img src="/storage/{{$about_headers->image}}" alt="Awesome Image">
                    </div>
                    <div class="inner-content">
                        <p>{{$about_headers->getTranslatedAttribute('image_text',config('app.locale'),config('voyager.multilingual.default'))}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-holder p-15">
                        <div >
                            <h1 class="title">@lang('main.welcome')</h1>
                            <p>{{$about_headers->getTranslatedAttribute('header',config('app.locale'),config('voyager.multilingual.default'))}}</p>
                        </div>
                        <ul>
                            <li>
                                <div class="single-item">
                                    <div class="iocn-box">
                                        <span class="{{$about_headers->first_icon}}"></span>
                                    </div>
                                    <div class="text-box">
                                        <h3>{{$about_headers->getTranslatedAttribute('first_title',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                        <p>{{$about_headers->getTranslatedAttribute('first_text',config('app.locale'),config('voyager.multilingual.default'))}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-item">
                                    <div class="iocn-box">
                                        <span class="{{$about_headers->second_icon}}"></span>
                                    </div>
                                    <div class="text-box pb-30">
                                        <h3>{{$about_headers->getTranslatedAttribute('second_title',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                        <p>{{$about_headers->getTranslatedAttribute('second_text',config('app.locale'),config('voyager.multilingual.default'))}}</p>
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
            @foreach($about_services as $about_service)
                @if($about_service->id%2)
                    <div class="col-md-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <span class="{{$about_service->icon_name}}"></span>
                            </div>
                            <div class="text-box">
                                <h3>{{$about_service->getTranslatedAttribute('title',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                <p>{{$about_service->getTranslatedAttribute('text',config('app.locale'),config('voyager.multilingual.default'))}}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <span class="{{$about_service->icon_name}}"></span>
                            </div>
                            <div class="text-box">
                                <h3>{{$about_service->getTranslatedAttribute('title',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                <p>{{$about_service->getTranslatedAttribute('text',config('app.locale'),config('voyager.multilingual.default'))}}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
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
            <div class="row white pt-30">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="latest-project">
                        @foreach($about_questions_images as $about_questions_image)
                            <div class="single-project-item">
                                <div class="img-holder ">
                                    <img src="/storage/{{$about_questions_image->image}}" alt="Awesome Image">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="faq-content">
                        <div class="accordion-box">
                            @foreach($about_faquestions as $about_faquestion)
                                @if($about_faquestion->id%5 == 1)
                                    <div class="accordion accordion-block">
                                        <div class="accord-btn active">
                                            <h4>{{$about_faquestion->getTranslatedAttribute('question',config('app.locale'),config('voyager.multilingual.default'))}}</h4>
                                        </div>
                                        <div class="accord-content collapsed">
                                            <p>{{strip_tags($about_faquestion->getTranslatedAttribute('answere',config('app.locale'),config('voyager.multilingual.default')))}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="accordion accordion-block">
                                        <div class="accord-btn">
                                            <h4>{{$about_faquestion->getTranslatedAttribute('question',config('app.locale'),config('voyager.multilingual.default'))}}</h4>
                                        </div>
                                        <div class="accord-content">
                                            <p>{{strip_tags($about_faquestion->getTranslatedAttribute('answere',config('app.locale'),config('voyager.multilingual.default')))}}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
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
                        @foreach($about_experiences as $about_experience)
                            <li>
                                <div class="single-item text-center">
                                    <div class="icon-holder">
                                        <span class="{{$about_experience->icon_name}}"></span>
                                    </div>
                                    <h1><span class="timer" data-from="1" data-to="{{$about_experience->count}}" data-speed="5000" data-refresh-interval="50">{{$about_experience->count}}</span></h1>
                                    <h3>{{$about_experience->getTranslatedAttribute('title',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </section>
    @if($about_avards->isEmpty())
        <section class="p-15"></section>
    @else
        <section class="certificates-area">
            <div class="container">
                <div class="sec-title">
                    <h1>@lang('main.awards')</h1>
                    <span class="border"></span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="certificates">
                            @foreach($about_avards as $about_avard)
                                <div class="single-item">
                                    <img src="/storage/{{$about_avard->image}}" alt="Awesome Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
