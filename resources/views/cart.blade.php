@extends('layouts.app', ['title' => 'Account Maintenance'])
@section('content')
    <div class="container" style="margin-bottom: 50px">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <h3 class="mb-3">Cart</h3>
                <table class="table">
                    <tbody class="align-middle">
                        @forelse ($carts as $cart)
                            <tr class="text-center">
                                <td width=20%>
                                    <img src="{{ asset('img/vegetable.png') }}" style="width: 75px !important" alt="Item">
                                </td>
                                <td>{{ $cart->item->item_name }}</td>
                                <td>{{ $cart->price }}</td>
                                <td width=20%>
                                    <button type="button" id="delete" class="mx-1 btn btn-link"
                                        value="{{ $cart->order_id }}">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="2">No Data Found</td>
                            </tr>
                        @endforelse
                        @if ($carts->count() > 0)
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="fw-bold w-100">TOTAL : Rp. {{ number_format($carts->sum('price'), 0) }}
                                        </h4>
                                        <div class="ml-auto">
                                            <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '#delete', function() {
            let id = $(this).val();
            $.ajax({
                type: "DELETE",
                url: "/cart/" + id,
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
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal...',
                            text: response.error,
                        })
                    }
                }
            });
        });
    </script>
@endpush

