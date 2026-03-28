@extends('layouts.master')
@section('content')

  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="{{url('/')}}/images/bg/bg6.jpg">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Blog Details</h2>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="{{url('/')}}/">Home</a></li>
                <li><a href="{{url('/')}}/blog">Blog</a></li>
                <li class="active text-theme-colored">Blog Detail</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Blog -->
    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
          <div class="col-md-9 pull-right flip sm-pull-none">
            <div class="blog-posts single-post">
              <article class="post clearfix mb-0">
                <div class="entry-header">
                  <div class="post-thumb thumb"> <img src="{{url('/')}}/uploads/{{$vijay->image}}" style="width:100%;height:300px;" alt="" class="img-responsive img-fullwidth"> </div>
                </div>
                <div class="entry-content">
                  <div class="entry-meta media no-bg no-border mt-15 pb-20">
                    
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a href="#">{{$vijay->title}}</a></h3>
                                           
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> {{$vijay->created_at}}</span>
                      </div>
                    </div>
                  </div>
                  <p class="mb-15">{!! $vijay->desc !!}</p>
                 
                 {{-- <div class="mt-30 mb-0">
                    <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
                    <ul class="styled-icons icon-circled m-0">
                      <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                    </ul>
                  </div> --}}
                </div>
              </article>
             
            </div>
          </div>
          <div class="col-md-3">
            <div class="sidebar sidebar-left mt-sm-30">
             
              <div class="widget">
                <h5 class="widget-title line-bottom">Latest News</h5>
                <div class="latest-posts">
                  @foreach($hrid as $hr)
                  <article class="post media-post clearfix pb-0 mb-10">
                    <a class="post-thumb" href="#"><img src="{{url('/')}}/uploads/{{$hr->image}}" style="width:100%;height:70px;" alt=""></a>
                    <div class="post-right">
                      <h5 class="post-title mt-0"><a href="#">{{$hr->title}}</a></h5>
                     
                    </div>
                  </article>
                 @endforeach
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </section> 
  </div>  
  <!-- end main-content -->

@endsection
