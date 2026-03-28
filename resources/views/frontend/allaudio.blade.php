@extends('frontend.layouts.main')
@section('content')
  <div class="body_contaner">
 <!--about body section start here-->
<div class="inner_header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                 <!-- <h3 class="inner_title"></h3> -->
                  <div class="region region-breadcrumb">
    <div id="block-stqc-breadcrumbs" class="block block-system block-system-breadcrumb-block">
  
    
        <nav class="breadcrumb" role="navigation" aria-labelledby="system-breadcrumb">
    <h2 id="system-breadcrumb" class="visually-hidden">Breadcrumb</h2>
    <ol class="breadcrumb" style="font-size: 1.5rem; font-weight:bold; color:orange !important;">
          <li class="breadcrumb-item">
                  <a href="{{ url('/') }}/">Home</a>
              </li>
          <li class="breadcrumb-item">
                  Welcome to 
              </li>
        </ol>
  </nav>

  </div>

  </div>

            </div>
        </div>
    </div>	

</div>

<div class="inner_section" id="mainsection" style="margin-top:20px;">
<div class="container">
<div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12"><!-- <span class="heading_title"> -->  <div class="region region-page-title">
    <div id="block-stqc-page-title" class="block block-core block-page-title-block">
  
  
      
  <h1 class="page-title">Welcome to </h1>
 


  </div>

  </div>
<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
<div id="block-stqc-content" class="block block-system block-system-main-block">
  
    
      
<article data-history-node-id="923" class="node node--type-about-stqc node--view-mode-full">

  
    

  
  <div class="node__content">
    
            <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item">
             <section class="contentwrap">


<div class="col-md-12 innercontent" style="margin-top:20px;padding-bottom:30px;">   
  <div class="cont diversity-scientists">
    <div class="row">
      <div class="col-md-12 text-center"> 
      <h2 id="demo" align="center"> Please press to hear the Audio Description in English </h2>  
      </div>

      <div class="col-md-12 text-center" style="margin-top:20px">
        <audio id="myAudio1" controls="" style="width: 350px; height: 50px">
         <source src="{{url('/')}}/uploads/GardenAudioFiles/{{$plant_detail->file}}" type="audio/mpeg"> 
        Your browser does not support the audio element.
       </audio>
     </div>
   </div>
 </div>
</div>

<script type="application/javascript">
//window.addEventListener("click", try12);
/*function try12 ()
{
  //alert("window player");
  stopAllAudio();
  const audio = document.getElementById("myAudio");
  audio.volume = 0.2;
  audio.play();
}

function stopAllAudio(){
  var allAudios = document.querySelectorAll('audio');
  allAudios.forEach(function(audio){
    audio.pause();
  });
}
var audioTwo = document.getElementById("myAudio1");
var audioOne = document.getElementById("myAudio");*/
/*function player_en(){
  var audioTwo = document.getElementById("myAudio1");
  stopAllAudio();
  audioTwo.play();
  alert("english player");
}

function player_hi(){
  var audioOne = document.getElementById("myAudio");
  stopAllAudio();
  audioOne.play();
  alert("hindi player");
}*/


let hi_player = document.getElementById("myAudio");
let en_player = document.getElementById("myAudio1");
hi_player.onplay = function(){//alert("hindi player");
  //stopAllAudio();
  en_player.pause();
  hi_player.play();
} 

en_player.onplay = function(){//alert("hindi player");
  //stopAllAudio();
  hi_player.pause();
  en_player.play();
} 

</script>

</section>

            </div>
      
  </div>

</article>

  </div>

  </div>

  </div>
   

  </div>
</div>

<!--about body section end here-->

<!--body section end here-->
<!--Footer section starts here-->
</div>


 <!--footer section start here-->
 <!-- Gray Bg Bottom Slider Section Start -->
 <div class="gray-bg shani_shadow mt-3">
   <div class="container">
     <div class="row">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12">
         <div id="gov_bottom_slider2" class="owl-carousel owl-theme">
           <a href="https://www.mygov.in/"><img alt="my gov" src="{{url('/')}}/themes/nbri/images/f1.jpg"></a>
           <a href="https://www.india.gov.in/"><img alt="india" src="{{url('/')}}/themes/nbri/images/f2.jpg"></a>
           <a href="https://www.makeinindia.com/home"><img alt="makeinindia" src="{{url('/')}}/themes/nbri/images/f3.jpg"></a>
           <a href="https://data.gov.in/"><img alt="data gov" src="{{url('/')}}/themes/nbri/images/f4.jpg"></a>
           <a href="https://www.digitalindia.gov.in/"><img alt="digitalindia" src="{{url('/')}}/themes/nbri/images/f5.jpg"></a>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
