@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sub District</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">District</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- datatable -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All District</h3>
               <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#modal-default" style="margin-right: 5px;">
                    <i class="fas fa-plus-circle"></i>Add New
                  </button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>District Name English</th>
                  <th>District Name Bangla</th>
                  <th>Division</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($district as $row)
                <tr>
                  <td>{{$row->district_en}}</td>
                  <td>{{$row->district_bn}}</td>
                   <td>{{$row->division_en}}</td>
                  <td><a href="{{route('edit.district',$row->id)}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                  <a href="{{route('delete.district',$row->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a> 
                  </td>
                </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>Sub District Name English</th>
                  <th>Sub District Name Bangla</th>
                   <th>District</th>
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
              <h4 class="modal-title">Add New Sub District</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{ route('store.district') }}">
                    @csrf
                <div class="card-body">
                           <div class="form-group">
                    <label >Division</label>
                     
                  <select class="form-control @error('division_id') is-invalid @enderror" name="division_id" required> 
                      <option disabled=""selected="">Select One</option>
                      @foreach($division as $row)
                      <option value="{{$row->id}}">{{$row->division_en}}|{{$row->division_bn}}</option>
                      @endforeach
                  </select>
                    @error('division_id')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label >District Name English</label>
                      @error('district_en')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <input type="text" name="district_en" class="form-control @error('district_en') is-invalid @enderror"  value="{{ old('district_en') }}" required id="English" placeholder="Enter  District Name English">
                  </div>
                  <div class="form-group">
                    <label >District Name Bangla</label>
                      @error('district_bn')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <input type="text" name="district_bn" class="form-control  @error('district_bn') is-invalid @enderror"  value="{{ old('district_bn') }}" required id="Bangla" placeholder="Enter  District Name Bangla">
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