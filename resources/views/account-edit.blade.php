@extends('layouts.app', ['title' => 'Edit Account'])
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <form action="{{ route('admin.account-update', $account->account_id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <h4 class="mb-3">{{ $account->first_name }} {{ $account->last_name }}</h4>
                    <div class="form-group row mb-3">
                        <label for="role" class="col-3 form-label">Role</label>
                        <div class="col-9">
                            <select name="role" id="role"
                                class="form-control text-center @error('role') is-invalid @enderror">
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->role_id }}"
                                        {{ old('role', $account->role_id) == $role->role_id ? 'selected' : '' }}>{{ $role->role_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
