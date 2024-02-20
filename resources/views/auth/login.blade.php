@extends('auth.layout.app')
@section('title','Al-Amin')

@section('login_content')
<div class="bgd ">
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-10 m-5 p-5">
                <div class="text text-center mb-5">
                    <h2>Masjid Al-Amin</h2>
                </div>
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">Silahkan Login</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-8 offset-md-4">
                                    <a href="{{ route('register') }}" >
                                        Belum punya akun? Daftar Disini
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-css')
<style type="text/css">
    body{
        background-color: green;
        background-image: url('{{ asset('image/bgmasjid.png') }}');
     
    }
    .bgd{
        margin-left: 100px;
    }
</style>
@endsection