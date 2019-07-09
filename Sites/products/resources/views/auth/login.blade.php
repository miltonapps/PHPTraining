@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <img src="/images/logo.svg" class="logo-padding side-top"/>
        <div class="login-section vertical-center">

            <div class="card-body">
                <div class="login-label">{{ __('Log in') }}</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                        <div class="col-md-6 offset-md-3">
                            <input id="email" type="email" class="form-control login-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                        <div class="col-md-6 offset-md-3">
                            <input id="password" type="password" class="form-control login-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-orange form-control">
                                {{ __('Log in') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="logo-padding">{{ __('© 2019 CUB  Privacy Policy | Terms and Conditions') }}</div>
    </div>
    <div class="col-md-4 dark-background vertical-center">
        <div class="container">
            <div class="side-head side-text">{{ __('Not a member?') }}</div>
            <div class="side-text">{{ __('2 Step sign up process.') }}</div>
            <div class="col-md-10 offset-md-1 form-group">
                    <a class="btn side-btn form-control" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    {{-- <button type="submit" class="btn side-btn form-control">
                        {{ __('Sign Up') }}
                    </button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
