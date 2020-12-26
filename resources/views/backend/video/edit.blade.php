@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Video</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('video')}}">Video</a></li>
                 <li class="breadcrumb-item active">Edit Video</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


     <div class="card">
            <div class="card-header">
              <h3 class="card-title">Video Modify</h3>
           

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                      <div class="modal-content modal-dialog" >
            <div class="modal-header">
              <h4 class="modal-title">Update Video  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{route('update.video',$edit->id)}}">
                    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Category Name English</label>
                      
                    <textarea   class="form-control"  name="embed_code"  required="">{{$edit->embed_code}}</textarea>
                  </div>
                </div>
                      <div class="row">
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_video" value="1" <?php if($edit->first_video==1){echo "checked";}?>>
                        <label class="form-check-label" for="exampleCheck1">First Video</label>
                     </div>
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2" name="second_video" value="1" <?php if($edit->second_video==1){echo "checked";}?>>
                        <label class="form-check-label" for="exampleCheck1">Second Video</label>
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