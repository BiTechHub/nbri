@extends('frontend.layouts.main')
@section('content')
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
                  <span class="active">About Us</span>
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
            <h3 style="text-align: center;" class="font-weight-bold">About Us</h3>
            <hr>
          </div>
            
            <div class="col-lg-7 col-xl-7">
              <p tabindex="0" data-swp-font-size="14px"><strong>Pashchimanchal Vidyut Vitran Nigam Limited</strong>&nbsp;came into existence in July, 2003 as subsidiary company of UPPCL. The Discom covers in its jurisdiction the areas of District Meerut, Baghpat, Ghaziabad, Gautambudh Nagar, Bulandshahar, Hapur, Muzaffarnagar, Saharanpur, Shamli, Bijnor, Moradabad, Sambhal, J.P. Nagar and Rampur. The Discom comprises of 06 distribution zones based at Meerut, Ghaziabad, Bulandshahar, Noida, Saharanpur and Moradabad and each is headed by an officer of the rank of Chief Engineer. The total number of Distribution Circles and Divisions in Different Zones are 29 and 95 respectively along with 29 nos. of Test Divisions. Besides there is 01 circle for store and 02 circle each for works and Civil Construction works under direct control of the Discom Head Quarter. The Discom comprises more then Sixty Six Lacs of consumers with annual Revenue of around Rs. 16700 Crores in FY2019-20. PVVNL has 1329 of Secondary sub-stations with an installed capacity of 18944 MVA. The total number of distribution transformers are 516497 with installed capacity of 27759 MVA.</p>
              
              <p tabindex="0" data-swp-font-size="14px">PVVNL is trying to implement the best practices in the distribution system. The tools used in achieving the commercial result include the massive disconnection drive against the defaulting consumers, the implementation of the OTS scheme, issuance of notices under section 3 and 5 to the defaulting consumers, bill distribution system through SMS &amp; email, MRI based billing of the consumers with load above 10 KVA and replacement of electro mechanical meters through electronic &amp; smart meters and adopting anti theft measures i.e. vigorous combing in the high line losses areas, providing ABC conductors in Theft prone areas DT Metering, Double Metering of the consumers, Metering with AMR’s. The Discom has achieved the remarkable enhancement in the revenue realization and thru rate. At the same time AT&amp;C losses have come down to 19.38% and collection efficiency is 94.54% at the end of FY2019-20.</p>
            </div>
            <div class="col-lg-5 col-xl-5">
              <div class="about-thumb mb-md-40">
                <img class="w-100" src="{{url('/')}}/assets/images/Pashchimanchal-Vidyut-Vitran-Nigam-Limited.png" alt="">
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    
  </div>
  <!-- end main-content -->

@endsection
