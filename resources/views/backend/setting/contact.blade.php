@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Contact Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                 <li class="breadcrumb-item active">Contact Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


     <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contact Setting</h3>
           

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                      <div class="modal-content modal-dialog" >
            <div class="modal-header">
              <h4 class="modal-title">Contact Setting</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{route('update.contact',$con->id)}}">
                    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Editor Bangla</label>
                      
                    <input type="text"  class="form-control" value="{{$con->editor_bn}}" name="editor_bn"  required="">
                  </div>
                  <div class="form-group">
                    <label >Editor English</label>
                  
                    <input type="text" class="form-control" value="{{$con->editor_bn}}" name="editor_en"  required="">
                  </div>
                   <div class="form-group">
                    <label >Address Bangla</label>
                  
                    <textarea class="form-control" name="address_bn" required="">{{$con->address_bn}}</textarea>
                  </div>
                   <div class="form-group">
                    <label >Address English</label>
                  
                    <textarea class="form-control" name="address_en" required="">{{$con->address_en}}</textarea>
                  </div>
                   <div class="form-group">
                    <label >Contact Number Banglan</label>
                  
                    <input type="number" class="form-control" value="{{$con->contact_number_bn}}" name="contact_number_bn"  required="">
                  </div>
                     <div class="form-group">
                    <label >Contact Number English</label>
                  
                    <input type="number" class="form-control" value="{{$con->contact_number_en}}" name="contact_number_en"  required="">
                  </div>
                      <div class="form-group">
                    <label >Map</label>
                  
                    <textarea class="form-control" name="map" required="">{{$con->map}}</textarea>
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