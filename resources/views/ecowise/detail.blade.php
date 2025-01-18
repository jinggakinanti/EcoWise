@extends('layout.master')

@section('content')
<br><br><br><br>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-12" style="margin-left:120px;">
            <p>@lang('ecowise.product_detail')</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset('img/p'.$product->image.'.jpg') }}" width="475" height="400">
        </div>
        <div class="col-md-5">
            <h2>{{$product->name}}</h2>
            <p>{{$product->desc}}</p>
            <h4>@lang('ecowise.rp') {{ number_format($product->price, 0, ',', '.') }}</h4>
            <p>{{$product->sold}} @lang('ecowise.sold')</p>
            <div>
                @if(Auth::check())
                    @if (auth()->user()->roles == 'customer')
                        <a type="submit" href="{{route('checkout2.page', $product->id)}}" class="btn btn-primary w-100">@lang('ecowise.checkout')</a>
                    @elseif(auth()->user()->roles == 'admin')
                        <a type="submit" href="" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updateStockModal">@lang('ecowise.update_stock')</a>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                 @endforeach
                            </ul>
                            </div>
                        @endif
                    @endif
                @else
                    <button class="btn btn-primary w-100" onclick="alert('{{__('ecowise.login_alert')}}');">@lang('ecowise.checkout')</button>
                @endif
            </div>
            <br>
            <div>
                @if(Auth::check())
                    @if (auth()->user()->roles == 'customer')
                        <form action="{{ route('cart_add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-add w-100">@lang('ecowise.add_to_cart_btn')</button>
                        </form>
                        <br>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('img/earthstar.png')}}" width="35" height="auto" class="rounded-circle"><h6 style="margin: 0;">@lang('ecowise.buy_and')</h6>
                        </div>
                    @elseif(auth()->user()->roles == 'admin')
                        <form action="{{ route('product_remove', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-remove w-100">@lang('ecowise.delete_product')
                            </button>
                        </form>
                    @endif
                @else
                    <button class="btn btn-add w-100" onclick="alert('{{__('ecowise.login_alert')}}');">@lang('ecowise.add_to_cart_btn')</button>
                    <br>
                    <div class="d-flex align-items-center mt-3">
                        <img src="{{ asset('img/earthstar.png')}}" width="35" height="auto" class="rounded-circle"><h6 style="margin: 0;">@lang('ecowise.buy_and')</h6>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>

<style>
    .btn-primary {
        background-color: #B8C8B4; 
        color: black; 
        border-color: #4D6D3B; 
    }
    .btn-primary:hover {
        background-color: #ECFCCE; 
        color: black; 
        border-color: #ECFCCE; 
    }
    .btn-add {
        background-color: #4D6D3B; 
        color: #FDFDFC; 
        border-color: #B8C8B4; 
    }
    .btn-add:hover {
        background-color: #ECFCCE; 
        color: black; 
        border-color: #ECFCCE; 
    }
    .btn-remove {
        background-color: #4D6D3B; 
        color: #FDFDFC; 
        border-color: #B8C8B4; 
    }
    .btn-remove:hover {
        background-color: #ECFCCE; 
        color: black; 
        border-color: #ECFCCE; 
    }
</style>

<!-- Modal -->
<div class="modal fade" id="updateStockModal" tabindex="-1" aria-labelledby="updateStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('update_stock', $product->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStockModalLabel">@lang('ecowise.update_stock')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="stock" class="form-label">@lang('ecowise.stock')</label>
                        <input type="text" id="stock" name="stock" class="form-control"
                               value="{{$product->stock}}" required>
                    </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->any())
            var myModal = new bootstrap.Modal(document.getElementById('updateStockModal'));
            myModal.show();
        @endif
    });
</script>
@endsection