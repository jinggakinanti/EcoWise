@extends('layout.master')

@section('content')
<br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10">
            <h1>@lang('ecowise.order_detail')</h1>
                <div class="card shadow">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h6>@lang('ecowise.order_number'){{$transaction->id}}</h6>
                            <h6>@lang('ecowise.order_date'){{$transaction->created_at->format('d F Y')}}</h6>
                        </div>
                        <div>
                            <h6>@lang('ecowise.statusP'): {{$transaction->status}}</h6>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5>@lang('ecowise.delivery_address')</h5>
                        <div class="address">
                            <h6>{{$delivery->name}}</h6>
                            <p style="margin: 0;">{{$delivery->phone}} <br>
                                {{$delivery->address}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5>@lang('ecowise.order_summary')</h5>
                        @foreach ($details as $detail)
                        <div class="summary d-flex align-items-center justify-content-between mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/p'.$detail->product->image.'.jpg') }}" style="width: 60px;" class="me-3">
                                <div>
                                    <h6>{{$detail->product->name}}</h6>
                                    <p style="margin:0 ;">
                                        @lang('ecowise.rp') {{ number_format($detail->product->price, 0, ',', '.') }} ({{$detail->quantity}} pcs)
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h6>@lang('ecowise.rp') {{ number_format($detail->product->price * $detail->quantity, 0, ',', '.') }}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <div class="card-body ">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6>@lang('ecowise.other')</h6>
                            <h6>@lang('ecowise.rp') {{ number_format($transaction->total - $detail->product->price * $detail->quantity, 0, ',', '.') }}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h5>Total</h5>
                            <h5>@lang('ecowise.rp') {{ number_format($transaction->total, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
                <br>
                @if(Auth::check())
                    @if (auth()->user()->roles == 'customer')
                        @if($transaction->status == 'Unpaid')
                            <div class="text-center mb-4">
                                <button type="button" class="btn btn-primary" style="width:150px ; " id="pay-button">@lang('ecowise.pay_btn')</button>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
            <div class="col-12 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
    </div>

<style>
    .summary{
            border: 1px solid #B8C8B4; 
            border-radius: 5px; 
            padding: 10px; 
            background-color: #F1F1F1;
        }
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
        .address{
            border: 1px solid #B8C8B4; 
            border-radius: 5px; 
            padding: 10px; 
            background-color: #F1F1F1;
        }
</style>
@endsection

@section('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
<script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('{{$transaction->snap_token}}', {
          onSuccess: function(result){
            window.location.href =' {{route('success.page', $transaction->id)}}';
          },
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>

@endsection