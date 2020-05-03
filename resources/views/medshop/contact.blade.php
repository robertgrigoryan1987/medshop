@extends('layouts.main')

@section('content')
    <section class="breadcrumb-area" style="background-image: url(/medshop/images/resources/breadcrumb-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h1>@lang('main.contact-us')</h1>
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
                                <li class="active">@lang('main.contact-us')</li>
                            </ul>
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
                            <h2>@lang('main.send-us-message')</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="form_name" value="" placeholder="@lang('main.name')" required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="form_email" value="" placeholder="@lang('main.email')" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="form_phone" value="" placeholder="@lang('main.phone')">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="form_subject" value="" placeholder="@lang('main.subject')">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="form_message" placeholder="@lang('main.message')" required=""></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button class="thm-btn bgclr-1" type="submit" data-loading-text="Please wait...">@lang('main.send')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="quick-contact">
                        <div class="title">
                            <h2>@lang('main.quick-contact')</h2>
                            <p>@lang('main.questions')</p>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-pin"></span>
                                </div>
                                <div class="text-holder">
                                    <h5><span>@lang('main.address')</span> {{$contact_us->getTranslatedAttribute('address',config('app.locale'),config('voyager.multilingual.default'))}}</h5>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-technology"></span>
                                </div>
                                <div class="text-holder">
                                    <h5><span>@lang('main.phone'):</span> {{$contact_us->phone}}</h5>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-interface"></span>
                                </div>
                                <div class="text-holder">
                                    <h5><span>@lang('main.email'):</span> {{$contact_us->email}}</h5>
                                </div>
                            </li>
                        </ul>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="contact-map-area">
        <div class="container-fluid">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97584.07285756266!2d44.41852742901611!3d40.153369301056024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa2dab8fc8b5b%3A0x3d1479ae87da526a!2z0JXRgNC10LLQsNC9LCDQkNGA0LzQtdC90LjRjw!5e0!3m2!1sru!2s!4v1588141847532!5m2!1sru!2s"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </section>

@endsection
