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
                  <span class="active">अस्वीकरण</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">अस्वीकरण</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px">यथासंभव सटीक जानकारी प्रदान करने के लिए प्रयास किया जाता है। पश्चिमांचल विद्युत वितरण निगम लिमिटेड, इस वेबसाइट पर उपलब्ध जानकारी में अशुद्धता के कारण किसी भी व्यक्ति को हुए नुकसान के लिए जिम्मेदार नहीं होगा कृपया पायी गई किसी भी विसंगति को पीवीवीएनएल की जानकारी में लाया जा सकता है।</p>
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
