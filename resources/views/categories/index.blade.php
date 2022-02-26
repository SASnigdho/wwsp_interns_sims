@extends('layouts.mastar')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">  Categories List </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Categry List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
 <a href="{{ route('categories.create') }}"  class="btn btn-success mb-3">Add Category</a>
  <!-- /.content-header -->
<table id="datatable" class="display table-sm table-bordered " style="width:100%">
    <thead>
        <tr class="text-center">
            <th>SL NO</th>
            <th>Category Name</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>

        @if ($categories)
        @foreach ($categories as $key=>$category)
        <tr class="text-center">
            <td><b>{{ ++$key }}</b></td>
            <td>{{ $category->name }}</td>
            <td >
                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="category-delete-{{ $category->id }}"> <i class="fa fa-trash"></i></a>
            
                <form id="category-delete-{{ $category->id }}" action="{{ route('categories.destroy',$category->id) }}" method="post">
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