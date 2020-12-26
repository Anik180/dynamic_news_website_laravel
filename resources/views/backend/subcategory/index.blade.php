@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sub Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Sub Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- datatable -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Sub Categories</h3>
               <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#modal-default" style="margin-right: 5px;">
                    <i class="fas fa-plus-circle"></i>Add New
                  </button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sub Category Name English</th>
                  <th>Sub Category Name Bangla</th>
                  <th>Category</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                	@foreach($subcategory as $row)
                <tr>
                  <td>{{$row->subcategory_en}}</td>
                  <td>{{$row->subcategory_bn}}</td>
                  <td>{{$row->category_bn}}</td>
                  <td><a href="{{route('edit.subcategory',$row->id)}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                  <a href="{{route('delete.subcategory',$row->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a> 
                  </td>
                </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                   <th>Sub Category Name English</th>
                  <th>Sub Category Name Bangla</th>
                  <th>Category</th>
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
              <h4 class="modal-title">Add New Sub Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{ route('store.subcategory') }}">
                  	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Category</label>
                     
                  <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required> 
                      <option disabled=""selected="">Select One</option>
                      @foreach($category as $row)
                      <option value="{{$row->id}}">{{$row->category_en}}|{{$row->category_bn}}</option>
                      @endforeach
                  </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label >Sub Category Name English</label>
                      @error('subcategory_en')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <input type="text" name="subcategory_en" class="form-control @error('subcategory_en') is-invalid @enderror"  value="{{ old('subcategory_en') }}" required id="English" placeholder="Enter Sub Category Name English">
                  </div>
                  <div class="form-group">
                    <label >Sub Category Name Bangla</label>
                      @error('subcategory_bn')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <input type="text" name="subcategory_bn" class="form-control  @error('subcategory_bn') is-invalid @enderror"  value="{{ old('subcategory_bn') }}" required id="Bangla" placeholder="Enter Sub Category Name Bangla">
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