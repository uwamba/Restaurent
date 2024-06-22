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
                                <th width="25%">Customer Name</th>
                                <th width="25%">Customer Phone</th>
                                <th width="25%">created By</th>
                                <th width="25%">View Order Items</th>
                                <th width="25%">Edit</th>
                                <th width="25%">Delete</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->customer_name}}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td></td>
                                    <td>

                                        <button onclick="Livewire.dispatch('openModal', { component: 'order.order-items', arguments: {order: {{ $order->menus }}}})">Order Items</button>
                                    </td>
                                    <td>
                                        <button wire:click="$emit('openModal', 'edit')">Edit</button>
                                    </td>
                                    <td>
                                        <button wire:click="$emit('openModal', 'delete')">Delete</button>
                                    </td>

                                </tr>
                                @foreach ($order->menus as $menu)
                                        <tr>
                                            <td>{{ $menu->name}}</td>
                                            <td>{{ $menu->quantity}}</td>
                                            <td>{{ $menu->price}}</td>
                                            <td>{{ $menu->price}}</td>
                                            <td>{{ $menu->price}}</td>



                                        </tr>


                                    @endforeach


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
