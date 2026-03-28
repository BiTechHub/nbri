@extends('layouts.master')
@section('content')
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="images/bg/bg6.jpg">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Our Doctors</h2>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="{{url('/')}}/">Home</a></li>
                <li><a href="#">Doctors</a></li>
                
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Doctors -->
    <section>
      <div class="container pb-0">
        <div class="section-content text-center">
          <div class="row multi-row-clearfix">
            @foreach($you as $keyyou)
            <div class="col-sm-6 col-md-4 mb-60 sm-text-center">
              <div class="team-member bg-lighter maxwidth400">
                <div class="thumb"><img alt="" src="{{url('/')}}/uploads/{{$keyyou->image}}" style="height:300px; width:100%" class="img-fullwidth"></div>
                <div class="info p-15 pb-10">
                  <h4 class="name"><a href="page-doctors-details.html">{{$keyyou->name}} -</a><span class="occupation font-14 font-weight-400 text-gray letter-space-1"> {{$keyyou->post}}</span></h4>
                  <p>{!! $keyyou->descr !!}</p>
                  <ul class="styled-icons icon-theme-colored icon-circled icon-dark icon-sm mt-10 mb-0">
                    <li><a href="{{$keyyou->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{$keyyou->twt_link}}"><i class="fa fa-twitter"></i></a></li>
                    
                    <li><a href="{{$keyyou->insta_link}}"><i class="fa fa-insta"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </section>    

    <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-deep" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-0 pb-0">
        <div class="pt-40 pb-40 pb-sm-0">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
              <div class="funfact text-center"> 
                <a href="#"> <i class="fa fa-calendar text-theme-colored font-36"></i></a>
                <h5 class="animate-number text-gray-base font-36" data-value="8" data-animation-duration="2500">0</h5>
                <h6 class="title text-gray-darkgray font-16">Years of Experience</h6>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
              <div class="funfact text-center"> 
                <a href="#"> <i class="fa fa-user text-theme-colored font-36"></i></a>
                <h5 class="animate-number text-gray-base font-36" data-value="1921" data-animation-duration="2500">0</h5>
                <h6 class="title text-gray-darkgray font-16">Patients treated per year</h6>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
              <div class="funfact text-center"> 
                <a href="#"> <i class="fa fa-globe text-theme-colored font-36"></i></a>
                <h5 class="animate-number text-gray-base font-36" data-value="25" data-animation-duration="2500">0</h5>
                <h6 class="title text-gray-darkgray font-16">Countries Worldwide</h6>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
              <div class="funfact text-center"> 
                <a href="#"> <i class="fa fa-trophy text-theme-colored font-36"></i></a>
                <h5 class="animate-number text-gray-base font-36" data-value="12" data-animation-duration="2500">0</h5>
                <h6 class="title text-gray-darkgray font-16">Awards</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
