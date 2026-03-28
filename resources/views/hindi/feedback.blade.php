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
                  <span class="active">प्रतिक्रिया</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">प्रतिक्रिया</h3>
              <hr>
            </div>
            <div class="col-md-12">
             <p data-swp-font-size="14px">प्रतिक्रिया फॉर्म में आपका स्वागत है। इस फ़ॉर्म पर अपनी मूल्यवान प्रतिक्रिया दें। आमतौर पर नेत्रहीन चुनौती वाले उपयोगकर्ता ravik1[at]pvvnl[dot]org पर प्रतिक्रिया फ़ॉर्म भेज सकते हैं। यदि उन्हें गणित प्रश्न का उपयोग करने में कोई कठिनाई होती है।</p>
              </div>
            <div class="col-md-12 card p-4 mb-5 bg-light rounded">
              @if(session('message')) 
              <div class="bg-success text-white text-center"> {{session('message')}} </div>
              @endif
              
  <form  method="post" action="{{url('/')}}/feedbacksubmit"   enctype="multipart/form-data">
    		 @csrf
			<div class="form-group row">
				<div class="col-md-6 mb-3">
                  	<label for="name"  tabindex="0"><span class="text-danger">*</span>नाम</label> 
					<input id="name" name="name" type="text" class="form-control" maxlength="50">
                  <span class="text-danger"> @error('name') {{$message}} @enderror </span>
				</div>
			
				<div class="col-md-6 mb-3">
                <label for="mobile" tabindex="0"><span class="text-danger">*</span>मोबाइल</label> 
					<input id="mobile" name="mobile" type="text" class="form-control" maxlength="10">
                  <span class="text-danger"> @error('mobile') {{$message}} @enderror </span>
				</div>
			
				 
				<div class="col-md-6 mb-3">
                  <label for="email"  tabindex="0"><span class="text-danger">*</span>ईमेल</label>
					<input id="email" name="email" type="text"  class="form-control" maxlength="70">
                  <span class="text-danger"> @error('email') {{$message}} @enderror </span>
				</div>
			
				<div class="col-md-12 mb-2">
                  <label for="feedback"  tabindex="0"><span class="text-danger">*</span>प्रतिक्रया</label> 
					<textarea id="feedback" name="feedback" cols="40" rows="5" class="form-control" maxlength="250" ></textarea>
                  <span class="text-danger"> @error('feedback') {{$message}} @enderror </span>
				</div>
			
				<div class="text-center col-md-12 pt-3">
					<button name="submit" type="submit" class="btn btn-primary">प्रतिक्रिया भेजें</button>
				</div>
			</div>
		</form>
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
