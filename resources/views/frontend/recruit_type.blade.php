@extends('frontend.layouts.main')
@section('content')
<style>

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}


</style>
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
                 Recruitment Portal
              </li>
    
    
    
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
      <div class="col-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;"><!-- <span class="heading_title"> -->  <div class="region region-page-title">
    <div id="block-stqc-page-title" class="block block-core block-page-title-block">
  
    
      
  <h1 class="page-title">Jobs at CSIR-NBRI</h1>
  

  </div>

  </div>


  <p>
    In order to register continual growth and undertake research programmes in advanced and current research areas, CSIR-NBRI hires research scholars and scientists to its mainstream, both on temporary and long term basis. These positions are in the designation of Scientists, Fellow Scientists, Research Fellows and Project Assistants. Recruitments for these positions are normally done from time to time on the basis of requirements and (or) clearance from parent organization (CSIR) or sponsoring agencies. We consider applications for various posts throughout the year.
  </p>
 



<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
<div id="block-stqc-content" class="block block-system block-system-main-block">
  
    
      
<article data-history-node-id="923" class="node node--type-about-stqc node--view-mode-full">


  <div class="node__content">
 <div class="row">
    <div class="col-lg-4 col-sm-6">
      <div class="circle-tile ">
        <a href="{{url('/')}}/en/recruitment/1/PermanentPositions/list/all"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded"> Recruitment For</div>
          <div class="circle-tile-number text-faded ">Permanent Positions</div>
          <a class="circle-tile-footer" href="{{url('/')}}/en/recruitment/1/PermanentPositions/list/all">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
     
    <div class="col-lg-4 col-sm-6">
      <div class="circle-tile ">
        <a href="{{url('/')}}/en/recruitment/2/ProjectPositions/list/all"><div class="circle-tile-heading red"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content red">
          <div class="circle-tile-description text-faded"> Recruitment For </div>
          <div class="circle-tile-number text-faded ">Project Positions</div>
          <a class="circle-tile-footer" href="{{url('/')}}/en/recruitment/2/ProjectPositions/list/all">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
   <div class="col-lg-4 col-sm-6">
      <div class="circle-tile ">
        <a href="{{url('/')}}/en/recruitment/3/TemporaryPositions/list/all"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded"> Recruitment For</div>
          <div class="circle-tile-number text-faded ">Temporary Positions</div>
          <a class="circle-tile-footer" href="{{url('/')}}/en/recruitment/3/TemporaryPositions/list/all">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
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

