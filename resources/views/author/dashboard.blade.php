@extends('layouts.backend.app')
@section('title','Author-DashBoard')

@push('css')
@endpush

@section('content')
<div class="container-fluid">
    
</div>
  <div class="row">
<!-- Column -->
<div class="col-lg-3 col-md-6">
<div class="card">
<div class="card-body">
<div class="d-flex flex-row">
    <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
    <div class="m-l-10 align-self-center">
        <h3 class="m-b-0 font-light">{{ $total_pending_posts }}</h3>
        <h5 class="text-muted m-b-0">Pending Post</h5></div>
</div>
</div>
</div>
</div>
<!-- Column -->
<!-- Column -->
<div class="col-lg-3 col-md-6">
<div class="card">
<div class="card-body">
<div class="d-flex flex-row">
    <div class="round round-lg align-self-center round-warning"><i class="fa fa-tags"></i></div>
    <div class="m-l-10 align-self-center">
        <h3 class="m-b-0 font-lgiht">{{ $posts->count() }}</h3>
        <h5 class="text-muted m-b-0">Total Post</h5></div>
</div>
</div>
</div>
</div>
<!-- Column -->
<!-- Column -->
<div class="col-lg-3 col-md-6">
<div class="card">
<div class="card-body">
<div class="d-flex flex-row">
    <div class="round round-lg align-self-center round-primary"><i class="fa fa-heart"></i></div>
    <div class="m-l-10 align-self-center">
        <h3 class="m-b-0 font-lgiht">{{ Auth::user()->favorite_posts()->count() }}</h3>
        <h5 class="text-muted m-b-0">Favorite Posts</h5></div>
</div>
</div>
</div>
</div>
<!-- Column -->
<!-- Column -->
<div class="col-lg-3 col-md-6">
<div class="card">
<div class="card-body">
<div class="d-flex flex-row">
    <div class="round round-lg align-self-center round-danger"><i class="fa fa-globe"></i></div>
    <div class="m-l-10 align-self-center">
        <h3 class="m-b-0 font-lgiht">{{ $all_views }}</h3>
        <h5 class="text-muted m-b-0">Total Views</h5></div>
</div>
</div>
</div>
</div>
<!-- Column -->
</div>
<!-- Row -->
<div class="row">
{{-- <div class="col-lg-3 col-md-12">
<div class="card card-inverse card-primary">
<div class="card-body">
<div class="d-flex">
    <div class="m-r-20 align-self-center">
        <h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>
    <div>
        <h3 class="card-title">Bandwidth usage</h3>
        <h6 class="card-subtitle">March  2017</h6> </div>
</div>

</div>
</div>
<div class="card card-inverse card-success">
<div class="card-body">
<div class="d-flex">
    <div class="m-r-20 align-self-center">
        <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
    <div>
        <h3 class="card-title">Download count</h3>
        <h6 class="card-subtitle">March  2017</h6> </div>
</div>

</div>
</div>
</div> --}}
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="d-flex no-block">
    <h4 class="card-title">Popular Post</h4>
   
</div>
<div class="table-responsive m-t-20">
    <table class="table stylish-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Views</th>
                <th>Favorite</th>
                <th>Comments</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($popular_posts as $key=>$post)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ str_limit($post->title,25) }}</td>
                    <td>{{ $post->view_count }}</td>
                    <td>{{ $post->favorite_to_users_count }}</td>
                    <td>{{ $post->comments_count }}</td>
                    <td>
                      @if($post->is_approved == true)
                        <spna class="badge badge-success">Approved</spna>
                        @else
                        <spna class="badge badge-danger">Pending</spna>
                      @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
 
</div>
<!-- Row -->
<!-- Row -->
<div class="row">
<!-- Column -->
 
</div>
<!-- Row -->
<!-- Row -->
<div class="row">

 
</div>
<!-- Row -->
 
</div>
</div>
</div>
</div>
@endsection

@push('js')
@endpush