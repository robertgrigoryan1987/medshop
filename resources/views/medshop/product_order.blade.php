@extends('layouts.main')

@section('content')
    <h1>Корзина</h1>
    <p>Оформление заказа</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product_orders as $product)
                <tr>
                    <td>
                        <a href="product/{{$product->product_id}}">
                            {{ $product->product_name }}
                        </a>
                    </td>
                    <td><span class="badge">{{$product->quantity}}</span>
                        <div class="btn-group form-inline">
                            <form action="" method="POST">
                                <button type="submit" class="btn btn-danger"
                                        href=""><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                            <form action="/product-add" method="POST">
                                <button type="submit" class="btn btn-success"
                                        href=""><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                        </div>
                    </td>
                    <td>{{ $product->price }} руб.</td>

                </tr>
            @endforeach
            <tr>
                <td colspan="3">Общая стоимость:</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">

        </div>
    </div>
@endsection
