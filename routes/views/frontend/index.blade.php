@extends('frontend.layouts.main')
@section('content')


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
.btn-back{
background: rgba(248,80,50,1);
background: -webkit-linear-gradient(left, rgba(248,80,50,1) 0%, rgba(248,80,50,1) 54%, rgba(255,238,0,1) 100%);
background: linear-gradient(to right, rgba(248,80,50,1) 0%, rgba(248,80,50,1) 54%, rgba(255,238,0,1) 100%);
color: #fff;
}
.btn-back:hover{
background: rgba(235,221,29,1);
background: -webkit-linear-gradient(left, rgba(235,221,29,1) 0%, rgba(255,238,0,1) 0%, rgba(248,80,50,1) 46%, rgba(248,80,50,1) 100%);
background: linear-gradient(to right, rgba(235,221,29,1) 0%, rgba(255,238,0,1) 0%, rgba(248,80,50,1) 46%, rgba(248,80,50,1) 100%);
color: #fff;
}
.zoom1:hover {
-ms-transform: scale(1.05);
-webkit-transform: scale(1.05); 
transform: scale(1.05);
}


#flexSlider {
max-height: 369px;
overflow: hidden; 
}
#flexSlider img {
height: auto; 
max-height: 290px; 
}

</style>




<section class="wrapper banner-wrapper">
    
    
<div id="flexSlider" class="flexslider">
    
<ul class="slides">
@foreach($slider as $sliders)
<li><img src="{{url('/')}}/uploads/{{$sliders->image}}" alt="{{$sliders->heading}}"></li>
@endforeach
</ul>
</div>
</section>
<section class="wrapper news-section">
<div class="carousel-container">
<div id="flexCarouse2" class="news-section2">
<div class="notification" style="padding: 12px 20px !important;"><p>Latest Updates</p></div>
<ul class="slides news-slide">
@foreach ($news as $newss)
<li>
  <span>
    <a href="{{ url('/') }}/uploads/{{ $newss->file_name }}" target="_blank" class="text-white"> {{ implode(' ', array_slice(str_word_count($newss->subject, 1), 0, 10)) }} @if(str_word_count($newss->subject) > 10)... @endif <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
  </span>
</li>
@endforeach 
{{-- <li>
<span>Description of Latest Updates 4 goes here.</span>
</li> --}}
</ul>
</div>
</div>
</section>
<div class="wrapper" id="skipCont"></div>
<!--/#skipCont-->

<marquee width="100%" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="background-color:#461f1e; height:25px;margin-bottom: 25px;color:white;padding-bottom: 29px;margin-top: 15px;">
<p>Bill Payment, Electricity Supply information is sent to you by the Electricity Department only from the UPPCLT / UPPCLA&nbsp; Header on SMS and from verified green tick account on whatsapp. whatsapp no - PVVNL - 7859804803. Ignore SMS/whatsapp received from any other source/header. Be aware, Be alert</p>
</marquee>
<section id="fontSize" class="wrapper body-wrapper home-btm-slider">
<div class="bg-wrapper top-bg-wrapper gray-bg- padding-top-bott pb-0">
<div class="container common-container four_content body-container top-body-container padding-top-bott2">
@if($officer->isNotEmpty())
<div class="minister clearfix">
<div class="minister-box clearfix">
  <div class="row">
    @foreach ($officer as $officers)
    @if ($officers->position == 1 && $officers->status == 'Active')
    <div class="col-md-6">
      <div class="minister-sub1">
        <div class="minister-image"><img src="{{url('/')}}/uploads/{{$officers->image}}" alt="C.M. Uttar Pradesh" class="img-thumbnail img-fluid zoom1"></div>
        <div class="min-info">
          <h2><a href="#">{{$officers->name}}</a></h2>
          <b style="color: #ff7c1b;font-weight: 600;">
            {{$officers->deg}}</b>
        </div>
      </div>
    </div>
    @endif
    @endforeach
    <div class="col-md-6">
      <div class="row">
        @foreach ($officer as $officers)
        @if ($officers->position == 2 && $officers->status == 'Active')
        <div class="col-md-12">
          <div class="minister-sub p-0">
            <div class="row">
              <div class="col-md-6 p-0">
                <div class="minister-image">
                  <img src="{{url('/')}}/uploads/{{$officers->image}}" alt="Minister of Energy Uttar Pradesh" class="img-thumbnail img-fluid zoom1"></div></div>
              <div class="col-md-6 p-0">
                <div class="min-info p-0">
                  <span style="color: #0056b3;">{{$officers->name}}</span><br>
                  <span style="color: #ff7c1b;">{{$officers->deg}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @if ($officers->position == 3 && $officers->status == 'Active')
        <div class="col-md-12 p-0">
          <div class="minister-sub ">
            <div class="row">
              <div class="col-md-6 p-0">
                <div class="minister-image"><img src="{{url('/')}}/img/uppcl3.jpg" alt="Minister of State Energy" class="img-thumbnail img-fluid zoom1"></div></div>
              <div class="col-md-6 p-0">
                <div class="min-info p-0">
                  <span style="color: #0056b3;">{{$officers->name}}</span><br>
                  <span style="color: #ff7c1b;">{{$officers->deg}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @if ($officers->position == 4 && $officers->status == 'Active')
        <div class="col-md-12 p-0">
          <div class="minister-sub ">
            <div class="row">
              <div class="col-md-6 p-0">
                <div class="minister-image"><img src="{{url('/')}}/img/uppcl3.jpg" alt="Minister of State Energy" class="img-thumbnail img-fluid zoom1"></div></div>
              <div class="col-md-6 p-0">
                <div class="min-info p-0">
                  <span style="color: #0056b3;">{{$officers->name}}</span><br>
                  <span style="color: #ff7c1b;">{{$officers->deg}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>
@endif
<div class="left-block" @if($officer->isEmpty()) style="width: 100%;" @endif>
<div class="row text-center">
  <div class="col-md-12">
    @foreach ($content as $contents)
    @if ($contents->con_type == 'Link')
    <a href="{{$contents->link}}" class="btn mb-4 @if($contents->effect) {{$contents->effect}} @endif" title="{{$contents->heading}}" target="_blank" style="background-color: {{ $contents->background_color }}; color: {{ $contents->text_color }}; padding-top: 14px;padding-bottom: 14px;padding-left: 20px;padding-right: 20px;">{{$contents->heading}}</a>
    @endif
    @if ($contents->con_type == 'Pdf')

    <a href="{{url('/')}}/uploads/{{$contents->file}}" class="btn mb-4 @if($contents->effect) {{$contents->effect}} @endif" title="{{$contents->heading}}" target="_blank" style="background-color: {{ $contents->background_color }}; color: {{ $contents->text_color }}; padding-top: 14px;padding-bottom: 14px;padding-left: 20px;padding-right: 20px;">{{$contents->heading}}</a>
    @endif
    @endforeach

  </div>
</div>
</div>
</div>
</div>


<section class="wrapper home-btm-slider">
<div class="container common-container four_content gallery-container">
<h3 style="text-align: center; font-weight: bold;" tabindex="0" data-swp-font-size="24px">Consumer Corner</h3>

<div class="card-deck">
<div class="card note" style="min-height: 259px;">
  <div class="card-img-top" style="background-image: url({{url('/')}}/img/Bill-Pay1.jpg);height: 250px;background-size: cover;padding: 10px 20px;">
    <div class="text-white text-center" style="background-color: rgba(60, 58, 58, 0.5);">
      <b>Bill Generation and Payment</b>
    </div>
  </div>

  <div class="card-body note2">
    <ul class="scroll">
      <li class="text-center"><b>Bill Generation and Payment</b><hr></li>
      <li>
        <a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_billInfo_payBill_home&amp;pageID=PB_1010" target="_blank" rel="noopener" title="Pay Bill Online" style="padding-left:2px;">
          <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Pay Bill Online</a></li>
      <li><a href="https://uppclmp.myxenius.com/login.html" target="_blank" rel="noopener" title="Multi-Story Recharge" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Multi-Story Recharge</a></li>
      <li><a href="https://pvvnl.org/prepaid-meter-recharge/" title="Recharge Your Prepaid Meter" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Recharge Your Prepaid Meter</a></li>
      <li><a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_billInfo_smprepaidRecharge&amp;pageID=PREB_1010" target="_blank" rel="noopener" title="Smart Meter Prepaid Recharge" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Smart Meter Prepaid Recharge</a></li>
      <li><a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_billInfo_trustMeterReading&amp;pageID=1002_TMRNM" target="_blank" rel="noopener" title="Net-Meter Self Bill Generation" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Net-Meter Self Bill Generation</a></li>
      <li><a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_billInfo_trustMeterReading&amp;pageID=1002_TMR" target="_blank" rel="noopener" title="Self Bill Generation (upto 9 kw)" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Self Bill Generation (upto 9 kw)</a></li>
      <li><a href="https://www.youtube.com/watch?v=mIwbf0Mla4I" target="_blank" rel="noopener" title="How to Pay Electricity Bill Online?" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> How to Pay Electricity Bill Online?</a></li>
    </ul>
  </div>
</div>

<div class="card note " style="min-height: 259px;">
  <div class="card-img-top" style="background-image: url({{url('/')}}/img/New-Connection1.jpg);height: 250px;background-size: cover;padding: 10px 20px;">
    <div class="text-white text-center" style="background-color: rgba(60, 58, 58, 0.5);">
      <b>New Connection</b>
    </div>
  </div>
  <div class="card-body note2">
    <ul class="scroll">
      <li class="text-center"><b>New Connection</b><hr></li>
      <li><a href="http://jtp.uppcl.org/online/frmLogin.aspx" target="_blank" rel="noopener" title="Domestic Connection" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" style="color: #ff8d00;" aria-hidden="true"></i> Domestic Connection</a></li>
      <li><a href="http://niveshmitra.up.nic.in/" target="_blank" rel="noopener" title="Comm. &amp; Indus. (above 20KW)" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Comm. &amp; Indus. (above 20KW)</a></li>
      <li><a href="http://ptw.uppcl.org/online/account/login" target="_blank" rel="noopener" title="PTW/Agriculture Connection" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> PTW/Agriculture Connection</a></li>
      <li><a href="https://jtp.uppcl.org/online/frmLogin.aspx" target="_blank" rel="noopener" data-swp-font-size="15px" title="Apply For Single Point To Multi Point Connection" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Apply For Single Point To Multi Point Connection</a></li>
      <li><a href="https://pvvnl.org/faq/" title="How To Apply New Connection" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> How To Apply New Connection</a></li>
    </ul>
  </div>
</div>

<div class="card note" style="min-height: 259px;">
  {{-- <img class="card-img-top" src="{{url('/')}}/img/New-Connection1.jpg" alt="Card image cap"> --}}

  <div class="card-img-top" style="background-image: url({{url('/')}}/img/Manage-Profile1.jpg);height: 250px;background-size: cover;padding: 10px 20px;">
    <div class="text-white text-center" style="background-color: rgba(60, 58, 58, 0.5);">
      <b>My Connection</b>
    </div>
  </div>
  <div class="card-body note2">
    <ul class="scroll">
      <li class="text-center"><b>My Connection</b><hr></li>
      <li><a href="https://pvvnl.org/urban-service-request/" rel="noopener" title="Online electricity Service Request" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Online electricity Service Request</a> – <a title="Video" href="https://www.youtube.com/watch?v=CfLyawyIi4w" target="_blank" rel="noopener">Video</a></li>
      <li><a href="https://uppcl.mpower.in/wss/LoginNew.htm" target="_blank" rel="noopener" title="Check Your Bill" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Check Your Bill</a></li>
      <li><a href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&amp;_pageLabel=uppcl_loginreg_registration&amp;pageID=UM_1010" target="_blank" rel="noopener" title="Update Mobile No." style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Update Mobile No.</a></li>
      <li><a href="https://pvvnl.org/wp-content/uploads/2022/06/How-to-register-Bill-Revision-Complaint.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize174MB" target="_blank" rel="noopener" title="How to register Bill Revision Complaint – (Language – English &amp; Hindi)" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> How to register Bill Revision Complaint – <span tabindex="0">(Language – English &amp; Hindi)</span></a></li>
    </ul>
  </div>
</div>

<div class="card note" style="min-height: 259px;">

  <div class="card-img-top" style="background-image: url({{url('/')}}/img/Complaint1.jpg);height: 250px;background-size: cover;padding: 10px 20px;">
    <div class="text-white text-center" style="background-color: rgba(60, 58, 58, 0.5);">
      <b>Complaint</b>
    </div>
  </div>
  <div class="card-body note2">
    <ul class="scroll">
      <li class="text-center"><b>Complaint</b><hr></li>
      <li><a href="https://appsavy.com/coreapps" target="_blank" rel="noopener" title="Register Complaint" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Register Complaint</a></li>
      <li><a href="https://appsavy.com/coreapps" target="_blank" rel="noopener" title="Track Complaint" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Track Complaint</a></li>
      <li><a href="http://jansunwai.up.nic.in/onlineComplaint.html" target="_blank" rel="noopener" title="Integrated Grievances Redress System" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Integrated Grievances Redress System</a></li>
      <li><a href="https://pvvnl.org/consumer-services/consumer-grievance/" rel="noopener" title="Consumer Grievance Redressal Forum" style="padding-left:2px;">
        <i class="fa fa-arrow-circle-right" aria-hidden="true" style="color: #ff8d00;"></i> Consumer Grievance Redressal Forum</a></li>
    </ul>
  </div>
</div>
</div>
</div>
</section>

<!-- ============ Start News =========== -->

<div class="wrapper home-btm-slider">
<div class="container common-container four_content gallery-container">
<div class="card-deck">
<div class="card">
  
  <div class="card-body-">
    <div class="list-group list-group-flush">
      <iframe loading="lazy" id="iframe_important_link" class="scrl" src="{{url('/')}}/ImportantLink" width="100%" height="350px" frameborder="0"></iframe>
    </div>
  </div>
  <div class="card-footer pp">
    <p style="text-align: center;"><a href="{{url('/')}}/news/1" title="View More" style="color: #ff7c1b;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> View More</a></p>
  </div>
</div>
<div class="card">
  <div class="card-body-">
    <div class="list-group list-group-flush">
      <iframe loading="lazy" id="iframe_important_link" class="scrl" src="{{url('/')}}/Highlights" width="100%" height="350px" frameborder="0"></iframe>
    </div>
  </div>
  <div class="card-footer pp">
    <p style="text-align: center;"><a href="{{url('/')}}/news/2" title="View More" style="color: #ff7c1b;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> View More</a></p>
  </div>
</div>

<div class="card">
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

<!-- ============ Latest News =========== -->

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
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40">
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
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40">
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

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 news wow fadeInUp animated sahni-mt-40">
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
</style>
<section class="wrapper carousel-wrapper home-btm-slider" style="background: url({{url('/')}}/assets/images/imp-bg.jpg);">
<div class="container common-container four_content carousel-container">
<div id="flexCarousel" class="flexslider carousel">
<ul class="slides">
<li><a target="_blank" href="https://www.india.gov.in/" title="India Govt" class="my-4 mx-3">
  <img src="{{url('/')}}/img/India-Govt.jpg" alt="India Govt"></a>
</li>
<li><a target="_blank" href="https://uppcl.org/uppcl/en" title="Image of Uttar Pradesh Power Corporation Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Uttar-Pradesh-Power-Corporation-Ltd-.jpg" alt="Image of Uttar Pradesh Power Corporation Ltd"></a>
</li>
<li><a target="_blank" href="https://www.uperc.org/Default2.aspx" title="Image of Uttar Pradesh Electricity Regulatory Commission" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Uttar-Pradesh-Electricity-Regulatory-Commission.jpg" alt="Image of Uttar Pradesh Electricity Regulatory Commission"></a>
</li>
<li><a target="_blank" href="https://www.up.gov.in/" title="Image of Government of Uttar Pradesh" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Government-of-Uttar-Pradesh.jpg" alt="Image of Government of Uttar Pradesh"></a>
</li>
<li><a target="_blank" href="http://upptcl.org/upptcl" title="Uttar Pradesh Power Transmission Corporation Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Uttar-Pradesh-Power-Transmission-Corporation-Ltd.jpg" alt="Uttar Pradesh Power Transmission Corporation Ltd"></a>
</li>
<li><a target="_blank" href="https://www.uprvunl.org/index.php/" title="Image of Uprvunl" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Uprvunl.jpg" alt="Image of Uprvunl"></a>
</li>
<li><a target="_blank" href="https://kesco.co.in/wss/" title="Kanpur Electricity Supply Company" class="my-4 mx-3">
  <img src="{{url('/')}}/img/kanpur-Electricity-Supply-Company.jpg" alt="Kanpur Electricity Supply Company"></a>
</li>
<li><a target="_blank" href="http://puvvnl.up.nic.in/" title="Purvanchal Vidyut Vitaran Nigam Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Purvanchal-Vidyut-Vitaran-Nigam-Ltd.jpg" alt="Purvanchal Vidyut Vitaran Nigam Ltd"></a>
</li>
<li><a target="_blank" href="http://www.mvvnl.in/" title="Madhyanchal Vidyut Vitaran Nigam Ltd" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Madhyanchal-Vidyut-Vitaran-Nigam-Ltd.jpg" alt="Madhyanchal Vidyut Vitaran Nigam Ltd"></a>
</li>
<li><a target="_blank" href="https://www.dvvnl.org/" title="Dakshinanchal Vidyut Nigam" class="my-4 mx-3">
  <img src="{{url('/')}}/img/Dakshinanchal-Vidyut-Nigam.jpg" alt="Dakshinanchal Vidyut Nigam"></a>
</li>
</ul>
</div>
</div>

@endsection
@section('script')
<script src="{{url('/')}}/theme/js/custom.js"></script>


<script>
    // Function to display custom alert with image
    function displayImageAlert() {
        // Create a custom alert box
        var customAlert = document.createElement('div');
        customAlert.classList.add('custom-alert');
        
        var customAlertContent = document.createElement('div');
        customAlertContent.classList.add('custom-alert-content');
        
        var closeButton = document.createElement('span');
        closeButton.classList.add('close-btn');
        closeButton.innerHTML = '&times;';
        closeButton.onclick = function() {
            document.body.removeChild(customAlert);
        };
        
        var image = document.createElement('img');
        image.src = 'img/alert_image.jpeg';
        image.alt = 'Alert Image';
        
        var message = document.createElement('p');
        message.textContent = '';
        
        customAlertContent.appendChild(closeButton);
        customAlertContent.appendChild(image);
        customAlertContent.appendChild(message);
        
        customAlert.appendChild(customAlertContent);
        
        document.body.appendChild(customAlert);
    }

    // Delay the alert by 3 seconds (3000 milliseconds)
    setTimeout(displayImageAlert, 1);
</script>

<style>
    .custom-alert {
        position: fixed;
        z-index: 1000;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border: 3px solid #ff7c1b;
        border-radius: 5px;
        padding: 20px;
       box-shadow: -3px 14px 20px 20px rgb(0 0 0 / 52%);
        max-width: 500px;
    }

    .custom-alert-content {
        text-align: center;
    }

    .close-btn {
        position: absolute;
        top: -19px;
        right: -2px;
        font-size: 35px;
        cursor: pointer;
    }

    .close-btn:hover {
        color: #f00;
    }

    .custom-alert img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }
</style>
@endsection