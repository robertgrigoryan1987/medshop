
@extends('layouts.main')

@section('content')
    <section class="home-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-30 mb-xs-0 mt-20 mt-xs-0">
                    <div class="dropdown" style="position:relative">
                        <a class="btn btn-primary dropdown-toggle" id="menu-primary" data-toggle="dropdown"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            @foreach($categories  as $item)
                                @if($item->children->count() > 0)
                                <li class="main">
                                    <a class="trigger right-caret" id="trigger">{{ $item->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</a>
                                    <ul class="dropdown-menu sub-menu">
                                        @foreach($item->children as $submenu)
                                            <li>
                                                <a id="trigger" href="/{{config('app.locale')}}/products/{{$submenu->id}}">{{ $submenu->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                    <li><a href="/{{config('app.locale')}}/products/{{$item->id}}">{{ $submenu->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
{{--                @foreach($categories  as $item)--}}
{{--                    @if($item->children->count() > 0)--}}
{{--                        <a href="#"><span class="ttl">{{ $item->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</span><span class="ttl_arrow"><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>--}}
{{--                        <ul>--}}
{{--                            @foreach($item->children as $submenu)--}}
{{--                                <li class="subitem1">--}}
{{--                                    <a href="/{{config('app.locale')}}/products/{{$submenu->id}}">{{ $submenu->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    @else--}}
{{--                        <a href="#"><span class="ttl">{{ $item->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</span><span class="ttl_arrow"><</span></a>--}}
{{--                        <ul>--}}
{{--                            <li class="subitem1">--}}
{{--                                <a href="/{{config('app.locale')}}/products/{{$item->id}}">{{ $submenu->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <section style="padding-top: 25px; padding-bottom: 25px;">
                        <div class="container">
                            <div class="row">
                                @foreach($categories  as $item)
                                <a  href="/{{config('app.locale')}}/product/category/{{$item->id}}">
                                    <div class="col-md-3 col-sm-12 col-xs-12" data-animation="fadeInDown" data-animation-delay="0">
                                        <div class="icon-box filled centered lg circled icon-box-animated-inverse">
                                            <div class="icon">
                                                <i class="fa fa-heartbeat"></i>
                                            </div>
                                            <div class="icon-box-body">
                                                <h3>{{ $item->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
{{--                                <a href="">--}}
{{--                                    <div class="col-md-3 col-sm-12 col-xs-12" data-animation="fadeInDown" data-animation-delay="200">--}}
{{--                                        <div class="icon-box filled centered lg circled icon-box-animated-inverse">--}}
{{--                                            <div class="icon">--}}
{{--                                                <i class="fa fa-plus-square" aria-hidden="true"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="icon-box-body">--}}
{{--                                                <h3>Лекарства</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a href="">--}}
{{--                                <div class="col-md-3 col-sm-12 col-xs-12" data-animation="fadeInDown" data-animation-delay="400">--}}
{{--                                        <div class="icon-box filled centered lg circled icon-box-animated-inverse">--}}
{{--                                            <div class="icon">--}}
{{--                                                <i class="fa fa-stethoscope" aria-hidden="true"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="icon-box-body">--}}
{{--                                                <h3>гигиена</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a href="">--}}
{{--                                    <div class="col-md-3 col-sm-12 col-xs-12" data-animation="fadeInDown" data-animation-delay="400">--}}
{{--                                        <div class="icon-box filled centered lg circled icon-box-animated-inverse">--}}
{{--                                            <div class="icon">--}}
{{--                                                <i class="fa fa-medkit" aria-hidden="true"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="icon-box-body">--}}
{{--                                                <h3>Мама и малыш</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
