@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add New Garden Audio</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}/admin-panel/ManageNewGardenAudio">Manage Audio Files</a></li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">

			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin-panel.SaveAddNewGardenAudio') }}" method="post" enctype="multipart/form-data">
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
                          <div class="col-md-6">
                          <div class="form-group">
                            <h5>Select Audio Category <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <select name="cat" id="cat_id" class="form-control">
                              <option>Please Select Category</option>
                                @foreach($section_cat as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cat }}</option>
                                @endforeach
                              </select>
                            </div>							
                            @error('cat') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <h5>Audio Code <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" readonly name="audio_code" id="audio_code" class="form-control"> 
                             
                            </div>							
                            @error('audio_code') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                          
                        
                        <div class="col-md-6" style="display:none" id="ad1">
                          <div class="form-group">
                            <h5>Audio (English) <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="file" name="file_en" class="form-control"> 
                            </div>							
                            @error('file_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6" style="display:none" id="ad2">
                          <div class="form-group">
                            <h5>Audio (Hindi) <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="file" name="file_hi" class="form-control"> 
                            </div>							
                            @error('file_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                  
                        </div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-info">Add Audio</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

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

 </script>
<script>
$(document).on('change', '#cat_id', function () {
    var cat_id = $(this).val();

    if (cat_id) {
        $.ajax({
            url: "{{ route('get.audio.code') }}",  // Laravel route
            type: "GET",   // or "POST" if your route expects POST
            data: { cat_id: cat_id },
            dataType: "json",  // ✅ expect JSON
            success: function (data) {
                if (data) {
                    $('#audio_code').val(data.plant_code);
                   // $('#lang').val(data.audio_lang);

                    // ✅ Move condition here
                    if (data.audio_lang === "1") {
                        $('#ad1').show();
                        $('#ad2').hide();
                    } else if(data.audio_lang === "2"){
                        $('#ad1').hide();
                        $('#ad2').show();
                    }
                  else {
                        $('#ad1').show();
                        $('#ad2').show();
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("Error: " + xhr.status + " - " + xhr.statusText);
            }
        });
    }
});
</script>


@endsection
