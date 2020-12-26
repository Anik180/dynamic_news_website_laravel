@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit District</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active"><a href="{{route('division')}}">division</a></li>
               <li class="breadcrumb-item active">Edit division</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<div class="card">
   <div class="card-header">
      <h3 class="card-title">Division Modify</h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
      <div class="modal-content modal-dialog" >
         <div class="modal-header">
            <h4 class="modal-title">Update Division</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{route('update.division',$edit->id)}}">
               @csrf
               <div class="card-body">
                  <div class="form-group">
                     <label >Division Name English</label>
                     <input type="text"  class="form-control" value="{{$edit->division_en}}" name="division_en" required="">
                  </div>
                  <div class="form-group">
                     <label >Division Name Bangla</label>
                     <input type="text" class="form-control" value="{{$edit->division_bn}}" name="division_bn"  required="">
                  </div>
                  <div class="form-group mb-0">
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- /.card-body -->
</div>
@endsection