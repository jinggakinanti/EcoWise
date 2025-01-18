@extends('layout.master')

@section('content')
    <br><br><br><br>
    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('ecowise.my_profile')</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ $user->image ? asset('uploads/' . $user->image) : asset('img/profile.jpg') }}" 
                        width="150" height="auto" class="rounded-circle">
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center mt-1">
                <div class="d-flex align-items-center justify-content-center">
                <a href="" style="color:#B8C8B4 ;" data-bs-toggle="modal" data-bs-target="#uploadModal">
                    <h6>@lang('ecowise.upload')</h6>
                </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <h6 style="margin: 0;">{{$user->earth_star}} Earth Stars</h6><img src="{{ asset('img/earthstar.png')}}" width="35" height="auto" class="rounded-circle">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 col-md-6 col-lg-4 rounded-3 d-flex flex-column justify-content-center border border-dark p-3 mt-3" >
    @if (request('edit'))
        <!-- Edit Mode -->
        <form action="{{route('profile_update.page')}}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <strong><label for="name" class="form-label">@lang('ecowise.name'):</label></strong>
                <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}" required>
            </div>

            <div class="mb-3">
                <strong><label for="address" class="form-label">@lang('ecowise.address'):</label></strong>
                <input type="text" id="address" name="address" class="form-control" value="{{$user->address}}" required></input>
            </div>

            <div class="mb-3">
                <strong><label for="phone" class="form-label">@lang('ecowise.phone_num'):</label></strong>
                <input type="text" id="phone" name="phone" class="form-control" value="{{$user->phone}}" required>
            </div>

            <div class="mb-3">
                <strong><label for="email" class="form-label">Email:</label></strong>
                <input type="text" id="email" name="email" class="form-control" value="{{$user->email}}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">@lang('ecowise.save_changes')</button>
                <a href="{{ route('profile.page') }}" class="btn btn-secondary">@lang('ecowise.cancel')</a>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @else
        <!-- View Mode -->
        <div class="mb-3">
            <strong>@lang('ecowise.name'):</strong> <span class="d-block">{{$user->name}}</span>
        </div>
        <div class="mb-3">
            <strong>@lang('ecowise.address'):</strong> <span class="d-block">{{$user->address}}</span>
        </div>
        <div class="mb-3">
            <strong>@lang('ecowise.phone_num'):</strong> <span class="d-block">{{$user->phone}}</span>
        </div>
        <div class="mb-3">
            <strong>Email:</strong> <span class="d-block">{{$user->email}}</span>
        </div>
        <div class="text-center">
            <a href="?edit=true" class="btn btn-edit">@lang('ecowise.edit_profile')</a>
        </div>
        
    @endif
    </div>

    @if(!request('edit'))
    <div>
        <div class="text-center mt-3">
            <a href="{{ route('logout') }}" class="btn btn-secondary" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               @lang('ecowise.logout')
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    @endif
        </div>
        <br>
    </div>

    <style>
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
        .btn-secondary {
        background-color: black; 
        color: white; 
        border-color: white; 
        }
        .btn-secondary:hover {
        background-color: white; 
        color: black; 
        border-color: black; 
        }
</style>

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">@lang('ecowise.upload2')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadForm" method="POST" action="{{ route('upload_image') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">@lang('ecowise.select')</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('ecowise.cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('ecowise.upload')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection