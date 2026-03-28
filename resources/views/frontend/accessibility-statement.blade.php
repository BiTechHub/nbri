@extends('frontend.layouts.main')
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
                  <span><a href="{{url('/')}}" rel="home" style="color: white;">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Accessibility Statement</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Accessibility Statement</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px">The Official Website of Pashchimanchal Vidyut Vitran Nigam Limited, has been built with an aim to provide maximum accessibility and usability to its visitors.</p>
<p tabindex="0" data-swp-font-size="14px">This website can be viewed from a variety of devices such as Desktop or Laptop computers, web-enabled mobile devices, WAP phones, PDAs, etc. However, currently Portable Document Format (PDF) files are not fully accessible.</p>
<p tabindex="0" data-swp-font-size="14px">We aim to be standards compliant and follow principles of usability and universal design, which should help all visitors of this website.</p>
<p tabindex="0" data-swp-font-size="14px">This website is designed to meet the Guidelines for Indian Government Websites and also adheres to level AA of the Web Content Accessibility Guidelines (W.C.A.G.) 2.0 laid down by the World Wide Web Consortium (W.3.C.). Part of the information in the website is also made available through links to external Websites. External Websites are maintained by the respective departments who are responsible for making their sites accessible.</p>
<p tabindex="0" data-swp-font-size="14px">If you face any problem or have suggestions regarding the accessibility of this website, please do let us know the nature of the problem along with your contact information to get back to you at the earliest.</p>

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
