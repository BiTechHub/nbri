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
                  <span class="active">Feedback</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Feedback</h3>
              <hr>
            </div>
            <div class="col-md-12">
              <p tabindex="0" data-swp-font-size="14px">Welcome to feedback form. Give your Valuable feedback on this form. Visually challenge users can opt to send the feedback form to <b>ravik1@pvvnl.org</b> if they have any difficulty in using Math question.</p>
              </div>
            <div class="col-md-12 card p-4 mb-5 bg-light rounded">
              @if(session('message')) 
              <div class="bg-success text-white text-center"> {{session('message')}} </div>
              @endif
              
  <form  method="post" action="{{url('/')}}/feedbacksubmit"   enctype="multipart/form-data">
    		 @csrf
			<div class="form-group row">
				<div class="col-md-6 mb-3">
                  	<label for="name"  tabindex="0"><span class="text-danger">*</span>Name</label> 
					<input id="name" name="name" type="text" class="form-control" maxlength="50">
                  <span class="text-danger"> @error('name') {{$message}} @enderror </span>
				</div>
			
				<div class="col-md-6 mb-3">
                <label for="mobile" tabindex="0"><span class="text-danger">*</span>Mobile</label> 
					<input id="mobile" name="mobile" type="text" class="form-control" maxlength="10">
                  <span class="text-danger"> @error('mobile') {{$message}} @enderror </span>
				</div>
			
				 
				<div class="col-md-6 mb-3">
                  <label for="email"  tabindex="0"><span class="text-danger">*</span>Email</label>
					<input id="email" name="email" type="text"  class="form-control" maxlength="70">
                  <span class="text-danger"> @error('email') {{$message}} @enderror </span>
				</div>
			
				<div class="col-md-12 mb-2">
                  <label for="feedback"  tabindex="0"><span class="text-danger">*</span>Feedback</label> 
					<textarea id="feedback" name="feedback" cols="40" rows="5" class="form-control" maxlength="250" ></textarea>
                  <span class="text-danger"> @error('feedback') {{$message}} @enderror </span>
				</div>
			
				<div class="text-center col-md-12 pt-3">
					<button name="submit" type="submit" class="btn btn-primary">Send Feedback</button>
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
