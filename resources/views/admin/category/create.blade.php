@extends('layouts.backend.app')
@section('title','Category')

@push('css')
@endpush

@section('content')
<div class="container-fluid">
	
</div>
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            	<h4 class="card-title"><strong>Add New Category</strong><span style="margin-left: 10px;" class="badge badge-danger">{{-- {{ $tag->count() }} --}}</span> <a href="{{ route('admin.category.index') }}" class="btn btn-warning btn-sm" style="float: right;"><i class="fa fa-check"></i> Back</a></h4>
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
        <form  action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
             @csrf 
            <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label >First name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                   @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 
            </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label>Category Image  <i class="fas fa-arrow-alt-circle-right
"></i></label>
          <input type="file" name="photo" required>
        </div> 
    </div>
            <div class="form-group">
                <div class="">
                  <input class="form-check-input" type="checkbox" value="1" id="invalidCheck3" name="c_status">
                  <label class="form-check-label" for="invalidCheck3">
                    Avaiable Status
                  </label>
                  
                </div>
            </div>
          <button type="submit" class="btn btn-primary" >Submit</button>
        </form>
    </div>
</div>
@endsection

@push('js')

@endpush