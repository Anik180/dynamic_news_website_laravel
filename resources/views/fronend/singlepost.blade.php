@extends('layouts.front')
@section('meta')
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $post->title_bn }}" />
  <meta property="og:description" content="{{ $post->detail_bn }}" />
  <meta property="og:image" content="{{URL::to($post->image)}}" />
@endsection
@section('content')
<div class="col-sm-12 col-12">
   <div class="container" id="padding">
      <div class="row">
         <div class="col-sm-8 col-12">
            <div class="col-sm-12 col-12" id="padding">
               <p class="headtitle">{{$post->title_bn}}</p>
               <a href="{{($post->image)}}"><img src="{{asset($post->image)}}" class="img-fluid" id="detailsimg"></a>
               <div style="border-bottom: 1px solid lightgray; padding: 5px 0px;">
                  <span class="sorttitle">{{$post->image_caption}}</span><br><span>{{$post->post_date}}</span>
               </div>
               <div class="social" id="footertop">
                  <span style="font-size: 20px;">শেয়ার করুন :</span><br>
                  <div class="description-bottom">
                     <div class="social-icons-div social-icons-bottom">
                        <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                        <div class="addthis_inline_share_toolbox">
                           <div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}"></div>
                        </div>
                     </div>
                     <div class="next-story">
                        <p></p>
                     </div>
                  </div>
               </div>
               <div>
                  <h6 style='line-height:40px; font-size:16px; color:#414141;'>
                     <p>নিউজ ডেস্কঃ&nbsp;&nbsp;</p>
                     <p>{!!$post->detail_bn!!}</p>
                  </h6>
               </div>
            </div>
            <!------------------------------End details------------------------>
            
            <div class="col-sm-12 col-12" style="padding: 0;">
               <button class="btn btn-block btn-comment"><i class="fa fa-facebook-official"></i> মন্তব্য যোগ করুন </button>
                  <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width=""></div>
               <div class="row flex-row">
                  <div class="col-md-4 col-sm-6 col-xs-12 flex-col"></div>
               </div>
            </div>
           
         </div>
         <div class="col-sm-4 col-12 mt-2">
            <div class="col-sm-12 col-12" id="padding">
               <div class="col-sm-12 col-12" id="padding">
                  <!-- <div style="margin-top: 20px; padding: 0;">-->
                  <!--     <video width="100%" height="240" controls  playsinline autoplay loop muted >-->
                  <!--     <source src="public/AdImage/nogod 2.mp4" type="video/mp4">-->
                  <!--      </video>-->
                  <!--</div>-->
                  {{-- 
                  <center> <a href="#"><img src="assets/image/addv.jpg" class="img-fluid" id="bannerss"></a></center>
                  <br> --}}
                  <center> <a href="#"><img src="{{asset('assets/image/shuvo-noboborsho.jpg')}}" class="img-fluid"></a></center>
               </div>
               <div class="tab" style="margin-top: 20px;">
                  <button class="tablinks" onclick="openCity(event, 'latest')" id="defaultOpen">সর্বশেষ</button>
               </div>
               <div id="latest" class="tabcontent" style="height: 450px;">
                  <span class="latest">
                     <a href="public/news/1010008430">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;নোয়াখালীর বেগমগঞ্জের বীর মুক্তিযোদ্ধা আবদুল মালেক আর নেই</li>
                     </a>
                     <a href="public/news/1010008429">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;আরো ৪ টি জেলাকে রেড জোন চিহ্নিত করে সাধারণ ছুটির প্রজ্ঞাপন জারি</li>
                     </a>
                     <a href="public/news/1010008428">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;৩০ সেপ্টেম্বর পর্যন্ত কিস্তি বা ঋণকে খেলাপি দেখানো যাবে না</li>
                     </a>
                     <a href="public/news/1010008427">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;বাংলাদেশ আওয়ামীলীগের ৭১তম প্রতিষ্ঠা বার্ষিকীতে ছাগলনাইয়ায় জাতির পিতার প্রতিকৃতিতে শ্রদ্ধা</li>
                     </a>
                     <a href="public/news/1010008426">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;৭ কোটি মানুষ সরকারি ত্রান সহায়তা পেয়েছে</li>
                     </a>
                     <a href="public/news/1010008425">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;রাণীশংকৈলে ভাতিজার কিলঘুষির আঘাতে চাচার মৃত্যু</li>
                     </a>
                     <a href="public/news/1010008424">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;যেকোনো সময় টাকা তুলে নিতে পারবেন হজের নিবন্ধনকারীরা</li>
                     </a>
                     <a href="public/news/1010008423">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;ঢাকা দক্ষিণ সিটিতে লকডাউন বাস্তবায়নে প্রয়োজনীয় সব প্রস্তুতি সম্পন্ন-তাপস</li>
                     </a>
                     <a href="public/news/1010008422">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;দেশে করোনায় নতুন ৩৪১২ জন শনাক্ত,মৃত্যু ৪৩ জন</li>
                     </a>
                     <a href="public/news/1010008421">
                        <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp;আরেক মীরজাফর মোশতাক এবং জিয়ার চক্রান্তে বঙ্গবন্ধুকে হত্যা করা হয়-প্রধানমন্ত্রী</li>
                     </a>
                  </span>
               </div>
               <div class="col-sm-12 col-12" id="padding">
                  <div style="margin-top: 20px; padding: 0;">
                     <video width="100%" height="240" controls  playsinline autoplay loop muted >
                        <source src="assets/image/nogod 2.mp4" type="video/mp4">
                     </video>
                  </div>
               </div>
               <br>
            </div>
         </div>
         <!----------------------end col-4------------->
      </div>
   </div>
</div>
<div class="col-sm-12 col-12" style="margin-top: 50px;">
   <div class="container" id="padding">
      <div class="owl-carousel" >
         <div class="item">
            <div class="cards">
               <a href="public/news/1010008430"><img src="assets/image/big.jpg" id="overs2"></a>
               <div class="card-bodys">
                  <a href="public/news/1010008430"  class="title">নোয়াখালীর বেগমগঞ্জের বীর মুক্তিযোদ্ধা আবদুল মালেক আর নেই</a><br><br>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="cards">
               <a href="public/news/1010008427"><img src="assets/image/big.jpg" id="overs2"></a>
               <div class="card-bodys">
                  <a href="public/news/1010008427"  class="title">বাংলাদেশ আওয়ামীলীগের ৭১তম প্রতিষ্ঠা বার্ষিকীতে ছাগলনাইয়ায় জাতির পিতার প্রতিকৃতিতে শ্রদ্ধা</a><br><br>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="cards">
               <a href="public/news/1010008405"><img src="assets/image/big.jpg" id="overs2"></a>
               <div class="card-bodys">
                  <a href="public/news/1010008405"  class="title">দাগনভূঞায় পল্লী চিকিৎসকের লাশ রেখে উধাও স্বজনরা,দাফন করলেন ইউপি চেয়ারম্যন</a><br><br>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="cards">
               <a href="public/news/1010008291"><img src="assets/image/big.jpg" id="overs2"></a>
               <div class="card-bodys">
                  <a href="public/news/1010008291"  class="title">ছাগলনাইয়া উপজেলার প্রশাসনের উদ্যোগে আইন শৃংখলা কমিটির জরুরী বৈঠক অনুষ্ঠিত</a><br><br>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="cards">
               <a href="public/news/1010008267"><img src="assets/image/big.jpg" id="overs2"></a>
               <div class="card-bodys">
                  <a href="public/news/1010008267"  class="title">ফুলগাজীতে গৃহহীন এক মা!এ যেন পল্লী কবির আরেক আসমানি</a><br><br>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div></div>
<!------------------------Foooter End------------------------->
<div class="navbar fixed-bottom" style='height:50px;'>
   <div class="col-sm-12 col-12 noticediv p-0" style='   '>
      <div class="row">
         <div class="col-sm-1 col-3" style='background:#b30f0f; padding-bottom:10px; padding-top:10px;  border-top:1px solid #b30f0f;'>
            <center><strong style="color:#fff; font-size:19px;">সর্বশেষ :</strong></center>
         </div>
         <div class="col-sm-11 col-9 " style='background:rgb(0,0,0,0.8);  padding-bottom:10px; padding-top:10px;  border-top:1px solid #b30f0f;'>
            <marquee   scrollamount="4" onmouseover="this.stop();"onmouseout="this.start();">
               <ul class="breaking">
                  <li><a href="public/news/1010008430" style="padding-right: 20px;">নোয়াখালীর বেগমগঞ্জের বীর মুক্তিযোদ্ধা আবদুল মালেক আর নেই | </a></li>
                  <li><a href="public/news/1010008429" style="padding-right: 20px;">আরো ৪ টি জেলাকে রেড জোন চিহ্নিত করে সাধারণ ছুটির প্রজ্ঞাপন জারি | </a></li>
                  <li><a href="public/news/1010008428" style="padding-right: 20px;">৩০ সেপ্টেম্বর পর্যন্ত কিস্তি বা ঋণকে খেলাপি দেখানো যাবে না | </a></li>
                  <li><a href="public/news/1010008427" style="padding-right: 20px;">বাংলাদেশ আওয়ামীলীগের ৭১তম প্রতিষ্ঠা বার্ষিকীতে ছাগলনাইয়ায় জাতির পিতার প্রতিকৃতিতে শ্রদ্ধা | </a></li>
                  <li><a href="public/news/1010008426" style="padding-right: 20px;">৭ কোটি মানুষ সরকারি ত্রান সহায়তা পেয়েছে | </a></li>
               </ul>
            </marquee>
         </div>
      </div>
   </div>
</div>
-->
{{--   <span id="myBtns"><a href="https://www.facebook.com/FixedNews24com-101049378298325/" style='text-decoration: none; color: #3b5998;'><img src="assets/image/facebook.svg" class="img-fluid" style="height: 40px;" ></a>
</span> --}}
<!--   <span onclick="return topFunction()" id="myBtn">Back To Top</span> -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="6uGGugQ3"></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5efd6db9f8f53a00131ec6fe&product=inline-share-buttons" data-href="{{Request::url()}}" async="async"></script>
@endsection