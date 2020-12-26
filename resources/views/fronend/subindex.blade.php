@extends('layouts.front')
@section('content')
<style type="text/css">
   .submenu a{
   font-size: 18px;
   }
   .submenu a li{
   list-style-type: none;
   display: inline-block;
   padding:5px 15px;
   background: #E5E5E5;
   color: #000;
   margin-right: 10px;
   }
   .submenu a li:hover{
   background: #f4f4f4;
   }
</style>
<div class="col-sm-12 col-12">
   <div class="container" style="padding: 0;">
      <div class="col-sm-12 col-12" style="padding-top: 50px; ">
         <div class="scrollmenu">
            @foreach($subcategories as $row)
            <a href="#">{{$row->subcategory_bn}}</a>
            @endforeach
         </div>
      </div>
      <!--     <div class="col-sm-12 col-12" id="headtitle">
         <div class="row">
           <div class="col-sm-3 col-4" id="headname">
             <center><a href="#" class="link">স্থানীয়</a></center>      
           </div>   
         </div>
         </div> -->
      <div class="row">
         @foreach($post as $row)
         @php
         $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
         @endphp
         <div class="col-sm-4 col-12 mt-5">
            <div class="col-sm-12 col-12" id="newstop">
               <div class="img-hover-zoom">   
                  <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                  <img src="{{asset($row->image)}}" style="height:200px; width:100%; filter:saturate(1.5);" class="img-fluid">
                  </a>
               </div>
               <div style="margin-top: 3px;">
                  <a href="#" class="smalllink">
                  {{$row->category_bn}}
                  </a><br>     
               </div>
               <div style="margin-top: 10px;">
                  <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="h5">{{$row->title_bn}}</a>
               </div>
               <div>
               </div>
            </div>
         </div>
         @endforeach
         <!----------------------------End card----------------------------->
      </div>
      {{ $post->links() }}
   </div>
</div>
@endsection