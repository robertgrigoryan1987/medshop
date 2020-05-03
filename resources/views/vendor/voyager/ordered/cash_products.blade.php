@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            Cash Orders
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="

                                            : activate to sort column ascending" style="width: 20px;">
                                        <input type="checkbox" class="select_all">
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        User Id
                                                                                    : activate to sort column ascending" style="width: 58px;">
                                        User Id
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Customer City
                                                                                    : activate to sort column ascending" style="width: 111px;">
                                        Customer City
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Customer Addres
                                                                                    : activate to sort column ascending" style="width: 135px;">
                                        Customer Addres
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Customer Telephone
                                                                                    : activate to sort column ascending" style="width: 162px;">
                                        Customer Telephone
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Order Status
                                                                                    : activate to sort column ascending" style="width: 101px;">
                                        Order Status
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Curency
                                                                                    : activate to sort column ascending" style="width: 67px;">
                                        Curency
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Amount
                                                                                    : activate to sort column ascending" style="width: 66px;">
                                        Amount
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Created At
                                                                                    : activate to sort column ascending" style="width: 138px;">
                                        Created At
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Email
                                                                                    : activate to sort column ascending" style="width: 78px;">
                                        Email
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Order Id
                                                                                    : activate to sort column ascending" style="width: 115px;">
                                        Order Id
                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Cash
                                                                                    : activate to sort column ascending" style="width: 42px;">
                                        Cash
                                    </th><th class="actions text-right sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 163px;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cash_products as $product)
                                    <tr>

                                        <td>
                                            <input type="checkbox" name="row_id" id="checkbox_1" value="1">
                                        </td>
                                        <td>
                                            <div>{{$product->user_id}}</div>
                                        </td>
                                        <td>
                                            <div>{{$product->customer_city}}</div>
                                        </td>
                                        <td>
                                            <div>{{$product->customer_addres}}</div>
                                        </td>
                                        <td>
                                            <div>{{$product->customer_telephone}}</div>
                                        </td>
                                        <td>
                                            {{$product->order_status}}
                                        </td>
                                        <td>
                                            <div>{{$product->curency}}</div>
                                        </td>
                                        <td>
                                            <div>{{$product->amount}}</div>
                                        </td>
                                        <td>
                                            {{$product->created_at}}
                                        </td>
                                        <td>
                                            <div>{{$product->email}}</div>
                                        </td>
                                        <td>
                                            <div>{{$product->order_id}}</div>
                                        </td>
                                        <td>
                                            <div>{{$product->cash}}</div>
                                        </td>


                                        <td class="no-sort no-click bread-actions">
                                            <a href="products_in_order/{{strlen($product->session)>4 ? $product->session : $product->id }}" class="btn btn-sm btn-warning pull-right edit">
                                                <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Products</span>
                                            </a>

                                            <a href="ordering-products/{{ $product->id }}" title="View" class="btn btn-sm btn-warning pull-right view">
                                                <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">View</span>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }}</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@stop

@section('javascript')
    <!-- DataTables -->

        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('#search-input select').select2({
                minimumResultsForSearch: Infinity
            });

            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            });
        });

        var deleteFormAction;

        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });
    </script>
@stop
