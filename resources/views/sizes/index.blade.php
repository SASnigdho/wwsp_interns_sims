@extends('layouts.mastar')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">  Size List </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Size List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
 <a href="{{ route('sizes.create') }}"  class="btn btn-success mb-3">Add Size</a>
  <!-- /.content-header -->
<table id="datatable" class="display table-sm table-bordered " style="width:100%">
    <thead>
        <tr class="text-center">
            <th>SL NO</th>
            <th>Size </th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>

        @if ($sizes)
        @foreach ($sizes as $key=>$size)
        <tr class="text-center">
            <td><b>{{ ++$key }}</b></td>
            <td>{{ $size->name }}</td>
            <td >
                <a href="{{ route('sizes.edit',$size->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="size-delete-{{ $size->id }}"> <i class="fa fa-trash"></i></a>
            
                <form id="size-delete-{{ $size->id }}" action="{{ route('sizes.destroy',$size->id) }}" method="post">
                @csrf
            @method('DELETE')
            </form>
            </td>
        </tr>
        @endforeach
            
        @endif
       
       
       
        
    </tbody>
  
</table>


@endsection