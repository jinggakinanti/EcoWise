@extends('layout.master')

@section('content')
<br><br><br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/success.png') }}" width="150" height="auto" class="rounded-circle">
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <h3>@lang('ecowise.thankyou')</h3>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <a href="{{route('transaction.page')}}" class="btn btn-primary">@lang('ecowise.order_history_btn')</a>
        </div>
    </div>
</div>

<style>
    .btn-primary {
            background-color: #B8C8B4; 
            color: black; 
            border-color: black; 
        }
        .btn-primary:hover {
            background-color: #ECFCCE; 
            color: black; 
            border-color: #ECFCCE; 
        }
</style>
@endsection