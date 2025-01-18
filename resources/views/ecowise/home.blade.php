@extends('layout.master')

@section('content')
    <br><br><br><br>
    <div class="container-fluid">
    <div class="row">
            <div class="col-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('img/bringbag.png')}}" class="d-block w-100" >
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('img/ownbottle.png')}}" class="d-block w-100" >
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('img/nostraw.png')}}" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
        </div>
        <br>
        <div class="container px-1 px-sm-2 px-md-3 px-lg-5">
            <div class="px-sm-0 px-md-2 px-lg-5">
                <div class="row px-sm-0 px-md-2 px-lg-5">
                    <div class="container-fluid mb-3">
                        <div class="row align-items-center">
                            @if(Auth::check())
                                @if (auth()->user()->roles == 'customer')
                                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start">
                                        <h2>@lang('ecowise.popular_products')</h2>
                                    </div>

                                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-end">
                                        <img src="{{ asset('img/location.png')}}" width="28" height="auto" class="rounded-circle">
                                        <h6 style="color: #4D6D3B; margin: 0; margin-left: 8px;">@lang('ecowise.we_are')</h6>
                                    </div>
                                @elseif(auth()->user()->roles == 'admin')
                                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start">
                                        <h2>@lang('ecowise.all_products')</h2>
                                    </div>

                                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-end">
                                        <a href="" class="text-decoration-none d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                            <img src="{{ asset('img/plus.png')}}" width="28" height="auto" class="rounded-circle" style="margin-left:10px">
                                            <h6 style="color: #4D6D3B; margin: 0; margin-left: 8px;">@lang('ecowise.add_new_product')</h6>
                                        </a>
                                    </div>
                                @endif
                                @else
                                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start">
                                        <h2>@lang('ecowise.popular_products')</h2>
                                    </div>

                                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-end">
                                        <img src="{{ asset('img/location.png')}}" width="28" height="auto" class="rounded-circle">
                                        <h6 style="color: #4D6D3B; margin: 0; margin-left: 8px;">@lang('ecowise.we_are')</h6>
                                    </div>
                            @endif
                        </div>
                    </div>

                    <div class="row" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(15rem, 1fr)); justify-items: center;">
                        @foreach ($products as $product)
                            <!-- Product Card -->
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center mb-5">
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
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
<style>

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title, .card-text {
        text-align: center;
        text
    }
</style>

<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('add_product')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">@lang('ecowise.add_new_product')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                        <label for="product_name" class="form-label">@lang('ecowise.name')</label>
                        <input type="text" id="product_name" name="product_name" class="form-control"
                               value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="productCategory" class="form-label">@lang('ecowise.category')</label>
                        <select class="form-select" id="productCategory" name="product_category" required>
                            <option value="" selected disabled>@lang('ecowise.select_category')</option>
                            <option value="personal_care">@lang('ecowise.personal_care')</option>
                            <option value="household">@lang('ecowise.household')</option>
                            <option value="reusable">@lang('ecowise.reuseable')</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label">@lang('ecowise.price')</label>
                        <input type="text" id="product_price" name="product_price" class="form-control"
                               value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_desc" class="form-label">@lang('ecowise.description')</label>
                        <textarea id="product_desc" name="product_desc" class="form-control" rows="2" required>
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="product_stock" class="form-label">@lang('ecowise.stock')</label>
                        <input type="text" id="product_stock" name="product_stock" class="form-control"
                               value="" required>
                    </div>
                    @if ($errors->any())
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
                    <button type="submit" class="btn btn-primary">@lang('ecowise.add_product_btn')</button>
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
            var myModal = new bootstrap.Modal(document.getElementById('addProductModal'));
            myModal.show();
        @endif
    });
</script>
@endsection