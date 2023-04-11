@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('attribute.change') }}</div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form method="POST" action="{{ route('change-password.update', auth()->user()->id) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group row justify-content-around">
                            <label for="new-password" class="col-md-4 col-form-label text-md-left">{{ __('attribute.current_password') }}</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror login-input" name="current-password">

                                @error('current-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-around">
                            <label for="new-password" class="col-md-4 col-form-label text-md-left">{{ __('attribute.new_password') }}</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror login-input" name="new-password">

                                @error('new-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-around">
                            <label for="new-password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('attribute.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control login-input" name="new-password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-change-password">
                                {{ __('attribute.change') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection