@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    <!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Post</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Create Post</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<section class="content">
   <div class="container-fluid">
   <div class="row">
      <!-- left column -->
      <div class="col-lg-8 offset-lg-2">
         <!-- general form elements -->
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Create Post</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('store.post')}}"  method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Title Bangla</label>
                        <input type="text" class="form-control" id="Bangla" name="title_bn" placeholder="Enter Title Bangla">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Title English</label>
                        <input type="text" class="form-control" id="English" name="title_en" placeholder="Enter Title English">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                           <option selected="" disabled="">Select One</option>
                           @foreach($category as $row)
                           <option value="{{$row->id}}">{{$row->category_en}}|{{$row->category_bn}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Sub Category</label>
                        <select class="form-control" id="subcategory_id" name="subcategory_id">
                           <option selected="" disabled="">Select One</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label>Division</label>
                        <select class="form-control" name="division_id">
                           <option selected="" disabled="">Select One</option>
                           @foreach($division as $row)
                           <option value="{{$row->id}}">{{$row->division_en}}|{{$row->division_bn}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>District</label>
                        <select class="form-control" id="district_id"name="district_id">
                           <option selected="" disabled="">Select One</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputFile">File input</label>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="exampleInputFile" name="image" required="">
                           <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                           <span class="input-group-text" id="">Upload</span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-12">
                        <label >Image Caption</label>
                        <input type="text" class="form-control" id="image_caption" name="image_caption" placeholder="Enter Image Caption">
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <label >Detail Bangla</label>
                     <textarea class="textarea" placeholder="Place some text here" name="detail_bn" 
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                     <label >Detail English</label>
                     <textarea class="textarea" placeholder="Place some text here" name="detail_en" 
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                  <hr>
                  <h4 class="text-center">Extra Option</h4>
                  <div class="row">
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="headline" value="1">
                        <label class="form-check-label" for="exampleCheck1">headline</label>
                     </div>
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2" name="big_thumbnail" value="1">
                        <label class="form-check-label" for="exampleCheck1">Big Thumbnail</label>
                     </div>
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck3" name="first_section" value="1">
                        <label class="form-check-label" for="exampleCheck1">First Section</label>
                     </div>
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck4" name="second_section" value="1">
                        <label class="form-check-label" for="exampleCheck1">Second Section</label>
                     </div>
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck4" name="second_section_thumbnail" value="1">
                        <label class="form-check-label" for="exampleCheck1">Second Section Thumbnail</label>
                     </div>
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck4" name="second_section_big_thumbnail" value="1">
                        <label class="form-check-label" for="exampleCheck1">Second Section Big Thumbnail</label>
                     </div>
                     <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck4" name="second_section_small_thumbnail" value="1">
                        <label class="form-check-label" for="exampleCheck1">Second Section Small Thumbnail</label>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <br><br>
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
            </div>
         </div>
      </div>
   </div>
</section>
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subcategory_id").empty();
                              $.each(data,function(key,value){
                                  $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_bn+'</option>');
                              });
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="division_id"]').on('change', function(){
             var division_id = $(this).val();
             if(division_id) {
                 $.ajax({
                     url: "{{  url('/get/district/') }}/"+division_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#district_id").empty();
                              $.each(data,function(key,value){
                                  $("#district_id").append('<option value="'+value.id+'">'+value.district_bn+'</option>');
                              });
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>
@endsection