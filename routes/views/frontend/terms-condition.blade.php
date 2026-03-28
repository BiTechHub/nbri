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
                  <span class="active">Terms Condition</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Terms Condition</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px">The official website of Pvvnl has been developed to provide information about the Pvvnl to its Employees and the general public. The documents and information displayed on the website are for reference purposes only and cannot be claimed to be a legal document. The information contained in the website is based on the inputs received from the concerned Sections/departments of Pvvnl. Though all efforts have been made to ensure the accuracy of the content, the same should not be construed as a statement of law or used for any legal purposes. Links to other websites that have been included on this website are provided for public convenience only. Pvvnl is not responsible for the contents or reliability of linked websites and does not necessarily endorse the view expressed within them. The availability of such linked pages at all times is also not guaranteed.&ZeroWidthSpace;&ZeroWidthSpace;</p>
<p tabindex="0" data-swp-font-size="14px">At some of the places, this website contains links to other website/portals. These links have been placed for user’s convenience. Pvvnl is not responsible for the contents and reliability of the links. Mere presence of the link or its listing on this website should not be assumed as endorsement of any kind. Pvvnl can not guarantee that these links will work all the time and Pvvnl has no control over availability of linked pages at all times.</p>
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
