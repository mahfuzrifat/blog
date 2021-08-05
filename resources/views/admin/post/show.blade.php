@extends('layouts.backend.app')
@section('title','Tag')

@push('css')
@endpush

@section('content')
<div class="container-fluid">
  
</div>
 <div class="card">
<div class="card-body">
<div class="container-fluid">
	 <h4 class="card-title"><strong>Single Post View</strong><span style="margin-left: 10px;" class="badge badge-danger">{{-- {{ $tag->count() }} --}}</span> <a href="{{ route('admin.post.index') }}" class="btn btn-warning btn-sm" style="float: right;"><i class="fa fa-check"></i> Back</a>
        @if($post->is_approved == false)
      <a href="{{ route('admin.post.approve',$post->id) }}" id="approve" class="btn btn-danger btn-sm" style="float: right;margin-right: 10px"><i class="fa fa-check"></i> Pending</a></h4>
      @else
      <a href="#" id="approve" class="btn btn-success btn-sm disabled" style="float: right;margin-right: 10px" > Approved</a></h4>
      @endif
</div>
 <div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
            	<div class="card-header">
            		<h3>{{ $post->title }}</h3>
            		<small>posted by : <strong>{{ $post->user->name }}</strong></small>     <small>  on  </small> <small><strong>{{ $post->created_at->format('F d,Y') }}</strong></small>
            		<hr>
            	</div>
                {!! $post->body !!}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12"> 
 <div class="card card-outline-inverse">
        <div class="card-header bg-primary">
            <h4 class="m-b-0 text-white">Selected Category</h4></div>
        <div class="card-body"> 
        	@foreach($post->categories as $row)
               <span class="btn btn-primary btn-sm">{{ $row->name }}</span>
            @endforeach
        </div>
    </div>
    <div class="card card-outline-inverse">
        <div class="card-header bg-success">
            <h4 class="m-b-0 text-white">Selected Tags</h4></div>
        <div class="card-body"> 
            @foreach($post->tags as $row)
               <span class="btn btn-success btn-sm">{{ $row->name }}</span>
            @endforeach
        </div>
    </div>
    <div class="card card-outline-inverse">
        <div class="card-header bg-secondary ">
            <h4 class="m-b-0 text-white">Post Image</h4></div>
        <div class="card-body"> 
            <img class="img-thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image)}}">
        </div>
    </div>
</div>
</div>
</div></div>
@endsection

@push('js')
@endpush