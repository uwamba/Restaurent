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
        @livewire('order.order')

</div>


@endsection
<script>
    $("#paramsForms").on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        url: '{{ route("order.store") }}',
        method: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend:function() {
            $("#save").attr('disabled', 'disabled');
        },
        success:function (data) {
            console.log(data);
            alert('Data successfull saved');
        },
        error:function (error) {
            console.log(error)
            alert('Data not saved');
        }
    })
})
</script>
