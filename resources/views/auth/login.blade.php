@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="card border-0 shadow-sm" style="max-width: 400px; width: 400px">
            <div class="card-header bg-white text-center py-3">
                {{-- {{ __('Login') }} --}}
                <strong>SSO</strong> POLITEKNIK ACEH
            </div>
            <div class="card-body py-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-2">
                        <label for="nomor_induk" class="text-md-end">{{ __('NIP / NIM / Email') }}</label>

                        <div>
                            <input id="nomor_induk" type="text"
                                class="form-control @error('nomor_induk') is-invalid @enderror" name="nomor_induk"
                                value="{{ old('nomor_induk') }}" required autocomplete="nomor_induk" autofocus
                                placeholder="Masukan nomor induk atau email anda">

                            @error('nomor_induk')
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
                                autocomplete="current-password" placeholder="Masukan password anda">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary px-2 py-1">
                            {{ __('Login Account') }} <i class="fas fa-fw fa-arrow-right"></i>
                        </button>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                    </div>
                </form>
            </div>
            @if (Route::has('password.request'))
                <div class="card-footer bg-white text-center py-3">
                    <small> {{ __('Forgot Your Password?') }} <a
                            href="{{ route('password.request') }}">Reset</a></small>
                </div>
            @endif
            <div class="card-footer bg-white text-center py-3">
                <small> {{ __('Don\'t an account?') }} <a href="{{ route('register') }}">Register</a></small>
            </div>

        </div>
    </div>
@endsection
