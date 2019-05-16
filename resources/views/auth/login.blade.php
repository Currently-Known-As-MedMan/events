@extends('layouts.auth.master')

@section('content')
<!-- Container-fluid starts -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- Authentication card start -->
            <div class="signup-card card-block auth-body m-auto">
                <form class="md-float-material">
                    <div class="text-center">
                        <img src="images/logo.png" alt="logo.png">
                    </div>
                    <div class="auth-box">
                        <div class="row m-b-20">
                            <div class="col-md-3">
                                <h3 class="text-center txt-primary">Sign In</h3>
                            </div>
                            <div class="col-md-9">
                                <p class="text-inverse m-t-25 text-right">Don't have an account? <a href="#"> Register </a> here for free!</p>
                            </div>
                        </div>
                        <p class="text-inverse b-b-default text-left p-b-5">Sign in easily with your social account:</p>
                        <div class="row m-b-20">
                            <div class="col-md-6">
                                <button class="btn btn-facebook m-b-20 share-btn"><i class="icofont icofont-social-facebook"></i>Sign in with facebook</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-twitter m-b-20 share-btn"><i class="icofont icofont-social-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div>
                        <p class="text-inverse b-b-default text-left p-b-5">Sign in with your regular account</p>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Username">
                            <span class="md-line"></span>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="password">
                            <span class="md-line"></span>
                        </div>
                        <div class="row m-t-25 text-left">
                            <div class="col-sm-6 col-xs-12">
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">Remember me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 forgot-phone text-right">
                                <a href="auth-reset-password.html" class="text-right f-w-600 text-inverse"> Forget Password?</a>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                            </div>
                        </div>
                        <!-- <div class="card-footer"> -->
                        <div class="col-sm-12 col-xs-12 text-center">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="register2.html" class="f-w-600 p-l-5">Sign up Now</a>
                        </div>
                        <!-- </div> -->
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- Authentication card end -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
</div>
<!-- end of container-fluid -->
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
