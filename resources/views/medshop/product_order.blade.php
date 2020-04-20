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
                                            <a href="#"><img src="storage/{{$product->image}}" alt=""></a>
                                        </div>
                                        <div class="title">
                                            <h3 class="prod-title">{{$product->product_name}}</h3>
                                        </div>
                                    </div>
                                </td>
                                <td class="qty">
                                    <input class="quantity-spinner" type="text" value="1" name="quantity">
                                </td>
                                <td class="unit-price">
                                    <div class="available-info">
                                        <span class="icon fa fa-check"></span>Предмет(ы)<br>доступны сейчас
                                    </div>
                                </td>
                                <td class="price">{{$product->product_price}}</td>
                                <td class="sub-total">$69.98</td>
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
                        <input type="text" name="coupon-code" value="" placeholder="Код купона">
                        <div class="apply-coupon-button">
                            <button class="thm-btn bgclr-1" type="button">Применить купон</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <div class="update-cart pull-right">
                        <button class="thm-btn bgclr-1" type="button">Обнавить корзину</button>
                    </div>
                </div>
            </div>
            <div class="row cart-bottom">
                <div class="col-md-6">
                    <div class="calculate-shipping">
                        <div class="sec-title">
                            <h1>Рассчитать Стоимость Доставки</h1>
                        </div>
                        <select class="selectmenu">
                            <option selected="selected">Ереван</option>
                            <option>Ереван</option>
                            <option>Ереван</option>
                            <option>Ереван</option>
                        </select>
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="mar-bottom" type="text" placeholder="Государство Страна" required>
                            </div>
                            <div class="col-lg-6">
                                <input class="zip-code" type="text" placeholder="Почтовый Индекс" required>
                            </div>
                        </div>
                        <button class="thm-btn bgclr-1" type="submit">Обновит Итог</button>
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
                                <span class="col">$146.00</span>
                            </li>
                            <li class="clearfix">
                                <span class="col col-title">Доставка и обработка</span>
                                <span class="col">$40.00- <b>Общая</b></span>
                            </li>
                            <li class="clearfix">
                                <span class="col col-title">Заказа</span>
                                <span class="col">$146.00</span>
                            </li>
                        </ul>
                        <button class="thm-btn bgclr-1 checkout-btn">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
