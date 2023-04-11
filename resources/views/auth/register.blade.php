@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center register-location">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header register-title">Đăng ký</div>
                @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 d-flex">
                                <label for="username"
                                        class="col-md-4 col-form-label text-md-left p-0 register-label">Username</label>
                            </div>
                            <div class="col-md-12">
                                <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror register-input"
                                        name="username"
                                        value="{{ old('username') }}" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 d-flex">
                                <label for="email"
                                        class="col-md-4 col-form-label text-md-left p-0 register-label">Email</label>
                            </div>
                            <div class="col-md-12">
                                <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror register-input"
                                        name="email"
                                        value="{{ old('email') }}" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 d-flex">
                                <label for="password"
                                        class="col-md-4 col-form-label text-md-left p-0 register-label">Password</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror register-input"
                                        name="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 d-flex">
                                <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-left p-0 register-label">Confirm password</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror register-input"
                                        name="password_confirmation">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="from-group row mt-5 justify-content-center">
                            <button type="submit" class="btn btn-register btn-success">
                                Tạo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection