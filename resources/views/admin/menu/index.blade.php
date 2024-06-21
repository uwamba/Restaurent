@extends('layouts.app')

@section('title', 'Category List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Menu</h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('menu.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('menu.export') }}" class="btn btn-sm btn-success">
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
                <h6 class="m-0 font-weight-bold text-primary">Menu</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="25%">Nmae</th>
                                <th width="25%">Price</th>
                                <th width="25%">Discount</th>
                                <th width="25%">Descriptions</th>
                                <th width="25%">created By</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $men)
                                <tr>
                                    <td>{{ $men->name }}</td>
                                    <td>{{ $men->price }}</td>
                                    <td>{{ $men->discount }}</td>
                                    <td>{{ $men->description }}</td>
                                    <td>{{ $men->user->name }}</td>
                                </tr>


                            @endforeach
                        </tbody>
                    </table>

                    {{ $menu->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')

@endsection
