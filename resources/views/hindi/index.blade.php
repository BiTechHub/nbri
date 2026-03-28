@extends('hindi.layouts.main')
@section('content')
<div class="banner_sec" style="width: 100%;">
   <div class="region region-banner" style="width: 75%;float: left;" id="ss1">
     
   <div class="views-element-container block block-views block-views-blockhomepage-banner-block-1" id="block-stqc-views-block-homepage-banner-block-1">


     <div>
       <div class="view view-homepage-banner view-id-homepage_banner view-display-id-block_1 js-view-dom-id-2dca2fb117c200ed69a49fa22198fd582dc69e2cf4eb6157a4e341ac09cff2af" style="width:100%;">



         <div class="view-content">

           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

             <div class="carousel-inner">
                @php
               $i=1;
              @endphp
              @foreach($slider as $sl)
               <div class="carousel-item @if($i==1) active @endif">
                 <img loading="lazy" src="{{url('/')}}/uploads/{{$sl->image}}" width="2100" height="300" alt="{{$sl->heading_hi}}" />
               </div>
              @php
               $i++;
              @endphp
              @endforeach


             </div>

             <div class="banner_arrow">
               <div class="bannarrow1">
                 <a class="" href="#carouselExampleIndicators" role="button" data-slide="prev">
                   <i class="fa fa-angle-up" aria-hidden="true"></i>

                 </a>
               </div>
               <div class="bannarrow2">
                 <ol class="carousel-indicators">
                    @php
                     $i=0;
                    @endphp
                    @foreach($slider as $sl)
                   <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="@if($i==0) active @endif"></li>
                     @php
                       $i++;
                      @endphp
                      @endforeach
                 </ol>
               </div>



               <div class="bannarrow3">
                 <a class="" href="#carouselExampleIndicators" role="button" data-slide="next">
                   <i class="fa fa-angle-down" aria-hidden="true"></i>
                 </a>
               </div>
             </div>
           </div>
         </div>

       </div>
     </div>

   </div>

 </div>

<!--</div>
<div class="banner_sec-news">-->
 
 <div class="" style="width: 25%;float: left;" id="ss2">

 <nav>
   <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
     <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b>सूचनाएं</b></a>


   </div>
 </nav>
 <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
   <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
     <div class="view-filters">
       <marquee direction="up" width="100%" height="500px;" style="color:#000; font-size:15px;" onmouseover="this.stop();" onmouseout="this.start();">

         <ul style="padding-left:28px;">
          <!--<li style="border-bottom:1px dashed #ccc;font-weight:nold;color:#382e2e;margin-bottom:20px;"><img src="{{url('/')}}/img/new_red.gif"><a href="/en/ExternalDownloadTmp">एडमिट कार्ड डाउनलोड करें</a></li>-->
          @foreach($news_n as $noti)
           <li style="border-bottom:1px dashed #ccc;font-weight: bold;color: #382e2e;margin-bottom: 20px;">
             @if($noti->link)
             <img src="{{url('/')}}/img/new_red.gif"> <a href="{{url('/') }}/hi/page/{{ $noti->link }}" target="_blank">{{$noti->subject_hi}}</a>
             @else
             <img src="{{url('/')}}/img/new_red.gif"> <a href="{{url('/') }}/uploads/news/{{ $noti->file_name }}" target="_blank">{{$noti->subject_hi}}</a>
             @endif
           </li>

           @endforeach

         </ul>
       </marquee>
     </div>
   </div>


 </div>
</div>



</div>

<!--banner section end here-->

<!--body section start here-->

<div class="body_contaner">
<!--what is new section start here-->
<div class="what_boxsection shani_shadow">
 <div class="container-fluid">
   <div class="row">
     <div class="col-12 col-sm-12 col-md-12 col-lg-12">
       <div class="whatsnew_sec">
         <div class="whats-new-cont">
           <div class="text" id="slide-number">2 / 2</div>
           <div class="slider-controls">
             <h2>नवीन जानकारी</h2>
             <div class="controls-container">
               <!-- <button class="controls prev" onclick="plusSlides(-1)"><i class="fa fa-backward"></i></button> -->
               <button class="controls pause" onclick="playPauseHandler()"><img alt="play button" src="{{url('/')}}/themes/nbri/images/play_icon.png">
               </button>
               <!-- <button class="controls next" onclick="plusSlides(1)"><i class="fa fa-forward"></i></button> -->
             </div>
           </div>
           <div class="slideshow-container">
             <div class="region region-whatsnew">
               <div class="views-element-container block block-views block-views-blockwhats-new-block-1" id="block-stqc-views-block-whats-new-block-1">


                 <div>
                   <div class="view view-whats-new view-id-whats_new view-display-id-block_1 js-view-dom-id-5e6c1f3f0d7ea4d00beba971083a1c103cc9eb317915fd1589b0ee879ced87ff">



                     <div class="view-content">


                       @foreach($news_w as $noti)
                       <div class="mySlides fade">
                         @if($noti->link)
                         <a href="{{url('/') }}/hi/page/{{ $noti->link }}" target="_blank">{{$noti->subject_hi}}</a>
                         @else
                         <a href="{{url('/') }}/uploads/news/{{ $noti->file_name }}" target="_blank">{{$noti->subject_hi}}</a>
                         @endif
                       </div>
                       @endforeach
                       <div id="myProgress">
                         <div id="myBar"></div>
                       </div>


                     </div>

                   </div>
                 </div>

               </div>

             </div>

           </div>
           <div class="bottom-btn d-flex justify-content-end">
             <a href="{{url('/')}}/hi/NewsNotifications/WhatsNew" class="view_btn">सभी को देखें</a>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<style>
    .img-zoom {
  transition: transform 0.3s ease-in-out; /* Smooth animation */
}

.img-zoom:hover {
  transform: scale(1.1); /* Zoom in by 10% */
}
  </style>
<!--what is new section end here-->
<div class="about_boxsection" id="mainsection">
 <div class="">
   <div class="container-fluid">
     <div class="row">

       <div class="col-12 col-sm-12 col-md-12 col-lg-12 about_bg2">
         <div class="region region-leader-section">
           <div id="block-stqc-leadersection" class="block block-block-content block-block-content02481dce-0f19-4d69-9225-0ebbe5332d1f">



             <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item">
               <div class="row">

                  @foreach($officer as $offi)
                 <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
                   <div class>
                     <div class="card leader_section_box shani_shadow text-center" style="background-image:url('{{url('/')}}/img/background.jpg');">
                       <div class="leader-pic"><img class="img-zoom" src="{{url('/')}}/uploads/{{$offi->image}}" alt="{{$offi->name_hi}}" style="border-radius: 50%;border: 2px solid #48d24e;"  class="leader" loading="lazy"></div>
                       <div class="card-body">
                         <a href="{{$offi->link_hi}}" onclick="return ConfirmLeaveSite(this.href)" target="_blank"><h4 class="card-title m-0" style="color: #ce4814;font-weight: bold;">{{$offi->name_hi}}</h4></a>
                         <b class="card-text">{{$offi->deg_hi}}</b>
                       </div>
                     </div>
                   </div>
                 </div>
                 @endforeach














               </div>
             </div>

           </div>

         </div>

       </div>
     </div>
   </div>
 </div>
</div>
<!--home about section start here-->




<!--home about section end here-->
 @foreach($maincontent as $main)
      @if($main->id == 6)
        {!! $main->code !!}
      @endif
    @endforeach
<!--leader section start here-->

<!--leader section end here-->










<!--leader section end here-->





<style>
 .socail-fb {
   height: 360px !important;
 }

</style>
<div class="social-section pb-0">
 <div class="container">

   <!--Quick Links Start here-->

   <div class="galler_box">
     <div class="container">
       <div class="row">

         
         <div class="col-12 col-sm col-md-6 col-lg-6">
          <h2 class="title2s">त्वरित <span> लिंक</span></h2>
          <div class="bottom-btn d-flex justify-content-end top_btn"><a href="" data-bs-toggle="modal" data-bs-target="#myModalQ"
              class="view_btntop r_space">सभी को देखें</a></div>
            <div class="region region-hp-circular">
                <div class="views-element-container block block-views block-views-blockcircular-notice-order-block-1" id="block-stqc-views-block-circular-notice-order-block-1">


                  <div><div class="view view-circular-notice-order view-id-circular_notice_order view-display-id-block_1 js-view-dom-id-e0de97a9aaa9ab4f6add8d1984a7030cca9074626d2c8e3ef23ee7b15f24ee6e">



                  <div class="view-content">

            <div id="circular" class="circularul owl-carousel owl-theme owl-loaded owl-drag">
              <ul class="circularul">
                @foreach($quicklinks as $ql)
                 <li>
                  
                  <div class="circular_des" style="display:flex"> {{$ql->name_hi}} @if($ql->is_new == 'Yes')<img src="{{url('/')}}/img/new.gif" style="width: auto;">@endif
                    <a class="notice_link" href="{{url('/')}}/{{$ql->deg_hi}}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
                    <div></div>
                </li>
               @endforeach
                
                    </ul>
            </div>
                </div>

                      </div>
            </div>

              </div>

              </div>

                    </div>


<div class="modal fade" id="myModalQ" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Quick Links</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
           <ul class="circularul">
                 @foreach($quicklinks as $ql)
                 <li>
                  
                  <div class="circular_des" style="display:flex"> {{$ql->name_hi}} @if($ql->is_new == 'Yes')<img src="{{url('/')}}/img/new.gif" style="width: auto;">@endif
                    <a class="notice_link" href="{{url('/')}}/{{$ql->deg_hi}}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
                    <div></div>
                </li>
               @endforeach
                
                    </ul>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


         <!---  <div class="col-12 col-sm col-md-6 col-lg-6">
<h2 class="title2s">Quick <span> Links</span></h2>
<div class="bottom-btn d-flex justify-content-end top_btn"><a href="circular-notice.html" class="view_btntop r_space">View
All</a></div>
<div class="region region-hp-circular">
<div class="views-element-container block block-views block-views-blockcircular-notice-order-block-1" id="block-stqc-views-block-circular-notice-order-block-1">


<div>
<div class="view view-circular-notice-order view-id-circular_notice_order view-display-id-block_1 js-view-dom-id-e0de97a9aaa9ab4f6add8d1984a7030cca9074626d2c8e3ef23ee7b15f24ee6e">



<div class="view-content">

<div id="circular" class="circularul owl-carousel owl-theme owl-loaded owl-drag">
<ul class="circularul">
<li>
<div class="date_txt"> 16-12-2024</div>
<div class="circular_des"> Business Portal
<a class="notice_link" href=" "><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
<div></div>
</li>
<li>
<div class="date_txt"> 01-04-2024</div>
<div class="circular_des"> Recruitment Portal
<a class="notice_link" href=" "><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
<div></div>
</li>
<li>
<div class="date_txt"> 05-08-2024</div>
<div class="circular_des"> Tenders
<a class="notice_link" href=" "><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
<div></div>
</li>
<li>
<div class="date_txt"> 27-06-2022</div>
<div class="circular_des"> Guest House Booking
<a class="notice_link" href=" "><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
<div></div>
</li>
</ul>
</div>
</div>

</div>
</div>

</div>

</div>

</div>-->
         <div class="col-12 col-sm col-md-6 col-lg-6">
           <h2 class="title2s">एनबीआरआई <span>समाचार</span></h2>
           <div class="bottom-btn d-flex justify-content-end top_btn"><a href="{{url('/')}}/hi/NewsNotifications/NbriNews" class="view_btntop r_space">सभी को देखें</a>
           </div>
           <div class="blue-box mt-3 shani_shadow">


             <marquee direction="up" width="100%" height="235px;" style="color:#000; font-size:15px;" onmouseover="this.stop();" onmouseout="this.start();">

               <ul style="padding-left:28px;color:#fff">

                  @foreach($news_pr as $npr)
                 
                 <li style="border-bottom:1px dashed #ccc;font-weight: bold;color: white;margin-bottom: 20px;">
                   @if($npr->link)
                   <a href="{{url('/') }}/hi/page/{{ $npr->link }}" style="color:#fff">{{$npr->subject_hi}}</a>
                   @else
                   <a href="{{url('/') }}/uploads/news/{{ $npr->file_name }}" style="color:#fff">{{$npr->subject_hi}}</a>
                   @endif
                 </li>
                 @endforeach

               </ul>
             </marquee>

           </div>

         </div>
       </div>
     </div>
   </div>


   <!--Quick Links end here-->




   <div class="row my-5">
     <div class="col-12 col-sm-12 col-md-4 col-lg-4 ">
       <h2 class="title2s">फेसबुक <span class="icon_s"><img alt="Facebook" src="{{url('/')}}/themes/nbri/images/fb.png">
         </span>
       </h2>
       <div class="socail-fb shani_shadow">
         <div class="region region-facebook">
           <div id="block-stqc-facebook" class="block block-block-content block-block-content51e8a16c-e4c0-4ebb-b4ca-9054bb1a4124">



             <iframe onclick="return ConfirmLeaveSiteF('https://www.facebook.com');" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fp%2FCSIR-National-Botanical-Research-Institute-Lucknow-India-100068832896095%2F&amp;tabs=timeline&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                     width="100%" height="360px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
             </iframe>

           </div>

         </div>

       </div>
     </div>


     <div class="col-12 col-sm-12 col-md-4 col-lg-4">
       <h2 class="title2s">एक्स.कॉम <span class="icon_s"><img alt="X.com" src="{{url('/')}}/themes/nbri/images/tw.png">
         </span>
       </h2>
       <div class="socail-fb shani_shadow">
         <div class="region region-tw">
           <div id="block-stqc-twitter" class="block block-block-content block-block-content899b2063-944e-41b8-a9bf-268de0b4f61e">



             <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item">
               <p><a class="twitter-timeline" href="https://twitter.com/csirnbrilko">Tweets from NBRI</a>
               <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
               </p>
             </div>

           </div>

         </div>

       </div>
     </div>


     <div class="col-12 col-sm-12 col-md-4 col-lg-4 ">
       <h2 class="title2s">इंस्टाग्राम <span></span>

         <!--      <div class="icon_s"><img alt="" src="/{{url('/')}}/themes/stqc/images/yt.png"></div> -->
       </h2>
       <!--   <div class="region region-video-gallery">
<div id="block-stqc-homepageyoutubevideo" class="block block-block-content block-block-content0d4d273b-97f9-4de5-ac34-7b8fc9411924">



<div class="field field--name-field-you field--type-youtube field--label-hidden field__item"><figure class="youtube-container">
<iframe src="https://www.youtube.com/embed/rZsrBB1kwzQ?wmode=opaque" width="350" height="300" id="youtube-field-player" class="youtube-field-player" title="Embedded video for Home Page YouTube Video" aria-label="Embedded video for Home Page YouTube Video: https://www.youtube.com/embed/rZsrBB1kwzQ?wmode=opaque" frameborder="0" allowfullscreen></iframe>
</figure>
</div>

</div>

</div>
-->
       <div class="socail-fb shani_shadow">
         <div class="region region-facebook">
           <div id="block-stqc-facebook" class="block block-block-content block-block-content51e8a16c-e4c0-4ebb-b4ca-9054bb1a4124">



             <iframe allowtransparency="true" frameborder="0" height="360px" scrolling="yes" src="https://www.instagram.com/csirnbriofficial/embed" width="100%"></iframe>

           </div>

         </div>
       </div>
     </div>
   </div>

   <!--Laboratories section end here-->
   <!--photo gallery section start here-->
   <div class="galler_box">
     <div class="container">
       <div class="row">
         <div class="col-12 col-sm col-md-6 col-lg-6">
           <h2 class="title2s">वीडियो <span> गैलरी</span></h2>
           <div class="bottom-btn d-flex justify-content-end top_btn"><a href="{{url('/')}}/hi/video" class="view_btntop r_space">सभी को देखें</a></div>
           <div class="region region-hp-circular">
             <div class="views-element-container block block-views block-views-blockcircular-notice-order-block-1" id="block-stqc-views-block-circular-notice-order-block-1">


               <div>
                 <div class="view view-circular-notice-order view-id-circular_notice_order view-display-id-block_1 js-view-dom-id-e0de97a9aaa9ab4f6add8d1984a7030cca9074626d2c8e3ef23ee7b15f24ee6e">



                   <div class="view-content mt-4">


                     <iframe width="100%" height="214" src="{{$latestVideo->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>


                   </div>

                 </div>
               </div>

             </div>

           </div>

         </div>


         <div class="col-12 col-sm col-md-6 col-lg-6">
           <h2 class="title2s">फोटो <span>गैलरी</span></h2>
           <div class="bottom-btn d-flex justify-content-end top_btn"><a href="{{url('/')}}/hi/gallery" class="view_btntop r_space">सभी को देखें</a>
           </div>
           <div class="region region-photo-gallery">
             <div class="views-element-container block block-views block-views-blockphoto-gallery-block-1" id="block-stqc-views-block-photo-gallery-block-1">


               <div>
                 <div class="view view-photo-gallery view-id-photo_gallery view-display-id-block_1 js-view-dom-id-6c695b6714eb255d2ae48383beb29f037c34c13e300c36c1deeb88204f292b25">



                   <div class="view-content">
                     <div id="sucess_stories" class="tab_social owl-carousel owl-theme owl-loaded owl-drag">
                       <ul class="gallery_ul">
                         <!--<li>  <img loading="lazy" src="{{url('/')}}/img/p6.jpg" width="265" height="214" alt="NBRI" class="image-style-_65-214" />


</li>
<li>  <img loading="lazy" src="{{url('/')}}/img/p2.jpg" />


</li>-->
                          @foreach($latestPhotos as $ph)
                         <li> <img loading="lazy" src="{{url('/')}}/uploads/{{$ph->image}}" width="265" height="214" alt="NBRI" class="image-style-_65-214" />


                         </li> 
                         @endforeach
                         
                         <!-- <li>  <img loading="lazy" src="{{url('/')}}/img/p5.jpg" />


</li>
<li>  <img loading="lazy" src="{{url('/')}}/img/Exposition-1.jpg" />


</li>-->

                       </ul>
                     </div>

                   </div>

                 </div>
               </div>

             </div>

           </div>

         </div>
       </div>
     </div>
   </div>
   <!--photo gallery section end her-->


   <!--social section end here-->
 </div>
 <!--body section end here-->
<style>
.fb-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
    z-index: 10;
    background: transparent; /* fully invisible */
}
</style>

<script>
function ConfirmLeaveSiteF(url) {
    if (confirm("You are about to leave this website. Continue?")) {
        window.open(url, "_blank");
        return true;
    } else {
        return false;
    }
}
</script>

 <!--footer section start here-->
 <!-- Gray Bg Bottom Slider Section Start -->
  <div class="gray-bg shani_shadow mt-3">
   <div class="container">
     <div class="row">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12">
         <div id="gov_bottom_slider2" class="owl-carousel owl-theme">
           @foreach($fslider as $fsl)
           <a href="{{$fsl->title}}" onclick="return ConfirmLeaveSite(this.href)"><img alt="my gov" src="{{url('/')}}/uploads/footerslider/{{$fsl->image}}"></a>
           @endforeach
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
