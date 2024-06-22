@extends('layouts.app')

@section('title', 'Create Order')

@section('content')

<div class="row justify-content-center">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Order</h1>
            <a href="{{ route('consumable.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
             @livewire('order.order')
        </div>

</div>


@endsection

