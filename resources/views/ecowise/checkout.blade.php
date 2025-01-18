@extends('layout.master')

@section('content')
<br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10">
                <div>
                    <h1 class="text-center text-md-start">Checkout</h1>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <h5>@lang('ecowise.delivery_address')</h5>
                        <div class="address">
                            <h6>{{session('delivery_name',$user->name)}}</h6>
                            <p style="margin: 0;">{{session('delivery_phone', $user->phone)}} <br>
                                {{session('delivery_address', $user->address)}}
                            </p>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#changeAddressModal">
                                @lang('ecowise.change_add')
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5>@lang('ecowise.delivery_method')</h5>
                        <div class="method d-flex align-items-center">
                            <input class="form-check-input me-3" type="radio" name="" id="" value="1" checked>
                            <label class="d-flex justify-content-between align-items-center w-100">
                                <h6 style="margin: 0;">@lang('ecowise.reg_del')</h6>
                                <p style="margin: 0;" >@lang('ecowise.rp') 10.000</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5>@lang('ecowise.order_summary')</h5>
                        @foreach ($carts as $cart)
                        <div class="summary d-flex align-items-center justify-content-between mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/p'.$cart->product->image.'.jpg') }}" style="width: 60px;" class="me-3">
                                <div>
                                    <h6>{{$cart->product->name}}</h6>
                                    <p style="margin:0 ;">
                                        @lang('ecowise.rp') {{ number_format($cart->product->price, 0, ',', '.') }} ({{$cart->quantity}} pcs)
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h6>@lang('ecowise.rp') {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6>Subtotal</h6>
                            <h6>@lang('ecowise.rp') {{ number_format($totalPrice, 0, ',', '.') }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin:0 ;">@lang('ecowise.shipping_fee')</p>
                            <p style="margin:0 ;">@lang('ecowise.rp') 10.000</p>
                        </div>
                        <div class="d-flex justify-content-between" style="color:#4D6D3B ;">
                            <div class="d-flex align-items-center">
                                <p class="me-3 mb-2">@lang('ecowise.discount')</p>
                                <button type="button" class="btn btn-redeem btn-sm me-1" data-bs-toggle="modal" data-bs-target="#redeemModal" >
                                @lang('ecowise.points')
                                </button>
                            </div>
                            
                            <p style="margin:0 ;">- @lang('ecowise.rp') {{ number_format($discount, 0, ',', '.') }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>@lang('ecowise.rp') {{ number_format($grandtotal, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <form action="{{route('place_order')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-checkout w-100">@lang('ecowise.place_order')</button>
                    </form>
                </div>
            </div>
            <div class="col-1">

            </div>
        </div>
    </div>
    <br>

    <style>
        .address{
            border: 1px solid #B8C8B4; 
            border-radius: 5px; 
            padding: 10px; 
            background-color: #F1F1F1;
        }
         .btn-edit {
            background-color: #B8C8B4; 
            color: black; 
            border-color: black; 
        }
        .btn-edit:hover {
            background-color: #ECFCCE; 
            color: black; 
            border-color: #ECFCCE; 
        }
        .method{
            border: 1px solid #B8C8B4; 
            border-radius: 5px; 
            padding: 10px; 
            background-color: #F1F1F1;
        }
        .form-check-input:checked {
            background-color: #4D6D3B; 
            border-color: #4D6D3B;
        }
        .summary{
            border: 1px solid #B8C8B4; 
            border-radius: 5px; 
            padding: 10px; 
            background-color: #F1F1F1;
        }
        .btn-checkout {
            background-color: #B8C8B4; 
            color: black; 
            border-color: black; 
        }
        .btn-checkout:hover {
            background-color: #ECFCCE; 
            color: black; 
            border-color: #ECFCCE; 
        }
        .btn-redeem {
            background-color: #B8C8B4; 
            color: black; 
            border-color: black; 
        }
        .btn-redeem:hover {
            background-color: #ECFCCE; 
            color: black; 
            border-color: #ECFCCE; 
        }
    </style>

    <!-- Modal -->
    <div class="modal fade" id="changeAddressModal" tabindex="-1" aria-labelledby="changeAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('change_address') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="changeAddressModalLabel">@lang('ecowise.change_delivery_address')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                        <label for="delivery_name" class="form-label">@lang('ecowise.name')</label>
                        <input type="text" id="delivery_name" name="delivery_name" class="form-control"
                               value="{{ session('delivery_name', $user->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="delivery_phone" class="form-label">@lang('ecowise.phone_num')</label>
                        <input type="text" id="delivery_phone" name="delivery_phone" class="form-control"
                               value="{{ session('delivery_phone', $user->phone) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="delivery_address" class="form-label">@lang('ecowise.address')</label>
                        <textarea id="delivery_address" name="delivery_address" class="form-control" rows="3" required>
                            {{ session('delivery_address', $user->address) }}
                        </textarea>
                    </div>
                    @if ($errors->has('delivery_name') || $errors->has('delivery_phone') || $errors->has('delivery_address'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('ecowise.cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('ecowise.save_changes')</button>
                </div>
            </form>
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

<!-- Modal 2 -->
<div class="modal fade" id="redeemModal" tabindex="-1" aria-labelledby="redeemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('redeem_points')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="redeemModalLabel">@lang('ecowise.points')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                    <h6>(@lang('ecowise.you') {{$user->earth_star}} @lang('ecowise.p'))</h6>
                        <label for="points" class="form-label">Use</label>
                        <input type="text" id="points" name="points" class="form-control"
                               value="" required>
                    </div>
                    @if ($errors->has('points'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('ecowise.cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('ecowise.redeem')</button>
                </div>
            </form>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('modal') === 'redeemModal')
            var redeemModal = new bootstrap.Modal(document.getElementById('redeemModal'));
            redeemModal.show();
        @elseif (session('modal') === 'changeAddressModal')
            var changeAddressModal = new bootstrap.Modal(document.getElementById('changeAddressModal'));
            changeAddressModal.show();
        @endif
    });
</script>
@endsection