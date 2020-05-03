@extends('layouts.main')

@section('content')
    <section id="blog-area" class="blog-single-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-post">
                        <div class="single-blog-item">
                            <div class="img-holder">
                                <img src="/storage/{{$post->image}}" alt="Awesome Image">
                            </div>
                            <div class="text-holder">
                                <h3 class="blog-title">{{$post->getTranslatedAttribute('title',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                <div class="text">
                                    <p>{{strip_tags($post->getTranslatedAttribute('body',config('app.locale'),config('voyager.multilingual.default')))}}</p>
                                </div>
                                <ul class="meta-info">
                                    <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$post->getDate($post->created_at)}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                    <div class="sidebar-wrapper">
                        <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                            <div class="sec-title">
                                <h3>Популярные Посты</h3>
                            </div>
                            <ul class="popular-post">
                                @foreach($popular_posts as $popular_post)
                                <li>
                                    <div class="img-holder">
                                        <img src="/storage/{{$popular_post->image}}" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="{{route('blog.show', $popular_post->slug)}}"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <a href="#">
                                            <h5 class="post-title">{{$popular_post->getTranslatedAttribute('title',config('app.locale'),config('voyager.multilingual.default'))}}</h5>
                                        </a>
                                        <h6 class="post-date">{{$popular_post->getDate($post->created_at)}}</h6>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                            <div class="sec-title">
                                <h3 class="pull-left">@lang('photo')</h3>
                            </div>
                            <ul class="instagram">
                                @foreach($blog_images as $blog_image)
                                <li>
                                    <div class="img-holder">
                                        <img src="/storage/{{$blog_image->image}}" alt="Awesome Image">
                                    </div>
                                </li>
                                @endforeach
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
