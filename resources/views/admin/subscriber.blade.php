@extends('layouts.backend.app')
@section('title','Subscriber')

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
                    <h4 class="card-title"><strong>Subscriber List</strong><span style="margin-left: 10px;" class="badge badge-danger">{{-- {{ $tag->count() }} --}}</span></h4> 
                </div>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>  
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sub as $key=>$row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->email }}</td> 
                            <td>  
                                <a href="{{ route('admin.subscriber.destroy',$row->id) }}" class="btn btn-sm btn-danger" id="delete" ><i class="fas fa-trash"></i> Delete</a> 
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