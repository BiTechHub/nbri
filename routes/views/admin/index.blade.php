<!DOCTYPE html>
<html lang="en">
<style>
        .greenText {
            color: green;
        }
        .redText {
            color: red;
        }
    </style>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{url('/')}}/img/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Pashchimanchal Vidyut Vitran Nigam Limited - Log in </title>
    <script type="text/javascript">
        $('#reloadd').click(function () {
        $.ajax({
        type: 'GET',
        url: '/admin-panel/reload-captcha',
        success: function (data) {
        $(".captcha span").html(data.captcha);
        }
        });
        });
        </script>
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ url('/') }}/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="{{ url('/') }}/admin/css/bootstrap-extend.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="{{ url('/') }}/admin/css/master_style.css">

	<!-- UltimatePro Admin skins -->
	<link rel="stylesheet" href="{{ url('/') }}/admin/css/skins/_all-skins.css">

	

</head>
<body class="hold-transition bg-img" style="background-image: url({{url('/')}}/img/about-1.jpg)" data-overlay="3">

	<div class="auth-2-outer row align-items-center h-p100 m-0">
		<div class="auth-2">
		  <div class="auth-logo font-size-30">
			<a href="#" class="text-dark"><b>Pashchimanchal Vidyut Vitran Nigam Limited</a>
		  </div>
		  <!-- /.login-logo -->
		  <div class="auth-body">
			<p class="auth-msg">Sign in to start your session</p>

			<form action="{{ route('admin-panel.check') }}" method="post" class="form-element" autocomplete="off">
                @csrf
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}

                    </div>

                @endif
                @if(Session::get('status'))
                    <div class="alert alert-danger">
                    {{ Session::get('status') }}

                    </div>

                @endif
			  <div class="form-group has-feedback">
				<input type="text" name="username" value="{{ old('username') }}" oncopy="return false" onpaste="return false" class="form-control" auto placeholder="User Name" autocomplete="off">
				<span class="ion ion-email form-control-feedback"></span>
                <span class="text-danger">@error('username') {{ $message }}

                    @enderror</span>
			  </div>
			  
			  <div class="form-group has-feedback"> 
				<input type="password" class="form-control" name="password" oncopy="return false" onpaste="return false" placeholder="Password" autocomplete="off">
				<span class="ion ion-locked form-control-feedback"></span>
                <span class="text-danger">@error('password') {{ $message }}
                    @enderror</span>
			  </div>
			  <div class="form-group has-feedback"> 
            <span id="captcha" style="background: green;color: white;padding: 6px;font-size: 21px;font-weight: bold;"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="refresh" type="button" title="Refresh" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i>
</button><br><br>
            <input id="textBox" type="text" name="captcha" class="form-control" placeholder="Enter Captcha">
            <span id="output"></span>
            <span class="text-danger">@error('captcha') {{ $message }} @enderror</span>
        </div>
        
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" id="submit" class="btn btn-block mt-10 btn-success">SIGN IN</button>
                
            </div>
        </div>
    </form>
			<!-- /.social-auth-links -->

			

		  </div>
		</div>

	</div>


	<!-- jQuery 3 -->
	<script src="{{ url('/') }}/admin//assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

	<!-- popper -->
	<script src="{{ url('/') }}/admin//assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0-->
	<script src="{{ url('/') }}/admin//assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>

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
                output.innerHTML = "Incorrect, please try again";
                captchaValid.value = "false";
            }
        }
    </script>
