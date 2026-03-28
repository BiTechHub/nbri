@extends('hindi.layouts.main')
@section('content')
<style> th { background: #003630 !important; } </style>
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
                  <span><a href="{{url('/hi')}}" rel="home" style="color: white;">मुख्यपृष्ठ</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">सुरक्षा नीति</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">सुरक्षा नीति</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px">हमने आपकी गोपनीयता को अनधिकृत पहुंच और अनुचित उपयोग से बचाने के उद्देश्य से प्रौद्योगिकी और नीतियों को लागू किया है, और समय-समय पर इसकी समीक्षा करते हैं।</p>
            </div>
       		<div class="col-md-12">
              <div class="a" style="height: 170px"><span class="a"></span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
