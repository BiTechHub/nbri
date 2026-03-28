@extends('frontend.layouts.main')
@section('content')
<!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg" style="background-image: url(/img/about-1.jpg);background-size: cover;background-attachment: fixed;padding: 50px 0 33px 0;position: relative;">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center text-white" >
            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
              <div class="breadcrumbs pull-right" style="font-weight: bold;">
                <span><a href="{{url('/')}}" rel="home" style="color: white;">Home</a></span>
                <span><i class="fa fa-angle-right"></i></span>
                <span><a href="#"></a>Notice Board</span>
                <span><i class="fa fa-angle-right"></i></span>
                <span class="active">{{$section->name}}</span>
              </div>
            </nav>
          </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- Section: About -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 my-4 border-bottom text-center">
			  @if($section->name == "News & Notifications" && !isset($status))
			  <div class="col-md-6">
              <h3 style="" class="font-weight-bold">{{$section->name}}</h3>
            </div>
            <div class="col-md-6">
              <a class="btn btn-danger pull-right" href="{{url('/news-archive')}}">News & Notifications Archive</a>
            </div>
			@elseif(isset($status) && $status == "Archive")
			<div class="col-md-6">
              <h3 style="" class="font-weight-bold">{{$section->name}} {{$status}}</h3>
            </div>
            <div class="col-md-6">
              <a class="btn btn-danger pull-right" href="{{url('news/3')}}">News & Notifications</a>
            </div>
			@else
				 <h3 style="" class="font-weight-bold">{{$section->name}}</h3>
			@endif
          </div>
          <style> th { background: #003630 !important; } </style>
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach ($news as $newss)
                  <tr>
                    <td>{{$i++}}</td>
                    <td><a href="{{url('/') }}/uploads/{{ $newss->file_name }}" target="_blank">{{ $newss->subject}} <span><img src="/img/pdf.png" alt=""></span></a></td>
                    <td>{{$newss->news_date}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>  
              {{ $news->links('pagination::bootstrap-4') }}          
            </div>
            <div class="col-md-12">
              <div class="a" style="height: 170px"><span class="a"></span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
