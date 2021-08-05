@extends('layouts.backend.app')
@section('title','Update-Tag')

@push('css')
@endpush

@section('content')
<div class="container-fluid">
	
</div>
 <div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
            	<h4 class="card-title"><strong>Update Tag</strong><span style="margin-left: 10px;" class="badge badge-danger">{{-- {{ $tag->count() }} --}}</span> <a href="{{ route('admin.tag.index') }}" class="btn btn-warning btn-sm" style="float: right;"><i class="fa fa-check"></i> Back</a></h4>
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
            <form action="{{ route('admin.tag.update',$tag->id) }}" method="post">
            	@csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label>Tag name</label>
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $tag->name }}" required autofocus placeholder="Name">
                    </div>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
                 
                <div class="form-group">
                    <div>
                        @if($tag->t_status == 1)
                      <input class="form-check-input" type="checkbox" value="1" id="invalidCheck2"  name="t_status" checked>
                      <label class="form-check-label" for="invalidCheck2">
                        Avaiable Status
                      </label>
                      @else
                        <input class="form-check-input" type="checkbox" value="1" id="invalidCheck2"  name="t_status" >
                      <label class="form-check-label" for="invalidCheck2">
                        Avaiable Status
                      </label>
                      @endif
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</div></div>
@endsection

@push('js')
@endpush