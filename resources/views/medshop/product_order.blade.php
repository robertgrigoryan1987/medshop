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
                                <th class="prod-column">Товары</th>
                                <th>&nbsp;</th>
                                <th>Количество</th>
                                <th class="availability">Доступность</th>
                                <th class="price">Цена</th>
                                <th>Всего</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_orders as $product)
                            <tr>
                                <td colspan="2" class="prod-column">
                                    <div class="column-box">
                                        <div class="prod-thumb">
                                            <a href="#"><img src="/storage/{{$product->image}}" alt=""></a>
                                        </div>
                                        <div class="title">
                                            <h3 class="prod-title">{{$product->getTranslatedAttribute('product_name',config('app.locale'),config('voyager.multilingual.default'))}}</h3>
                                        </div>
                                    </div>
                                </td>
                                <td class="qty">
                                    <div id="input_div">
                                        <input type="text" value="{{$product->quantity}}" name="quantity" class="count" data-id="{{$product->id}}">
                                        <input type="button" value="-" class="quantity-moins" >
                                        <input type="button" value="+" class="quantity-plus" >
                                    </div>
                                </td>
                                <td class="unit-price">
                                    <div class="available-info">
                                        <span class="icon fa fa-check"></span>Предмет(ы)<br>доступны сейчас
                                    </div>
                                </td>
                                <td class="price">{{$product->product_price}}</td>
                                <td class="sub-total">{{$product->product_price * $product->quantity}}</td>
                                <td>
                                    <div class="remove">
                                        <div class="checkbox">
                                            <label>
                                                <input name="remove" type="checkbox">
                                                <span>Удалить</span>
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
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="apply-coupon">
                        <button class="thm-btn bgclr-1 checkout-btn"><a href="{{route('ordering_cart')}}">Оформить заказ</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
