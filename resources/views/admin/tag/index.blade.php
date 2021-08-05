@extends('layouts.backend.app')
@section('title','Tag')

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
                    <h4 class="card-title"><strong>Category Table</strong><span style="margin-left: 10px;" class="badge badge-danger">{{-- {{ $tag->count() }} --}}</span> <a href="{{ route('admin.tag.create') }}" class="btn btn-success " style="float: right;"><i class="fa fa-plus"></i> Add new Tag</a></h4> 
                </div>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tag as $key=>$row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                @if($row->t_status == 1)
                                <spna class="badge badge-success">Active</spna>
                                @else
                                <spna class="badge badge-danger">De-Active</spna>
                                @endif
                                </td>
                            <td> 
                                <a href="{{ route('admin.tag.edit',$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('admin.tag.destroy',$row->id) }}" class="btn btn-sm btn-danger" id="delete" ><i class="fas fa-trash"></i> Delete</a> 
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