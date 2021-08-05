@extends('layouts.backend.app')
@section('title','Settings')

@push('css')
@endpush

@section('content')
<div class="container-fluid">

</div>
<div class="col-md-12">
<div class="card">
<div class="card-body">
<h4 class="card-title" style="padding-bottom: 15px;">Settings Tab</h4>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Update Profile</span></a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Password change</span></a> </li>

</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">
    <div class="tab-pane active" id="home" role="tabpanel">
        <div class="p-20">
            <div class="col-lg-10 ">
                <div class="card ">
                    <div class="card-body">
                        <h4 class="card-title"><strong>Update Admin Profile</strong> </h4>
                        <form class="form p-t-20" action="{{ route('author.settings.update',Auth::user()->id) }}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputuname">First Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputuname" name="name" value="{{ Auth::user()->name }}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputuname">Last Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ Auth::user()->user_name}}" required>
                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-email"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control @error('email')is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ Auth::user()->email }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Profile Photo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="file" name="photo" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>About</label>
                     <textarea class="form-control @error('about')is-invalid @enderror" rows="5" name="about">{{ Auth::user()->about }}</textarea>
                                @error('about')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane p-20" id="profile" role="tabpanel">
        <div class="card-body">
            <form method="POST" action="{{ route('author.password.update') }}">
                @csrf
                <div class="form-group row">
                    <label for="o_password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
                    <div class="col-md-6">
                        <input id="o_password" type="password" class="form-control @error('o_password') is-invalid @enderror" name="o_password" required >
                        @error('o_password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="confirm_password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="confirm_password" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</div>
</div>

@endsection

@push('js')
@endpush
