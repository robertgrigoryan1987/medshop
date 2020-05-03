@extends('layouts.main')

@section('content')
    <section class="single-shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                    <span class="price">{{$product->price}} AMD</span>

                                    @if($product->active_substance != null)
                                        <h3><strong>@lang('main.active_sub')։ </strong>{{$product->getTranslatedAttribute('active_substance',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                    @endif

                                    @if($product->aftor != null)
                                        <h3><strong>@lang('main.aftor')։ </strong>{{$product->getTranslatedAttribute('aftor',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                    @endif

                                    @if($product->count != null)
                                        <h3><strong>@lang('main.count')։ </strong>{{$product->count}}</h3>
                                    @endif
                                    <div class="text">
                                        <p>{{$product->getTranslatedAttribute('description',config('app.locale'),config('voyager.multilingual.default'))}}</p>
                                    </div>

                                        <div class="location-box">
                                            @if($product->hatavachar != null)
                                                <div class="radio">
                                                    <input id="packet" name="sort" type="radio" class="ml-40" checked>
                                                    <label for="packet" class="radio-label">@lang('main.packet')</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="piece" name="sort" type="radio" class="ml-40" data-singlprice="{{$product->hatavachar}}">
                                                    <label  for="piece" class="radio-label">@lang('main.piece')</label>
                                                </div>
                                            @endif
                                            <button class="thm-btn bgclr-1 addtocart shoping-cart"  data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-image="{{$product->image_path}}">@lang('main.add-to-card') <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
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
                            @foreach($popular_products as $popular_product)
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-product-item">
                                        <div class="img-holder">
                                            <img src="/storage/{{$popular_product->image_path}}" alt="Awesome Product Image">
                                            <div class="overlay-style-one">
                                                <div class="box">
                                                    <div class="content">
                                                        <a class="thm-btn bgclr-1 shoping-cart" data-id="{{$popular_product->id}}" data-name="{{$popular_product->name}}" data-price="{{$popular_product->price}}" data-image="{{$popular_product->image_path}}">@lang('main.add-to-card') <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title-holder">
                                            <div class="top clearfix">
                                                <div class="product-title pull-left">
                                                    <a href="/{{config('app.locale')}}/product/{{$popular_product->id}}">
                                                        <h5>{{$popular_product->getTranslatedAttribute('name',config('app.locale'),config('voyager.multilingual.default'))}}</h5>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-value">
                                                <h4>{{$popular_product->price}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    $( document ).ready(function() {

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#piece").click(function (e) {
            e.preventDefault();
            console.log("radio click");
            var singl_price = $(this).data("singlprice");
            console.log(singl_price);


        })
    })
</script>
