@extends('hindi.layouts.main')
@section('content')
<!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" style="background-image: url({{url('/')}}/img/about-1.jpg);background-size: cover;background-attachment: fixed;padding: 50px 0 33px 0;position: relative;">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center text-white">
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs pull-right" style="font-weight: bold;">
                  <span><a href="{{url('/hi')}}" rel="home" style="color: white;">मुख्यपृष्ठ</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span><a href="#" style="color: white;">सूचना पट्ट</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">{{$section->name_hi}}</span>
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
              <h3 style="" class="font-weight-bold">{{$section->name_hi}}</h3>
          </div>
          <style> th { background: #003630 !important; } </style>
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">क्रमांक</th>
                    <th scope="col">विषय</th>
                    <th scope="col">तारीख</th>
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
@section('script')
 <script src="{{url('/')}}/theme/js/custom.js"></script> 
@endsection