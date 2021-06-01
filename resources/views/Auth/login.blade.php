@extends('layouts.master-without-nav')
@section('title')
Login To Help Me
@endsection
@section('body')
<body class="auth-body-bg">
@endsection
@section('content')
<div class="home-btn d-none d-sm-block">
    <a href="{{url('index')}}"></a>
</div>
<div>
    <div class="container-fluid p-0">

        <div class="row no-gutters">

            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                        @include('Inc.messages')
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            <a href="{{url('/')}}" class="logo"><img src="{{ URL::asset('/assets/img/logo.png')}}" height="20" alt="logo"></a>
                                        </div>

                                        <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                        <p class="text-muted">Sign in to continue to Help Me.</p>
                                    </div>

                                    <div class="p-2 mt-5">
                                        <form method="POST" action="{{ route('login.action') }}">
                                            @csrf

                                            <div class="form-group auth-form-group-custom mb-4">

                                                <label for="email">Email</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your User Name">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group auth-form-group-custom mb-4">

                                                <label for="password">{{ __('Password') }}</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Enter password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div>
                                                <label>
                                                    Remember Me
                                                    <input type="checkbox" name="remember">
                                                </label>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <button class="form-control btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Log In') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <p><script>document.write(new Date().getFullYear())</script>© Quantum.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="bg-overlay"></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
