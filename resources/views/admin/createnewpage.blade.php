@extends('admin.layouts.master')
@section('main-section')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">

<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Create New Page</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}/admin-panel/allpages" style="color:red">Manage New Page</a></li>
							</ol>
						</nav>
					</div>
          
				</div>
        <a class="btn btn-warning mb-3" href="{{url('/')}}/admin-panel/allpages" style="float:right;">New Pages</a>
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
				  <form action="{{ route('admin-panel.uploadnewpage') }}" method="post" enctype="multipart/form-data">
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
                  <div class="form-group">
                    <h5>Language <span class="text-danger">* (The page will be made in both Hindi and English languages.)</span></h5>
                    
                  </div>
                  
                  
                  <div class="form-group">
                    <h5>Content Heading <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="heading" id="head" class="form-control">
                      <span class="text-danger"> @error('heading') {{$message}} @enderror </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <h5>URL Slug <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="slug" id="slug" onfocus="getSlug()" class="form-control">
                      <span class="text-danger"> @error('slug') {{$message}} @enderror </span>
                    </div>
                  </div>

                  

                  <div class="form-group" id="edtr">
                    
				  <textarea class="textarea" id="summernote"  name="content" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    <span class="text-danger"> @error('content') {{$message}} @enderror </span>

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
            url: "{{ url('/') }}/childcatfetch/" + Cat,
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
<script>
function convertToSlug(text) {
  return text
    .toLowerCase()                    // Convert to lowercase
    .trim()                            // Trim leading/trailing spaces
    .replace(/[\s]+/g, '-')            // Replace spaces with hyphens
    .replace(/[^\w\-]+/g, '')          // Remove all non-word characters (except hyphens)
    .replace(/\-\-+/g, '-')            // Replace multiple hyphens with a single one
    .replace(/^-+/, '')                // Remove hyphens from the start of the string
    .replace(/-+$/, '');               // Remove hyphens from the end of the string
}
function getSlug(){
// Example usage:
const textBoxValue = document.getElementById('head').value; // Assume you have a text box with id "myTextBox"
const slug = convertToSlug(textBoxValue);
console.log(slug);
$('#slug').val(slug);
}
</script>
	 @endsection