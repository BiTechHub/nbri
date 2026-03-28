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
                  <span class="active">कॉपीराइट नीति</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">कॉपीराइट नीति</h3>
              <hr>
            </div>
              
                <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px">“इस साइट पर सामग्री कॉपीराइट सुरक्षा के अधीन है जब तक कि अन्यथा संकेत न दिया गया हो। विशिष्ट पूर्व अनुमति के बिना सामग्री को फ़ाइल या प्रिंटर पर डाउनलोड किया जा सकता है। सामग्री का कोई अन्य प्रस्तावित उपयोग पीवीवीएनएल के सक्षम प्राधिकारी के अनुमोदन के अधीन है। अनुमति प्राप्त करने के लिए आवेदन मेल आईडी (ravik1[at]pvvnl[dot]org) पर किया जाना चाहिए ”.</p>
<p tabindex="0" data-swp-font-size="14px">हालांकि, इस सामग्री को पुन: पेश करने की अनुमति इस साइट पर किसी भी सामग्री का विस्तार नहीं करती है, जिसे तीसरे पक्ष के कॉपीराइट के रूप में पहचाना जाता है। ऐसी सामग्री को पुन: पेश करने का प्राधिकरण कॉपीराइट धारकों से प्राप्त किया जाना चाहिए।</p>
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
