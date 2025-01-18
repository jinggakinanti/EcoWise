@extends('layout.master')

@section('content')
    <br><br><br><br>
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="margin-left:120px ;">
                <h1>@lang('ecowise.cart')</h1>
            </div>
        </div>
    </div> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <br>
            </div>
            <div class="col-10">
                <h1>@lang('ecowise.cart')</h1>
                <div class="d-none d-md-block">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:40% ;">@lang('ecowise.products')</th>
                            <th style="width:15% ;">@lang('ecowise.price')</th>
                            <th style="width:20% ;">@lang('ecowise.quantity')</th>
                            <th style="width:15% ;">Total</th>
                            <th style="width:10% ;"></th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
            <div class="col-1">
                <br>
            </div>
        </div>
    </div>

    @if ($carts->count() > 0)
    <div class="container-fluid">
        @foreach ($carts as $cart)
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10">
            <div class="card mb-3 d-none d-md-block">
                <div class="card-body d-flex align-items-center">
                    <div class="d-flex align-items-center" style="width: 40%;">
                        <a href="{{route('detail.page', ['id' => $cart->product->id])}}">
                            <img src="{{ asset('img/p'.$cart->product->image.'.jpg') }}" style="width: 60px;">
                        </a>
                        <div class="ms-3">
                            <a href="{{route('detail.page', ['id' => $cart->product->id])}}" class="text-decoration-none text-black">
                                <strong>{{$cart->product->name}}</strong>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between" style="width: 15%;">
                        <p>@lang('ecowise.rp') {{ number_format($cart->product->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="d-flex align-items-center" style="width: 20%;">
                        <form action="{{ route('cart_update', $cart->id) }}" method="POST" class="quantity-controls">
                            @csrf
                            @method('PATCH')

                            <button name="action" value="decrement" class="quantity-btn decrement" style="border:none ; background:none ;">
                                <img src="{{ asset('img/minus.png') }}" class="rounded-circle" width="20px">
                            </button>
                            <input type="text" class="quantity-input text-center" style="width:40px ;" value="{{$cart->quantity}}" readonly>
                            <button name="action" value="increment" class="quantity-btn increment" style="border:none ; background:none ;">
                                <img src="{{ asset('img/plus.png') }}" class="rounded-circle" width="20px">
                            </button>
                        </form>
                    </div>
                    <div class="d-flex flex-column justify-content-between" style="width: 15%;">
                        <p>@lang('ecowise.rp') {{number_format($cart->product->price * $cart->quantity, 0, ',', '.')}}</p>
                    </div>
                    <div class="d-flex align-items-center" style="width: 10%;">
                        <form action="{{ route('cart_remove', $cart->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-btn" style="border:none ; background:none ;">
                                <h6>@lang('ecowise.remove')</h6>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card mb-3 shadow-sm d-md-none position-relative">
                    <form action="{{ route('cart_remove', $cart->id) }}" method="POST" class="position-absolute top-0 end-0 m-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn" style="border:none ; background:none ;">
                            <strong>X</strong>
                        </button>
                    </form>
                    <div class="card-body">                
                        <div class="d-flex align-items-center mb-2">
                            <a href="{{route('detail.page', ['id' => $cart->product->id])}}">
                                <img src="{{ asset('img/p'.$cart->product->image.'.jpg') }}" style="width: 60px">
                            </a>
                                            
                            <div class="ms-3">
                                <a href="{{route('detail.page', ['id' => $cart->product->id])}}" class="text-decoration-none text-black">
                                    <strong>{{ $cart->product->name }}</strong>
                                </a>
                                <p>@lang('ecowise.rp') {{ number_format($cart->product->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="mb-2 text-end">
                            <form action="{{ route('cart_update', $cart->id) }}" method="POST" class="d-flex justify-content-end align-items-center">
                                @csrf
                                @method('PATCH')
                                <button name="action" value="decrement" class="quantity-btn decrement border-0 bg-transparent">
                                    <img src="{{ asset('img/minus.png') }}" width="20px">
                                </button>
                                <input type="text" class="form-control text-center mx-2" style="width: 60px;" value="{{$cart->quantity}}" readonly>
                                <button name="action" value="increment" class="quantity-btn increment border-0 bg-transparent">
                                    <img src="{{ asset('img/plus.png') }}" width="20px">
                                </button>
                            </form>
                        </div>

                        <div class="text-end fw-bold">
                            <p>@lang('ecowise.rp') {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-1">

            </div>
        </div>
        @endforeach
    </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">

                </div>
                <div class="col-10">
                    <div class="card mb-3">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <h6>@lang('ecowise.empty')</h6>
                        </div>
                    </div>
                </div>
                <div class="col-1">

                </div>
            </div>
        </div>
    @endif

    <!-- Summary -->
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-4 col-1">

                </div>
                <div class="col-lg-5 col-md-5 col-sm-7 col-10">
                    <div class="card shadow" style="background-color:#ECFCCE">
                        <div class="card-body d-flex align-items-center">
                        <div class="d-flex align-items-center total-column" style="width: 48%;">
                            <h6>Total:</h6>
                        </div>
                        <div class="d-flex align-items-center price-column" style="width: 31%;">
                            <h5>@lang('ecowise.rp') {{ number_format($totalPrice, 0, ',', '.') }}</h5>
                        </div>
                        <div class="d-flex align-items-center checkout-column" style="width: 21%;">
                            <a type="submit" class="btn btn-primary" href="{{route('checkout.page')}}">@lang('ecowise.checkout')</a> 
                        </div>   
                        </div>
                    </div>
                </div>
                <div class="col-1">

                </div>
            </div>
        </div>

<style>
    .btn-primary { 
        background-color: #4D6D3B; 
        color: white; 
        border-color: #B8C8B4; 
        }
    .btn-primary:hover {
        background-color: #B8C8B4; 
        color: black; 
        border-color: black;
    }
    @media (max-width: 1100px) {
        .total-column {
            width: 40% !important;
        }
        .price-column {
            width: 35% !important;
            }
        .checkout-column {
            width: 25% !important;
        }
    }
    @media (max-width: 950px) {
        .total-column {
            width: 30% !important;
        }
        .price-column {
            width: 40% !important;
        }
        .checkout-column {
            width: 30% !important;
        }        
    }
    @media (max-width: 900px) {
        .total-column {
            width: 25% !important;
        }
        .price-column {
            width: 45% !important;
        }
        .checkout-column {
            width: 30% !important;
        }    
    }
</style>
@endsection

