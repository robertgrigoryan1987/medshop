@extends('layouts.main')

@section('content')
    <section class="single-shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="single-shop-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="img-holder">
                                    <img src="/storage/{{$product->image_path}}" alt="Awesome Image" data-imagezoom="true" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-box">
                                    <h3>{{$product->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                    <div class="review-box">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half"></i></li>
                                        </ul>
                                    </div>
                                    <span class="price">$29.00</span>
                                    <div class="text">
                                        <p>{{$product->getTranslatedAttribute('description',config('app.locale'),config('voyager.multilingual.default'))}}</p>
                                    </div>
                                    <div class="location-box">
                                        <form action="#">
                                            <div class="radio">
                                                <input id="packet" name="sort" type="radio" class="ml-40" checked>
                                                <label for="packet" class="radio-label">@lang('main.packet')</label>
                                            </div>
                                            <div class="radio">
                                                <input id="piece" name="sort" type="radio" class="ml-40">
                                                <label  for="piece" class="radio-label">@lang('main.piece')</label>
                                            </div>
                                            <button class="thm-btn bgclr-1 addtocart" type="submit">@lang('main.add-to-card') <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="sec-title pdb-50">
                            <h1></h1>
                            <span class="border"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="/medshop/images/shop/1.jpg" alt="Awesome Product Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a class="thm-btn bgclr-1" href="shopping-cart.html">@lang('main.add-to-card') <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <div class="top clearfix">
                                            <div class="product-title pull-left">
                                                <a href="shop-single.html">
                                                    <h5>Glossy Iron Tablet</h5>
                                                </a>
                                            </div>
                                            <div class="review-box pull-right">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-value">
                                            <h4>$34.99</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="/medshop/images/shop/2.jpg" alt="Awesome Product Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a class="thm-btn bgclr-1" href="shopping-cart.html">@lang('main.add-to-card') <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <div class="top clearfix">
                                            <div class="product-title pull-left">
                                                <a href="shop-single.html">
                                                    <h5>Glossy Iron Tablet</h5>
                                                </a>
                                            </div>
                                            <div class="review-box pull-right">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-value">
                                            <h4>$44.99</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="/medshop/images/shop/3.jpg" alt="Awesome Product Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a class="thm-btn bgclr-1" href="shopping-cart.html">@lang('main.add-to-card') <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <div class="top clearfix">
                                            <div class="product-title pull-left">
                                                <a href="shop-single.html">
                                                    <h5>Glossy Iron Tablet</h5>
                                                </a>
                                            </div>
                                            <div class="review-box pull-right">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-value">
                                            <h4>$19.00</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-left">
                    <div class="sidebar-wrapper">
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>@lang('main.popular-item')</h3>
                            </div>
                            <ul class="popular-product">
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/shop/product-thumb-1.jpg" alt="Awesome Image">
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
                                            <h4></h4>
                                        </a>
                                        <h5>$34.99</h5>
                                        <div class="review-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/shop/product-thumb-2.jpg" alt="Awesome Image">
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
                                            <h4></h4>
                                        </a>
                                        <h5>$29.00</h5>
                                        <div class="review-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="/medshop/images/shop/product-thumb-3.jpg" alt="Awesome Image">
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
                                            <h4></h4>
                                        </a>
                                        <h5>$24.99</h5>
                                        <div class="review-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
