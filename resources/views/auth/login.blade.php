@extends('shared.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
@endsection

@section('content')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        @if($status == 'guru')
                            <img src="{{ asset('images/login/guru.jpg') }}" alt="login" class="login-card-img">
                        @elseif($status == 'admin')
                            <img src="{{ asset('images/login/code.jpeg') }}" alt="login" class="login-card-img">
                        @else
                            <img src="{{ asset('images/login/siswa.jpg') }}" alt="login" class="login-card-img">
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{ asset('images/login/logo.svg') }}" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Halaman {{ $title }}</p>
                            <form action="{{ route($route) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                           placeholder="Email">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="***********">
                                </div>
                                <button type="submit" class="btn btn-block login-btn mb-4">Login</button>
                            </form>
                            @if($status == 'guru')
                                <a href="#!" class="forgot-password-link">Lupa Password?</a>
                                <p class="login-card-footer-text">
                                    <a href="{{ route('get.loginSiswa') }}" class="text-reset">Login Siswa</a> /
                                    <a href="{{ route('get.loginAdmin') }}" class="text-reset">Login Admin</a>
                                </p>
                            @elseif($status == 'admin')
                                <a href="#!" class="forgot-password-link">Lupa Password?</a>
                                <p class="login-card-footer-text">
                                    <a href="{{ route('get.loginGuru') }}" class="text-reset">Login Guru</a> /
                                    <a href="{{ route('get.loginSiswa') }}" class="text-reset">Login Siswa</a>
                                </p>
                            @else
                                <a href="#!" class="forgot-password-link">Lupa Password?</a>
                                <p class="login-card-footer-text">
                                    <a href="{{ route('get.loginGuru') }}" class="text-reset">Login Guru</a> /
                                    <a href="{{ route('get.loginAdmin') }}" class="text-reset">Login Admin</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
