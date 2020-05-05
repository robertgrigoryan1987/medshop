@extends('layouts.main')

@section('content')
    <section class="profile-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                    <h1 class="title mb-20 mb-xs-0">@lang('main.your-orders')</h1>
                    <table class="containerr">
                        <thead>
                            <tr>
                                <th><h1>@lang('main.item-name')</h1></th>
                                <th><h1>@lang('main.quantity')</h1></th>
                                <th><h1>@lang('main.total')</h1></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($user_order_products -> isEmpty())
                            <tr>
                                <td>@lang('main.empty')</td>
                                <td>- -</td>
                                <td>- -</td>
                            </tr>
                        @else
                            @foreach($user_order_products as $product)
                                <tr>
                                    <td>
                                        {{$product->getTranslatedAttribute('product_name',config('app.locale'),config('voyager.multilingual.default'))}}
                                    </td>
                                    <td>
                                        {{$product->quantity}}
                                    </td>
                                    <td>
                                        {{$product->product_price * $product->quantity}}
                                    </td>
                                </tr>
                            @endforeach()
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h1 class="title mb-20 mb-xs-0">@lang('main.my-profile')</h1>
                    <div class="form shipping-info">
                        @include('medshop.errors')
                        <form method="post" action="/profile" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="field-label">@lang('main.name')</div>
                                    <div class="field-input">
                                        <input type="text" name="name" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="field-label">@lang('main.email')</div>
                                    <div class="field-input">
                                        <input type="text"  name="email" placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="field-label">@lang('main.phone')</div>
                                    <div class="field-input">
                                        <input type="text"  name="phone" placeholder="{{ Auth::user()->phone }}" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="field-label">@lang('main.address')</div>
                                    <div class="field-input">
                                        <input type="text" name="address" placeholder="{{ Auth::user()->address }}" value="{{ Auth::user()->address }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="field-label">@lang('main.index')</div>
                                    <div class="field-input">
                                        <input type="text" name="post_index" placeholder="">
                                    </div>
                                </div>

                            </div>
                            <div class="placeorder-button text-left">
                                <button class="thm-btn bgclr-1 logw" type="submit">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
