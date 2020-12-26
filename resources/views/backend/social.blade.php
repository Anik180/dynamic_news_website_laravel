@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Social Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                 <li class="breadcrumb-item active">Social Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


     <div class="card">
            <div class="card-header">
              <h3 class="card-title">Social Setting</h3>
           

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                      <div class="modal-content modal-dialog" >
            <div class="modal-header">
              <h4 class="modal-title">Social Setting</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{route('update.social',$social->id)}}" >
                    @csrf
                <div class="card-body">
                <div class="form-group col-md-6">
                        <label >Facebook</label>
                        <input type="text" class="form-control"name="facebook" value="{{$social->facebook}}">
                     </div>
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