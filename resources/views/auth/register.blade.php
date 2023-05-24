@extends('layouts.app', ['title' => 'Register'])

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <form action="{{ route('register') }}" method="POST" autocomplete="off" class="mb-3 mt-md-4"
                                enctype="multipart/form-data">
                                @csrf
                                <h2 class="fw-bold mb-2 text-uppercase ">Register</h2>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" name="first_name" value="{{old('first_name')}}">
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
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                                name="last_name" value="{{old('last_name')}}">
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
                                                id="email" name="email" value="{{old('email')}}">
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
                                                    <option value="{{ $role->role_id }}" {{old('role') == $role->role_id ? 'selected' : ''}}>{{ $role->role_name }}</option>
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
                                                        <input
                                                            class="form-check-input @error('gender') is-invalid @enderror"
                                                            type="radio" name="gender" id="gender"
                                                            value="{{ $gender->gender_id }}" {{old('gender') == $gender->gender_id ? 'checked' : ''}}>
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
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password">
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
                                <div class="d-grid">
                                    <button class="btn" type="submit">Submit</button>
                                </div>
                            </form>
                            <div>
                                <p class="mb-0  text-center">Already have an account? <a href="{{ route('login') }}"
                                        class="text-primary fw-bold">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
