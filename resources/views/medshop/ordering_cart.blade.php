@extends('layouts.main')

@section('content')

    <section class="cart-area">
        <div class="container">
            <div class="row cart-middle">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="apply-coupon">
                        <input type="text" name="coupon-code" value="" placeholder="Код купона">
                        <div class="apply-coupon-button">
                            <button class="thm-btn bgclr-1" type="button">Применить купон</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cart-bottom">
                <div class="col-md-6">
                    <div class="calculate-shipping">
                        <div class="sec-title">
                            <h1>Tvyalner</h1>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form name="customer_acount" action="/ordering" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <select class="selectmenu" name="city">
                                <option selected="selected">Ереван</option>
                                <option>Ереван</option>
                                <option>Ереван</option>
                                <option>Ереван</option>
                            </select>

                            <div class="row">
                            <div class="col-lg-6">
                                <input class="mar-bottom" type="text" placeholder="Address" name="address" value="<?= isset(Auth::user()->user) ? Auth::user()->user->address : '' ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <input class="zip-code" type="text" placeholder="Почтовый Индекс" name="post_index" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="mar-bottom" type="text" placeholder="Email" name="email" value="<?= isset(Auth::user()->user) ? Auth::user()->user->email : '' ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <input class="zip-code" type="text" placeholder="Phone" name="phone" value="<?= isset(Auth::user()->user) ? Auth::user()->user->phone : '' ?>" required>
                            </div>
                        </div>
                            <input type="hidden" name="sum" value="{{$sum}}">

                            <button class="thm-btn bgclr-1 checkout-btn" type="submit">Pay</button>
                        </form>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="cart-total">
                        <div class="sec-title">
                            <h1>Итоги Корзины</h1>
                        </div>
                        <ul class="cart-total-table">
                            <li class="clearfix">
                                <span class="col col-title">Итого по корзине</span>
                                <span class="col">{{$sum}}</span>
                            </li>
                            <li class="clearfix">
                                <span class="col col-title">Доставка и обработка</span>
                                <span class="col">$40.00- <b>Общая</b></span>
                            </li>
                            <li class="clearfix">
                                <span class="col col-title">Заказа</span>
                                <span class="col">{{$sum+40}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
