@extends('layouts.backend.app')
@section('title','Admin-DashBoard')

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
    <div class="round round-lg align-self-center round-info"><i class="fa fa-bookmark"></i></div>
    <div class="m-l-10 align-self-center">
        <h3 class="m-b-0 font-light">{{$posts->count()}}</h3>
        <h5 class="text-muted m-b-0">Total Post </h5></div>
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
    <div class="round round-lg align-self-center round-warning"><i class="fa fa-question"></i></div>
    <div class="m-l-10 align-self-center">
        <h3 class="m-b-0 font-lgiht">{{ $total_pending_posts }}</h3>
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
    <div class="round round-lg align-self-center round-primary"><i class="fa fa-history"></i></div>
    <div class="m-l-10 align-self-center">
        <h3 class="m-b-0 font-lgiht">{{ $all_views }}</h3>
        <h5 class="text-muted m-b-0">All Time View</h5></div>
</div>
</div>
</div>
</div>
<!-- Column -->
<!-- Column -->
<div class="col-lg-3 col-md-6">
<div class="card">
<div class="card-body">
<div class="d-flex flex-row ">
    <div class="round round-lg align-self-center round-danger "><i class="fa fa-heart"></i></div>
    <div class="m-l-10 align-self-center">
        <h3 class="m-b-0 font-lgiht">{{ Auth::user()->favorite_posts->count() }}</h3>
        <h5 class="text-muted m-b-0">Favorite Post</h5></div>
</div>
</div>
</div>
</div>
<!-- Column -->
</div>
<!-- Row -->
<div class="row">
<div class="col-lg-3 col-md-12">
<div class="card card-inverse card-primary">
<div class="card-body">
<div class="d-flex">
    <div class="m-r-20 align-self-center">
        <h1 class="text-white"><i class="fa fa-list-alt"></i></h1></div>
    <div>
        <h3 class="card-subtitle text-white">{{ $category_count }}</h3>
        <h4 class="card-title text-white">Category</h4>
    </div>
</div> 
</div>
</div>
<div class="card card-inverse card-success">
<div class="card-body">
<div class="d-flex">
    <div class="m-r-20 align-self-center">
        <h1 class="text-white"><i class="fa fa-tags"></i></h1></div>
    <div>
        <h3 class="card-subtitle text-white">{{ $tag_count }}</h3>
        <h4 class="card-title text-white">Tags</h4>
    </div>
</div>
</div>
</div>
<div class="card card-inverse card-success">
<div class="card-body" style="background-color: #d699ff;">
<div class="d-flex">
    <div class="m-r-20 align-self-center">
        <h1 class="text-white"><i class="fa fa-users"></i></h1></div>
    <div>
        <h3 class="card-subtitle text-white">{{ $author_count }}</h3>
        <h4 class="card-title text-white">Total Author</h4>
    </div>
</div>
</div>
</div>
<div class="card card-inverse card-success">
<div class="card-body" style="background-color: #00cccc;">
<div class="d-flex">
    <div class="m-r-20 align-self-center">
        <h1 class="text-white"><i class="fa fa-handshake"></i></h1></div>
    <div>
        <h3 class="card-subtitle text-white">{{ $new_authors_today }}</h3>
        <h4 class="card-title text-white">New Author Today</h4>
    </div>
</div>
</div>
</div>
</div>

 <div class="col-md-9">
<div class="card">
<div class="card-body">
<div class="d-flex no-block">
    <h4 class="card-title">Most Active Author</h4>
</div>
<div class="table-responsive">
    <table class="table stylish-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Posts</th>
                <th>Comments</th>
                <th>Favorite</th>
            </tr>
        </thead>      
          <tbody>
            @foreach($active_authors as $key=>$author)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->posts_count }}</td>
                    <td>{{ $author->comments_count }}</td>
                    <td>{{ $author->favorite_posts_count }}</td>
                </tr>
            @endforeach
        </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<div class="row">
 <div class="col-md-12">
<div class="card">
<div class="card-body">
<div class="d-flex no-block">
    <h4 class="card-title">Popular Post</h4>
</div>
<div class="table-responsive">
    <table class="table stylish-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Views</th>
                <th>Favorite</th>
                <th>Comments</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
              <tbody>
                @foreach($popular_posts as $key=>$post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ str_limit($post->title,'20') }}</td>
                        <td>{{ $post->user->name }}</td>
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
                        <td>
                            <a class="btn btn-sm btn-primary waves-effect" target="_blank" href="{{ route('post.details',$post->id) }}">View</a>
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
 
 
</div>
@endsection

@push('js')
@endpush