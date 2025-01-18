@extends('layout.master')

@section('content')
<br>
<div class="container-fluid text-center" >
    <div class="row" style=" height: 100%;">
        <div class="col-sm-1 col-md-1 col-lg-3">
               
        </div>
        <div class="col-12 col-sm-10 col-md-10 col-lg-6">
            <br><br><br><br>
            <h1>EcoWise</h1>
            <img src="{{ asset('img/GreenLogo.jpg') }}" alt="Logo" width="100" height="94" class="rounded-circle">
            <br><br>
            <h4>@lang('ecowise.about_1')</h4>
            <br>
            <h4>@lang('ecowise.about_2')</h4>
            <br>
            <h4>@lang('ecowise.about_3')</h4>
            <br>
            <h3>@lang('ecowise.contact_us') 
                <img src="{{ asset('img/instagram.png') }}" width="30" height="auto">
                <img src="{{ asset('img/tiktok.png') }}" width="30" height="auto">
                <img src="{{ asset('img/email.png') }}" width="30" height="auto">
            </h3>
        </div>
        <div class="col-sm-1 col-md-1 col-lg-3">
             
        </div>
    </div>
</div>
@endsection