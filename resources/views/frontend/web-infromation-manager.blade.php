@extends('frontend.layouts.main')
@section('content')
<style>
    .panel-info {
    border: 1px solid #bce8f1;
}

.inner-container {
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.12);
    background-color: #fff;
    margin-bottom: 10px;
    margin-top: 10px;
    min-height: 480px;
    padding: 15px;
    border-top: 4px solid #2e4b90;
}

.panel-info>.panel-heading {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
}

.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
}
.panel-body {
    height: 350px;
    overflow: hidden;
    padding: 15px;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
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
              <span class="active">Web Information Manager</span>
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
        <h3 style="text-align: center;" class="font-weight-bold">WEB INFORMATION MANAGER</h3>
      </div>
        
        <div class="col-md-12 col-sm-12 col-xs-12">
<div class="inner-container">
<div><div class="panel panel-info">
<div class="panel-heading">
<h4 class="panel-title">WEB INFORMATION MANAGER- Pashchimanchal Vidyut Vitran Nigam Limited</h4>
</div>
<div class="panel-body">
<!--<div class="col-md-2 col-lg-2 " align="center"><img alt="WEB INFORMATION MANAGER" title="WEB INFORMATION MANAGER" src="" class="img-circle img-responsive"></div>-->
<table class="table">
<tbody>
    
<tr>
<td width="25%">Name</td>
<td width="2%">:</td>
<td>Sri. Wrishabh Pandey</td>
</tr>
<tr>
<td width="25%">Designation</td>
<td width="2%">:</td>
<td>Assistant Engineer (I.T)&nbsp;</td>
</tr>
<tr>
<td width="25%">Email ID</td>
<td width="2%">:</td>
<td>control.room@pvvnl.org</td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="25%">Name</td>
<td width="2%">:</td>
<td>Sri. Praveen Kumar</td>
</tr>

<tr>
<td width="25%">Designation</td>
<td width="2%">:</td>
<td>Executive Engineer (I.T)&nbsp;</td>
</tr>
<tr>
<td width="25%">Email ID</td>
<td width="2%">:</td>
<td>control.room@pvvnl.org</td>
</tr>

<!--<tr>
<td width="25%">Phone No</td>
<td width="2%">:</td>
<td>+91-9412749213</td>
</tr>
<tr>
<td width="25%">Email ID</td>
<td width="2%">:</td>
<td>-</td>
</tr>--></tbody>
</table>
</div>
</div></div>
</div>
</div>
        
        
      </div>
    </div>
  </div>
</section>

</div>
<!-- end main-content -->

@endsection
