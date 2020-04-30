
@extends('layouts.main')

@section('content')

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

    <section class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 pull-right">
                    <div class="shop-content">
                        <div class="row showing-result-shorting">
                            <div class="col-md-12"></div>
                        </div>
                        <?php $count = 1; $products_count = count($products); ?>
                        @foreach($products as $product)

                            @if(($count-1)%3 === 0)
                                <div class="row product-row">
                                    @endif
                                    <div class="col-md-4 col-sm-6 col-xs-6">

                                        <div class="single-product-item">
                                            <div class="img-holder">
                                                <img src="/storage/{{$product->image_path}}" alt="">
                                                <div class="overlay-style-one">
                                                    <div class="box">
                                                        <div class="content">
                                                            <a class="thm-btn bgclr-1 shoping-cart" data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-image="{{$product->image_path}}">@lang('main.add-to-card') <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title-holder">
                                                <div class="top clearfix">
                                                    <div class="product-title pull-left">
                                                        <a href="/{{config('app.locale')}}/product/{{$product->id}}">
                                                            <h5>{{$product->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default'))}}</h5>
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
                                                    <h4>{{$product->price}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if( ($count%3 === 0 || $count==$products_count))
                                </div>
                            @endif
                            <?php $count++; ?>
                        @endforeach

                        <div class="row">
                            <div class="col-md-12">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12 pull-left">
                    <div class="sidebar-wrapper">
                        <div class="single-sidebar">
                            <form class="search-form" action="#">
                                <input placeholder="@lang('main.search')" type="text">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>@lang('main.category')</h3>
                            </div>
                            <div class="ui sidebar vertical left menu overlay visible" style="-webkit-transition-duration: 0.1s; overflow: visible !important;">
                                <div class="ui accordion">
                                    @foreach($categories  as $item)
                                        @if($item->children->count() > 0)
                                            <div class="title item">
                                                <i class="dropdown icon"></i>{{ $item->name }}
                                            </div>
                                            <div class="content">
                                                @foreach($item->children as $submenu)
                                                    <a href="/{{config('app.locale')}}/products/{{$submenu->id}}">{{ $submenu->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</a>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="title item">
                                                <i class="dropdown icon"></i>{{ $item->name }}
                                            </div>
                                            <div class="content">
                                                <a href="/{{config('app.locale')}}/products/{{$item->id}}">{{ $item->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default')) }}</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>@lang('main.filter-price')</h3>
                            </div>
                            <div class="price-ranger">
                                <div id="slider-range"></div>
                                <div class="ranger-min-max-block">
                                    <input type="submit" value="@lang('main.filter')">
                                    <span>@lang('main.price')</span>
                                    <input type="text" readonly class="min">
                                    <span>-</span>
                                    <input type="text" readonly class="max">
                                </div>
                            </div>
                        </div>
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
                                            <h4>Injection Vial</h4>
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
                                            <h4>Supplement Tab</h4>
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
                                            <h4>Smiley Ball-24</h4>
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
