@extends('layouts.backend.app')
@section('title','Authors')

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
                    <h4 class="card-title"><strong>Author's List</strong> <span style="margin-left: 10px;"
                                                                                class="badge badge-danger">{{
                                                                                $user->count() }}</span> </h4>
                </div>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Joining Date</th>
                                <th>All Post</th>
                                <th>Total Comments</th>
                                <th>Favorite Posts</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key=>$row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                 {{ $row->created_at->format('F d,Y') }}
                                </td>
                                <td>{{$row->posts_count}}</td>
                                <td>{{$row->comments_count}}</td>
                                <td>{{$row->favorite_posts_count}}</td>
                            <td>
                                <a href="{{ route('admin.author.destroy',$row->id) }}" class="btn btn-sm btn-danger"
                                   id="delete" ><i class="fas fa-trash"></i> Delete</a>
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
@endsection

@push('js')
<script src="{{ asset('asset/backend/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script> 
@endpush