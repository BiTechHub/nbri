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
                  <span class="active">Frequently Asked Questions</span>
                </div>
              </nav>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- Section: About -->
    <section id="skipCont">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 mt-4">
              <h3 style="text-align: center;" class="font-weight-bold">Frequently Asked Questions</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<ul>
<li data-swp-font-size="14px"><a href="/uploads/nivesh-mitra.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize36984kB" target="_blank" rel="noopener" title="FAQ For Nivesh Mitra">FAQ For Nivesh Mitra</a> – <span tabindex="0">(Language – English)</span></li>
<li data-swp-font-size="14px"><a href="/uploads/FAQ_Applicant_JhatpatConnection.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize34306kB" target="_blank" rel="noopener" title="FAQ For Jhatpat Connection">FAQ For Jhatpat Connection</a> – <span tabindex="0">(Language – English &amp; Hindi)</span></li>
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
