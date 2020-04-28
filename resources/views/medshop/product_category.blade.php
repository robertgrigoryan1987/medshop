@extends('layouts.main')

@section('content')
    <section class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 pull-right">
                    <div class="shop-content">
                        <div class="row showing-result-shorting">
                            <div class="col-md-12">
                                <div class="shorting pull-right">
                                    <select class="selectmenu">
                                        <option selected="selected">Сортировка По Умолчанию</option>
                                        <option>Сортировка По Умолчанию</option>
                                        <option>Сортировка По Умолчанию</option>
                                        <option>Сортировка По Умолчанию</option>
                                    </select>
                                </div>
                                <div class="showing pull-left">
                                    <p>Показано 1-9 из 12 результатов</p>
                                </div>
                            </div>
                        </div>

                        <?php $count = 1; $products_count = count($products); ?>

                        @foreach($products as $product)

                            @if(($count-1)%3 === 0)
                                <div class="row product-row">
                                    @endif
                                    <div class="col-md-4 col-sm-12 col-xs-12">

                                        <div class="single-product-item">
                                            <div class="img-holder">
                                                <img src="/storage/{{$product->image_path}}" alt="">
                                                <div class="overlay-style-one">
                                                    <div class="box">
                                                        <div class="content">
                                                            <a class="thm-btn bgclr-1 shoping-cart" data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-image="{{$product->image_path}}" href="#">Добавить в корзину</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title-holder">
                                                <div class="top clearfix">
                                                    <div class="product-title pull-left">
                                                        <a href="/product/{{$product->id}}">
                                                            <h5>{{$product->name}}</h5>
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
                                <input placeholder="Поиск" type="text">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>Категории</h3>
                            </div>

                            <ul class="categories clearfix">
                                @foreach($categories  as $item)
                                    @if($item->children->count() > 0)
                                        <li>
                                            <a >{{ $item->name }} <span class="caret"></span></a>

                                            <ul>
                                                @foreach($item->children as $submenu)
                                                    <li><a href="/products/{{$submenu->id}}">{{ $submenu->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="/products/{{$item->id}}">{{ $item->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>Фильтровать По Цене</h3>
                            </div>
                            <div class="price-ranger">
                                <div id="slider-range"></div>
                                <div class="ranger-min-max-block">
                                    <input type="submit" value="Филтр">
                                    <span>Цена:</span>
                                    <input type="text" readonly class="min">
                                    <span>-</span>
                                    <input type="text" readonly class="max">
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>Популярные Товары</h3>
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