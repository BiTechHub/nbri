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
                  <span class="active">सामान्य प्रश्न</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">सामान्य प्रश्न</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<ul>
<li data-swp-font-size="14px"><a href="/uploads/old-backup/assests/faq/nivesh-mitra.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize36984kB" target="_blank" rel="noopener" title="निवेश मित्र के लिए सामान्य प्रश्न">निवेश मित्र के लिए सामान्य प्रश्न</a> – <span tabindex="0">(भाषा – अंग्रेजी)</span></li>
<li data-swp-font-size="14px"><a href="/uploads/faq/FAQ_Applicant_JhatpatConnection.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize34306kB" target="_blank" rel="noopener" title="झटपट कनेक्शन के लिए सामान्य प्रश्न">झटपट कनेक्शन के लिए सामान्य प्रश्न</a> – (भाषा – अंग्रेजी और हिंदी)</li>
</ul>

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
