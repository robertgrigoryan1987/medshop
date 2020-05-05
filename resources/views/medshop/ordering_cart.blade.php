@extends('layouts.main')

@section('content')
    <section class="checkout-area">
        <div class="container">
            @if(Auth::user() == null)
                <div class="row">
                    <div class="col-md-12">
                        <div class="exisitng-customer">
                            <h5>@lang('main.do-you-have-an-account')<a href="{{route('login')}}">@lang('main.login-now')</a></h5>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row cart-area mb-30 " id="cart-area-ordering">
                <div class="col-md-12">
                    <div class="table-outer">
                        <table class="cart-table">
                            <thead class="cart-header">
                            <tr>
                                <th class="prod-column">@lang('main.items')</th>
                                <th></th>
                                <th>@lang('main.quantity')</th>
                                <th class="price">@lang('main.price')</th>
                                <th>@lang('main.total')</th>
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
                                        <div id="input_div ">
                                            <input type="text" value="{{$product->quantity}}" disabled class="count fbord ml-40" data-id="{{$product->id}}">
                                        </div>
                                    </td>
                                    <td class="price"><span>{{$product->product_price}}</span></td>
                                    <td class="sub-total"><span>{{$product->product_price * $product->quantity}}</span><span class="single-currency"> AMD</span></td>
                                </tr>
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form billing-info">
                            <div class="sec-title pdb-50">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <h1>@lang('main.shipping-information')</h1>
                                <span class="border"></span>
                            </div>
                        <form action="/ordering" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="field-label">@lang('main.name')</div>
                                        <div class="field-input">
                                            <input type="text" required  name="name" placeholder="@lang('main.your-name')" value=" <?= Auth::user() != null ? Auth::user()->name : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="field-label">@lang('main.phone')</div>
                                        <div class="field-input">
                                            <input type="text" required name="phone" placeholder="@lang('main.your-phone')" value=" <?= Auth::user() != null ? Auth::user()->phone : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="field-label">@lang('main.email')</div>
                                        <div class="field-input">
                                            <input type="text" required  name="email" placeholder="@lang('main.your-email')" value=" <?= Auth::user() != null ? Auth::user()->email : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="field-label">@lang('main.address')</div>
                                        <div class="field-input">
                                            <input type="text" required name="address" placeholder="@lang('main.your-address')" value=" <?= Auth::user() != null ? Auth::user()->address : '' ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="field-label">@lang('main.index')</div>
                                        <div class="field-input">
                                            <input  type="text" required name="post_index"  placeholder="@lang('main.index')" value="<?= Auth::user() != null ? Auth::user()->post_index : '' ?>">
                                        </div>
                                    </div>
                                    <div class="">
                                        <ul class="cart-total-table">
                                            <li class="clearfix">
                                                <span class="col col-title"><h3>@lang('main.pre-result')</h3></span>
                                                <span class="col"><h4 class="single-price">{{$sum}}</h4> <span class="single-currency"> AMD</span></span>

                                                <span class="col col-title"><h3>@lang('main.delivery-and-handling')</h3></span>
                                                <span class="col"><h4 class="single-price">{{$araqum_sum}}</h4><span class="single-currency"> AMD</span></span>

                                                <span class="col col-title"><h3>@lang('main.total')</h3></span>
                                                <span class="col"><h4 class="single-price">{{$sum + $araqum_sum}}</h4><span class="single-currency"> AMD</span></span>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <h3>@lang('main.payment-type')</h3>
                                        <input  type="radio" checked name="pay" value="cash" id="cash"/>
                                        <label class="cash" for="cash">@lang('main.online')</label>

                                        <input  type="radio" name="pay" value="non_cash" id="no_cash"/>
                                        <label class="cash" for="no_cash">@lang('main.cash')</label>
                                    </div>
                                    <div class="payment-options ml-10">
                                        <div class="option-block"></div>
                                        <div class="option-block">
                                            <div class="radio-block cc-selector">
{{--                                                <input  type="radio" name="payment_type" value="ameria" id="visa" class="pl-40 pl-xs-0 pl-sm-0"/>--}}
{{--                                                <label class="drinkcard-cc visa" for="visa"></label>--}}

                                                <input  type="radio" name="payment_type" value="idram" id="idram"/>
                                                <label class="drinkcard-cc idram" for="idram"></label>

                                                <input  type="radio" name="payment_type" value="telcell" id="telcell"/>
                                                <label class="drinkcard-cc telcell" for="telcell"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="sum" value="{{$sum+$araqum_sum}}">
                                    <div class="placeorder-button text-left ">
                                        <button class="thm-btn bgclr-1 checkbutton" type="submit">@lang('main.pay')</button>
                                    </div>
                                </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
            </div>
        </div>
    </section>
@endsection
