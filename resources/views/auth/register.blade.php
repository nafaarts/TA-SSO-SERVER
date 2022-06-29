@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="card border-0 shadow-sm" style="max-width: 400px; width: 400px">
            <div class="card-header bg-white text-center py-3">
                {{-- {{ __('Register') }} --}}
                <strong>SSO</strong> POLITEKNIK ACEH
            </div>

            <div class="card-body py-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-2">
                        <label for="name" class="text-md-end">{{ __('Name') }}</label>

                        <div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="text-md-end">{{ __('Email Address') }}</label>

                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="password" class="text-md-end">{{ __('Password') }}</label>

                        <div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="password-confirm" class="text-md-end">{{ __('Confirm Password') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }} <i class="fas fa-fw fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white text-center py-3">
                <small> {{ __('Have an account?') }} <a href="{{ route('login') }}">Login</a></small>
            </div>
        </div>
    </div>
@endsection
