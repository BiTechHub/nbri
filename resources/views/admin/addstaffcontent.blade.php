@extends('admin.layouts.master')
@section('main-section')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">

<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Staff Content</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}/admin-panel/managestaffcontent" style="color:red">Manage Staff Content</a></li>
							</ol>
						</nav>
					</div>
          
				</div>
        <a class="btn btn-warning mb-3" href="{{url('/')}}/admin-panel/managestaffcontent" style="float:right;">Content List</a>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-12">


			  <!-- /.box -->

			  <div class="box">

				<!-- /.box-header -->
				<div class="box-body">
				  <form action="{{ route('admin-panel.uploadstaffcontent') }}" method="post" enctype="multipart/form-data">
                    @if(session('status'))
                       <div class="alert alert-success">
                           {{ session('status') }}
                       </div>
                     @endif
					 @if(session('success'))
                       <div class="alert alert-success">
                           {{ session('success') }}
                       </div>
                     @endif
					 @if(session('fail'))
                       <div class="alert alert-success">
                           {{ session('fail') }}
                       </div>
                     @endif
                        @csrf
                 <div class="row">
                 <div class="col-md-3">
                  <div class="form-group">
                      <h5>Main Menu Name <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="main" id="main_cat" class="form-control">
                          <option selected>-Select Main Category-</option>
                          @foreach($swt as $ddt)
                          <option value="{{$ddt->id}}">{{$ddt->menu_name}}</option>
                          @endforeach
                         
                        </select> 
                        <span class="text-danger"> @error('main') {{$message}} @enderror </span>
                    </div>
                  </div>
                 </div>
                  <div class="col-md-3">
                  <div class="form-group" id="mee">
                      <h5>Sub Menu Name (If Any) <span class="text-danger">*</span></h5>
                      <div class="controls">
                          <select name="sub" id="sub" class="form-control sub">
                        </select> 
                        <span class="text-danger"> @error('sub') {{$message}} @enderror </span>
                    </div>
                  </div>
                    </div>
                    <div class="col-md-3">
                  <div class="form-group" id="chdl">
                      <h5>Child Menu Name (If Any) <span class="text-danger">*</span></h5>
                      <div class="controls">
                          <select name="child" id="child" class="form-control child">
                        </select> 
                    <span class="text-danger"> @error('child') {{$message}} @enderror </span>
                    </div>
                  </div>
                       </div>
                      <div class="col-md-3">
                  <div class="form-group" id="edtrpdf">
                    <h5>Position <span class="text-danger">*</span></h5>
                    <div class="controls">
                       <input type="text" name="position" id="position" class="form-control">
                      <span class="text-danger"> @error('position') {{$message}} @enderror </span>
                    </div>
                  </div>
                      </div>
                    </div>
                 
                  <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <h5>Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" onfocus="return verifyPosition();" name="name" class="form-control">
                      <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>नाम <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="name_hi" class="form-control">
                      <span class="text-danger"> @error('heading') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Designation <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="deg" class="form-control">
                      <span class="text-danger"> @error('deg') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>पद का नाम <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="deg_hi" class="form-control">
                      <span class="text-danger"> @error('deg_hi') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Area <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="area" class="form-control">
                      <span class="text-danger"> @error('area') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>क्षेत्र <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="area_hi" class="form-control">
                      <span class="text-danger"> @error('area_hi') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Address <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="address" class="form-control">
                      <span class="text-danger"> @error('address') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>पता <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="address_hi" class="form-control">
                      <span class="text-danger"> @error('address_hi') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Email Id <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="email" name="email" class="form-control">
                      <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Contact <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="contact" class="form-control">
                      <span class="text-danger"> @error('contact') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                  <div class="form-group" id="edtrpdf">
                    <h5>Upload Profile Photo <span class="text-danger">*</span></h5>
                    <div class="controls">
                       <input type="file" name="image" class="form-control">
                      <span class="text-danger"> @error('image') {{$message}} @enderror </span>
                    </div>
                  </div>
                      </div>
                    <div class="col-md-6">
                  <div class="form-group" id="edtrpdf">
                    <h5>Upload Resume 
                      {{-- <span class="text-danger">*</span> --}}
                    </h5>
                    <div class="controls">
                       <input type="file" name="resume" class="form-control" accept="application/pdf">
                      <span class="text-danger"> @error('resume') {{$message}} @enderror </span>
                    </div>
                  </div>
                      </div>
                    
                    </div>

                  
                    <br>
              <div class="text-xs-right">
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
				  </form>
				</div>
			  </div>

			  <!-- /.box -->

			</div>
			<!-- /.col-->
		  </div>
		  <!-- ./row -->
		</section>
		<!-- /.content -->
	  </div>
  </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
 <script type="text/javascript">

 $('.delete').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
$(document).ready(function () {
  $('#mee').hide();
});
$(document).ready(function () {
  $('#chdl').hide();
});
   
$(document).ready(function () {
    $('#main_cat').on('change', function () {
        var Cat = this.value;

        $.ajax({
            url: "{{ url('/') }}/subcatfetch/" + Cat, 
            dataType: 'json',
            success: function (result) {
                if ($.isEmptyObject(result)) {
                    $('#mee').hide();
                    $('#chdl').hide();
                } else {
                    $('#mee').show();
                }

                var msg = '<option value="">--Select Sub Category--</option>';
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].sub_name + '</option>';
                }
                $("#sub").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log error messages for debugging
            }
        });
    });
});

   $(document).ready(function () {
    $('#sub').on('change', function () {
        var Cat = this.value;

        $.ajax({
            url: "{{ url('/') }}/staffcatfetch/" + Cat,
            dataType: 'json',
            success: function (result) {
                if ($.isEmptyObject(result)) {
                    $('#chdl').hide();
                } else {
                    $('#chdl').show();
                }

                var msg = '<option value="">--Select child Category--</option>';
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].child_menu + '</option>';
                }
                $("#child").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    });
});

   
   
                    $(document).ready(function () {
                        $('#edtr').hide();
                        $('#con_type').on('change', function () {
                        if(this.value == 'Text'){
                            $('#edtr').show();
                          	$('#edtrpdf').hide();
                        }else{
                            $('#edtr').hide();
                          	$('#edtrpdf').show();
                        }
                      });
                    });
   
   function verifyPosition() {
       var ch_cat = $('#child').val();
       var ch_po = $('#position').val();
                $.ajax({
                    url: "{{ url('/') }}/verifyPosition/" + ch_cat + "/" + ch_po,
                    success: function(data) {
                        console.log(data);
                        if (data != "") {
                            $("#position").val("");
                            alert("Position not available.");
                        }
                    }
                });
        }

 </script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
 <script>
$('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 400,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
	  </script>
	 @endsection