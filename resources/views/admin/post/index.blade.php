@extends('layouts.backend.app')
@section('title','Post')

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
                    <h4 class="card-title"><strong>Post Table</strong><span style="margin-left: 10px;" class="badge badge-danger">{{ $post->count() }}</span> <a href="{{ route('admin.post.create') }}" class="btn btn-success " style="float: right;"><i class="fa fa-plus"></i> Add new Post</a></h4> 
                </div>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 <th>Id</th>
                                <th>Title</th>
                                <th>Author</th> 
                                <th>Status</th> 
                                <th>View</th> 
                                <th>Approve</th> 
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $key=>$row)
                                <td>{{ $key + 1 }}</td>
                                <td>{{ str_limit($row->title,10) }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>
                                @if($row->p_status == 1)
                                <spna class="badge badge-success">Active</spna>
                                @else
                                <spna class="badge badge-danger">De-Active</spna>
                                @endif
                                </td> 
                                <td>{{ $row->view_count }}</td>
                                <td>
                                @if($row->is_approved == true)
                                <spna class="badge badge-success">Approved</spna>
                                @else
                                <spna class="badge badge-danger">Pending</spna>
                                @endif
                                </td> 
                                <td>{{ $row->created_at->format('F d,Y') }}</td>
                            <td> 
                                @if($row->user->user_name == 'admin')
                                <a href="{{ route('admin.post.edit',$row->id) }}" class="btn btn-sm btn-info"> Edit</a>
                                @else
                                <a href="{{ route('admin.post.edit',$row->id) }}" class="btn btn-sm btn-info " style="visibility: hidden;"> Edit</a>
                                @endif
                                 <a href="{{ route('admin.post.show',$row->id) }}" class="btn btn-sm btn-warning">View</a>
                                <a href="{{ route('admin.post.destroy',$row->id) }}" class="btn btn-sm btn-danger" id="delete" > Delete</a> 
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