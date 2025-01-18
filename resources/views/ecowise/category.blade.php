@extends('layout.master')

@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="container-fluid" style="margin-left: 200px;">
            
    </div>
    <div class="container px-1 px-sm-2 px-md-3 px-lg-5">
            <div class="px-sm-0 px-md-2 px-lg-5">
                <div class="row px-sm-0 px-md-2 px-lg-5">
                    <div class="row" >
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-4">
                            <br>
                            <h2>{{$category->type}}</h2>
                        </div>
                    </div>
                    <div class="row" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(15rem, 1fr)); justify-items: center;">
                        @foreach ($category->products as $product)
                            <!-- Product Card -->
                            <div class="col-3 d-flex justify-content-center mb-4">
                                <a href="{{route('detail.page', ['id' => $product->id])}}" class="text-decoration-none text-black">
                                    <div class="card" style="width: 15rem; height: 20rem;">
                                        <img src="{{ asset('img/p'.$product->image.'.jpg') }}" class="card-img-top" width="75" height="175" alt="Product Image">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <h5 class="card-title text-center">{{ $product->name }}</h5>
                                            <p class="card-text text-center">@lang('ecowise.rp') {{ number_format($product->price, 0, ',', '.') }} <br> {{ $product->sold }} @lang('ecowise.sold')</p>
                                        </div>
                                    </div>
                                </a>
                            </div>    
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-title, .card-text {
        text-align: center;
    }
    @media (max-width: 768px) {
        .row {
            grid-template-columns: 1fr !important; 
        }
    }
</style>
@endsection