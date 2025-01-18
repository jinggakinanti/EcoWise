@extends('layouts.app')

@section('content')
<span class="responsive-br"><br><br><br><br><br></span>
<div class="container-fluid mt-5 mt-md-4 mt-sm-3 mt-lg-5 mb-5">
    <div class="row justify-content-center align-items-center">
        <!-- <div class="col-2">

        </div> -->
        <div class="col-lg-4 col-md-5 col-sm-8 d-flex justify-content-center justify-content-lg-start mb-4 mb-md-3">
            <img src="{{ asset('img/GreenLogo.jpg') }}" width="350px" height="auto" class="rounded-circle">
        </div>
        <div class="col-lg-4 col-md-8 col-sm-10 justify-content-md-end">
            <div class="card shadow">
                <div class="card-header">@lang('ecowise.register')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">@lang('ecowise.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">@lang('ecowise.phone_num')</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="08">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">@lang('ecowise.address')</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">@lang('ecowise.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">@lang('ecowise.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">@lang('ecowise.confirm')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('ecowise.register')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #B8C8B4;
        justify-content: center;
        align-items: center;
    }
    .btn-primary {
        background-color: #B8C8B4; 
        color: black; 
        border-color: black; 
        cursor: pointer; 
        transition: background-color 0.3s; 
    }
    .btn-primary:hover {
        background-color: #ECFCCE; 
        color: black; 
        border-color: #ECFCCE; 
    }
    @media (max-width: 1100px) {
        .rounded-circle {
        max-width: 200px;
        }
        .col-md-8 {
        max-width: 90%;
        }
    }
    .responsive-br {
        display: none;
    }
    @media (min-width: 992px) {
        .responsive-br {
        display: inline;
    }
    }
</style>
@endsection
