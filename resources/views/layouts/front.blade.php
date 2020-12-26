@php
$category=DB::table('categories')->orderBy('id','ASC')->limit(12)->get();
$allcategory=DB::table('categories')->orderBy('id','ASC')->get();
$post=DB::table('posts')->get();
$headline=DB::table('posts')
->join('categories','posts.category_id','categories.id')
// ->join('subcategories','posts.subcategory_id','subcategories.id')
->select('posts.*','categories.category_bn')
->where('posts.headline',1)
->orderBy('id','DESC')
->limit(5)
->get();
$logo=DB::table('logo')->first();
@endphp
<html lang="en" >
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @yield('meta')
      <title>news</title>
      <link rel="shortcut icon" style="height: 50px; width: 50px;" href="frontend/img/5g1LsfT-_400x400.png" />
      <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/bootstrap.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/style.css')}}">
      <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
      <!--<link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">-->
      <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
      <!--<link href="https://fonts.maateen.me/siyam-rupali/font.css" rel="stylesheet">-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/uikit.min.css')}}">
      <script type="text/javascript" src="{{asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/animate.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/aos.css')}}">
      <script type="text/javascript" src="{{asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script type="text/javascript" src="{{asset('public/front/js/main.js')}}"></script>
   </head>
   <body>
      <nav class="navbar fixed-top navbar-expand-sm d-sm-block  menubar" >
         <div class="container" id="padding">
            <!--  <a href="#" class="nav-link" id="searchs"><img src="img/search1.png" id="search1"></a> -->
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset($logo->logo)}}" class="img-fluid" style="height: 55px;" ></a>
            <span class="d-sm-none d-block" uk-toggle="target: #offcanvas-flip" uk-icon="icon: menu; ratio: 2" style="float: right;"></span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
               <ul class="navbar-nav ml-auto">
                  @foreach($category as $row)
                  <li class="nav-item">
                     <a class="nav-link" href="{{URL::to('posts/'.$row->id.'/'.$row->category_bn)}}">{{$row->category_bn}}</a>
                  </li>
                  @endforeach
                  <!--<li class="nav-item" style="padding: 5px;">-->
                  <!--  <span class="d-sm-block d-none mt-3" style="color: green;" uk-toggle="target: #offcanvas-flip" uk-icon="icon: menu; ratio: 1.2"></span>-->
                  <!--</li>-->
                  <li class="nav-item">
                     <a class="nav-link" onclick="openNav()" ><i class="fas fa-bars" style="font-size: 16px;"></i>&nbsp;&nbsp;সব</a>
                  </li>
                  <!--      <li class="nav-item">
                     <a href="#" class="nav-link" id="search"><i class="fas fa-search" style="font-size: 16px;"></i></a>
                     </li> -->
               </ul>
            </div>
         </div>
      </nav>
      <!---------------------------End Desktop Menu-------------->
      <div id="offcanvas-flip" id="offcanvas-slide" uk-offcanvas="flip: true; overlay: true">
         <!----------Start Mobile  Menu-------->
         <div class="uk-offcanvas-bar" style="padding: 0;  background: #fff; z-index:999;  ">
            <button class="uk-offcanvas-close" type="button" style="top: 15px;" uk-close></button>
            <div class="sidenav d-sm-none d-block" style="margin-top: 60px;" >
               <li style="background-color: #0e7c3f; padding: 15px;font-size: 18px; color: #fff;"><span uk-icon="icon: list; ratio: 1.2"></span>&nbsp;&nbsp;মেনু নির্বাচন করুন</li>
               <div class='col-sm-12 col-12 d-sm-none d-block'>
                  @foreach($allcategory as $row)
                  <li><a href="{{URL::to('posts/'.$row->id.'/'.$row->category_bn)}}">{{$row->category_bn}}</a></li>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
      <!-------------------------------------End Mobile Menu------------------------------>
      <div id="myNav" class="overlay">
         <div class="col-sm-12 col-12 overlay-content">
            <div class="container">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <div class="row">
                  @foreach($allcategory as $row)
                  <div class="col-sm-2 col-6 mt-3">
                     <a href="{{URL::to('posts/'.$row->id.'/'.$row->category_bn)}}" class="topmenu">{{$row->category_bn}}</a>
                  </div>
                  @endforeach
                  <hr>
               </div>
            </div>
         </div>
      </div>
      <style>
         .overlay {
         height: 0%;
         width: 100%;
         position: fixed;
         z-index: 1;
         top: 0;
         left: 0;
         background: #fff;
         overflow-y: hidden;
         transition: 0.5s;
         box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
         }
         .topmenu{
         text-decoration: none;
         color: #414141;
         font-size: 20px;
         transition: 0.4s;
         }
         .topmenu:hover{
         color: #b30f0f;
         text-decoration: none;
         }
         .overlay-content {
         position: relative;
         top: 25%;
         width: 100%;
         }
         .overlay .closebtn {
         position: absolute;
         top: 20px;
         right: 80px;
         font-size: 50px;
         color: #000;
         opacity:0.6;
         text-decoration: none;
         }
         @media  screen and (max-height: 450px) {
         .overlay {overflow-y: auto;}
         .overlay a {font-size: 20px}
         .overlay .closebtn {
         font-size: 40px;
         top: 15px;
         right: 35px;
         }
         }
      </style>
      <script>
         function openNav() {
           document.getElementById("myNav").style.height = "40%";
         }
         
         function closeNav() {
           document.getElementById("myNav").style.height = "0%";
         }
      </script>
      @php
      $social=DB::table('social')->first();
      $contact=DB::table('contact')->first()
      @endphp
      <div class="col-sm-12 col-12 pt-2 pb-2" >
         <div class="container p-0">
            <a href='{{$social->facebook}}' target='blank'> <img src="{{asset('public/front/image/ad1.jpg')}}" class="img-fluid topbanner" style="border: 1px solid #004141;"></a>
            <style>
               .topbanner{
               width:100%;
               }
               @media(max-width: 768px){
               .topbanner{
               height:auto; 
               width:100%;
               }
               }
            </style>
         </div>
      </div>
      <!----------------------End top  adver------------------------>
      @php
      function bn_date($str)
      {
      $en = array(1,2,3,4,5,6,7,8,9,0);
      $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
      $str = str_replace($en, $bn, $str);
      $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
      $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
      $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
      $str = str_replace( $en, $bn, $str );
      $str = str_replace( $en_short, $bn, $str );
      $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
      $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
      $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
      $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
      $str = str_replace( $en, $bn, $str );
      $str = str_replace( $en_short, $bn_short, $str );
      $en = array( 'am', 'pm' );
      $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
      $str = str_replace( $en, $bn, $str );
      $str = str_replace( $en_short, $bn_short, $str );
      $en = array( '১২', '২৪' );
      $bn = array( '৬', '১২' );
      $str = str_replace( $en, $bn, $str );
      return $str;
      }
      @endphp
      <div class="col-sm-12 col-12 d-sm-block d-none" id="top">
         <div class="container" id="padding">
            <span class="date"><span uk-icon="icon: location; ratio: 0.8"></span>&nbsp;&nbsp;ঢাকা। &nbsp;&nbsp;<span uk-icon="icon: ; ratio: 0.8"></span>&nbsp;&nbsp;﻿
            <span uk-icon="icon: clock; ratio: 0.8"></span>&nbsp;&nbsp;{{ bn_date(date('d F Y, l, h:i:s a'))}}</span>    
         </div>
      </div>
            
      <div class="navbar position-static container" style='height:50px;'>
         <div class="col-sm-12 col-12 noticediv p-0" style='   '>
            <div class="row">
               <div class="col-sm-1 col-3" style='background:#b30f0f; padding-bottom:10px; padding-top:10px;  border-top:1px solid #b30f0f;'>
                  <center><strong style="color:#fff; font-size:19px;">সর্বশেষ :</strong></center>
               </div>
               <div class="col-sm-11 col-9 " style='background:rgb(0,0,0,0.8);  padding-bottom:10px; padding-top:10px;  border-top:1px solid #b30f0f;'>
                  <marquee   scrollamount="4" onmouseover="this.stop();"onmouseout="this.start();">
                     <ul class="breaking">
                        @foreach($headline as $row)
                        <li><a href="news/1010008430" style="padding-right: 20px;">{{$row->title_bn}} |</a></li>
                        @endforeach
                     </ul>
                  </marquee>
               </div>
            </div>
         </div>
      </div>
     
      <!----------------------End Date------------------------>
      @yield('content')
      <div class="col-sm-12 col-12" style="background:#fff;padding-top:30px;
         padding-bottom:30px;">
         <div class="center">
            <span>4</span>
            <span>8</span>
            <span>0</span>
            <span>3</span>
            <span>4</span>
            <span>3</span>
            <span>2</span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
         </div>
         <div class="center message mt-2">
            Our Visiting Hits
         </div>
      </div>
      <style>
         .bodycolor {
         background: #4e397a;
         color: #fff;
         font-size: 22px;
         }
         .center span {
         display: inline-block;
         padding: 3px 10px;
         border-radius: 50%;
         background: #44bd32;
         margin-right: -2px;
         color: #fff;
         font-size:15px;
         }
         .center {
         text-align: center;
         margin: 0px auto;
         }
         .message {
         color: #ccc6e3;
         font-size: 12px;
         }
         .breaking li{
         display:inline-block;
         }
         .breaking li a{
         text-decoration:none;
         color:#fff;
         font-size:19px;
         }
         .breaking li a:hover{
         text-decoration:none;
         color:#44bd32;
         }
      </style>
      <div class="col-sm-12 col-12 mt-5" style="background: url(frontend/img/special-section-bg.svg); background-repeat: no-repeat; background-size: cover; background-position: center; padding-top: 30px; padding-bottom: 30px;" >
         <div class="container p-0">
            <div class="row">
               <div class="col-sm-8 col-12 mt-3">
                  <iframe src="{{$contact->map}}" width="100%" height="430" frameborder="0" style="border:0; border-radius:5px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  <br>
               </div>
               <div class="col-sm-4 col-12 mt-3">
                  <center>
                     <ul class="list-group">
                        <li class="list-group-item" style="border-radius:5px; font-size:20px; color:#000;" >
                           <center><b>যোগাযোগ</b></center>
                        </li>
                        <li class="list-group-item" style="border-radius:0px;">
                           <center>
                              <span style="font-size: 17px;">
                              © স্বত্ব dainikbagmara.com.bd<br><br>
                              সম্পাদক: {{$contact->editor_bn}} <br>
                              <br>
                              {{$contact->address_bn}}
                              Contact : {{$contact->contact_number_bn}}<br>
                              <br>
                              <img src="{{asset($logo->logo)}}" class="img-fluid" style="height: 50px; padding: 5px;">
                              </span>
                           </center>
                        </li>
                     </ul>
                  </center>
               </div>
            </div>
         </div>
      </div>
      <style>
         .topmenus{
         text-decoration: none;
         color: #414141;
         font-size: 20px;
         transition: 0.4s;
         border:1px solid #f1f1f1;
         padding:5px 20px;
         }
         .topmenus:hover{
         color: #dc3545;
         text-decoration: none;
         }
      </style>
      <div class='col-sm-12 col-12 pt-3 pb-5' style='background:#fff;'>
         <div class='container'>
            <div class='row'>
               @foreach($allcategory as $row)
               <div class="col-sm-2 col-6 mt-3">
                  <a href="" class="topmenus">{{$row->category_bn}}</a>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <div class="col-sm-12 col-12" style="background:#353b48; padding:20px;" >
         <center>
            <span style="color:gray; font-size: 12px; ">Copyright &copy 2020.  All Right Reserved.</span><br>
            <span style="color:gray;font-size: 12px; " >Developed By <a href="#" target="_blank" style="font-size: 14px; color:#4cd137;" >&nbsp;XXXX</a></span>
         </center>
         <br><br>
      </div>
      <!------------------------Foooter End------------------------->
      -->
      <span id="myBtns"><a href="{{$social->facebook}}" style='text-decoration: none; color: #3b5998;'><img src="{{asset('public/front/image/facebook.svg')}}" class="img-fluid" style="height: 40px;" ></a>
      </span>
      <!--   <span onclick="return topFunction()" id="myBtn">Back To Top</span> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script type="text/javascript" src="{{asset('public/front/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/front/js/owl.carousel.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/front/js/jquery.nivo.slider.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/front/js/uikit.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/front/js/uikit-icons.min.js')}}"></script>
      <script>
         var preloader=document.getElementById('load');
          function myfunctions() {
            preloader.style.display='none';
          }
         
          function openCity(evt, cityName) {
         var i, tabcontent, tablinks;
         tabcontent = document.getElementsByClassName("tabcontent");
         for (i = 0; i < tabcontent.length; i++) {
         tabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablinks");
         for (i = 0; i < tablinks.length; i++) {
         tablinks[i].className = tablinks[i].className.replace(" active", "");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.className += " active";
         }
         document.getElementById("defaultOpen").click();
         
         
      </script>
   </body>
</html>