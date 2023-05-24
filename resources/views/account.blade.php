@extends('layouts.app', ['title' => 'Account Maintenance'])
@section('content')
    <div class="container" style="margin-bottom: 50px">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" width=60%>Account</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($accounts as $account)
                            <tr>
                                <td>{{ $account->first_name }} {{ $account->last_name }} - {{ $account->role->role_name }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.account-edit', $account->account_id) }}" class="mx-1 btn">Update
                                        Role</a>
                                    <button type="button" id="delete" class="mx-1 btn btn-link"
                                        value="{{ $account->account_id }}">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $accounts->links() }}
                </div>
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
                url: "/account-maintenance/" + id,
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
