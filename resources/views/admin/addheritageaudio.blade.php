@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Heritage Garden Audio</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Heritage Garden Audio</li>
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
					<form action="{{ route('admin-panel.heritageaudioadd') }}" method="post" enctype="multipart/form-data">
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
                          <div class="col-md-12">
                          <div class="form-group">
                            <h5>Audio Code <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" readonly name="audio_code" class="form-control" value="{{ $audio->sr_no + 1 }}"> 
                            </div>							
                            @error('audio_code') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                          
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Audio 1 (English) <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="file" name="file_name" class="form-control"> 
                            </div>							
                            @error('file_name') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Audio 2 (Hindi) <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="file" name="file_name2" class="form-control"> 
                            </div>							
                            @error('file_name2') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
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
@endsection
