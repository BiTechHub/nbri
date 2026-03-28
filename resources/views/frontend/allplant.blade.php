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
                  Welcome to {{$plant_catname->cat}}
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
  
  
      
  <h1 class="page-title">Welcome to {{$plant_catname->cat}}</h1>
 


  </div>

  </div>
<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
<div id="block-stqc-content" class="block block-system block-system-main-block">
  
    
      
<article data-history-node-id="923" class="node node--type-about-stqc node--view-mode-full">

  
    

  
  <div class="node__content">
    
            <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item">
              <div style="text-align: center; padding: 2px;">
  <table style="width: 100%; margin: 0 auto; border-collapse: collapse; font-family: sans-serif;" border="1">
    <thead>
      <tr>
        <th colspan="4" style="font-size: 2em; padding: 15px; background-color: #f0f0f0;">
          <strong>{{$plant_detail->plant_name_hi}}<br><em>{{$plant_detail->plant_name_en}}</em> {{$plant_detail->author}}</strong>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="padding: 10px; text-align: center;"><strong>Family</strong></td>
        <td style="padding: 10px; text-align: center;"><em>{{$plant_detail->family_en}}</em></td>
        <td style="padding: 10px; text-align: center;"><strong>Common Name</strong></td>
        <td style="padding: 10px; text-align: center;"><em>{{$plant_detail->com_name_en}}</em></td>
      </tr>
      @if($plant_detail->native_en)
      <tr>
        <td style="padding: 10px; text-align: center;"><strong>Native</strong></td>
        <td colspan="3" style="padding: 10px; text-align: center;"><em>{{$plant_detail->native_en}}</em></td>
      </tr>
      @endif
      @if($plant_detail->uses_en)
      <tr>
        <td style="padding: 10px; text-align: center;"><strong>Uses</strong></td>
        <td colspan="3" style="padding: 10px; text-align: center;"><em>{{$plant_detail->uses_en}}</em></td>
      </tr>
      @endif
      @if(!empty($plant_detail->latitude) && $plant_detail->latitude !== 'NA' && $plant_detail->latitude !== '-')
      <tr>
        <td style="padding: 10px; text-align: center;"><strong>Geo-coordinates</strong></td>
        <td colspan="3" style="padding: 10px; text-align: center;"><em>{{$plant_detail->latitude}}° N, {{$plant_detail->longitude}}° E</em></td>
      </tr>
      @endif
      @if(isset($plant_data) && count($plant_data) > 0)
    @foreach($plant_data as $pld)
        <tr>
            <td style="padding: 10px; text-align: center;">
                <strong>{{ $pld->column_name }}</strong>
            </td>
            <td colspan="3" style="padding: 10px; text-align: center;">
                {{ $pld->column_value }}
            </td>
        </tr>
    @endforeach
@endif
      <tr>
        <td colspan="4" style="text-align: center; padding: 15px;">
          <img src="{{url('/')}}/uploads/plant_image_files/{{$plant_detail->image}}" alt="{{$plant_detail->plant_name_en}}" style="max-width: 100%; height: auto; border: 1px solid #ccc;">
        </td>
      </tr>
    </tbody>
  </table>
</div>

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
