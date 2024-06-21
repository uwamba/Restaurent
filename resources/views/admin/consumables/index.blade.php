@extends('layouts.app')

@section('title', 'Category List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Consumables</h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('consumable.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('category.export') }}" class="btn btn-sm btn-success">
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
                <h6 class="m-0 font-weight-bold text-primary">All SubCategory</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th width="20%">Category</th>
                                <th width="20%">SubCategory</th>
                                <th width="25%">Consumable</th>
                                <th width="25%">Unit Of Mesaure</th>
                                <th width="25%">Max</th>
                                <th width="25%">Min</th>
                                <th width="25%">created By</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consumables as $consumable)
                                <tr>
                                    <td>{{ $consumable->category->name }}</td>
                                    <td>{{ $consumable->subcategory->name }}</td>
                                    <td>{{ $consumable->name }}</td>
                                    <td>{{ $consumable->unit }}</td>
                                    <td>{{ $consumable->maximum_items }}</td>
                                    <td>{{ $consumable->minimum_items }}</td>
                                    <td>{{ $consumable->user->name }}</td>
                                </tr>


                            @endforeach
                        </tbody>
                    </table>

                    {{ $consumables->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')

@endsection
