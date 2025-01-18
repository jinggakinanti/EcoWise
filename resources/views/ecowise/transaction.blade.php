@extends('layout.master')

@section('content')
<br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10 d-flex flex-column flex-md-row align-items-center align-items-md-center justify-content-between mb-3">
                <div class="justify-content-md-start">
                    <h1>@lang('ecowise.order_history')</h1>
                </div>
                <div class="d-flex align-items-center justify-content-md-end">
                <li class="nav-item dropdown me-3" style="list-style-type: none;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>
                                @if (request()->get('filter') == 'paid')
                                    @lang('ecowise.paid')
                                @elseif (request()->get('filter') == 'unpaid')
                                    @lang('ecowise.unpaid')
                                @else
                                    @lang('ecowise.all')
                                @endif
                            </strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('transaction_filter.page', ['filter' => 'all']) }}">@lang('ecowise.all')</a></li>
                            <li><a class="dropdown-item" href="{{ route('transaction_filter.page', ['filter' => 'paid']) }}">@lang('ecowise.paid')</a></li>
                            <li><a class="dropdown-item" href="{{ route('transaction_filter.page', ['filter' => 'unpaid']) }}">@lang('ecowise.unpaid')</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" style="list-style-type: none;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>@lang('ecowise.sort')</strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('transaction.page', ['sort' => 'desc']) }}">@lang('ecowise.sort1')</a></li>
                            <li><a class="dropdown-item" href="{{ route('transaction.page', ['sort' => 'asc']) }}">@lang('ecowise.sort2')</a></li>
                        </ul>
                    </li>
                </div>
            </div>
            <div class="col-1">

            </div>
        </div>
    </div>
    @if ($transactions->count() > 0)
    <div class="container-fluid mb-3">
        @foreach ($transactions as $transaction)
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10">
            <a href="{{route('transactiondetail.page', $transaction->id)}}" class="text-decoration-none text-black">
            <div class="card mb-3 justify-content-between">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <strong>@lang('ecowise.order_number'){{$transaction->id}}</strong>
                            <p style="margin:0 ;">
                                @lang('ecowise.ordered') {{$transaction->created_at->format('d F Y')}}<br>
                                {{$transaction->distinct}} @lang('ecowise.products')
                            </p>
                        </div>
                    </div>
                    <div class="text-end">
                            <strong>{{$transaction->status}}</strong><br><br>
                            <strong>@lang('ecowise.rp') {{ number_format($transaction->total, 0, ',', '.') }}</strong>
                    </div>
                </div>
            </div>
            </a>
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
                            @lang('ecowise.dont_have_order_history')</h6>
                        </div>
                    </div>
                </div>
                <div class="col-1">

                </div>
            </div>
        </div>
    @endif
@endsection