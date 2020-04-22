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
                                        <p>:</p>
                                        <form action="#">
                                            <input type="text" placeholder="???">
                                            <button type="submit"></button><br />
                                            <span></span>
                                        </form>
                                    </div>
                                    <div class="addto-cart-box clearfix">
                                        <input class="quantity-spinner" type="text" value="2" name="quantity">
                                        <button class="thm-btn bgclr-1 addtocart" type="submit">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-tab-box">
                                <ul class="nav nav-tabs tab-menu">
                                    <li><a href="#desc" data-toggle="tab">????????</a></li>
                                    <li class="active"><a href="#review" data-toggle="tab">?????? (2)</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="desc">
                                        <div class="product-details-content">
                                            <div class="desc-content-box">
                                                <p></p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane active" id="review">
                                        <div class="review-box">
                                            <div class="title">
                                                <h3></h3>
                                            </div>
                                            <div class="single-review-box">
                                                <div class="img-holder">
                                                    <img src="images/shop/review-1.jpg" alt="Awesome Image">
                                                </div>
                                                <div class="text-holder">
                                                    <div class="top">
                                                        <div class="name pull-left">
                                                            <h4> - 01 04 2020 </h4>
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
                                                    <div class="text">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-review-box">
                                                <div class="img-holder">
                                                    <img src="images/shop/review-2.jpg" alt="Awesome Image">
                                                </div>
                                                <div class="text-holder">
                                                    <div class="top">
                                                        <div class="name pull-left">
                                                            <h4>Date - 01 04 2020 </h4>
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
                                                    <div class="text">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End single review box-->
                                        </div>
                                        <div class="review-form">
                                            <div class="title">
                                                <h3></h3>
                                            </div>
                                            <form id="review-form" action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="field-label">
                                                            <p>???</p>
                                                            <input type="text" name="fname" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="field-label">
                                                            <p>Test</p>
                                                            <input type="text" name="lname" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="field-label">
                                                            <p>Email*</p>
                                                            <input type="email" name="email" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="field-label">
                                                            <p>Test</p>
                                                            <textarea name="review" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button class="thm-btn bgclr-1" type="submit">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-product">
                        <div class="sec-title pdb-50">
                            <h1></h1>
                            <span class="border"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-product-item">
                                    <div class="img-holder">
                                        <img src="images/shop/1.jpg" alt="Awesome Product Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a class="thm-btn bgclr-1" href="shopping-cart.html">???????? ? ???????</a>
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
                                        <img src="images/shop/2.jpg" alt="Awesome Product Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a class="thm-btn bgclr-1" href="shopping-cart.html">???????? ? ???????</a>
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
                                        <img src="images/shop/3.jpg" alt="Awesome Product Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a class="thm-btn bgclr-1" href="shopping-cart.html">???????? ? ???????</a>
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
                <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12 pull-left">
                    <div class="sidebar-wrapper">
                        <div class="single-sidebar">
                            <form class="search-form" action="#">
                                <input placeholder="?????" type="text">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>Category</h3>
                            </div>
                            <ul class="categories clearfix">
                                @foreach($categories  as $item)
                                    @if($item->children->count() > 0)
                                        <li>
                                            <a >{{ $item->name }} <span class="caret"></span></a>
                                            <ul>
                                                @foreach($item->children as $submenu)
                                                    <li><a href="{{route('shop')}}/{{$submenu->id}}">{{ $submenu->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{route('shop')}}/{{$item->id}}">{{ $item->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>Test</h3>
                            </div>
                            <div class="price-ranger">
                                <div id="slider-range"></div>
                                <div class="ranger-min-max-block">
                                    <input type="submit" value="?????">
                                    <span>????:</span>
                                    <input type="text" readonly class="min">
                                    <span>-</span>
                                    <input type="text" readonly class="max">
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3></h3>
                            </div>
                            <ul class="popular-product">
                                <li>
                                    <div class="img-holder">
                                        <img src="images/shop/product-thumb-1.jpg" alt="Awesome Image">
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
                                        <img src="images/shop/product-thumb-2.jpg" alt="Awesome Image">
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
                                        <img src="images/shop/product-thumb-3.jpg" alt="Awesome Image">
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