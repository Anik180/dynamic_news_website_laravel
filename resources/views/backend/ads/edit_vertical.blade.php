@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Vertical</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('vertical.ads')}}">Vertical</a></li>
                 <li class="breadcrumb-item active">Edit Vertical</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


     <div class="card">
            <div class="card-header">
              <h3 class="card-title">Modify</h3>
           

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                      <div class="modal-content modal-dialog" >
            <div class="modal-header">
              <h4 class="modal-title">Update Vertical Ads  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{route('update.vertical',$edit->id)}}" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                     <div class="form-group col-lg-12">
                        <label for="exampleInputFile">Vertical Ads</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile" name="ads" >
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                           </div>
                        </div>
                     </div>
                 
                  </div>
                      <div class="col-lg-6">
                        <label for="exampleInputFile">Old Ads</label><br>
                        <img src="{{URL::to($edit->ads)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="oldimage" value="{{$edit->ads}}">
                     </div>
                  <div class="form-group">
                    <label >Ads Url</label>
                  
                    <input type="text" class="form-control" value="{{$edit->ads_url}}" name="ads_url">
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