

@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-4 dark-background">
            <img src="/images/logowhite.svg" class="logo-padding side-top"/>
            <div class="vertical-center">
                <div class="container">
                    <div class="side-head side-text">{{ __('Not a member?') }}</div>
                    <div class="side-text">{{ __('2 Step sign up process.') }}</div>
                    <div class="col-md-10 offset-1 form-group">
                            <a class="btn side-btn form-control" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                            {{-- <button type="submit" class="btn side-btn form-control">
                                {{ __('Sign Up') }}
                            </button> --}}
                    </div>
                </div>
            </div>


        <div class="logo-padding side-text side-bottom">{{ __('© 2019 CUB  Privacy Policy | Terms and Conditions') }}</div>
    </div>
    <div class="col-md-8">
        <div class="login-section vertical-center">

                <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="login-label">{{ __('Sign Up: Step 1') }}</div>
                            <div class="form-group row">
                                {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
    
                                <div class="col-md-6 offset-3">
                                    <input id="name" placeholder="Username" type="text" class="form-control login-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
    
                                <div class="col-md-6 offset-3">
                                    <input id="email" placeholder="Email" type="email" class="form-control login-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
    
                                <div class="col-md-6 offset-3">
                                    <input id="password" placeholder="Password" type="password" class="form-control login-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}
    
                                <div class="col-md-6 offset-3">
                                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control login-input" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-3">
                                    <button type="submit" class="btn btn-orange form-control">
                                        {{ __('Sign Up') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


        </div>
    </div>
</div>
@endsection