@extends('layouts.backend.app')
@section('title','Comments')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/backend/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">

@endpush

@section('content')
<div class="container-fluid">
	
</div>
 <div class="row">
    <div class="col-12">
    	 <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title"><strong>Comments Table</strong> </h4>
                </div>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Comments Info</th>
                                <th class="text-center">Post Info</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key=>$post)
                        @foreach($post->comments as $key=>$comment)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="{{ Storage::disk('public')->url
                                                ('profile/'.$comment->user->photo) }}" style="height: 50px;width: 50px;
                                                border-radius: 50%;padding: 10px;">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>{{ $comment->user->name }} ,</strong>
                                                <small>{{
                                            $comment->created_at->diffForHumans
                                            ()}}</small>
                                            </h5>
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="media-right">

                                            <a target="_blank" href="{{ route('post.details',$comment->post->slug) }}">
                                                <img class="media-object" src="{{ Storage::disk('public')->url
                                                ('post/'.$comment->post->image) }}" style="height: 50px;width: 50px;
                                                border-radius: 50%;padding: 10px;">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <style>h4:hover{
                                                    color: cornflowerblue;}</style>
                                            <a target="_blank" href="{{ route('post.details',$comment->post->id)
                                            }}" >
                                                <h4 class="media-heading"><strong>{{ str_limit($comment->post->title,'40') }}</strong></h4>
                                            </a>
                                            <p><small>by</small> <strong>{{ $comment->post->user->name }}</strong></p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a href="{{route('author.comment.destroy',$comment->id)}}" class="btn btn-sm
                                    btn-danger"
                                       id="delete" > Delete</a>
                                </td>

                            </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('asset/backend/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script> 
@endpush