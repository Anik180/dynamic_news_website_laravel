@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Video</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Video</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- datatable -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Video</h3>
                   <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#modal-default" style="margin-right: 5px;">
                    <i class="fas fa-plus-circle"></i>Add New
                </button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Video Embed Code</th>
                  <th>Position</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                	@foreach($video as $row)
                <tr>
                  <td>{{$row->embed_code}}</td>
                  <td>
                  	@if($row->first_video==1)
                  	First Video
                  	@endif
                  	@if($row->second_video==1)
                  	Second Video
                  	@endif
                  </td>
                  <td><a href="{{route('edit.video',$row->id)}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                  <a href="{{route('delete.video',$row->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a> 
                  </td>
                </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Video Embed Code</th>
                  <th>Position</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            <h6 class="text-danger"><b>Note:</b>Video width="100%" height="200" Must</h3>
          </div>




          <!-- modal -->
              <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Video</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{route('store.video')}}">
                  	@csrf
                <div class="card-body">
           
                  <div class="form-group">
                    <label >Video Embed Code</label>
                      @error('ads_url')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <textarea  name="embed_code" class="form-control  @error('embed_code') is-invalid @enderror"  value="{{ old('embed_code') }}"  id="Bangla" placeholder="Enter Video Embed Code"></textarea>
                  </div>
                      <div class="row">
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_video" value="1">
                        <label class="form-check-label" for="exampleCheck1">First video</label>
                     </div>
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2" name="second_video" value="1">
                        <label class="form-check-label" for="exampleCheck1">Second Video</label>
                     </div>
                 </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <h1 class="badge badge-danger">
Just add 2 videos. Adding more videos can get you into trouble</h1>
              </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    @endsection