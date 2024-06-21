@extends('layouts.app')

@section('title', 'Add Category')

@section('content')

    <div class="row justify-content-center">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Stock</h1>
            <a href="{{ route('consumable.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Stock</h6>
                </div>

                <form method="POST" action="{{ route('consumable.store') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Category Name</label>
                                <select class="form-select bg-dark.bg-gradient" name="category_id" id="category_id">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Sub Category Name</label>
                                <select class="form-select bg-dark.bg-gradient" name="subcategory_id" id="subcategory_id">
                                    <option selected disabled>Select Sub Category</option>
                                    @foreach ($subCategory as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>name</label>
                                <input type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    id="name" placeholder="Descriptions" name="name"
                                    value="{{ old('name') }}">

                                @error('descriptions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Unit</label>
                                <input type="text"
                                    class="form-control form-control-user @error('unit') is-invalid @enderror"
                                    id="unit" placeholder="Descriptions" name="unit"
                                    value="{{ old('unit') }}">

                                @error('unit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Minimum items</label>
                                <input type="text"
                                    class="form-control form-control-user @error('min') is-invalid @enderror"
                                    id="min" placeholder="Min Items" name="min"
                                    value="{{ old('min') }}">

                                @error('unit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Max items</label>
                                <input type="text"
                                    class="form-control form-control-user @error('min') is-invalid @enderror"
                                    id="max" placeholder="Max items" name="max"
                                    value="{{ old('max') }}">

                                @error('unit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                        <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('category.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
