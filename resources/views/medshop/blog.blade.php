@extends('layouts.main')

@section('content')
    <section class="breadcrumb-area" style="background-image: url(/medshop/images/resources/breadcrumb-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h1>@lang('main.blog')</h1>
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
                                <li class="active">@lang('main.blog')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="blog-area" class="blog-default-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-post">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-md-6">
                                <div class="single-blog-item wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                                    <div class="img-holder">
                                        <img src="/medshop/images/blog/blog-default-1.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="blog-single.html"><span class="flaticon-plus-symbol"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <a href="{{route('blog.show', $post->slug)}}">
                                            <h3 class="blog-title">{{$post->title}}</h3>
                                        </a>
                                        <div class="text">
                                            <p>{{$post->excerpt}}</p>
                                        </div>
                                        <ul class="meta-info">
                                            <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$post->getDate($post->created_at)}}</a></li>
                                            <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>21 Comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{$posts->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                    <div class="sidebar-wrapper">

                        <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                            <div class="sec-title">
                                <h3>@lang('main.popular-posts')</h3>
                            </div>
                            <ul class="popular-post">
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/popular-post-1.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <a href="#">
                                            <h5 class="post-title">Как справиться с загадочными <br> недугами ваших детей</h5>
                                        </a>
                                        <h6 class="post-date">01 04, 2020</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/popular-post-2.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <a href="#">
                                            <h5 class="post-title">Как справиться с загадочными <br> недугами ваших детей</h5>
                                        </a>
                                        <h6 class="post-date">01 04, 2020</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/popular-post-3.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <a href="#">
                                            <h5 class="post-title">Как справиться с загадочными <br> недугами ваших детей</h5>
                                        </a>
                                        <h6 class="post-date">01 04, 2020</h6>
                                    </div>
                                </li>


                            </ul>
                        </div>
                        <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                            <div class="sec-title">
                                <h3 class="pull-left">Instagram</h3>
                            </div>
                            <ul class="instagram">
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/instagram-1.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/instagram-2.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/instagram-3.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/instagram-4.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/instagram-5.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/sidebar/instagram-6.jpg" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                            <div class="sec-title">
                                <h3>Facebook</h3>
                            </div>
                            <div class="fb-feed">
                                <img src="/medshop/images/sidebar/facebook-feed.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
