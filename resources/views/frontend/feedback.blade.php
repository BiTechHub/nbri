@extends('frontend.layouts.main')
@section('content')
<style> th { background: #003630 !important; } </style>
<style>
        .greenText {
            color: green;
        }
        .redText {
            color: red;
        }
    </style>
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
              <p tabindex="0" data-swp-font-size="14px">Thank you for visiting our website. This Feedback page has been created to enable our consumers to submit suggestions and feedback for improvement of our services.</p>
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
					<input id="mobile" name="mobile" type="number" class="form-control" maxlength="10">
                  <span class="text-danger"> @error('mobile') {{$message}} @enderror </span>
				</div>
			
				 
				<div class="col-md-6 mb-3">
                  <label for="email"  tabindex="0"><span class="text-danger">*</span>Email</label>
					<input id="email" name="email" type="text"  class="form-control" maxlength="70">
                  <span class="text-danger"> @error('email') {{$message}} @enderror </span>
				</div>
			
				<div class="col-md-12 mb-3">
                  <label for="feedback"  tabindex="0"><span class="text-danger">*</span>Feedback</label> 
					<textarea id="feedback" name="feedback" cols="40" rows="5" class="form-control" maxlength="250" ></textarea>
                  <span class="text-danger"> @error('feedback') {{$message}} @enderror </span>
				</div>
			<div class="col-md-12 mb-2">
			<div class="form-group has-feedback mb-3"> 
            <b>Security Code: </b> <span id="captcha" style="background: green;color: white;padding: 6px;font-size: 21px;font-weight: bold;"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="refresh" type="button" title="Refresh" class="btn btn-danger"><i class="fas fa-sync"></i>
</button><br><br>
            <input id="textBox" type="text" name="security_code" class="form-control" placeholder="Enter Security Code">
            <span id="output"></span>
            <span class="text-danger"></span>
        </div>
        </div>
			
				<div class="text-center col-md-12 pt-3">
					<button name="submit" type="submit" class="btn btn-primary" id="submit">Send Feedback</button>
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
  <script>
        let captchaText = document.querySelector('#captcha');
        let userText = document.querySelector('#textBox');
        let submitButton = document.querySelector('#submit');
        let output = document.querySelector('#output');
        let refreshButton = document.querySelector('#refresh');
        let captchaValid = document.querySelector('#captchaValid');
        let form = document.querySelector('#captchaForm');

        let alphaNums = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'.split('');

        function generateCaptcha() {
            let captchaArr = [];
            for (let i = 0; i < 5; i++) {
                captchaArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
            }
            return captchaArr.join('');
        }

        function refreshCaptcha() {
            captchaText.innerHTML = generateCaptcha();
            userText.value = "";
            output.innerHTML = "";
            output.classList.remove("greenText", "redText");
            captchaValid.value = "false";
        }

        captchaText.innerHTML = generateCaptcha();

        userText.addEventListener('keyup', function(e) {
            if (e.keyCode === 13) {
                validateCaptcha(e);
            }
        });

        submitButton.addEventListener('click', function(e) {
            validateCaptcha(e);
        });

        refreshButton.addEventListener('click', function() {
            refreshCaptcha();
        });

        function validateCaptcha(e) {
            if (userText.value === captchaText.innerHTML) {
                output.classList.add("greenText");
               output.innerHTML = "<span style='color:green'>Correct!</span>";
                captchaValid.value = "true";
                form.submit();
            } else {
                e.preventDefault();
                output.classList.add("redText");
                output.innerHTML = "Incorrect Security Code, please try again";
                captchaValid.value = "false";
            }
        }
    </script>
@endsection
