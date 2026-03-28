@extends('frontend.layouts.main')
@section('content')
<style> th { background: #003630 !important; } </style>
<style>
.greenText {
    color: green;
}
.redText {
    color: red;
}

</style>

<!-- Start main-content -->
<div class="main-content-area">
<!-- Section: page title -->
<section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg" style="background-image: url({{url('/')}}/img/about-1.jpg);background-size: cover;background-attachment: fixed;padding: 50px 0 33px 0;position: relative;">
<div class="container pt-50 pb-50">
<div class="section-content">
  <div class="row">
    
    <div class="col-md-12 text-center text-white">
      <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
        <div class="breadcrumbs pull-right" style="font-weight: bold;">
          <span><a href="{{url('/')}}" rel="home" style="color: white;">Home</a></span>
          <span><i class="fa fa-angle-right"></i></span>
          <span class="active">Office Hierarchy</span>
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
    <div class="col-md-12 mt-4">
      <h3 style="text-align: center;" class="font-weight-bold">{{$name}}</h3>
      <hr>
    </div>
    </div>
    <div class="row" style="box-shadow: -7px 1px 40px rgb(0 0 0 / 18%);border: solid 1px #ccc;">
    <div class="col-md-2">
      
      <ul class="nav flex-column">
<li class="nav-item">
<a class="nav-link active btn btn-info" href="{{url('/Office-Hierarchy')}}/{{$name}}">Office Hierarchy</a>
</li>
<li class="nav-item">
<a class="nav-link btn btn-warning mt-3" href="{{url('/Office-Geographic')}}/{{$name}}">Office Geography</a>
</li>

</ul>
  </div>
  
  <div class="col-md-10">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name of Officer</th>
                  <th>Designation</th>
                  <th>Area</th>
                  <th>Twitter</th>
                  <th>Email Id</th>
                  <th>Contact No.</th>
                </tr>
              </thead>
              <tbody>
                  @php
              $i = 1;
            @endphp
            @forelse($new_directory as $dire)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$dire->name}}</td>
              <td>{{$dire->designation}}</td>
              <td>@if($dire->area){{$dire->area}}@else --- @endif</td>
              <td>@if($dire->twitter){{$dire->twitter}}@else --- @endif</td>
              <td>@if($dire->email){{$dire->email}}@else --- @endif</td>
              <td>@if($dire->contact){{$dire->contact}}@else --- @endif</td>
            </tr>
           @empty
        <tr>
            <td colspan="7" class="text-center">Content will be available soon</td>
        </tr>
    @endforelse
              
                 
                </tbody>
            </table>
  </div>
   	
  </div>
  <div class="col-md-12">
      <div class="a" style="height: 100px;"><span class="a"></span></div>
    </div>
</div>
</div>
</section>
</div>

@endsection
