<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('/') }}/img/favicon.png">

    <title>CSIR - National Botanical Research Institute - Admin Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/admin/css/bootstrap-extend.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin/css/master_style.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin/css/skins/_all-skins.css">

    <style>
        .greenText { color: green; }
        .redText { color: red; }
    </style>
</head>

<body class="bg-img" style="background-image: url({{ url('/') }}/img/1.jpg);" data-overlay="3">

    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <a href="#" class="text-dark h4 fw-bold">CSIR - National Botanical Research Institute</a>
            </div>

            <p class="text-center mb-4">Sign in to start your session</p>

            <form action="{{ route('admin-panel.check') }}" method="post" autocomplete="off">
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

                <div class="mb-3">
                    <input type="text" name="username" value="{{ old('username') }}" 
                           oncopy="return false" onpaste="return false"
                           class="form-control" placeholder="User Name" autocomplete="off">
                    <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" 
                           oncopy="return false" onpaste="return false"
                           class="form-control" placeholder="Password" autocomplete="off">
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <span id="captcha" class="me-2">{{ session('captcha_text') }}</span>
                        <button type="button" id="reloadd" class="btn btn-outline-secondary btn-sm">Refresh</button>
                    </div>
                    <input type="text" name="captcha_input" class="form-control" placeholder="Enter captcha">
                    <span class="text-danger">@error('captcha_input') {{ $message }} @enderror</span>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">SIGN IN</button>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery 3.7 -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $('#reloadd').click(function () {
            $.ajax({
                type: 'GET',
                url: '/admin-panel/reload-captcha',
                success: function (data) {
                    $('#captcha').html(data.captcha);
                }
            });
        });
    </script>

</body>
</html>
