@extends('auth.auth_main')
@section('title','Register')
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
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="User Name">
                            @error('username')
                                <small id="username" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
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
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="confPassword" class="form-control" placeholder="Konfirmasi Password">
                            @error('confPassword')
                                <small id="confPassword" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{ route('login') }}"> Sign in</a></p>
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