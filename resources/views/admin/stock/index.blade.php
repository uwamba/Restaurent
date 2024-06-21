@extends('layouts.app')

@section('title', 'Category List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Stock</h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('stock.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('stock.export') }}" class="btn btn-sm btn-success">
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
                                <th width="25%">Consumable</th>
                                <th width="25%">Quantity</th>
                                <th width="25%">Totoal Qty</th>
                                <th width="25%">Total Value</th>
                                <th width="25%">Unit Price</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <td>{{ $stock->consumable->name }}</td>
                                    <td>{{ $stock->quantity }}</td>
                                    <td>{{ $stock->total_quantity_after }}</td>
                                    <td>{{ $stock->total_value_after }}</td>
                                    <td>{{ $stock->unit_price }}</td>

                                </tr>


                            @endforeach
                        </tbody>
                    </table>

                    {{ $stocks->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')

@endsection
