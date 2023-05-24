@extends('layouts.app', ['title' => 'Login'])

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <form action="{{ route('login') }}" method="POST" class="mb-3 mt-md-4">
                                @csrf
                                <h2 class="fw-bold mb-2 text-uppercase ">Login</h2>
                                <p class=" mb-5">Please enter your email and password!</p>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check form-check-lg mb-3">
                                    <input class="form-check-input me-2" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn" type="button" id="submit">Submit</button>
                                </div>
                            </form>
                            <div>
                                <p class="mb-0  text-center">Don't have an account? <a href="{{ route('register') }}"
                                        class="text-primary fw-bold">Register</a></p>
                            </div>

                        </div>
                    </div>
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
        document.getElementById('submit').addEventListener("click", function() {
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let remember = document.getElementById('remember').value;
            $.ajax({
                url: `{{ route('login') }}`,
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    remember: remember,
                },
                success: function(response) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Login Successfull'
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                },
                error: function(xhr) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Wrong Email/Password. Please Check Again'
                    });
                }
            });
        })
    </script>
@endpush
