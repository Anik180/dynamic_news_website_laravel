@extends('layouts.front')
@section('content')
<div class="col-sm-12 col-12 mt-5" style="background: #e5e5e5;padding-top: 10px; padding-bottom: 20px; border-top: 1px solid lightgray;" >
    	@php
    $div=DB::table('divisions')->get();
   	@endphp
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <form method="get" action="{{route('all.news')}}">
   	@csrf
   <div class="row">
      <div class="col-sm-3 col-12">
         <select name="division_id" id="division_id"  class="form-control">
            <option>বিভাগ</option>
            @foreach($div as $row)
            <option value="{{$row->id}}">{{$row->division_bn}}</option>
            @endforeach
         </select>
      </div>
      <div class="col-sm-3 col-12">
         <select name="district_id" id="district_id"  class="form-control">
            <option>জেলা</option>
         </select>
      </div>
      <div class="col-sm-3 col-12">
         <button class="btn btn-sm" type="submit" style="background: blue"><i class="fa fa-search" style="color: white"></i></button>
      </div>
   </div>
   </form>
   <div class="row mm pp wht">
      <div class="col-sm-9 col-12" style="padding-left: 0px; padding-right: 0px;">
         <div id="ress"></div>
      </div>
      <div class="col-sm-3 col-12">
         <div class="col-sm-12 col-12" style="margin-top: 40px;">
            <center>
               <video width="320" height="240" controls  playsinline autoplay loop muted >
                  <source src="https://fixednews24.com/public/AdImage/PAD-000013.mp4" type="video/mp4">
               </video>
            </center>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="division_id"]').on('change', function(){
             var division_id = $(this).val();
             if(division_id) {
                 $.ajax({
                     url: "{{  url('/get/district/front') }}/"+division_id,
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