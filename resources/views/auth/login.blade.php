@extends('layouts.auth')

@section('login')
<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-logo">
                <a href="{{ url('/') }}">
                    <img style="vertical-align: middle; margin-bottom: 15px;" src="{{ asset('/AdminLTE/dist/img/AdminLTELogo.png') }}" alt="logo.png" width="65">
                    <p style="font-size: 16px;">Sistem Informasi Manajemen Servis Komputer</p>
                </a>
            </div>
            <!-- /.login-logo -->
            <p class="login-box-msg">Login ke Akun Anda</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3 @error('username') has-error @enderror">
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" :value="old('username')" required autofocus autocomplete="username" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat login-btn">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection
