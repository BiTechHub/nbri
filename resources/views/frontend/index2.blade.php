@extends('frontend.layouts2.main')
@section('content')

<marquee width="100%" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="background-color:white; height:32px;color:#003530;margin-top: 12px;font-weight: bold;">
<p>@foreach ($news as $newss)
      @if($newss->type == 'Link')
    <a href="{{ $newss->file_name }}" target="_blank" style="color: #003630;"><img src="{{ url('/') }}/new_red.gif"> {{$newss->subject}}</a>
    @else
    <a href="{{ url('/') }}/uploads/news/{{ $newss->file_name }}" target="_blank" style="color: #003630;"><img src="{{ url('/') }}/new_red.gif"> {{$newss->subject}} <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
    @endif
@endforeach </p>
</marquee>
<style>
.note {
position: relative;
overflow: hidden;
transition: transform 0.5s;
}

.note:hover {
transform: scale(1.05);
}

/* Custom styles for the image */
.card-img-top {
transition: opacity 0.5s;
}

.note:hover .card-img-top {
opacity: 0;
}

/* Custom styles for the list */
.note ul {
position: absolute;
top: 45%;
left: 50%;
transform: translate(-50%, -50%);
display: none;
list-style: none;
padding: 0;
width: 270px
}

.note:hover ul {
display: block;
}
.note ul li:hover a {
color: #ff8d00;
}
.note ul li a {
color: #000;
}
.note li {
margin: 5px 0;
}
/* .card-img-top {
width: 20% !important;
} */

.note2 {
padding: 0.25rem !important;
}
a:not([href]):not([tabindex]) {
color: white !important;
}
.tt{
color: #000;
text-decoration: none; 
font-weight: bold; 
transition: color 0.3s; 
text-align: center;
}


.pp:hover a{
color: #000;
} 
.scroll {
height: 230px;
overflow-x: hidden;
overflow-y: auto;
}
.btn-back1{
background: rgba(248,80,50,1);
background: -webkit-linear-gradient(left, rgba(248,80,50,1) 0%, rgba(248,80,50,1) 54%, rgba(255,238,0,1) 100%);
background: linear-gradient(to right, rgba(248,80,50,1) 0%, rgba(248,80,50,1) 54%, rgba(255,238,0,1) 100%);
color: #fff;
}
.btn-back2:hover{
background: rgba(235,221,29,1);
background: -webkit-linear-gradient(left, rgba(235,221,29,1) 0%, rgba(255,238,0,1) 0%, rgba(248,80,50,1) 46%, rgba(248,80,50,1) 100%);
background: linear-gradient(to right, rgba(235,221,29,1) 0%, rgba(255,238,0,1) 0%, rgba(248,80,50,1) 46%, rgba(248,80,50,1) 100%);
color: #fff;
}

.btn-back2{
   background: var(--Primary-gradient, linear-gradient(90deg, #DB5E00 0%, #003630 100%));
}
.btn-back2:hover{
     background: var(--Primary-gradient, linear-gradient(90deg, #003630 0%, #DB5E00 100%));
}


.zoom1:hover {
-ms-transform: scale(1.05);
-webkit-transform: scale(1.05); 
transform: scale(1.05);
}



.btn2 {
    text-align: center;
    font-size:60px;
    text-transform:uppercase;
    height:90px;
    vertical-align: middle;
    line-height: normal;
    width:15rem;
    border:5px solid #9198e5;
    border-radius: 10px;
    font-family:Allan;
  margin-left: 20px;
  margin-right: 20px;
}

.btn2:active {
    color:aliceblue;
    transform: scale(0.99,0.99);
}
.one {
    background: linear-gradient(#e66465, #9198e5);
    transition: all 0.4s;
    transition-timing-function:cubic-bezier(0.5, 3, 0, 1);
}

.one:hover {
    background: linear-gradient(#e66496, #91b8e5);
    transform: skewX(-15deg);
}

.two {
    background: linear-gradient(#64e68b, #e5b091);
    transition: all 0.4s;
    transition-timing-function:cubic-bezier(0.5, 3, 0, 1);
}

.two:hover {
    background: linear-gradient(#64e6d0, #e5c391);
    transform: rotatex(20deg) rotateY(20deg);
}

.three {
    background: linear-gradient(#b986d6, #88daa1);
    border:4px solid #e4a13d;
    transition: all 0.4s;
    transition-timing-function:cubic-bezier(0.5, 3, 0, 1);
}

.three:hover {
    transform:scale(1.2,1.2);
}




#flexSlider {
max-height: 400px;
overflow: hidden; 
}
#flexSlider img {
height: auto; 
max-height: 400px; 
}
.flip-card {
  background-color: transparent;
  width: 320px;
  padding:6px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}
.front h1 {
    font-size: 19px;
    background-color: #ffffffe3;
    margin: 108px 0px;
    padding: 10px 0px;
}
.front {
    z-index: 2;
    transform: rotateY(0deg);
}
.front {
    
    color: #fff;
    text-align: center;
    border: 5px solid #fff;
}
.front, .back {
    backface-visibility: hidden;
    transition: 0.6s;
    transform-style: preserve-3d;
    position: absolute;
    top: 0;
    left: 0;
}
.flip-container, .front, .back {
    width: 100%;
    height: 275px;
    float: left;
    border-radius: 10px;
}
.flip-container {
    perspective: 1000px;
    transform-style: preserve-3d;
}
h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
    font-family: var(--headingFont);
    color: #000;
}
.back {
    transform: rotateY(-180deg);
    background: #fff;
    color: #000;
    text-align: center;
    line-height: 1.4em;
}
.back ul li {
    padding:3px;
}
.sidebarbuttonemployee {
    position: fixed;
    background-color: #1f39ab;
  
    top: 70%;
    left: -66px;
    transform: rotate(270deg);
    color: #fff !important;
    text-transform: uppercase;
    padding: 5px 9px;
    border: 1px solid #fff;
    cursor: pointer;
    z-index: 9999;
    font-size: 16px;
}

nav > .nav.nav-tabs{

  border: none;
    color:#fff;
    background:#272e38;
    border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
  border: none;
    padding: 18px 25px;
    color:#fff;
    background:#272e38;
    border-radius:0;
}
nav > div a.nav-item.nav-link.active
{
  border: none;
    padding: 18px 25px;
    color:#fff;
    background:#ee9926;
    border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
 {
  content: "";
  position: relative;
  bottom: -60px;
  left: -10%;
  border: 15px solid transparent;
  border-top-color: #ee9926 ;
}
.tab-content{
  background: #fdfdfd;
    line-height: 25px;
    border: 1px solid #ddd;
    border-top:5px solid #ee9926;
    border-bottom:5px solid #ee9926;
    padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
  border: none;
    background: #ee9926;
    color:#fff;
    border-radius:0;
    transition:background 0.20s linear;
}

.shadow-shani {
    
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<section class="wrapper banner-wrapper" style="border: 2px solid #db5e00;">
    
    
<div id="flexSlider" class="flexslider">
    
<ul class="slides">
@foreach($slider as $sliders)
<li><img src="{{url('/')}}/uploads/{{$sliders->image}}" alt="{{$sliders->heading}}"></li>
@endforeach
</ul>
</div>
</section>

{{--
<section class="wrapper news-section">
<div class="carousel-container">
<div id="flexCarouse2" class="news-section2">
<div class="notification" style="padding: 12px 20px !important;"><p>Latest Updates</p></div>
<ul class="slides news-slide">
@foreach ($news as $newss)

<!--{{ implode(' ', array_slice(str_word_count($newss->subject, 1), 0, 10)) }} @if(str_word_count($newss->subject) > 10)... @endif-->
<li>
  <span>
      @if($newss->type == 'Link')
    <a href="{{ $newss->file_name }}" target="_blank" class="text-white">{{$newss->subject}}</a>
    @else
    <a href="{{ url('/') }}/uploads/news/{{ $newss->file_name }}" target="_blank" class="text-white">{{$newss->subject}} <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
    @endif
    
  </span>
</li>
@endforeach 
 <li>
<span>Description of Latest Updates 4 goes here.</span>
</li>
</ul>
</div>
</div>
</section>
<div class="wrapper" id="skipCont"></div>
<!--/#skipCont-->

<marquee width="100%" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="background-color:#003530; height:25px;color:white;">
<p>Bill Payment, Electricity Supply information is sent to you by the Electricity Department only from the UPPCLT / UPPCLA&nbsp; Header on SMS and from verified green tick account on whatsapp. whatsapp no - PVVNL - 7859804803. Ignore SMS/whatsapp received from any other source/header. Be aware, Be alert</p>
</marquee>
 --}}

<section id="fontSize" class="wrapper body-wrapper home-btm-slider" style="padding-top:20px;">
<div class="row text-center">
    <div class="col-md-12">
    @foreach ($content as $contents)
    @if ($contents->con_type == 'Link')
    <a href="{{$contents->link}}" class="btn mb-4 @if($contents->effect) {{$contents->effect}} @endif" title="{{$contents->heading}}" target="_blank" style="background-color: {{ $contents->background_color }}; color: {{ $contents->text_color }}; padding-top: 14px;padding-bottom: 14px;padding-left: 20px;padding-right: 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">{{$contents->heading}}</a>
    @endif
    @if ($contents->con_type == 'Pdf')

    <a href="{{url('/')}}/uploads/{{$contents->file}}" class="btn mb-4 @if($contents->effect) {{$contents->effect}} @endif" title="{{$contents->heading}}" target="_blank" style="background-color: {{ $contents->background_color }}; color: {{ $contents->text_color }}; padding-top: 14px;padding-bottom: 14px;padding-left: 20px;padding-right: 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">{{$contents->heading}}</a>
    @endif
    @endforeach

  </div>
</div>
<div class="bg-wrapper top-bg-wrapper gray-bg- padding-top-bott pb-0" style="padding: 15px 0;background-image: url(img_2025/hrader_bg.jpg);background-repeat: no-repeat;background-size: cover;">
<div class="container common-container four_content body-container top-body-container padding-top-bott2" style="max-width: 1490px;">
@if($officer->isNotEmpty())
<div class="minister clearfix shadow-shani" style="width: 30%;">
<div class="minister-box clearfix">
  <div class="row">
    
        @foreach ($officer as $officers)
        <div class="col-md-12">
          <div class="minister-sub p-0 border" style="padding-right: 20px !important;">
            <div class="row">
              <div class="col-3 p-0">
                <div class="minister-image">
                  <img src="{{url('/')}}/uploads/{{$officers->image}}" alt="{{$officers->name}}" class="-img-thumbnail img-fluid zoom1" style="width: 80px;height: 80px;"></div></div>
              <div class="col-9 p-0">
                <div class="min-info p-0">
                  <span style="color: #0056b3;font-weight: bold;font-size: 19px;">{{$officers->name}}</span><br>
                  <span style="color: #ff7c1b;font-weight: 600;">{{$officers->deg}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      
  </div>
</div>
</div>
@endif
<div class="left-block" @if($officer->isEmpty()) style="width: 100%;" @endif style="width: 70%;">
<div class="row text-center">
  <div class="col-md-12">
   <div class="col-md-5">
   

<nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="border-top-left-radius: 25px;border-top-right-radius: 25px;">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="border-top-left-radius: 25px;">Press Release</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="border-top-right-radius: 25px;">What's New</a>
                     
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0 shadow-shani" id="nav-tabContent" style="height:453px;">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <ul style="list-style: inside;">
                          @foreach ($news_pr as $index => $news_pr)
                          <li class="text-left" style="padding-left:15px;padding-top:10px;"><a href="{{ url('/') }}/uploads/news/{{ $news_pr->file_name }}" target="_blank">{{ $news_pr->subject }}</a></li>
                          @endforeach
                      </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <ul style="list-style: inside;">
                          @foreach ($news_w as $index => $news_w)
                          <li style="padding-left:15px;padding-top:10px;"><a href="{{ url('/') }}/uploads/news/{{ $news_w->file_name }}" target="_blank">{{ $news_w->subject }}</a></li>
                          @endforeach
                      </ul>
                    </div>
                    
                  </div>



  </div>
  <div class="col-md-7">
  <style>
  
  #Layer_2 a {
    font-weight: bold;
  }
  #Layer_2 a:hover {
    text-decoration: none;
    fill: #003530 !important;
  }
  
  #Layer_2 path:hover {
    fill: #003530 !important;
  }

  #Layer_2 a:focus path {
    fill: #003530 !important;
    text-decoration: none;
  }
  
  #Layer_2 a:hover text,
  #Layer_2 a:focus text {
    fill: #FFFFFF;
    color: white !important;
    text-decoration: none;
  }
</style>


<svg id="map-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 121 876 854" style="enable-background: new 0 0 1013.4 936;filter: drop-shadow(-8px 4px 0px #cfcfcf);" xml:space="preserve"> 
		<g id="Layer_2">
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Saharanpur">
				<path d="m 174.41,407.364 c 11.203,0.295 23.938,-4.953 33.55,2.653 1.533,1.238 17.395,13.031 16.922,14.208 6.25,-13.795 25.235,-9.434 37.087,-8.902 9.08,0.413 13.738,-12.559 17.808,-19.516 3.655,-6.191 9.729,-10.79 15.742,-15.389 -10.85,-5.837 -9.315,-23.467 -10.672,-33.785 -2.713,-19.988 -13.268,-29.186 3.125,-47.169 12.911,-14.092 24.469,-24.764 30.719,-43.514 6.485,-19.457 8.077,-48.113 37.146,-42.865 -34.434,-20.165 -73.938,-24.233 -99.82,-58.49 -5.896,28.479 -27.063,46.049 -44.812,67.393 -8.312,9.965 -15.564,21.108 -18.277,33.962 -3.008,14.269 -18.867,0 -25.942,12.972 -5.72,10.437 -6.78,22.169 -19.575,24.646 -12.972,2.536 -15.035,15.979 -15.39,27.004 -0.412,11.438 0.53,22.583 -6.072,32.605 -8.903,13.443 -14.092,26.297 -21.875,40.212 22.872,9.612 45.514,13.385 70.336,13.975" id="Saharanpur" style="block-size:auto;d:path(&quot;M 174.41 407.364 C 185.613 407.659 198.348 402.411 207.96 410.017 C 209.493 411.255 225.355 423.048 224.882 424.225 C 231.132 410.43 250.117 414.791 261.969 415.323 C 271.049 415.736 275.707 402.764 279.777 395.807 C 283.432 389.616 289.506 385.017 295.519 380.418 C 284.669 374.581 286.204 356.951 284.847 346.633 C 282.134 326.645 271.579 317.447 287.972 299.464 C 300.883 285.372 312.441 274.7 318.691 255.95 C 325.176 236.493 326.768 207.837 355.837 213.085 C 321.403 192.92 281.899 188.852 256.017 154.595 C 250.121 183.074 228.954 200.644 211.205 221.988 C 202.893 231.953 195.641 243.096 192.928 255.95 C 189.92 270.219 174.061 255.95 166.986 268.922 C 161.266 279.359 160.206 291.091 147.411 293.568 C 134.439 296.104 132.376 309.547 132.021 320.572 C 131.609 332.01 132.551 343.155 125.949 353.177 C 117.046 366.62 111.857 379.474 104.074 393.389 C 126.946 403.001 149.588 406.774 174.41 407.364&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 170 350)">Saharanpur</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Shamli">
				<path d="m 210.194,424.664 c -3.765,-3.765 -11.954,-9.301 -8.737,-15.775 -5.754,-1.725 -10.713,-2.726 -12.247,-2.586 -27.005,2.417 -54.245,-0.177 -79.479,-10.495 -19.162,-7.842 -23.113,36.674 -25.648,51.237 -5.069,28.655 -0.177,51.533 5.543,79.422 16.392,-6.31 35.377,-4.54 50.294,4.6 5.682,3.52 10.295,9.086 16.354,11.969 0.324,-0.292 0.501,-0.457 0.501,-0.457 0,0 5.421,-8.913 5.421,-13.913 0,-5 0,-5 0,-5 0,0 9,-13 16,-18 7,-5 17,-8 20,-17 3,-9 4,-20 4,-23 0,-3 0,-8 4,-12 4,-4 8,-12 8,-16 0,-4 -0.002,-9.002 -4.002,-13.002 z" id="Shamli" style="block-size:auto;d:path(&quot;M 210.194 424.664 C 206.429 420.899 198.24 415.363 201.457 408.889 C 195.703 407.164 190.744 406.163 189.21 406.303 C 162.205 408.72 134.965 406.126 109.731 395.808 C 90.569 387.966 86.618 432.482 84.083 447.045 C 79.014 475.7 83.906 498.578 89.626 526.467 C 106.018 520.157 125.003 521.927 139.92 531.067 C 145.602 534.587 150.215 540.153 156.274 543.036 C 156.598 542.744 156.775 542.579 156.775 542.579 C 156.775 542.579 162.196 533.666 162.196 528.666 C 162.196 523.666 162.196 523.666 162.196 523.666 C 162.196 523.666 171.196 510.666 178.196 505.666 C 185.196 500.666 195.196 497.666 198.196 488.666 C 201.196 479.666 202.196 468.666 202.196 465.666 C 202.196 462.666 202.196 457.666 206.196 453.666 C 210.196 449.666 214.196 441.666 214.196 437.666 C 214.196 433.666 214.194 428.664 210.194 424.664 Z&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 110 490)">Shamli</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Muzaffarnagar">
				<path d="m 374.88,541.62 c -16.097,-19.281 -11.024,-42.983 -11.91,-66.568 -0.413,-11.614 1.77,-14.149 5.248,-23.172 3.773,-9.787 5.719,-23.467 -2.357,-29.717 -6.311,-4.894 -11.439,-12.677 -18.573,-16.332 8.49,-9.08 1.355,-20.342 3.479,-30.778 -14.149,2.477 -27.652,8.844 -42.217,8.491 -7.192,-0.177 -11.674,-5.896 -16.861,0.413 -5.365,6.486 -7.018,3.42 -12.028,11.852 -8.962,15.212 -11.026,19.929 -28.36,18.809 -9.61,-0.59 -21.875,-0.648 -26.532,9.67 2.303,-5.855 -12.034,-12.019 -23.308,-15.397 -3.217,6.474 4.974,12.01 8.737,15.775 4,4 4,9 4,13 0,4 -4,12 -8,16 -4,4 -4,9 -4,12 0,3 -1,14 -4,23 -3,9 -13,12 -20,17 -7,5 -16,18 -16,18 0,0 0,0 0,5 0,5 -5.421,13.913 -5.421,13.913 0,0 -0.177,0.165 -0.501,0.457 1.047,0.499 2.132,0.926 3.278,1.239 11.086,3.064 21.464,-4.719 31.898,1.297 6.781,3.892 9.257,12.382 17.217,10.495 10.438,-2.419 20.578,-6.191 31.073,-8.433 22.347,-4.775 25.884,14.74 44.516,18.219 19.752,3.716 38.207,-1.71 55.542,-10.259 9.021,-4.422 16.922,-4.6 26.297,-1.062 17.686,6.722 19.926,0.354 8.783,-12.912 z" id="Muzaffarnagar" style="block-size:auto;d:path(&quot;M 374.88 541.62 C 358.783 522.339 363.856 498.637 362.97 475.052 C 362.557 463.438 364.74 460.903 368.218 451.88 C 371.991 442.093 373.937 428.413 365.861 422.163 C 359.55 417.269 354.422 409.486 347.288 405.831 C 355.778 396.751 348.643 385.489 350.767 375.053 C 336.618 377.53 323.115 383.897 308.55 383.544 C 301.358 383.367 296.876 377.648 291.689 383.957 C 286.324 390.443 284.671 387.377 279.661 395.809 C 270.699 411.021 268.635 415.738 251.301 414.618 C 241.691 414.028 229.426 413.97 224.769 424.288 C 227.072 418.433 212.735 412.269 201.461 408.891 C 198.244 415.365 206.435 420.901 210.198 424.666 C 214.198 428.666 214.198 433.666 214.198 437.666 C 214.198 441.666 210.198 449.666 206.198 453.666 C 202.198 457.666 202.198 462.666 202.198 465.666 C 202.198 468.666 201.198 479.666 198.198 488.666 C 195.198 497.666 185.198 500.666 178.198 505.666 C 171.198 510.666 162.198 523.666 162.198 523.666 C 162.198 523.666 162.198 523.666 162.198 528.666 C 162.198 533.666 156.777 542.579 156.777 542.579 C 156.777 542.579 156.6 542.744 156.276 543.036 C 157.323 543.535 158.408 543.962 159.554 544.275 C 170.64 547.339 181.018 539.556 191.452 545.572 C 198.233 549.464 200.709 557.954 208.669 556.067 C 219.107 553.648 229.247 549.876 239.742 547.634 C 262.089 542.859 265.626 562.374 284.258 565.853 C 304.01 569.569 322.465 564.143 339.8 555.594 C 348.821 551.172 356.722 550.994 366.097 554.532 C 383.783 561.254 386.023 554.886 374.88 541.62 Z&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 196 535)">Muzaffarnagar</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Bijnor">
				<path d="m 363.028,457.895 c -2.063,31.132 -4.775,64.621 16.45,89.092 4.835,5.602 2.477,21.58 2.24,32.604 -0.295,12.265 -1.475,24.233 -5.012,36.025 37.677,1.003 70.872,12.5 108.843,4.362 12.795,-2.771 30.071,-2.005 35.79,-13.854 3.538,-7.312 4.481,-11.97 4.305,-19.988 8.667,-2.477 12.735,-9.257 14.917,-17.217 3.421,-12.559 7.665,-28.892 18.455,-37.264 4.895,-3.833 10.85,-6.191 17.04,-6.958 9.61,-1.238 6.25,-8.667 14.388,-10.082 13.502,-2.358 55.011,-7.547 27.651,-25.825 -21.285,-14.21 -42.511,-27.063 -63.441,-42.099 -14.21,-10.2 -28.773,-21.108 -38.385,-36.026 -8.668,-13.443 -13.267,-29.363 -25.412,-40.448 -11.497,-10.436 -21.108,-9.729 -34.61,-4.363 -12.854,5.071 -25.825,0.531 -33.372,14.033 -7.193,12.913 -21.64,11.969 -28.597,23.172 -4.895,7.901 -9.258,29.245 -22.938,22.465 -0.234,7.665 1.593,28.891 -8.312,32.371" id="Bijnor" style="block-size:auto;d:path(&quot;M 363.028 457.895 C 360.965 489.027 358.253 522.516 379.478 546.987 C 384.313 552.589 381.955 568.567 381.718 579.591 C 381.423 591.856 380.243 603.824 376.706 615.616 C 414.383 616.619 447.578 628.116 485.549 619.978 C 498.344 617.207 515.62 617.973 521.339 606.124 C 524.877 598.812 525.82 594.154 525.644 586.136 C 534.311 583.659 538.379 576.879 540.561 568.919 C 543.982 556.36 548.226 540.027 559.016 531.655 C 563.911 527.822 569.866 525.464 576.056 524.697 C 585.666 523.459 582.306 516.03 590.444 514.615 C 603.946 512.257 645.455 507.068 618.095 488.79 C 596.81 474.58 575.584 461.727 554.654 446.691 C 540.444 436.491 525.881 425.583 516.269 410.665 C 507.601 397.222 503.002 381.302 490.857 370.217 C 479.36 359.781 469.749 360.488 456.247 365.854 C 443.393 370.925 430.422 366.385 422.875 379.887 C 415.682 392.8 401.235 391.856 394.278 403.059 C 389.383 410.96 385.02 432.304 371.34 425.524 C 371.106 433.189 372.933 454.415 363.028 457.895&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 450 520)">Bijnor</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Baghpat">
				<path d="m 156.604,676.701 c 7.604,1.002 13.561,6.84 20.047,10.259 1.532,-12.854 -2.241,-28.772 11.969,-35.672 10.083,-4.952 2.653,-18.337 1.946,-29.952 -1.003,-15.33 -5.955,-57.547 13.737,-63.974 -8.963,-10.555 -16.862,-15.742 -30.896,-12.794 -17.865,3.772 -25.767,-10.674 -40.33,-17.04 -13.62,-5.955 -29.479,-6.368 -43.337,-1.062 4.068,19.87 5.071,40.152 5.778,60.317 0.59,17.158 0.885,33.667 5.66,50.295 0.295,1.061 3.833,15.035 4.718,14.857 3.064,-0.648 8.137,8.785 8.077,11.025 -0.118,5.425 -13.268,4.127 1.827,10.438 1.241,13.622 32.254,2.183 40.804,3.303" id="Baghpat" style="block-size:auto;d:path(&quot;M 156.604 676.701 C 164.208 677.703 170.165 683.541 176.651 686.96 C 178.183 674.106 174.41 658.188 188.62 651.288 C 198.703 646.336 191.273 632.951 190.566 621.336 C 189.563 606.006 184.611 563.789 204.303 557.362 C 195.34 546.807 187.441 541.62 173.407 544.568 C 155.542 548.34 147.64 533.894 133.077 527.528 C 119.457 521.573 103.598 521.16 89.74 526.466 C 93.808 546.336 94.811 566.618 95.518 586.783 C 96.108 603.941 96.403 620.45 101.178 637.078 C 101.473 638.139 105.011 652.113 105.896 651.935 C 108.96 651.287 114.033 660.72 113.973 662.96 C 113.855 668.385 100.705 667.087 115.8 673.398 C 117.041 687.02 148.054 675.581 156.604 676.701&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 110 637)">Baghpat</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Meerut">
				<path d="m 370.753,615.558 c 11.438,-0.234 10.142,-18.809 10.672,-28.597 0.768,-14.504 5.13,-25.412 -8.667,-29.952 -15.565,-5.069 -24.057,-6.368 -38.915,1.71 -12.323,6.662 -24.232,7.312 -37.971,7.605 -26.533,0.59 -34.14,-25.06 -62.912,-17.039 -25.942,7.252 -39.8,8.254 -42.217,37.912 -1.71,20.872 -4.658,54.894 11.202,71.696 8.02,8.49 20.105,10.318 31.19,11.438 12.322,1.298 25.235,-1.887 25.648,12.5 0.707,22.523 15.979,41.568 33.844,15.86 18.926,-27.122 51.473,-15.035 80.482,-17.982 -8.253,-21.696 -7.309,-42.688 -2.356,-65.151" id="Meerut" style="block-size:auto;d:path(&quot;M 370.753 615.558 C 382.191 615.324 380.895 596.749 381.425 586.961 C 382.193 572.457 386.555 561.549 372.758 557.009 C 357.193 551.94 348.701 550.641 333.843 558.719 C 321.52 565.381 309.611 566.031 295.872 566.324 C 269.339 566.914 261.732 541.264 232.96 549.285 C 207.018 556.537 193.16 557.539 190.743 587.197 C 189.033 608.069 186.085 642.091 201.945 658.893 C 209.965 667.383 222.05 669.211 233.135 670.331 C 245.457 671.629 258.37 668.444 258.783 682.831 C 259.49 705.354 274.762 724.399 292.627 698.691 C 311.553 671.569 344.1 683.656 373.109 680.709 C 364.856 659.013 365.8 638.021 370.753 615.558&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 250 650)">Meerut</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Ghaziabad">
				<path d="m 218.148,747.711 c 0,0 3.379,-6.714 4.712,-10.047 1.333,-3.333 4,-12.666 10,-11.333 6,1.333 16,0 18.667,-4 2.667,-4 4.667,-8 6.667,-9.333 2,-1.333 6.038,-5.37 6.038,-5.37 v 0 c -5.727,-5.842 -5.212,-17.367 -5.447,-24.736 -0.473,-15.564 -18.633,-11.379 -31.663,-13.207 -13.974,-1.944 -26.179,-7.429 -31.722,-21.284 -19.869,7.252 -16.567,20.694 -18.749,38.502 -8.963,-4.658 -15.979,-11.792 -26.887,-9.965 -13.268,2.182 -22.523,5.247 -35.023,-2.063 0,0 12.441,17.217 13.325,20.106 2.062,0.529 5.837,-2.418 8.607,-2.183 0.236,3.185 -0.234,31.604 3.066,29.54 7.9,-0.118 15.271,-0.473 22.464,3.302 2.064,1.062 4.128,1.888 6.073,3.065 7.901,4.717 17.335,9.67 26.769,10.908 7.37,1.002 15.566,2.24 21.641,6.84 0.52,0.398 1.002,0.827 1.465,1.271 0,-0.002 -0.003,-0.013 -0.003,-0.013 z" id="Ghaziabad" style="block-size:auto;d:path(&quot;M 218.148 747.711 C 218.148 747.711 221.527 740.997 222.86 737.664 C 224.193 734.331 226.86 724.998 232.86 726.331 C 238.86 727.664 248.86 726.331 251.527 722.331 C 254.194 718.331 256.194 714.331 258.194 712.998 C 260.194 711.665 264.232 707.628 264.232 707.628 V 707.628 C 258.505 701.786 259.02 690.261 258.785 682.892 C 258.312 667.328 240.152 671.513 227.122 669.685 C 213.148 667.741 200.943 662.256 195.4 648.401 C 175.531 655.653 178.833 669.095 176.651 686.903 C 167.688 682.245 160.672 675.111 149.764 676.938 C 136.496 679.12 127.241 682.185 114.741 674.875 C 114.741 674.875 127.182 692.092 128.066 694.981 C 130.128 695.51 133.903 692.563 136.673 692.798 C 136.909 695.983 136.439 724.402 139.739 722.338 C 147.639 722.22 155.01 721.865 162.203 725.64 C 164.267 726.702 166.331 727.528 168.276 728.705 C 176.177 733.422 185.611 738.375 195.045 739.613 C 202.415 740.615 210.611 741.853 216.686 746.453 C 217.206 746.851 217.688 747.28 218.151 747.724 C 218.151 747.722 218.148 747.711 218.148 747.711 Z&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.6928 0.2928 1.2 120 730)">Ghaziabad</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Hapur">
				<path d="m 315.329,749.4 c 0.235,-5.66 0.884,-11.792 3.419,-16.922 4.363,-8.963 13.443,-8.195 21.403,-4.658 17.748,7.843 36.732,21.521 53.064,32.017 -0.589,-20.342 -3.714,-39.976 -11.615,-58.785 -2.829,-6.722 -5.896,-13.384 -8.489,-20.224 -8.785,0.885 -17.688,0.118 -26.475,0.885 -15.86,1.415 -34.847,-6.073 -47.17,7.725 -8.137,9.14 -14.269,25.354 -29.716,21.345 -2.298,-0.599 -4.098,-1.704 -5.52,-3.154 v 0 c 0,0 -4.038,4.037 -6.038,5.37 -2,1.333 -4,5.333 -6.667,9.333 -2.667,4 -12.667,5.333 -18.667,4 -6,-1.333 -8.667,8 -10,11.333 -1.333,3.333 -4.712,10.047 -4.712,10.047 0,0 0.002,0.011 0.003,0.013 2.684,2.572 4.382,5.865 4.784,9.638 0.942,8.727 2.063,4.305 9.493,7.487 0.767,-9.847 18.632,0.53 27.417,0.236 5.482,-0.178 11.025,-0.648 16.272,-2.241 3.951,-1.237 7.548,-3.242 10.908,-5.602 2.595,-1.77 5.07,-3.655 7.488,-5.602 2.062,-1.65 5.246,-1.593 7.899,-1.77 4.309,-0.352 8.614,-0.294 12.919,-0.471 z" id="Hapur" style="block-size:auto;d:path(&quot;M 315.329 749.4 C 315.564 743.74 316.213 737.608 318.748 732.478 C 323.111 723.515 332.191 724.283 340.151 727.82 C 357.899 735.663 376.883 749.341 393.215 759.837 C 392.626 739.495 389.501 719.861 381.6 701.052 C 378.771 694.33 375.704 687.668 373.111 680.828 C 364.326 681.713 355.423 680.946 346.636 681.713 C 330.776 683.128 311.789 675.64 299.466 689.438 C 291.329 698.578 285.197 714.792 269.75 710.783 C 267.452 710.184 265.652 709.079 264.23 707.629 V 707.629 C 264.23 707.629 260.192 711.666 258.192 712.999 C 256.192 714.332 254.192 718.332 251.525 722.332 C 248.858 726.332 238.858 727.665 232.858 726.332 C 226.858 724.999 224.191 734.332 222.858 737.665 C 221.525 740.998 218.146 747.712 218.146 747.712 C 218.146 747.712 218.148 747.723 218.149 747.725 C 220.833 750.297 222.531 753.59 222.933 757.363 C 223.875 766.09 224.996 761.668 232.426 764.85 C 233.193 755.003 251.058 765.38 259.843 765.086 C 265.325 764.908 270.868 764.438 276.115 762.845 C 280.066 761.608 283.663 759.603 287.023 757.243 C 289.618 755.473 292.093 753.588 294.511 751.641 C 296.573 749.991 299.757 750.048 302.41 749.871 C 306.719 749.519 311.024 749.577 315.329 749.4 Z&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 260 750)">Hapur</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Amroha">
				<path d="m 403.3,774.577 c 5.07,12.913 11.085,25.177 19.987,35.908 2.241,2.712 33.196,-2.536 42.217,0.707 1.592,-14.8 7.842,-28.185 9.436,-42.63 1.769,-16.037 -2.714,-31.897 -2.596,-47.937 0.118,-17.629 43.867,-3.242 57.017,-15.152 9.14,-8.255 1.65,-22.642 11.025,-31.604 6.662,-6.368 20.047,-8.728 20.813,-19.93 0.647,-9.729 -9.493,-18.042 -12.146,-27.063 -3.359,-11.438 0.236,-24.056 -6.25,-34.905 -2.477,-4.186 -6.427,-6.722 -11.38,-6.661 -9.197,0 -5.601,6.189 -6.427,13.266 -1.532,12.323 -5.602,13.915 -16.391,16.215 -37.913,8.195 -67.983,9.434 -106.427,3.42 -8.432,-1.297 -16.923,-2.417 -25.472,-2.653 -9.965,-0.295 -7.96,8.551 -9.14,16.863 -2.358,16.509 -0.354,32.724 5.543,48.289 5.424,14.446 12.616,28.007 16.036,43.103 2.006,8.784 3.125,17.807 3.656,26.826 0.709,11.438 6.371,13.384 10.499,23.938" id="Amroha" style="block-size:auto;d:path(&quot;M 403.3 774.577 C 408.37 787.49 414.385 799.754 423.287 810.485 C 425.528 813.197 456.483 807.949 465.504 811.192 C 467.096 796.392 473.346 783.007 474.94 768.562 C 476.709 752.525 472.226 736.665 472.344 720.625 C 472.462 702.996 516.211 717.383 529.361 705.473 C 538.501 697.218 531.011 682.831 540.386 673.869 C 547.048 667.501 560.433 665.141 561.199 653.939 C 561.846 644.21 551.706 635.897 549.053 626.876 C 545.694 615.438 549.289 602.82 542.803 591.971 C 540.326 587.785 536.376 585.249 531.423 585.31 C 522.226 585.31 525.822 591.499 524.996 598.576 C 523.464 610.899 519.394 612.491 508.605 614.791 C 470.692 622.986 440.622 624.225 402.178 618.211 C 393.746 616.914 385.255 615.794 376.706 615.558 C 366.741 615.263 368.746 624.109 367.566 632.421 C 365.208 648.93 367.212 665.145 373.109 680.71 C 378.533 695.156 385.725 708.717 389.145 723.813 C 391.151 732.597 392.27 741.62 392.801 750.639 C 393.51 762.077 399.172 764.023 403.3 774.577&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 420 700)">Amroha</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Moradabad">
				<path d="m 547.579,611.961 c 1.12,15.507 9.139,23.703 13.147,37.795 4.305,15.33 -17.569,17.865 -23.349,28.065 -4.613,8.174 -3.653,16.383 -6.006,22.604 0.531,0.365 0.821,0.573 0.821,0.573 0,0 11.333,10.667 8,18.667 -3.333,8 -9.333,20 -2.667,26 6.666,6 12,14 8,22 -4,8 -11.333,11.333 -5.333,17.333 6,6 8.667,12 14.667,7.333 6,-4.667 10.667,-10 16.667,-7.333 6,2.667 9.333,2 15.333,-2 6,-4 17.333,-9.333 17.333,-9.333 0,0 0.326,-0.086 0.926,-0.236 -3,-8.318 -7.271,-16.335 -13.557,-21.196 -4.422,-1.475 -5.425,-4.834 -3.125,-10.26 -2.239,-8.607 0.943,-11.498 9.553,-8.727 12.264,-0.118 24.292,3.361 29.304,-9.257 8.49,-21.285 5.66,-36.379 -8.137,-54.187 -9.375,-12.088 -10.495,-27.182 -5.13,-41.51 3.302,-8.785 10.494,-7.547 14.8,-16.214 4.187,-8.433 8.019,-17.748 15.212,-24.175 -5.542,0.826 -12.146,1.77 -17.395,-0.943 -9.904,-5.188 -3.537,-15.271 -13.267,-19.457 -8.667,-3.772 -13.384,-12.44 -19.104,-19.397 -7.724,-9.375 -17.512,-9.14 -12.027,-23.702 -14.977,-0.59 -29.422,8.194 -34.139,22.699 -4.952,15.035 -10.495,25.648 -16.687,38.207 13.387,-0.059 15.452,16.686 16.16,26.651 z" id="Moradabad" style="block-size:auto;d:path(&quot;M 547.579 611.961 C 548.699 627.468 556.718 635.664 560.726 649.756 C 565.031 665.086 543.157 667.621 537.377 677.821 C 532.764 685.995 533.724 694.204 531.371 700.425 C 531.902 700.79 532.192 700.998 532.192 700.998 C 532.192 700.998 543.525 711.665 540.192 719.665 C 536.859 727.665 530.859 739.665 537.525 745.665 C 544.191 751.665 549.525 759.665 545.525 767.665 C 541.525 775.665 534.192 778.998 540.192 784.998 C 546.192 790.998 548.859 796.998 554.859 792.331 C 560.859 787.664 565.526 782.331 571.526 784.998 C 577.526 787.665 580.859 786.998 586.859 782.998 C 592.859 778.998 604.192 773.665 604.192 773.665 C 604.192 773.665 604.518 773.579 605.118 773.429 C 602.118 765.111 597.847 757.094 591.561 752.233 C 587.139 750.758 586.136 747.399 588.436 741.973 C 586.197 733.366 589.379 730.475 597.989 733.246 C 610.253 733.128 622.281 736.607 627.293 723.989 C 635.783 702.704 632.953 687.61 619.156 669.802 C 609.781 657.714 608.661 642.62 614.026 628.292 C 617.328 619.507 624.52 620.745 628.826 612.078 C 633.013 603.645 636.845 594.33 644.038 587.903 C 638.496 588.729 631.892 589.673 626.643 586.96 C 616.739 581.772 623.106 571.689 613.376 567.503 C 604.709 563.731 599.992 555.063 594.272 548.106 C 586.548 538.731 576.76 538.966 582.245 524.404 C 567.268 523.814 552.823 532.598 548.106 547.103 C 543.154 562.138 537.611 572.751 531.419 585.31 C 544.806 585.251 546.871 601.996 547.579 611.961 Z&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(0.2 -1.5 1.5 0.9562 580 700)">Moradabad</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Rampur">
				<path d="m 624.878,619.626 c -18.515,0.06 -15.565,36.202 -8.962,45.932 16.391,24.115 20.519,38.325 8.019,66.272 -12.677,2.062 -35.26,-4.895 -35.554,10.2 -0.236,10.85 6.427,11.909 11.497,21.107 8.195,14.858 17.453,39.27 6.25,54.717 15.094,3.303 14.269,5.483 27.478,-1.945 8.901,-5.013 18.571,-8.138 27.594,-12.735 19.692,-10.142 41.979,-27.299 57.016,-43.514 10.495,-11.32 5.603,-29.127 16.568,-41.45 6.722,-7.547 14.682,-13.562 20.637,-21.815 6.78,-9.315 11.792,-21.227 21.993,-27.477 -4.423,-16.804 -25.295,-16.332 -38.148,-23.29 -8.784,-4.717 -16.805,-10.672 -25.767,-15.094 -13.443,-6.545 -19.812,-0.118 -20.695,-16.333 -0.825,-15.152 -5.425,-25.648 -21.757,-27.829 -29.012,-3.951 -33.729,10.907 -46.169,33.254" id="Rampur" style="block-size:auto;d:path(&quot;M 624.878 619.626 C 606.363 619.686 609.313 655.828 615.916 665.558 C 632.307 689.673 636.435 703.883 623.935 731.83 C 611.258 733.892 588.675 726.935 588.381 742.03 C 588.145 752.88 594.808 753.939 599.878 763.137 C 608.073 777.995 617.331 802.407 606.128 817.854 C 621.222 821.157 620.397 823.337 633.606 815.909 C 642.507 810.896 652.177 807.771 661.2 803.174 C 680.892 793.032 703.179 775.875 718.216 759.66 C 728.711 748.34 723.819 730.533 734.784 718.21 C 741.506 710.663 749.466 704.648 755.421 696.395 C 762.201 687.08 767.213 675.168 777.414 668.918 C 772.991 652.114 752.119 652.586 739.266 645.628 C 730.482 640.911 722.461 634.956 713.499 630.534 C 700.056 623.989 693.687 630.416 692.804 614.201 C 691.979 599.049 687.379 588.553 671.047 586.372 C 642.035 582.421 637.318 597.279 624.878 619.626&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 650 720)">Rampur</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Gautam Buddha Nagar">
				<path d="m 232.665,909.305 c 6.427,-1.887 17.924,3.303 26.886,2.596 19.931,-1.651 12.736,-15.448 4.129,-26.533 -16.981,-21.757 -28.655,-54.657 -31.841,-82.369 -1.415,-12.266 -0.354,-25.825 0.591,-38.09 -7.43,-3.185 -8.551,1.237 -9.493,-7.487 -0.473,-4.423 -2.653,-8.255 -6.25,-10.908 -7.252,-5.482 -17.334,-6.309 -26.062,-7.37 -19.812,-2.477 -35.377,-25.472 -57.192,-14.562 -13.68,6.839 17.688,20.99 1.003,30.012 12.795,7.725 9.08,23.879 12.264,36.497 3.42,13.502 14.918,22.641 22.583,33.726 2.771,4.011 5.424,8.138 8.019,12.323 6.19,9.965 12.028,20.4 16.393,31.25 2.122,5.308 4.009,10.79 5.188,16.332 0.53,2.478 0.825,5.013 0.825,7.547 0.06,2.83 -0.825,6.191 -0.413,8.964 0.236,1.649 1.003,2.889 0.768,4.717 9.194,-5.489 24.347,-2.187 32.602,3.355" id="Gautam_Buddha_Nagar" style="block-size:auto;d:path(&quot;M 232.665 909.305 C 239.092 907.418 250.589 912.608 259.551 911.901 C 279.482 910.25 272.287 896.453 263.68 885.368 C 246.699 863.611 235.025 830.711 231.839 802.999 C 230.424 790.733 231.485 777.174 232.43 764.909 C 225 761.724 223.879 766.146 222.937 757.422 C 222.464 752.999 220.284 749.167 216.687 746.514 C 209.435 741.032 199.353 740.205 190.625 739.144 C 170.813 736.667 155.248 713.672 133.433 724.582 C 119.753 731.421 151.121 745.572 134.436 754.594 C 147.231 762.319 143.516 778.473 146.7 791.091 C 150.12 804.593 161.618 813.732 169.283 824.817 C 172.054 828.828 174.707 832.955 177.302 837.14 C 183.492 847.105 189.33 857.54 193.695 868.39 C 195.817 873.698 197.704 879.18 198.883 884.722 C 199.413 887.2 199.708 889.735 199.708 892.269 C 199.768 895.099 198.883 898.46 199.295 901.233 C 199.531 902.882 200.298 904.122 200.063 905.95 C 209.257 900.461 224.41 903.763 232.665 909.305&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(0.1 -0.893 1.0 0.9562 190 830)">
					<tspan x="0" y="0">Gautam</tspan> 
					<tspan x="0" y="13">Buddha</tspan>
					<tspan x="0" y="26">Nagar</tspan>
				</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Bulandshahr">
				<path d="m 460.137,887.312 c -12.5,-10.968 -26.062,-17.926 -42.452,-20.99 -0.885,-18.516 1.062,-33.078 6.19,-49.587 2.477,-8.078 -16.509,-31.841 -20.519,-42.158 -6.25,-15.919 -18.69,-17.452 -31.662,-26.297 -10.495,-7.134 -42.57,-36.852 -52.89,-15.802 -5.07,10.317 2.122,16.687 -11.909,17.217 -12.265,0.472 -12.441,4.717 -21.875,10.317 -16.214,9.611 -35.437,3.42 -52.122,-0.412 -3.479,29.423 3.007,50.942 9.434,78.892 2.83,12.264 4.601,24.351 12.088,34.904 7.135,10.023 18.22,19.753 20.047,32.548 18.102,-10.023 44.104,-3.186 62.912,1.12 19.339,4.422 35.672,18.102 55.719,13.385 9.787,-2.3 19.398,-6.016 29.6,-6.073 10.495,-0.06 19.104,6.014 29.245,7.252 8.784,1.12 17.039,-4.894 24.764,-7.96 -1.18,-11.792 -8.02,-18.867 -16.57,-26.356" id="Bulandshahr" style="block-size:auto;d:path(&quot;M 460.137 887.312 C 447.637 876.344 434.075 869.386 417.685 866.322 C 416.8 847.806 418.747 833.244 423.875 816.735 C 426.352 808.657 407.366 784.894 403.356 774.577 C 397.106 758.658 384.666 757.125 371.694 748.28 C 361.199 741.146 329.124 711.428 318.804 732.478 C 313.734 742.795 320.926 749.165 306.895 749.695 C 294.63 750.167 294.454 754.412 285.02 760.012 C 268.806 769.623 249.583 763.432 232.898 759.6 C 229.419 789.023 235.905 810.542 242.332 838.492 C 245.162 850.756 246.933 862.843 254.42 873.396 C 261.555 883.419 272.64 893.149 274.467 905.944 C 292.569 895.921 318.571 902.758 337.379 907.064 C 356.718 911.486 373.051 925.166 393.098 920.449 C 402.885 918.149 412.496 914.433 422.698 914.376 C 433.193 914.316 441.802 920.39 451.943 921.628 C 460.727 922.748 468.982 916.734 476.707 913.668 C 475.527 901.876 468.687 894.801 460.137 887.312&quot;);fill:#ee9926;height:auto;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 260 850)">Bulandshahr</text>
			</a>
			<a rel="noopener" href="{{url('/Office-Hierarchy')}}/Sambhal">
				<path d="m 609.783,790.32 c -1.09,-5.138 -2.57,-11.088 -4.663,-16.894 -0.601,0.15 -0.926,0.236 -0.926,0.236 0,0 -11.333,5.333 -17.333,9.333 -6,4 -9.333,4.667 -15.333,2 -6,-2.667 -10.667,2.667 -16.667,7.333 -6,4.666 -8.667,-1.333 -14.667,-7.333 -6,-6 1.333,-9.333 5.333,-17.333 4,-8 -1.333,-16 -8,-22 -6.667,-6 -0.667,-18 2.667,-26 3.334,-8 -8,-18.667 -8,-18.667 0,0 -0.291,-0.208 -0.821,-0.573 -1.737,4.593 -5.278,8.104 -14.219,9.707 -13.325,2.418 -26.887,1.593 -40.329,2.3 -9.375,0.473 -0.708,46.64 -1.771,56.072 -1.12,9.906 -6.25,18.455 -7.781,28.302 -0.61,3.915 -0.985,6.615 -0.999,8.634 -1.888,3.235 -0.179,5.797 -0.894,5.714 -7.845,-0.913 -20.956,-0.419 -30.434,-0.089 -14.062,0.489 -12.712,11.299 -15.773,25.294 -1.406,5.72 -1.9,16.347 -1.842,22.361 0.06,12.264 10.496,9.198 20.46,13.679 12.736,5.661 27.24,16.273 34.788,28.186 3.655,5.719 4.127,12.499 4.422,19.104 0.53,12.205 8.728,5.955 18.337,11.025 0.462,0.245 0.911,0.511 1.359,0.776 0.108,-0.313 0.164,-0.489 0.164,-0.489 0,0 4,-6 4.667,-11.333 0.667,-5.333 -2.667,-9.333 2,-12 4.667,-2.667 4.667,-4.667 4.667,-8 0,-3.333 -2.667,-5.333 1.333,-7.333 4,-2 6.667,-4 4,-7.333 -2.667,-3.333 -7.333,-4.667 2,-7.333 9.333,-2.666 15.333,-6.667 14,-10 -1.333,-3.333 -5.334,-6.667 -4.667,-12 0.538,-4.303 2.811,-11.641 3.669,-14.316 -0.176,-0.194 -0.369,-0.405 -0.566,-0.62 11.517,-1.777 22.051,-6.382 34.179,-8.192 8.02,-14.446 14.15,-17.453 31.19,-16.51 10.142,0.59 14.269,4.187 17.335,-7.605 1.533,-5.779 0.295,-12.443 -0.885,-18.103 z" id="Sambhal" style="block-size:auto;d:path(&quot;M 609.783 790.32 C 608.693 785.182 607.213 779.232 605.12 773.426 C 604.519 773.576 604.194 773.662 604.194 773.662 C 604.194 773.662 592.861 778.995 586.861 782.995 C 580.861 786.995 577.528 787.662 571.528 784.995 C 565.528 782.328 560.861 787.662 554.861 792.328 C 548.861 796.994 546.194 790.995 540.194 784.995 C 534.194 778.995 541.527 775.662 545.527 767.662 C 549.527 759.662 544.194 751.662 537.527 745.662 C 530.86 739.662 536.86 727.662 540.194 719.662 C 543.528 711.662 532.194 700.995 532.194 700.995 C 532.194 700.995 531.903 700.787 531.373 700.422 C 529.636 705.015 526.095 708.526 517.154 710.129 C 503.829 712.547 490.267 711.722 476.825 712.429 C 467.45 712.902 476.117 759.069 475.054 768.501 C 473.934 778.407 468.804 786.956 467.273 796.803 C 466.663 800.718 466.288 803.418 466.274 805.437 C 464.386 808.672 466.095 811.234 465.38 811.151 C 457.535 810.238 444.424 810.732 434.946 811.062 C 420.884 811.551 422.234 822.361 419.173 836.356 C 417.767 842.076 417.273 852.703 417.331 858.717 C 417.391 870.981 427.827 867.915 437.791 872.396 C 450.527 878.057 465.031 888.669 472.579 900.582 C 476.234 906.301 476.706 913.081 477.001 919.686 C 477.531 931.891 485.729 925.641 495.338 930.711 C 495.8 930.956 496.249 931.222 496.697 931.487 C 496.805 931.174 496.861 930.998 496.861 930.998 C 496.861 930.998 500.861 924.998 501.528 919.665 C 502.195 914.332 498.861 910.332 503.528 907.665 C 508.195 904.998 508.195 902.998 508.195 899.665 C 508.195 896.332 505.528 894.332 509.528 892.332 C 513.528 890.332 516.195 888.332 513.528 884.999 C 510.861 881.666 506.195 880.332 515.528 877.666 C 524.861 875 530.861 870.999 529.528 867.666 C 528.195 864.333 524.194 860.999 524.861 855.666 C 525.399 851.363 527.672 844.025 528.53 841.35 C 528.354 841.156 528.161 840.945 527.964 840.73 C 539.481 838.953 550.015 834.348 562.143 832.538 C 570.163 818.092 576.293 815.085 593.333 816.028 C 603.475 816.618 607.602 820.215 610.668 808.423 C 612.201 802.644 610.963 795.98 609.783 790.32 Z&quot;);fill:#ee9926;height:;inline-size:auto;overflow-x:visible;overflow-y:visible;perspective-origin:0px 0px;stroke:rgb(255, 255, 255);stroke-width:2px;transform-origin:0px 0px;vertical-align:baseline;width:auto;" inkscape:connector-curvature="0"></path>
				<text transform="matrix(1.500 -0.8928 0.2928 0.9562 450 850)">Sambhal</text>
			</a>
			
		</g>
 </svg>
  </div>

  </div>
</div>
</div>
</div>
</div>


<section class="wrapper home-btm-slider">
<div class="sidebarbuttonemployee"><a href="https://uppcl.org/uppcl/en/article/employee-corner" class="external none" target="_blank" style="color:#fff;font-weight:bold;">employee Corner</a></div>
<div class="container-fluid" style="background:url({{url('/')}}/sun-setting-silhouette-electricity-pylons.jpg) fixed no-repeat; background-size:cover">
<div class="container-fluid common-container four_content gallery-container">
<h3 style="text-align: center; font-weight: bold; color:#fff;padding-top:15px;" tabindex="0" data-swp-font-size="24px">Consumer Corner</h3>

<div class="card-deck" style="margin-top:25px;margin-left:15px;justify-content: center;">
<div class="flip-card">
  <div class="flip-card-inner flipper">
      <div class="front" style="background: url({{url('/')}}/img_2025/bill.jpeg); background-size: cover;">
        <h1 style="color:#000;">Bill Generation and Payment</h1>
      </div>
    
    
    <div class="back">
      <ul class="text-left">
      <li class="text-center"><b style="margin-top:7px">Bill Generation and Payment</b><hr></li>
      <li>
        <a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_billInfo_payBill_home&amp;pageID=PB_1010" target="_blank" rel="noopener" title="Pay Bill Online" style="padding-left:10px;">
          <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Pay Bill Online</a></li>
      <li><a href="https://uppclmp.myxenius.com/login.html" target="_blank" rel="noopener" title="Multi-Story Recharge" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Multi-Story Recharge</a></li>
      <li><a href="{{url('/')}}/prepaid-meter-recharge" title="Recharge Your Prepaid Meter" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Recharge Your Prepaid Meter</a></li>
      <li><a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_billInfo_smprepaidRecharge&amp;pageID=PREB_1010" target="_blank" rel="noopener" title="Smart Meter Prepaid Recharge" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Smart Meter Prepaid Recharge</a></li>
      <li><a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_billInfo_trustMeterReading&amp;pageID=1002_TMRNM" target="_blank" rel="noopener" title="Net-Meter Self Bill Generation" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Net-Meter Self Bill Generation</a></li>
      <li><a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_billInfo_trustMeterReading&amp;pageID=1002_TMR" target="_blank" rel="noopener" title="Self Bill Generation (upto 9 kw)" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Self Bill Generation (upto 9 kw)</a></li>
      <li><a href="https://www.youtube.com/watch?v=mIwbf0Mla4I" target="_blank" rel="noopener" title="How to Pay Electricity Bill Online?" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> How to Pay Electricity Bill Online?</a></li>
    </ul>
    </div>
  </div>
</div>

<div class="flip-card">
  <div class="flip-card-inner flipper">
      <div class="front" style="background: url({{url('/')}}/img/New-Connection1.jpg); background-size: cover;">
        <h1 style="color:#000">New Connection</h1>
      </div>
    
    
    <div class="back">
      <ul class="text-left">
      <li class="text-center"><b>New Connection</b><hr></li>
      <li><a href="http://jtp.uppcl.org/online/frmLogin.aspx" target="_blank" rel="noopener" title="Domestic Connection" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" style="color: #ff8d00;" aria-hidden="true"></i> Domestic Connection</a></li>
      <li><a href="http://niveshmitra.up.nic.in/" target="_blank" rel="noopener" title="Comm. &amp; Indus. (above 20KW)" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Comm. &amp; Indus. (above 20KW)</a></li>
      <li><a href="http://ptw.uppcl.org/online/account/login" target="_blank" rel="noopener" title="PTW/Agriculture Connection" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> PTW/Agriculture Connection</a></li>
      <li><a href="https://jtp.uppcl.org/online/frmLogin.aspx" target="_blank" rel="noopener" data-swp-font-size="15px" title="Apply For Single Point To Multi Point Connection" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Apply For Single Point To Multi Point Connection</a></li>
      <li><a href="https://pvvnl.org/faq/" title="How To Apply New Connection" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> How To Apply New Connection</a></li>
    </ul>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner flipper">
      <div class="front" style="background: url({{url('/')}}/img/Manage-Profile1.jpg); background-size: cover;">
        <h1 style="color:#000">My Connection</h1>
      </div>
    
    
    <div class="back">
      <ul class="text-left">
      <li class="text-center"><b>My Connection</b><hr></li>
      <li><a href="https://pvvnl.org/urban-service-request/" rel="noopener" title="Online electricity Service Request" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Online electricity Service Request</a> – <a title="Video" href="https://www.youtube.com/watch?v=CfLyawyIi4w" target="_blank" rel="noopener">Video</a></li>
      <li><a href="https://uppcl.mpower.in/wss/LoginNew.htm" target="_blank" rel="noopener" title="Check Your Bill" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Check Your Bill</a></li>
      <li><a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_loginreg_registration&amp;pageID=UM_1010" target="_blank" rel="noopener" title="Update Mobile No." style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Update Mobile No.</a></li>
      <li><a href="{{url('/')}}/uploads/How-to-register-Bill-Revision-Complaint.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize174MB" target="_blank" rel="noopener" title="How to register Bill Revision Complaint – (Language – English &amp; Hindi)" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> How to register Bill Revision Complaint – <span tabindex="0">(Language – English &amp; Hindi) <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span></span></a></li>
    </ul>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner flipper">
      <div class="front" style="background: url({{url('/')}}/img/Complaint1.jpg); background-size: cover;">
        <h1 style="color:#000">Complaint</h1>
      </div>
    
    
    <div class="back">
      <ul class="text-left">
      <li class="text-center"><b>Complaint</b><hr></li>
     <li><a href="https://appsavy.com/coreapps" target="_blank" rel="noopener" title="Register Complaint" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Register Complaint</a></li>
      <li><a href="https://appsavy.com/coreapps" target="_blank" rel="noopener" title="Track Complaint" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Track Complaint</a></li>
      <li><a href="http://jansunwai.up.nic.in/onlineComplaint.html" target="_blank" rel="noopener" title="Integrated Grievances Redress System" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Integrated Grievances Redress System</a></li>
      <li><a href="{{url('/en')}}/19/46/Consumer-Grievance-Redressal-Forum" rel="noopener" title="Consumer Grievance Redressal Forum" style="padding-left:10px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Consumer Grievance Redressal Forum</a></li>
    </ul>
    </div>
  </div>
</div>

</div>
</div>
</div>
</section>

<!-- ============ Start News =========== -->


<div class="wrapper home-btm-slider" style="margin-top:40px;">
<div class="container-fluid common-container four_content gallery-container">
<div class="card-deck">
<div class="card shadow-shani">
  
  <div class="card-body-">
    <div class="list-group list-group-flush">
      <iframe loading="lazy" id="iframe_important_link" class="scrl" src="{{url('/')}}/ImportantLink" width="100%" height="350px" frameborder="0"></iframe>
      
      
    </div>
  </div>
  <div class="card-footer pp">
    <p style="text-align: center;"><a href="{{url('/')}}/news/1" title="View More" style="color: #ff7c1b;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> View More</a></p>
  </div>
</div>
<div class="card shadow-shani">
  <div class="card-body-">
    <div class="list-group list-group-flush">
      <iframe loading="lazy" id="iframe_important_link" class="scrl" src="{{url('/')}}/Highlights" width="100%" height="350px" frameborder="0"></iframe>
    </div>
  </div>
  <div class="card-footer pp">
    <p style="text-align: center;"><a href="{{url('/')}}/news/2" title="View More" style="color: #ff7c1b;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> View More</a></p>
  </div>
</div>

<div class="card shadow-shani">
  <div class="card-body-">
    <div class="list-group list-group-flush">
      <iframe loading="lazy" id="iframe_important_link" class="scrl" src="{{url('/')}}/NewsNotifications" width="100%" height="350px" frameborder="0"></iframe>
    </div>
  </div>
  <div class="card-footer pp">
    <p style="text-align: center;"><a href="{{url('/')}}/news/3" title="View More" style="color: #ff7c1b;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> View More</a></p>
  </div>
</div>
</div>
</div>
</div>

<style>


.latest_news_sec {

<!-- background: #fafbfc;-->

}

.latest_news_sec h2 {

font-family: 'Raleway', sans-serif;

font-weight: 700;

font-size: 1.625em;

color: #323232;

position: relative;

margin-top: 97px;

margin-left: 8px;

}

.latest_news_sec h2:before {

content: '';

width:45px;

height:3px;

background: #f6ba18;

position: absolute;

top: 40px;

left: -2px;

}

.latest_news_sec .news_highlight {

margin-top:52px;

}

.latest_news_sec .news {

padding:0px;

-webkit-transition: all 0.3s ease 0s;

-o-transition: all 0.3s ease 0s;

transition: all 0.3s ease 0s;	

}

.latest_news_sec .news .news_img_holder {

position: relative;

transition: all .3s ease;

}

.latest_news_sec .news:hover .news_img_holder {

margin-top: -20px;

}

.latest_news_sec .news_opacity {

background: rgba(40,47,57,0.7);

position: absolute;

height:100%;

width:100%;

bottom:0;

left:0;

right:0;

top:0;

}

.latest_news_sec .news_details span{

font-family: 'PT Serif', serif;

font-style: italic;

font-size: 1em;

color: #f6ba18;

}

.latest_news_sec .news_details h4 {

font-family: 'Open Sans', sans-serif;

font-weight: 700;

font-size: 1em;

color:#fff;

text-transform: uppercase;

}

.latest_news_sec  .news_details p {

font-family: 'Open Sans', sans-serif;

font-style: italic;

font-size: 0.875em;

line-height: 25px;

color:#fff;

line-height: 21px

}

.latest_news_sec .news_details {

position: absolute;

bottom: 0;

padding-left:50px;

-webkit-transition: all 0.3s ease 0s;

-o-transition: all 0.3s ease 0s;

transition: all 0.3s ease 0s;

}

.latest_news_sec .news_details:before {

content: '';

width:2px;

height:61px;

background: #cc1e2b;

position: absolute;

left: 18px;

bottom: 20px;

}

.newsDetailHi:before {

bottom:3px !important;

}

.news:hover {

/*margin-top:-20px;*/

}

.news:hover .news_details { width:100%;

background: #cc1e2b;

}

.news:hover .news_details:before {

background: #fff;

}

@media only screen and (max-width: 768px) {
.sahni-mt-40{
margin-top: 40px;
}



}



</style>


<section class="p0 px-0 container-fluid latest_news_sec news_large home-btm-slider" style="padding-bottom: 342px;">
<div class="news_highlight">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40" style="padding-right: 20px;">
<a href="https://jansunwai.up.nic.in/onlineComplaint">
<div class="news_img_holder">
  <img class="img-responsive" src="{{url('/')}}/img/igrs.jpeg" alt="Integrated Grievances Redress System" title="Integrated Grievances Redress System" style="width: 100%;height: 250px;">
  <div class="news_opacity">
  </div>
  <div class="news_details">
    <a href="https://jansunwai.up.nic.in/onlineComplaint">

      <h4>Integrated Grievances Redress System</h4>
      <p>Pashchimanchal Vidyut Vitran Nigam Limited, Government of Uttar Pradesh</p>
    </a>
  </div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40" style="padding-right: 20px;">
<a href="{{url('/Office-Orders')}}">
<div class="news_img_holder">
  <img class="img-responsive" src="{{url('/')}}/img/Office-Orders.jpeg" alt="Office Orders" title="Office Orders" style="width: 100%;height: 250px;">
  <div class="news_opacity">
  </div>
  <div class="news_details">
    <a href="{{url('/Office-Orders')}}">
      <h4>Office Orders</h4>
      <p>Pashchimanchal Vidyut Vitran Nigam Limited, Government of Uttar Pradesh</p>
    </a>
  </div>
</div>
</a>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40" style="padding-right: 20px;">
<a href="{{url('/video')}}">
<div class="news_img_holder">
  <img class="img-responsive" src="{{url('/')}}/img/Video-Gallery.jpeg" alt="Video Gallery" title="Video Gallery" style="width: 100%;height: 250px;">
  <div class="news_opacity">
  </div>
  <div class="news_details">
    <a href="{{url('/video')}}">
      <h4>Video Gallery</h4>
      <p>Pashchimanchal Vidyut Vitran Nigam Limited, Government of Uttar Pradesh</p>
    </a>
  </div>
</div>
</a>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40" >
<a href="{{url('/gallery')}}">
<div class="news_img_holder">
  <img class="img-responsive" src="{{url('/')}}/uploads/1707897947.jpg" alt="Image Gallery" title="Image Gallery" style="width: 100%;height: 250px;">
  <div class="news_opacity">
  </div>
  <div class="news_details">
    <a href="{{url('/gallery')}}">
      <h4>Image Gallery</h4>
      <p>Pashchimanchal Vidyut Vitran Nigam Limited, Government of Uttar Pradesh</p>
    </a>
  </div>
</div>
</a>
</div>

</div>
</section> <!-- End latest_news_sec -->  

{{--


<section class="p0 px-0 container-fluid latest_news_sec news_large home-btm-slider" style="padding-bottom: 20px;">
<div class="news_highlight">
<!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40">
<a href="https://jansunwai.up.nic.in/onlineComplaint" target="_blank">
<div class="news_img_holder">
  <img class="img-responsive" src="{{url('/')}}/img/igrs.jpeg" alt="Integrated Grievances Redress System" title="Integrated Grievances Redress System" style="width: 100%;height: 250px;">
  <div class="news_opacity">
  </div>
  <div class="news_details">
    <a href="https://jansunwai.up.nic.in/onlineComplaint" target="_blank">

      <h4>Integrated Grievances Redress System</h4>
      <p>Pashchimanchal Vidyut Vitran Nigam Limited, Government of Uttar Pradesh</p>
    </a>
  </div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40">
<a href="{{url('/Office-Orders')}}">
<div class="news_img_holder">
  <img class="img-responsive" src="{{url('/')}}/img/Office-Orders.jpeg" alt="Office Orders" title="Office Orders" style="width: 100%;height: 250px;">
  <div class="news_opacity">
  </div>
  <div class="news_details">
    <a href="{{url('/Office-Orders')}}">
      <h4>Office Orders</h4>
      <p>Pashchimanchal Vidyut Vitran Nigam Limited, Government of Uttar Pradesh</p>
    </a>
  </div>
</div>
</a>
</div>-->

<div class="wrapper home-btm-slider">
            <div class="container-fluid common-container four_content gallery-container">
               <div class="gallery-area clearfix">
                  <div class="gallery-heading">
                     <h3>Photo Gallery</h3>
                     <a class="bttn-more bttn-view" href="{{url('/')}}/gallery" title="View All About Photo Gallery"><span>View All</span></a> 
                  </div>
                  <div class="gallery-holder">
                     <div id="galleryCarousel" class="flexslider">
                        <ul class="slides">
              @php
              $photo = DB::table('photos')->orderby('id','desc')->take(4)->get();
              $i=1;
              @endphp
                           @foreach($photo as $photos)
                           <li data-thumb="{{ url('/') }}/uploads/{{ $photos->image }}" data-thumb-alt="slider{{$i}}">
                              <img src="{{ url('/') }}/uploads/{{ $photos->image }}" style="height:400px;" alt="gallery iamge"/>
                           </li>
                           @php
                           $i++;
                           @endphp
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="gallery-right">
                  <div class="video-heading">
                     <h3>Video Gallery</h3>
                     <a class="bttn-more bttn-view" href="{{url('/')}}/video" title="View All About video"><span>View All</span></a> 
                  </div>
                  <div class="video-wrapper">
                     <iframe width="" height="" src="https://www.youtube.com/embed/qDiEs8hGBME?si=3uXGw0kwR-GT0str" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="width: 100%;height: 400px;"></iframe>
                  </div>
               </div>
            </div>
         </div>

</div>
</section> <!-- End latest_news_sec -->

---}}


<style>
.card-img-overlay {
top: 200px !important;
}

.shani1:hover {

padding-bottom: 20px;

}

.shani1:hover .shani2{

padding-bottom: 20px !important
background: red !important;
}


@media only screen and (max-width: 768px) {
.carousel-wrapper {
margin-top: 1150px; 
}

}
.flip-container {
    width: 100%;
    height: 259px;
    float: left;
    border-radius: 10px;
}
.flip-container {
    perspective: 1000px;
    transform-style: preserve-3d;
}
.flipper {
    transition: 0.6s;
    transform-style: preserve-3d;
    position: relative;
}
.front {
   
    color: #fff;
    text-align: center;
    border: 5px solid #fff;
}
.front {
    z-index: 2;
    transform: rotateY(0deg);
}
.front, .back {
    backface-visibility: hidden;
    transition: 0.6s;
    transform-style: preserve-3d;
    position: absolute;
    top: 0;
    left: 0;
}
.brand-items {
	list-style: none;
	border-radius: 10px;
	padding: 8px 20px 5px 20px;
	overflow: hidden;

	width: 100%;
	box-shadow: -7px 1px 40px rgb(0 0 0/18%);
	margin: 0;
}
.slides a:hover img {
    filter: grayscale(100%); /* Makes the image black and white */
    transition: filter 0.3s ease; /* Smooth transition effect */
    margin-top: -1px;
}



.slides img {
    transition: filter 0.3s ease; /* Smooth transition for normal state */
}

.slides a{
    border: 2px solid #ee9926;
    border-radius: 4px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.slides a:hover {
    border: 2px solid #003630;
}
</style>
<div class="container-fluid" style="padding-bottom:50px;background: url({{url('/')}}/sun-setting-silhouette-electricity-pylons.jpg) fixed no-repeat;background-size:cover;">
<h3 style="color:white;">IMPORTANT LINKS</h3>

<section class="wrapper carousel-wrapper home-btm-slider">

<div class="container-fluid brand-items common-container four_content carousel-container">
<div id="flexCarousel" class="flexslider carousel">
<ul class="slides">
    <li><a target="_blank" href="https://www.india.gov.in/" title="Uttar Pradesh Power Corporation Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/gov.jpg" alt="Uttar Pradesh Power Corporation Ltd"></a>
</li>
    <li><a target="_blank" href="https://www.digitalindia.gov.in/" title="India Govt" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/digital.png" alt="India Govt"></a>
</li>
<li><a target="_blank" href="https://up.gov.in/en" title="Image of Government of Uttar Pradesh" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/Government-of-Uttar-Pradesh.jpg" alt="Image of Government of Uttar Pradesh"></a>
</li>

<li><a target="_blank" href="https://www.uppclonline.com/" title="Uttar Pradesh Power Corporation Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/online-pcl.png" alt="Uttar Pradesh Power Corporation Ltd"></a>
</li>
    
    {{--
<li><a target="_blank" href="https://www.india.gov.in/" title="Uttar Pradesh Power Corporation Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img/India-Govt.jpg" alt="Uttar Pradesh Power Corporation Ltd"></a>
</li>


<li><a target="_blank" href="https://uppcl.org/uppcl/en" title="Image of Uttar Pradesh Power Corporation Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Uttar-Pradesh-Power-Corporation-Ltd-.jpg" alt="Image of Uttar Pradesh Power Corporation Ltd"></a>
</li>
<li><a target="_blank" href="https://www.uperc.org/Default2.aspx" title="Image of Uttar Pradesh Electricity Regulatory Commission" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Uttar-Pradesh-Electricity-Regulatory-Commission.jpg" alt="Image of Uttar Pradesh Electricity Regulatory Commission"></a>
</li>
<li><a target="_blank" href="https://up.gov.in/en" title="Image of Government of Uttar Pradesh" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Government-of-Uttar-Pradesh.jpg" alt="Image of Government of Uttar Pradesh"></a>
</li> --}}

<li><a target="_blank" href="http://upptcl.org/upptcl" title="Uttar Pradesh Power Transmission Corporation Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/up-ptcl.png" alt="Uttar Pradesh Power Transmission Corporation Ltd"></a>
</li>
<li><a target="_blank" href="https://www.uprvunl.org/index.php/" title="Image of Uprvunl" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/uprvunl.png" alt="Image of Uprvunl"></a>
</li>
<li><a target="_blank" href="https://kesco.co.in/" title="Kanpur Electricity Supply Company" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/kesco2.png" alt="Kanpur Electricity Supply Company"></a>
</li>
<li><a target="_blank" href="http://puvvnl.up.nic.in/" title="Purvanchal Vidyut Vitaran Nigam Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/pvvnl.png" alt="Purvanchal Vidyut Vitaran Nigam Ltd"></a>
</li>
<li><a target="_blank" href="http://www.mvvnl.in/" title="Madhyanchal Vidyut Vitaran Nigam Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/mvvnl.png" alt="Madhyanchal Vidyut Vitaran Nigam Ltd"></a>
</li>
<li><a target="_blank" href="https://www.dvvnl.org/" title="Dakshinanchal Vidyut Nigam" class="my-4 mx-3">
  <img src="{{url('/')}}/img_2025/dvvnl.jpg" alt="Dakshinanchal Vidyut Nigam"></a>
</li>
</ul>
</div>
</div>
</section>
</div>
@endsection
@section('script')
<script src="{{url('/')}}/theme/js/custom.js"></script>


  <style>
        .custom-alert {
            position: fixed;
            z-index: 1001; /* Ensure it is above the overlay */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border: 3px solid #ff7c1b;
            border-radius: 5px;
            padding: 20px;
            box-shadow: -3px 14px 20px 20px rgb(0 0 0 / 52%);
            max-width: 700px;
        }

        .custom-alert-content {
            text-align: center;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: -48px;
            right: -25px;
            font-size: 45px;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #f00;
        }

        .custom-alert img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            cursor: pointer; /* Indicate that the image is clickable */
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .no-scroll {
            overflow: hidden;
        }
    </style>
     @php
    $img = DB::table('alert_image')->where('id', 1)->first();
    @endphp
    <script>
        // Function to display custom alert with image
        function displayImageAlert() {
            // Create an overlay
            var overlay = document.createElement('div');
            overlay.classList.add('overlay');
            
            // Create a custom alert box
            var customAlert = document.createElement('div');
            customAlert.classList.add('custom-alert');
            
            var customAlertContent = document.createElement('div');
            customAlertContent.classList.add('custom-alert-content');
            
            var closeButton = document.createElement('span');
            closeButton.classList.add('close-btn');
            closeButton.innerHTML = '&times;';
            closeButton.onclick = function() {
                document.body.classList.remove('no-scroll');
                document.body.removeChild(customAlert);
                document.body.removeChild(overlay);
            };
            
            var image = document.createElement('img');
            image.src = 'img/{{$img->image}}';
            image.alt = 'Alert Image';
            image.onclick = function() {
                window.open('https://wa.me/message/3PFM4YYBKRZOE1', '_blank'); // Open link in a new tab
            };
            
            var message = document.createElement('p');
            message.textContent = '';
            
            customAlertContent.appendChild(closeButton);
            customAlertContent.appendChild(image);
            customAlertContent.appendChild(message);
            
            customAlert.appendChild(customAlertContent);
            
            document.body.classList.add('no-scroll');
            document.body.appendChild(overlay);
            document.body.appendChild(customAlert);
        }

        // Delay the alert by 3 seconds (3000 milliseconds)
        setTimeout(displayImageAlert, 1);
    </script>
@endsection