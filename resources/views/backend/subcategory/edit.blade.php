@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Sub Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('subcategory')}}">Sub Categories</a></li>
                 <li class="breadcrumb-item active">Edit Sub Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


     <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category Sub Modify</h3>
           

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                      <div class="modal-content modal-dialog" >
            <div class="modal-header">
              <h4 class="modal-title">Update Sub Category  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{route('update.subcategory',$subcategory->id)}}">
                    @csrf
                <div class="card-body">
                     <div class="form-group">
                    <label >Category</label>
                     
                  <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required> 
                      <option disabled=""selected="">Select One</option>
                      @foreach($category as $row)
                      <option value="{{$row->id}}" <?php if($row->id==$subcategory->category_id)
                      echo "selected";
                      ?>>{{$row->category_en}}|{{$row->category_bn}}</option>
                      @endforeach
                  </select>
                 
                  </div>
                  <div class="form-group">
                    <label >Sub Category Name English</label>
                      
                    <input type="text"  class="form-control" value="{{$subcategory->subcategory_en}}" name="subcategory_en" placeholder="Enter Sub Category Name English" required="">
                  </div>
                  <div class="form-group">
                    <label >Sub Category Name Bangla</label>
                  
                    <input type="text" class="form-control" value="{{$subcategory->subcategory_bn}}" name="subcategory_bn" placeholder="Enter Sub Category Name Bangla" required="">
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