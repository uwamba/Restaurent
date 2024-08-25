@extends('layouts.app')

@section('title', 'Category List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('order.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('order.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>

            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Stock</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="25%">Customer Details</th>
                                <th width="75%">Order Items</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <h4>{{$order->customer_name}}</h4>
                                        <h4> {{$order->phone}}</h4>
                                        <h4> {{$order->user->name}}</h4>



                                    </td>
                                    <td>
                                        <table class="table table-bordered" id="dataTable" width="70%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="25%">order Name</th>
                                                    <th width="25%">Quantity</th>
                                                    <th width="25%">Price</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                             @foreach ($order->menus as $menu)

                                                  <tr>
                                                     <td>{{ $menu->name}}</td>

                                                     <td>{{ $menu->OrderMenu->quantity}}</td>
                                                     <td>{{ $menu->OrderMenu->price}}</td>

                                                  </tr>

                                             @endforeach
                                          </tbody>
                                      </table>
                                    </td>

                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')

@endsection
