 @extends('layouts.backend.app')
@section('title','Favorite-Post')

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
                    <h4 class="card-title"><strong>Favorite Post Table</strong><span style="margin-left: 10px;" class="badge badge-danger">{{ $posts->count() }}</span> </h4>
                </div>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th> 
                                <th>Favorite</th>
                                <th>View</th>
                                <th>Comments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($posts as $key=>$row)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ str_limit($row->title,20) }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->favorite_to_users->count()}}</td>
                                <td>{{$row->view_count}}</td>
                                <td>0</td>
                            <td>
                                <a href="{{ route('author.post.show',$row->id) }}" class="btn btn-sm btn-warning">View</a>
                                <a href="{{route('post.favorite',$row->id)}}" class="btn btn-sm btn-danger" id="delete" > Delete</a>
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