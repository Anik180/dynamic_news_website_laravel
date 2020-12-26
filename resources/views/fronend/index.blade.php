@extends('layouts.front')
@section('content')
@php 
$big_thumbnail=DB::table('posts')->where('big_thumbnail',1)->orderBy('id','DESC') ->limit(1)->first();
$first_section=DB::table('posts')->where('first_section',1)->orderBy('id','ASC') ->limit(3)->get();
$firstcat=DB::table('categories')->skip(1)->first();
$second_section=DB::table('posts')
->where('category_id',$firstcat->id)
->where('second_section',1)->orderBy('id','DESC')->limit(4)->get();
$second_section_thumbnail=DB::table('posts')->where('second_section_thumbnail',1)->limit(6)->get();
$secondcat=DB::table('categories')->first();
$second_section_big_thumbnail=DB::table('posts')->where('category_id',$firstcat->id)->where('second_section_big_thumbnail',1)->orderBy('id','DESC')->limit(1)->get();
$second_section_small_thumbnail=DB::table('posts')->where('second_section_small_thumbnail',1)->limit(3)->get();
$catone=DB::table('categories')->skip(1)->first();
$onecatpost=DB::table('posts')->where('category_id',$catone->id)->where('first_section',1)->orderBy('id','DESC')->get();
$twocatpost=DB::table('posts')->where('category_id',$catone->id)->where('first_section',NULL)->orderBy('id','DESC')->get();
$latest=DB::table('posts')->orderBy('id','DESC')->get();
$popular=DB::table('posts')->orderBy('id','DESC')->inRandomOrder()->get();
$catsport=DB::table('categories')->skip(7)->first();
$onecatsport=DB::table('posts')->where('category_id',$catsport->id)->where('first_section',NULL)->orderBy('id','DESC')->get();
$onecatinta=DB::table('categories')->skip(3)->first();
$catinta=DB::table('posts')->where('category_id',$onecatinta->id)->where('first_section',NULL)->orderBy('id','DESC')->get();
$catintatwo=DB::table('posts')->where('category_id',$onecatinta->id)->where('first_section',1)->orderBy('id','DESC')->get();
$education=DB::table('categories')->skip(8)->first();
$oneeducationpost=DB::table('posts')->where('category_id',$education->id)->where('first_section',1)->orderBy('id','DESC')->limit(6)->get();
$Entertainment=DB::table('categories')->skip(4)->first();
$enpost=DB::table('posts')->where('category_id',$Entertainment->id)->where('category_id',6)->orderBy('id','DESC')->limit(3)->get();
@endphp
<div class="col-sm-12 col-12" id="firstsection" >
   <div class="container" id="padding">
      <div class="row">
         
        @php
         $slug=preg_replace('/\s+/u','-',trim($big_thumbnail->title_bn));
         @endphp
         <div class="col-sm-5 col-12 p-0" style='border:10px solid #F0F0ED; border-top:none;'>
            <div class="col-sm-12 col-12 p-0" id="padding" style="margin-top: 10px; padding:0px;">
               <a href="{{URL::to('view-post/'.$big_thumbnail->id.'/'.$slug)}}">
                  <div class="containers">
                     <img src="{{asset($big_thumbnail->image)}}" class="img-fluid" id="over">
                     <div class="content">
                        {{$big_thumbnail->title_bn}}
                     </div>
                  </div>
               </a>
            </div>
         </div>
         <!---------------------------End Headnews------------------------>
         <div class="col-sm-4 col-12">
            <div class="col-sm-12 col-12" id="padding">
               @foreach($first_section as $row )

                 @php
         $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
         @endphp
               <div class="col-sm-12 col-12" id="sidenews">
                  <div class="row">
                     <div class="col-sm-4 col-4">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{asset($row->image)}}" class="img-fluid" id="sidenewsimg"></a>
                     </div>
                     <div class="col-sm-8 col-8">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}} </a>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
         <!---------------------------End first section sidenews------------------------>
         <div class="col-sm-3 col-12">
            <div class="fb-page" data-href="https://web.facebook.com/dainikbagmara" data-tabs="timeline" data-width="" data-height="320px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
        <blockquote cite="https://web.facebook.com/dainikbagmara" class="fb-xfbml-parse-ignore">
        <a href="https://web.facebook.com/dainikbagmara">দৈনিক বাগমারা- Dainik Bagmara</a></blockquote></div>
         </div>
         <!----------------------------------------End Addver-------------------------------->
      </div>
   </div>
</div>
<!----------------------------------------End First section----------------------------------->
<div class="col-sm-12 col-12" id="seconsection" >
   <div class="container" id="padding">
      <div class="row">
         <div class="col-sm-5 col-12">
            <div class="col-sm-12 col-12" id="padding">
               <div class="row">
                  @foreach($second_section as $row)
                   @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                  <div class="col-sm-6 col-6 p-0" id="cardtops" >
                     <div class="card">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{asset($row->image)}}" id="overs"></a>
                        <div class="card-bodys">
                           <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"  class="title">{{$row->title_bn}}</a><br><br>
                           <span class="cardlink">&nbsp;&nbsp;<a href="{{URL::to('posts/'.$firstcat->id.'/'.$firstcat->category_bn)}}">{{$firstcat->category_bn}}</a></span>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <!----------------------End mixed news------------------------>
         <div class="col-sm-4 col-12">
            <div class="col-sm-12 col-12" id="padding">
               @foreach($second_section_thumbnail as $row)
               @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
               <div class="col-sm-12 col-12" id="sidenews">
                  <div class="row">
                     <div class="col-sm-4 col-4">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{asset($row->image)}}" class="img-fluid" id="sidenewsimg"></a>
                     </div>
                     <div class="col-sm-8 col-8">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}}</a>
                     </div>
                  </div>
               </div>
               @endforeach
               <!-- 
                  -->
            </div>
            <!------------------End second section sidenews-------------------->
         </div>
         <div class="col-sm-3 col-12">
            <div class="col-sm-12 col-12 " id="padding">
               @foreach($second_section_big_thumbnail as $row)
                @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
               <div class="col-sm-12 col-12 p-0" id="cardtop">
                  <div class="card">
                     <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{($row->image)}}" id="overs"></a>
                     <div class="card-bodys">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"  class="title">{{$row->title_bn}}</a><br><br>
                        <span class="cardlink">&nbsp;&nbsp;<a href="#">{{$secondcat->category_bn}}</a></span>
                     </div>
                  </div>
               </div>
               @endforeach
               @foreach($second_section_small_thumbnail as $row)
               @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
               <div class="col-sm-12 col-12" id="sidenews">
                  <div class="row">
                     <div class="col-sm-4 col-4">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{asset($row->image)}}" class="img-fluid" id="sidenewsimg"></a>
                     </div>
                     <div class="col-sm-8 col-8">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}}</a>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <!---------------------------------End col-3----------------------->
         </div>
      </div>
   </div>
   <br>
</div>
<!----------------------------------------End Second section----------------------------------->
<div class="col-sm-12 col-12" id="top">
   <div class="container">
      <center> <a href="http://Null"><img src="{{('public/front/image/ad1.jpg')}}" title="#1Top" alt="POS-000002" class="img-fluid" id="banner"></a></center>
   </div>
</div>
<!---------------------------------------End banner2----------------------------------->
<div class="col-sm-12 col-12" id="thirdsection" style="background: url(frontend/img/special-section-bg.svg); background-repeat: no-repeat; background-size: cover; background-position: center;">
   <div class="container" id="padding">
      <!-- muktir -->
      <br>
      <div class="row">
         <div class="col-sm-8 col-12">
            <div class="col-sm-12 col-12" id="padding">
               <span class="cardlink2">&nbsp;&nbsp;<a href="#">{{$catone->category_bn}}</a></span>
               <div class="row">
                  <div class="col-sm-6 col-12">
                     @foreach($onecatpost as $row)
                     @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                     <div class="col-sm-12 col-12" id="sidenews2">
                        <div class="row">
                           <div class="col-sm-4 col-4">
                              <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{($row->image)}}" class="img-fluid" id="sidenewsimg"></a>
                           </div>
                           <div class="col-sm-8 col-8">
                              <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}}</a>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <!-----------------------End col-6------------>
                  <div class="col-sm-6 col-12">
                     @foreach($twocatpost as $row)
                            @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                     <div class="col-sm-12 col-12" id="sidenews2">
                        <div class="row">
                           <div class="col-sm-4 col-4">
                              <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{($row->image)}}" class="img-fluid" id="sidenewsimg"></a>
                           </div>
                           <div class="col-sm-8 col-8">
                              <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">
                              {{$row->title_bn}}
                              </a>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <!-----------------------End col-6------------>
               </div>
            </div>
         </div>
         <!-------------------------------------End Bangladesh------------------------------------->
         <div class="col-sm-4 col-12">
            <div class="col-sm-12 col-12" id="padding">
               <div class="tab" style="margin-top: 20px;">
                  <button class="tablinks" onclick="openCity(event, 'latest')" id="defaultOpen">সর্বশেষ</button>
                  <button class="tablinks" onclick="openCity(event, 'important')">আলোচিত</button>
               </div>
               <div id="latest" class="tabcontent">
                  <span class="latest">
                     @foreach($latest as $row)
                      @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                     <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;{{$row->title_bn}}</li>
                     </a>
                     @endforeach
                  </span>
               </div>
               <div id="important" class="tabcontent">
                  <span class="latest">
                     @foreach($popular as $row)
                     @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                     <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;{{$row->title_bn}}</li>
                     </a>
                     @endforeach
                  </span>
               </div>
            </div>
         </div>
         <!-----------------------------End Tab------------------------>
      </div>
   </div>
</div>
<!--------------------------------------------End Third section------------------------------------->
<div class="col-sm-12 col-12" id="foursection" style="background: url(frontend/img/home-banner.webp); background-repeat: no-repeat; padding-top: 20px; padding-bottom: 20px;">
   <div class="container" id="padding">
      <!-- mutir2 -->
      <div class="row">
         <div  class="col-sm-8 col-12">
            <span class="cardlink2">&nbsp;&nbsp;<a href="#">খেলা</a></span>
            <div class="col-sm-12 col-12" id="padding">
               <div class="row">
                  @foreach($onecatsport as $row)
                   @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                  <div class="col-sm-4 col-6 p-0" id="cardtopss">
                     <div class="card">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{($row->image)}}" id="overs"></a>
                        <div class="card-bodys">
                           <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"  class="title">{{$row->title_bn}}</a><br>
                        </div>
                        <span class="cardlink">&nbsp;&nbsp;<a href="#">{{$catsport->category_bn}}</a></span>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <!---------------------------End play-------------------------->
         <div class="col-sm-4 col-12">
            <div class="col-sm-12 col-12" style="margin-top: 40px;">
               <center>
                  <video width="320" height="240" controls  playsinline autoplay loop muted >
                     <source src="assets/image/nogod 2.mp4" type="video/mp4">
                  </video>
               </center>
            </div>
            <div class="col-sm-12 col-12 mt-5" style="background: #e5e5e5;padding-top: 10px; padding-bottom: 20px; border-top: 1px solid lightgray;" >
               <div class="row">
                  <div class="col-sm-6 col-12">
                     <a href="{{route('search.news')}}" title="Search" class="btn btn-primary"><i class="fa fa-search"></i>এলাকার খবর দেখুন</a>
                  </div>
                  <div class="col-sm-6 col-12">
                     <a href="search-news-date" title="Search" class="btn btn-primary"><i class="fa fa-search"></i> তারিখ অনুযায়ী খবর</a>
                  </div>
               </div>
            </div>
         </div>
         <!----------------------------------End Addver-------------------------->
      </div>
   </div>
</div>
<!------------------------------------------------------End Four Section-------------------------------------->
<div class="col-sm-12 col-12" id="thirdsection"  style="background: url(frontend/img/special-section-bg.svg); background-repeat: no-repeat; background-size: cover; background-position: center; padding-top: 20px; padding-bottom: 20px;">
   <div class="container" id="padding">
      <br>
      <div class="row">
         <div class="col-sm-8 col-12">
            <div class="col-sm-12 col-12" id="padding">
               <span class="cardlink2">&nbsp;&nbsp;<a href="#">আন্তর্জাতিক</a></span>
               <div class="row">
                  <div class="col-sm-6 col-12">
                     @foreach($catinta as $row)
                      @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                     <div class="col-sm-12 col-12" id="sidenews">
                        <div class="row">
                           <div class="col-sm-4 col-4">
                              <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{($row->image)}}" class="img-fluid" id="sidenewsimg"></a>
                           </div>
                           <div class="col-sm-8 col-8">
                              <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">
                              {{$row->title_bn}}
                              </a>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <!-----------------------End col-6------------>
                  <div class="col-sm-6 col-12">
                     @foreach($catintatwo as $row)
                           @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                     <div class="col-sm-12 col-12" id="sidenews">
                        <div class="row">
                           <div class="col-sm-4 col-4">
                              <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{($row->image)}}" class="img-fluid" id="sidenewsimg"></a>
                           </div>
                           <div class="col-sm-8 col-8">
                              <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}}</a>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <!-----------------------End col-6------------>
               </div>
            </div>
         </div>
         <!-------------------------------------End Bangladesh------------------------------------->
        @php
        $video=DB::table('videos')->where('first_video',1)->orderBy('id','DESC')->limit(1)->first();
        @endphp
         <div class="col-sm-4 col-12">
            <div class="col-sm-12 col-12" style="margin-top:40px;">
               <div class="container-fluid">
                  <center>
                     <a href="http://www.sbit.edu.com" target="_blank">
                        <video width="100%" height="200" controls   playsinline autoplay loop muted >
                           <source src="assets/image/nogod 2.mp4" type="video/mp4">
                        </video>
                     </a>
                     <br><br>
                     {!!$video->embed_code!!}
                  </center>
               </div>
            </div>
         </div>
         <!-----------------------------End Tab------------------------>
      </div>
   </div>
</div>
<!--------------------------------------------End five------------------------------------->
<div class="col-sm-12 col-12" id="foursection" >
   <div class="container" id="padding">
      <div class="row">
         <div  class="col-sm-8 col-12">
            <span class="cardlink2">&nbsp;&nbsp;<a href="#">শিক্ষা</a></span>
            <div class="col-sm-12 col-12" id="padding">
               <div class="row">
                  @foreach($oneeducationpost as $row)
                            @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
                  <div class="col-sm-4 col-6 p-0" id="cardtopss">
                     <div class="card">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{($row->image)}}" id="overs"></a>
                        <div class="card-bodys">
                           <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"  class="title">{{$row->title_bn}}</a><br>
                        </div>
                        <span class="cardlink">&nbsp;&nbsp;<a href="#">{{$education->category_bn}}</a></span>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <!---------------------------End play-------------------------->
         @php
        $video=DB::table('videos')->where('second_video',1)->orderBy('id','DESC')->limit(1)->first();
        @endphp
         <div class="col-sm-4 col-12">
            <div class="col-sm-12 col-12" style="margin-top: 40px;">
               <center>
                  <video width="100%" height="200" controls  playsinline autoplay loop muted >
                     <source src="assets/image/nogod 2.mp4" type="video/mp4">
                  </video>
                  <br><br>
                   {!!$video->embed_code!!}
               </center>
            </div>
         </div>
         <!----------------------------------End six-------------------------->
      </div>
   </div>
</div>
<div class="col-sm-12 col-12" id="fifthsection" style="background: url(frontend/img/special-section-bg.svg); background-repeat: no-repeat; background-size: cover; background-position: center; padding-top: 20px; padding-bottom: 20px;" >
   <div class="container" id="padding">
      <div class="row">
         <div class="col-sm-4 col-12" id="top">
            <ul class="list-group">
               <li class="list-group-item" id="about">বিনোদন</li>
               @foreach($enpost as $row)
                @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
               <li class="list-group-item">
                  <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}}</a>
               </li>
               @endforeach
            </ul>
         </div>
         @php
         $lifecat=DB::table('categories')->skip(16)->first();
         $lifemain=DB::table('posts')->where('category_id',$lifecat->id)->where('first_section',1)->orderBy('id','DESC')->first();
         $lifesmall=DB::table('posts')->where('category_id',$lifecat->id)->where('first_section',NULL)->orderBy('id','DESC')->get();
         @endphp
         <!-------------------End Entertainment------------------>
         <div class="col-sm-4 col-12" id="top">
            <ul class="list-group">
               <li class="list-group-item" id="abouts">জীবনযাপন</li>
            </ul>
             @php
                 $slug=preg_replace('/\s+/u','-',trim($lifemain->title_bn));
                  @endphp
            <li class="list-group-item" style="padding: 0; border-top: none;">
               <a href="{{URL::to('view-post/'.$lifemain->id.'/'.$slug)}}">
                  <div class="containers">
                     <img src="{{asset($lifemain->image)}}" style="height: 200px;" class="img-fluid" id="over">
                     <div class="content">
                        {{$lifemain->title_bn}}
                     </div>
                  </div>
               </a>
            </li>
            @foreach($lifesmall as $row)
            @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
            <li class="list-group-item">
               <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">&#039;{{$row->title_bn}}&#039;</a>
            </li>
            @endforeach
         </div>
         <!-------------------End Life------------------>
         @php
         $feedcat=DB::table('categories')->skip(17)->first();
         $feedmain=DB::table('posts')->where('category_id',$feedcat->id)->where('first_section',1)->orderBy('id','DESC')->first();
         $feedsmall=DB::table('posts')->where('category_id',$lifecat->id)->where('first_section',NULL)->orderBy('id','DESC')->get();
         @endphp
         <div class="col-sm-4 col-12" id="top">
            <ul class="list-group">
               <li class="list-group-item" id="aboutss">মতামত</li>
            </ul>
             @php
                 $slug=preg_replace('/\s+/u','-',trim($feedmain->title_bn));
                  @endphp
            <li class="list-group-item" style="padding: 0; border-top: none;">
               <a href="{{URL::to('view-post/'.$feedmain->id.'/'.$slug)}}">
                  <div class="containers">
                     <img src="{{asset($feedmain->image)}}" class="img-fluid" id="over" style="height: 200px;">
                     <div class="content">
                        {{$feedmain->title_bn}}
                     </div>
                  </div>
               </a>
            </li>
            @foreach($feedsmall as $row)
            @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
            <li class="list-group-item">
               <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}}</a>
            </li>
            @endforeach
         </div>
         <!-------------------end opinion------------------>
      </div>
   </div>
   <br>
</div>
<!-------------------------------------------------End Fifth Section----------------------------------->
<div class="col-sm-12 col-12" id="top">
   <div class="container">
      <center> <a href="http://partexstargroup.com"  target="_blank"><img src="{{asset('public/front/image/ad1.jpg')}}"  title="#13top" alt="POS-000014" id="banner" class="img-fluid"  style="cursor: pointer;"> </a></center>
   </div>
</div>
@php
$media=DB::table('categories')->skip(13)->first();
$mediapost=DB::table('posts')->where('category_id',$media->id)->where('first_section',NULL)->orderBy('id','DESC')->limit(4)->get();
@endphp
<div class="col-sm-12 col-12" id="sixsection" style="background: url(frontend/img/home-banner.webp); background-repeat: no-repeat; padding-top: 20px; padding-bottom: 20px;">
   <div class="container" id="padding">
      <div class="row">
         <div class="col-sm-4 col-12" id="top">
            <ul class="list-group">
               <li class="list-group-item" id="about2">মিডিয়া</li>
               @foreach($mediapost as $row)
               @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
               <li class="list-group-item">
                  <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$mediapost->title_bn}}</a>
               </li>
               @endforeach
            </ul>
         </div>
         <!------------end media------------------->
         @php
         $world=DB::table('categories')->skip(3)->first();
         $worldpost=DB::table('posts')->where('category_id',$media->id)->where('first_section',NULL)->orderBy('id','DESC')->limit(4)->get();
         @endphp
         <div class="col-sm-4 col-12" id="top">
            <ul class="list-group">
               <li class="list-group-item" id="about3">বিশ্ব</li>
               @foreach($worldpost as $row)
               @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
               <li class="list-group-item">
                  <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}}</a>
               </li>
               @endforeach
            </ul>
         </div>
         <!------------end economy------------------->
         @php
         $science=DB::table('categories')->skip(5)->first();
         $sciencepost=DB::table('posts')->where('category_id',$science->id)->where('first_section',NULL)->orderBy('id','DESC')->limit(4)->get();
         @endphp
         <div class="col-sm-4 col-12" id="top">
            <ul class="list-group">
               <li class="list-group-item" id="about4">বিজ্ঞান ও প্রযুক্তি</li>
               @foreach($sciencepost as $row)
                @php
                 $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                  @endphp
               <li class="list-group-item">
                  <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}" class="title">{{$row->title_bn}}</a>
               </li>
               @endforeach
            </ul>
         </div>
         <!------------end science------------------->
      </div>
   </div>
</div>
<!--------------------------------------------End Six Section------------------------------>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0" nonce="cNBcxYNn"></script>
@endsection