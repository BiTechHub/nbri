@extends('frontend.layouts.main')
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
                 <img loading="lazy" src="{{url('/')}}/uploads/{{$sl->image}}" width="2100" height="300" alt="{{$sl->heading}}" />
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
     <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b>Notifications</b></a>


   </div>
 </nav>
 <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
   <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
     <div class="view-filters">
       <marquee direction="up" width="100%" height="500px" style="color:#000; font-size:15px;" onmouseover="this.stop();" onmouseout="this.start();">

         <ul style="padding-left:28px;">
           <!--<li style="border-bottom:1px dashed #ccc;font-weight: bold;color: #382e2e;margin-bottom: 20px;">
          
             <img src="{{url('/')}}/img/new_red.gif"> <a href="{{url('/') }}/en/ExternalDownloadTmp" target="_blank">Download Admit Card</a>
          
           </li>-->
          @foreach($news_n as $noti)
           <li style="border-bottom:1px dashed #ccc;font-weight: bold;color: #382e2e;margin-bottom: 20px;">
             @if($noti->link)
             <img src="{{url('/')}}/img/new_red.gif"> <a href="{{ $noti->link }}" target="_blank">{{$noti->subject}}</a>
             @else
             <img src="{{url('/')}}/img/new_red.gif"> <a href="{{url('/') }}/uploads/news/{{ $noti->file_name }}" target="_blank">{{$noti->subject}}</a>
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
<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="what_boxsection shani_shadow">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="whatsnew_sec">
          <div class="whats-new-cont">
            
            <!-- Top Bar -->
            <div class="text" id="slide-number">1 / {{ count($news_w) }}</div>
            <div class="slider-controls">
              <h2>What's New</h2>
              <div class="controls-container">
                <button class="controls prev" onclick="plusSlides(-1)">
                  <i class="fas fa-backward"></i>
                </button>
                <button id="playPauseBtn" class="controls pause" onclick="playPauseHandler()">
                  <i class="fas fa-pause"></i>
                </button>
                <button class="controls next" onclick="plusSlides(1)">
                  <i class="fas fa-forward"></i>
                </button>
              </div>
            </div>

            <!-- Slideshow -->
            <div class="slideshow-container">
              <div class="view-content">
                @foreach($news_w as $noti)
                <div class="mySlides fade">
                  @if($noti->link)
                  <a href="{{ url('/') }}/en/page/{{ $noti->link }}" target="_blank">{{ $noti->subject }}</a>
                  @else
                  <a href="{{ url('/') }}/uploads/news/{{ $noti->file_name }}" target="_blank">{{ $noti->subject }}</a>
                  @endif
                </div>
                @endforeach
              </div>

              <!-- Progress Bar -->
              <div id="myProgress">
                <div id="myBar"></div>
              </div>
            </div>

            <!-- Bottom Button -->
            <div class="bottom-btn d-flex justify-content-end">
              <a href="{{url('/')}}/en/NewsNotifications/WhatsNew" class="view_btn">View All</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Styles -->
<style>
.controls-container {
  display: flex;
  gap: 8px;
  align-items: center;
}

.controls {
  background: #007bff;
  color: white;
  border: none;
  padding: 8px 14px;
  border-radius: 50%;
  cursor: pointer;
  font-size: 16px;
  transition: background 0.3s, transform 0.2s;
}

.controls:hover {
  background: #0056b3;
  transform: scale(1.1);
}

.controls i {
  pointer-events: none;
}

.mySlides {
  display: none;
}

.mySlides.fade {
  animation: fade 0.5s ease-in-out;
}

@keyframes fade {
  from {opacity: 0.4;}
  to {opacity: 1;}
}

/* Progress Bar */
#myProgress {
  width: 100%;
  background-color: #ddd;
  height: 4px;
  margin-top: 10px;
}

#myBar {
  height: 4px;
  background-color: #007bff;
  width: 0%;
}
  .img-zoom {
  transition: transform 0.3s ease-in-out; /* Smooth animation */
}

.img-zoom:hover {
  transform: scale(1.1); /* Zoom in by 10% */
}
</style>

<!-- Script -->
 <script>
document.addEventListener("DOMContentLoaded", function () {
  let slideIndex = 1;
  let isPlaying = true;
  let slideInterval;
  let progressInterval;
  const slides = document.getElementsByClassName("mySlides");
  const slideNum = document.getElementById("slide-number");

  if (slides.length === 0) return; // 🚀 prevent conflicts

  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }

    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
    slideNum.innerHTML = slideIndex + " / " + slides.length;
    resetProgressBar();
  }

  function startSlideshow() {
    slideInterval = setInterval(() => { plusSlides(1); }, 3000);
    startProgressBar();
  }

  function stopSlideshow() {
    clearInterval(slideInterval);
    clearInterval(progressInterval);
  }

  function playPauseHandler() {
    const btnIcon = document.querySelector("#playPauseBtn i");

    if (isPlaying) {
      stopSlideshow();
      btnIcon.classList.remove("fa-pause");
      btnIcon.classList.add("fa-play");
    } else {
      startSlideshow();
      btnIcon.classList.remove("fa-play");
      btnIcon.classList.add("fa-pause");
    }
    isPlaying = !isPlaying;
  }

  function startProgressBar() {
    let bar = document.getElementById("myBar");
    let width = 0;
    progressInterval = setInterval(() => {
      if (width >= 100) {
        width = 0;
      } else {
        width += 2;
        bar.style.width = width + "%";
      }
    }, 60);
  }

  function resetProgressBar() {
    document.getElementById("myBar").style.width = "0%";
  }

  startSlideshow();
});
</script>


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
                       <div class="leader-pic"><img class="img-zoom" src="{{url('/')}}/uploads/{{$offi->image}}" alt="{{$offi->name}}" style="border-radius: 50%;border: 2px solid #48d24e;"  class="leader" loading="lazy"></div>
                       <div class="card-body">
                         <a href="{{$offi->link}}" onclick="return ConfirmLeaveSite(this.href)" target="_blank"><h4 class="card-title m-0" style="color: #ce4814;font-weight: bold;">{{$offi->name}}</h4></a>
                         <b class="card-text">{{$offi->deg}}</b>
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

<!--leader section start here-->
@foreach($maincontent as $main)
  @if($main->id == 5)
    {!! $main->code !!}
  @endif
@endforeach
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
          <h2 class="title2s">Quick <span> Links</span></h2>
          <div class="bottom-btn d-flex justify-content-end top_btn"><a href="" data-bs-toggle="modal" data-bs-target="#myModalQ"
              class="view_btntop r_space">View
              All</a></div>
            <div class="region region-hp-circular">
                <div class="views-element-container block block-views block-views-blockcircular-notice-order-block-1" id="block-stqc-views-block-circular-notice-order-block-1">


                  <div><div class="view view-circular-notice-order view-id-circular_notice_order view-display-id-block_1 js-view-dom-id-e0de97a9aaa9ab4f6add8d1984a7030cca9074626d2c8e3ef23ee7b15f24ee6e">



                  <div class="view-content">

            <div id="circular" class="circularul owl-carousel owl-theme owl-loaded owl-drag">
              <ul class="circularul">
                @foreach($quicklinks as $ql)
                 <li>
                  
                  <div class="circular_des" style="display:flex"> {{$ql->name}} @if($ql->is_new == 'Yes')<img src="{{url('/')}}/img/new.gif" style="width: auto;">@endif
                    <a class="notice_link" href="{{url('/')}}/{{$ql->deg}}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
                  
                  <div class="circular_des" style="display:flex"> {{$ql->name}} @if($ql->is_new == 'Yes')<img src="{{url('/')}}/img/new.gif" style="width: auto;">@endif
                    <a class="notice_link" href="{{url('/')}}/{{$ql->deg}}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
           <h2 class="title2s">NBRI in <span>News and Media</span></h2>
           <div class="bottom-btn d-flex justify-content-end top_btn"><a href="{{url('/')}}/en/NewsNotifications/NbriNews" class="view_btntop r_space">View All</a>
           </div>
           <div class="blue-box mt-3 shani_shadow">


             <marquee direction="up" width="100%" height="235px;" style="color:#000; font-size:15px;" onmouseover="this.stop();" onmouseout="this.start();">

               <ul style="padding-left:28px;">
                 @foreach($news_pr as $npr)
                 
                 <li style="border-bottom:1px dashed #ccc;font-weight: bold;color: white;margin-bottom: 20px;">
                   @if($npr->link)
                   <a href="{{url('/') }}/en/page/{{ $npr->link }}" style="color:#fff">{{$npr->subject}}</a>
                   @else
                   <a href="{{url('/') }}/uploads/news/{{ $npr->file_name }}" style="color:#fff">{{$npr->subject}}</a>
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
<div class="row my-5">

    <!-- FACEBOOK -->
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 soc-box">
        <h2 class="title2s">Facebook 
            <span class="icon_s"><img alt="Facebook" src="{{url('/')}}/themes/nbri/images/fb.png"></span>
        </h2>
        <div class="socail-fb shani_shadow soc-container" data-url="https://www.facebook.com/CSIR-NBRI-Lucknow-India-100068832896095">
            <iframe 
                src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/CSIR-NBRI-Lucknow-India-100068832896095&tabs=timeline&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"
                width="100%" height="360" frameborder="0" scrolling="yes">
            </iframe>
            <div class="click-overlay"></div>
        </div>
    </div>

    <!-- X.com / TWITTER -->
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 soc-box">
        <h2 class="title2s">X.com 
            <span class="icon_s"><img alt="X" src="{{url('/')}}/themes/nbri/images/tw.png"></span>
        </h2>
        <div class="socail-fb shani_shadow soc-container" data-url="https://twitter.com/csirnbrilko">
            <a class="twitter-timeline" href="https://twitter.com/csirnbrilko" data-width="100%" data-height="360">
                Tweets by NBRI
            </a>
            <script async src="https://platform.twitter.com/widgets.js"></script>
            <div class="click-overlay"></div>
        </div>
    </div>

    <!-- INSTAGRAM -->
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 soc-box">
        <h2 class="title2s">Instagram</h2>
        <div class="socail-fb shani_shadow soc-container" data-url="https://www.instagram.com/csirnbriofficial/">
            <iframe 
                src="https://www.instagram.com/csirnbriofficial/embed"
                width="100%" height="360" frameborder="0" scrolling="yes">
            </iframe>
            <div class="click-overlay"></div>
        </div>
    </div>

</div>

<!-- WARNING MODAL -->
<div id="warningModal" class="warning-modal">
    <div class="warning-box">
        <p>You are being redirected to an external website.</p>
        <button id="continueBtn" class="btn-yes">Continue</button>
        <button id="cancelBtn" class="btn-no">Cancel</button>
    </div>
</div>

<style>
.soc-container { position: relative; height: 360px; }

/* Click overlay on top of iframe */
.click-overlay {
    position: absolute; top:0; left:0; width:100%; height:100%;
    background: rgba(0,0,0,0); cursor:pointer; z-index:10;
}

/* Warning Modal */
.warning-modal {
    position: fixed; top:0; left:0; width:100%; height:100%;
    display: flex; justify-content:center; align-items:center;
    background: rgba(0,0,0,0.6); z-index:10000;
    opacity:0; visibility:hidden; transition:0.3s;
}
.warning-modal.show { opacity:1; visibility:visible; }
.warning-box { background:#fff; padding:25px; border-radius:8px; width:320px; text-align:center; transform:scale(0.8); transition:0.3s; }
.warning-modal.show .warning-box { transform:scale(1); }

.btn-yes, .btn-no { padding:10px 20px; margin:8px; border:none; cursor:pointer; }
.btn-yes { background:#28a745; color:#fff; }
.btn-no { background:#dc3545; color:#fff; }
</style>

<script>
let selectedURL = "";

// Single click on overlay → show popup
document.querySelectorAll(".click-overlay").forEach(overlay => {
    overlay.addEventListener("click", e => {
        selectedURL = overlay.parentElement.dataset.url;
        document.getElementById("warningModal").classList.add("show");
    });
});

// Continue → open in new tab
document.getElementById("continueBtn").addEventListener("click", () => {
    window.open(selectedURL, "_blank");
    document.getElementById("warningModal").classList.remove("show");
});

// Cancel → close modal
document.getElementById("cancelBtn").addEventListener("click", () => {
    document.getElementById("warningModal").classList.remove("show");
});

// Click outside modal → close
document.getElementById("warningModal").addEventListener("click", e => {
    if(e.target === document.getElementById("warningModal")) {
        document.getElementById("warningModal").classList.remove("show");
    }
});
</script>


   <!--Laboratories section end here-->
   <!--photo gallery section start here-->
   <div class="galler_box">
     <div class="container">
       <div class="row">
         <div class="col-12 col-sm col-md-6 col-lg-6">
           <h2 class="title2s">Video <span> Gallery</span></h2>
           <div class="bottom-btn d-flex justify-content-end top_btn"><a href="{{url('/')}}/video" class="view_btntop r_space">View
             All</a></div>
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
           <h2 class="title2s">Photo <span>Gallery</span></h2>
           <div class="bottom-btn d-flex justify-content-end top_btn"><a href="{{url('/')}}/gallery" class="view_btntop r_space">View All</a>
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

