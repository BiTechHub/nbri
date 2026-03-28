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
          <span class="active">Office Geography</span>
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
                  <th>Division</th>
                  <th>Subdivision</th>
                  <th>33/11 KV Substation</th>
                  <th>Locality</th>
                  <th>Village</th>
                </tr>
              </thead>
              <tbody>
                  @php
              $i = 1;
            @endphp
            @forelse($new_directory as $dire)
            <tr>
              <td>{{$i++}}</td>
              <td>@if($dire->division){{$dire->division}}@else --- @endif</td>
              <td><p style="overflow-x: auto; max-height: 200px; display: block;">@if($dire->subdivision){{$dire->subdivision}}@else --- @endif</p></td>
              <td><p style="overflow-x: auto; max-height: 200px; display: block;width: 300px;">@if($dire->substation){{$dire->substation}}@else --- @endif</p></td>
              <td><p style="overflow-x: auto; max-height: 200px; display: block;">@if($dire->locality){{$dire->locality}}@else --- @endif</p></td>
              <td><p style="overflow-x: auto; max-height: 200px; display: block;">@if($dire->village){{$dire->village}}@else --- @endif</p></td>
            </tr>
            @empty
        <tr>
            <td colspan="6" class="text-center">Content will be available soon</td>
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
