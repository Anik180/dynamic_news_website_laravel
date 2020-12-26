@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Division</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Division</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- datatable -->
<div class="card">
   <div class="card-header">
      <h3 class="card-title">All Division</h3>
      <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#modal-default" style="margin-right: 5px;">
      <i class="fas fa-plus-circle"></i>Add New
      </button>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
         <thead>
            <tr>
               <th>Division Name English</th>
               <th>Division Name Bangla</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($division as $row)
            <tr>
               <td>{{$row->division_en}}</td>
               <td>{{$row->division_bn}}</td>
               <td><a href="{{route('edit.division',$row->id)}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                  <a href="{{route('delete.division',$row->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a> 
               </td>
            </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr>
               <th>Division Name English</th>
               <th>Division Name Bangla</th>
               <th>Action</th>
            </tr>
         </tfoot>
      </table>
   </div>
   <!-- /.card-body -->
</div>
<!-- modal -->
<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add New Division</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{ route('store.division') }}">
               @csrf
               <div class="card-body">
                  <div class="form-group">
                     <label >Division Name English</label>
                     @error('division_en')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                     <input type="text" name="division_en" class="form-control @error('division_en') is-invalid @enderror"  value="{{ old('division_en') }}" required id="English" placeholder="Enter Division Name English">
                  </div>
                  <div class="form-group">
                     <label >Division Name Bangla</label>
                     @error('division_bn')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                     <input type="text" name="division_bn" class="form-control  @error('division_bn') is-invalid @enderror"  value="{{ old('division_bn') }}" required id="Bangla" placeholder="Enter Division Name Bangla">
                  </div>
                  <div class="form-group mb-0">
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
@endsection