@extends('layouts.main')
@section('content')

  <!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Result For {{$searchTerm}}</h2>
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
                  <span><a href="#" rel="home">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span><a href="#">Search Term</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">{{$searchTerm}}</span>
                
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Service details -->
    <section>
      <div class="container pb-70">
        <div class="section-content">
          <div class="row">
            @if($ruchi)
            <div class="col-lg-8">
              <h3>{{ $searchTerm }}</h3>
              <ul>
                @foreach($ruchi as $key)
                
                <li><a href="{{url('/')}}/services/{{$key->child_id}}/{{$key->sub_id}}/{{$key->cat_id}}/{{$searchTerm}}">{{$key->title}}</a></li>
                @endforeach
              </ul>
              
            </div>
            @else
            <div class="col-lg-8">
              <h3>Content Not Available</h3>
              <h5>Coming Soon..</h5>
            </div>
            @endif
            <div class="col-lg-4">
              <div class="sidebar">
                <div class="tm-sidebar-nav-menu-style2">
                  
             <div class="widget border-1px p-30">
                <h5 class="widget-title text-theme-colored1">Get our services today!</h5>
                <form id="" name="quick_contact_form" class="quick-contact-form" action="" method="post">
                  @csrf
                  @if(session('success'))
                  <div class="alert alert-success">{{session('success')}}</div>
                  @endif
                  <div class="mb-3">
                    <input name="form_name" class="form-control" type="text" placeholder="Enter Your Name">
                  </div>
                  <div class="mb-3">
                    <input name="form_phone" class="form-control" type="text" placeholder="Enter Your Mobile Number">
                  </div>
                  <div class="mb-3">
                    <select name="form_service" class="form-control">
                      <option value="">Please Select</option>
                      @foreach($me as $ct)
                    <option value="{{$ct->cat_name}}">{{$ct->cat_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <textarea name="form_message" class="form-control" placeholder="Enter Message" rows="3"></textarea>
                  </div>
                    <div class="mb-3 tm-sc-button">
                      <input name="form_botcheck" class="form-control" type="hidden" value="">
                      <button type="submit" class="btn btn-theme-colored1 btn-sm" data-loading-text="Please wait..."> Send Your Query </button>
                    </div>
                </form>

              </div>
          
                </div>
                <div class="widget widget_text text-center">
                  <div class="textwidget">
                    <div class="section-typo-light bg-theme-colored1 mb-md-40 p-30 pt-40 pb-40"> <img class="size-full wp-image-800 aligncenter" src="{{url('/')}}/images/headphone-128.png" alt="intreon" />
                    <h4>Online Help!</h4>
                    <h5>+(91) 9833132500</h5>
                    </div>
                  </div>
                </div>
               <div class="widget widget-brochure-box clearfix">
                  <h4>Tags</h4>
                 <p>@foreach($tags as $tg)<a href="{{url('/')}}/tagdesc/{{$tg->tags}}">{{$tg->tags}}</a>,@endforeach</p>
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
