@extends('layouts.app', ['title' => 'Home'])
@section('content')
    <div class="container" style="margin-bottom: 50px">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-4 col-md-3 col-lg-2 mb-3">
                    <div class="card border-0">
                        <img src="{{ asset('img/vegetable.png') }}" class="card-img-top" alt="Item">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $item->item_name }}</h5>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('item.detail', $item->item_id) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $items->links() }}
        </div>
    </div>
@endsection
