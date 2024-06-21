@extends('layouts.app')

@section('title', 'Add Category')

@section('content')

    <div class="row justify-content-center">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Menu</h1>
            <a href="{{ route('menu.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Mneu</h6>
                </div>

                <form method="POST" action="{{ route('menu.store') }}">
                    @csrf
                    <div class="card-body">


                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Name</label>
                                <input type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    id="name" placeholder="Name" name="name"
                                    value="{{ old('name') }}">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Price</label>
                                <input type="text"
                                    class="form-control form-control-user @error('price') is-invalid @enderror"
                                    id="name" placeholder="Price" name="price"
                                    value="{{ old('price') }}">

                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Descriptions</label>
                                <input type="textArea"
                                    min-line="3"
                                    max-line="5"
                                    class="form-control form-control-user @error('price') is-invalid @enderror"
                                    id="description" placeholder="Descriptions" name="description"
                                    value="{{ old('prdescriptionice') }}">

                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Discount</label>
                                <input type="text"
                                    class="form-control form-control-user @error('discount') is-invalid @enderror"
                                    id="discount" placeholder="Discount" name="discount"
                                    value="{{ old('discount') }}">

                                @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                        <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('menu.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
