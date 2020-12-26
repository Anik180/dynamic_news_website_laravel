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
               <li class="breadcrumb-item active"><a href="{{route('district')}}">Sub District</a></li>
               <li class="breadcrumb-item active">Edit District</li>
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
      <h3 class="card-title">District Modify</h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
      <div class="modal-content modal-dialog" >
         <div class="modal-header">
            <h4 class="modal-title">Update District  </h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{route('update.district',$district->id)}}">
               @csrf
               <div class="card-body">
                  <div class="form-group">
                     <label >Division</label>
                     <select class="form-control @error('division_id') is-invalid @enderror" name="division_id" required>
                        <option disabled=""selected="">Select One</option>
                        @foreach($division as $row)
                        <option value="{{$row->id}}" <?php if($row->id==$district->division_id)
                           echo "selected";
                           ?>>{{$row->division_en}}|{{$row->division_bn}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label >District Name English</label>
                     <input type="text"  class="form-control" value="{{$district->district_en}}" name="district_en"  required="">
                  </div>
                  <div class="form-group">
                     <label >District Name Bangla</label>
                     <input type="text" class="form-control" value="{{$district->district_bn}}" name="district_bn" required="">
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