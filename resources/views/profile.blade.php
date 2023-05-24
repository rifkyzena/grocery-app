@extends('layouts.app', ['title' => 'Profile'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-5 col-md-4 col-lg-3">
                @if ($account->display_picture_link != 'test')
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/' . $account->display_picture_link) }}" class="img-fluid" width="250"
                            alt="{{ $account->first_name }}">
                    </div>
                @else
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/default-user.jpg') }}" class="img-fluid" width="250"
                            alt="{{ $account->first_name }}">
                    </div>
                @endif
            </div>
            <div class="col-7 col-md-8 col-lg-9">
                <div class="d-flex justify-content-center">
                    <form action="{{ route('profile.update', $account->account_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        id="first_name" name="first_name"
                                        value="{{ old('first_name', $account->first_name) }}">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name" name="last_name" value="{{ old('last_name', $account->last_name) }}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $account->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role"
                                        class="form-control text-center @error('role') is-invalid @enderror">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->role_id }}"
                                                {{ old('role', $account->role_id) == $role->role_id ? 'selected' : '' }}>
                                                {{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <div>
                                        @foreach ($genders as $gender)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                                    type="radio" name="gender" id="gender"
                                                    value="{{ $gender->gender_id }}"
                                                    {{ old('gender', $account->gender_id) == $gender->gender_id ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="male">{{ $gender->gender_desc }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('gender')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="display_picture" class="form-label">Display Picture</label>
                                    <input type="file"
                                        class="form-control @error('display_picture') is-invalid @enderror"
                                        id="display_picture" name="display_picture">
                                    @if ($account->display_picture_link != 'test')
                                        <span class="text-info">Image data already exists, if you don't want to change just
                                            ignore it.</span>
                                    @endif
                                    @error('display_picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password">
                                    <span class="text-info">If you don't want to change the password just ignore it.</span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm
                                        Password</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn px-5">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
