@extends('layouts.app')

@section('content')
    <div class="animate form login_form">
        <section class="login_content">
            <form action="{{ route('user-auth') }}" method="POST">
                @csrf
                <h1>Login Form</h1>
                <div>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                           name="username" value="{{ old('username') }}" required autocomplete="on" autofocus
                           placeholder="User Name">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password" placeholder="Masukkan Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary submit">Log in</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Belum memiliki akun?
                        <a href="/registerZ" class="to_register"> Buat Akun </a>
                    </p>
                    <div class="clearfix"></div>
                    <br>
                </div>
            </form>
        </section>
    </div>
@endsection
