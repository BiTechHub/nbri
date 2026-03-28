@extends('hindi.layouts.main')
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
                   @foreach($menu as $mm)
                   @if($sitecontents)
                   @if($mm->id == $sitecontents->main_cat)
                  <a href="{{ url('/') }}/">{{$mm->menu_hi}}</a>
                   @endif
                   @endif
                 @endforeach
              </li>
          @if($sitecontents)
          <li class="breadcrumb-item">
                  {{$sitecontents->heading}}
              </li>
      @else
      <li class="breadcrumb-item">
                 
              </li>
      @endif
        </ol>
  </nav>

  </div>

  </div>

            </div>
        </div>
    </div>	

</div>

<div class="inner_section" id="mainsection">
<div class="container">
<div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12"><!-- <span class="heading_title"> -->  <div class="region region-page-title">
    <div id="block-stqc-page-title" class="block block-core block-page-title-block">
  
    
      
  <!--<h1 class="page-title"></h1>-->


  </div>

  </div>
<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
<div id="block-stqc-content" class="block block-system block-system-main-block">
  
    
      
<article data-history-node-id="923" class="node node--type-about-stqc node--view-mode-full">

  
    

  
  <div class="node__content">
            @if($sitecontents)
            <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item">
              {!! $sitecontents->content !!}
            </div>
            @else
            <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item">
               <h1 style="margin-top:20px;">
                 रिकॉर्ड जल्द ही अपडेट किया जाएगा...
              </h1>
            </div>
            @endif
    @if($main_cat == 33)
        @if(!empty($staff_area))
     <h1 class="page-title" style="margin-top:10px;">वैज्ञानिक</h1>
          <div class="row text-center">
              @foreach($staff_area as $st)
                  <div class="col-md-3 col-sm-6 mb-4">
                      <div class="team-member">
                          <img 
                              src="{{ asset('uploads/staffPics/' . $st->image) }}" 
                              alt="{{ $st->name_hi }}" 
                              class="img-fluid rounded shadow-sm"
                          >
                          <h5 class="mt-2 font-weight-bold text-primary">{{ $st->name_hi }}</h5>
                          <a href="{{ url('hi/Staff/View/Profile/' . $st->id . '/' . urlencode($st->name)) }}">
                              <p class="text-muted">{{ $st->deg_hi }}</p>
                          </a>
                        <a href="{{ url('hi/ViewProfile/' . $st->id . '/' . urlencode($st->name)) }}" class="btn btn-primary" target="_blank">
                              देखें
                          </a>
                      </div>
                  </div>
              @endforeach
          </div>
      @endif
      @if(!empty($staff_area))
          <h1 class="page-title" style="margin-top:10px;">टेक्निकल स्टाफ</h1>
          <div class="row text-center">
              
              @foreach($tech_staff_area as $st)
                  <div class="col-md-3 col-sm-6 mb-4">
                      <div class="team-member">
                          <img 
                              src="{{ asset('uploads/staffPics/' . $st->image) }}" 
                              alt="{{ $st->name }}" 
                              class="img-fluid rounded shadow-sm"
                          >
                          <h5 class="mt-2 font-weight-bold text-primary">{{ $st->name_hi }}</h5>
                          <a href="#">
                              <p class="text-muted">{{ $st->deg_hi }}</p>
                          </a>
                         {{-- <a href="{{ url('hi/ViewProfile/' . $st->id . '/' . urlencode($st->name)) }}" class="btn btn-primary" target="_blank">
                              View Profile
                          </a> --}}
                      </div>
                  </div>
              @endforeach
          </div>
      @endif
    @endif
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
