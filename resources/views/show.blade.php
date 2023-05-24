@extends('layouts.app', ['title' => 'Detail ' . $item->item_name])
@section('content')
    <div class="container" style="margin-bottom: 50px">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3">
                <h3 class="text-center">{{ $item->item_name }}</h3>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/vegetable.png') }}" class="img-fluid" alt="Item">
                </div>
            </div>
            <div class="col-6 col-md-8 col-lg-9">
                <h4 class="mt-5">Price : Rp. {{ number_format($item->price, 0) }}</h4>
                <p align="justify">{{ $item->item_desc }}</p>
                <div class="d-flex justify-content-end">
                    <button type="button" value="{{ $item->item_id }}" id="addCart" class="btn px-5">Buy</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('body').on('click', '#addCart', function() {
            let id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/item/" + id + '/buy',
                success: function(response) {
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    }
                    if (response.error) {
                        Toast.fire({
                            icon: 'error',
                            title: response.error
                        });
                    }
                }
            });
        });
    </script>
@endpush
