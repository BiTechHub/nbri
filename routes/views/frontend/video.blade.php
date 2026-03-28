@extends('frontend.layouts.main')
@section('content')
<div class="main-content pb-5">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" style="background-image: url(/img/about-1.jpg);background-size: cover;background-attachment: fixed;padding: 50px 0 33px 0;position: relative;">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
           
            <div class="col-md-12 text-center text-white" >
            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
              <div class="breadcrumbs pull-right" style="font-weight: bold;">
                <span><a href="{{url('/')}}" rel="home" style="color: white;">Home</a></span>
                <span><i class="fa fa-angle-right"></i></span>
                <span class="active">Our Video Gallery</span>
              </div>
            </nav>
          </div>
            
            
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Grid 3 -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 mt-4">
              <h3 style="text-align: center;" class="font-weight-bold">Video Gallery</h3>
              <hr>
            </div>
            <div class="col-md-12 pb-5">
              <div class="gallery-isotope grid-3 gutter-small clearfix row" data-lightbox="gallery">
                @foreach($videos as $vid)
                <div class="gallery-item design col-md-4 m-p">
                  <div class="thumb mt-4">
                    <iframe width="" height="" src="https://www.youtube.com/embed/{{$vid->video_link}}" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="width: 100%;height: auto;"></iframe>
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center"><b>{{$vid->heading}}</b></div>
                    </div>
                  </div>
                </div>

               @endforeach
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
@endsection
