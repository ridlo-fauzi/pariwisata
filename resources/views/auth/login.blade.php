@extends('auth.auth_main')
@section('title','Login')
@section('content')
    

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <h1 class="text-white">Sistem Pariwisata</h1>
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session('gagal'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('gagal') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            @error('email')
                                <small id="email" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @error('password')
                                <small id="password" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                        </div>
                        <div class=" m-t-15 text-center">
                            <a href="/" class="text-danger">Kembali ke halaman utama</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
    
