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
              <h3 class="font-28">Blog</h2>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="{{url('/')}}/">Home</a></li>
                <li><a href="#">Blog</a></li>
                
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <!-- Section: Blog -->
    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row multi-row-clearfix">
          <div class="blog-posts">
            <div class="col-md-12">
              <div class="list-dashed">
                @foreach($mewe as $blg)
                <article class="post clearfix mb-30 pb-30">
                  <div class="row">
                    <div class="col-sm-5">
                      <div class="entry-header">
                        <div class="post-thumb"> <img class="img-responsive img-fullwidth" src="{{url('/')}}/uploads/{{$blg->image}}" style="width:100%;height:250px;" alt=""> </div>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="entry-content mt-0">
                        <a href="{{ url('/') }}/blog/{{$blg->id}}/{{$blg->title}}">
                        <h4 class="entry-title mt-0 pt-0">{{$blg->title}}</h4>
                        </a>
                        <ul class="list-inline font-12 mb-20 mt-10">
                          <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                          <li><span class="text-theme-colored">{{$blg->created_at}}</span></li>
                        </ul>
                        <p>{!! Str::limit(strip_tags($blg->desc), 300, ' ...') !!}</p>
                        
                        <a class="pull-right text-gray font-13" href="{{ url('/') }}/blog/{{$blg->id}}/{{$blg->title}}"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
                      </div>
                    </div>
                  </div>
                </article>
                @endforeach
              </div>
            </div>
           {{-- <div class="col-md-12">
              <nav>
                <ul class="pagination theme-colored">
                  <li> <a aria-label="Previous" href="#"> <span aria-hidden="true">«</span> </a> </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">...</a></li>
                  <li> <a aria-label="Next" href="#"> <span aria-hidden="true">»</span> </a> </li>
                </ul>
              </nav>
            </div>--}}
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
