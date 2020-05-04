@extends('layouts.main')

@section('content')
    <section class="cart-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-outer">
                        <table class="cart-table">
                            <thead class="cart-header">
                            <tr>
                                <th class="prod-column">@lang('main.items')</th>
                                <th>&nbsp;</th>
                                <th>@lang('main.quantity')</th>
                                <th class="price">@lang('main.price')</th>
                                <th>@lang('main.total')</th>
                                <th>@lang('main.delete')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_orders as $product)
                            <tr id="ordered-product-{{$product->id}}">
                                <td colspan="2" class="prod-column">
                                    <div class="column-box">
                                        <div class="prod-thumb mauto">
                                            <a href="#"><img src="/storage/{{$product->image}}" alt=""></a>
                                        </div>
                                        <div class="title">
                                            <h3 class="prod-title">{{$product->getTranslatedAttribute('product_name',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                        </div>
                                    </div>
                                </td>
                                <td class="qty">
                                    <div id="input_div ">
                                        <input type="button" value="-" class="quantity-moins minu" >
                                        <input type="text" value="{{$product->quantity}}" name="quantity" disabled class="count fbord" data-id="{{$product->id}}">
                                        <input type="button" value="+" class="quantity-plus minu" >
                                    </div>
                                </td>
                                <td class="price">{{$product->product_price}}</td>
                                <td class="sub-total">{{$product->product_price * $product->quantity}} <span class="single-currency"> AMD</span></td>
                                <td>
                                    <div class="remove">
                                        <div class="checkbox">
                                            <label>
                                                <span  data-id="{{$product->id}}" class="delete-order-product">X</span>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row cart-middle">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="apply-coupon rightt">
                        <button class="thm-btn bgclr-1 checkout-btn"><a href="{{route('ordering_cart')}}">@lang('main.checkout')</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
