@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Plants</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Plants</li>
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
					<form action="{{ route('admin-panel.plantsedit') }}" method="post" enctype="multipart/form-data">
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
                            <h5>Plant Code <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" readonly name="plant_code" class="form-control" value="{{ $plants->sr_no }}"> 
                            </div>							
                            @error('plant_code') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                          <div class="col-md-6">
                          <div class="form-group">
								<h5>Plant Name (English)<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="plant_name_en" value="{{ $plants->plant_name_en }}" class="form-control">
									<input type="hidden" name="id" value="{{ $plants->id }}" class="form-control">
								  </div>
								@error('plant_name_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
                            </div>
                        <div class="col-md-6">
                          <div class="form-group">
								<h5>Plant Name (Hindi)<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="plant_name_hi" value="{{ $plants->plant_name_hi }}" class="form-control">
									 
								  </div>
								@error('plant_name_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
                            </div>
                         <div class="col-md-6">
                          <div class="form-group">
                            <h5>Author <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="author" class="form-control" value="{{ $plants->author }}"> 
                            </div>							
                            @error('author') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Family <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="family_en" class="form-control" value="{{ $plants->family_en }}"> 
                            </div>							
                            @error('family_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                       
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Common Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="com_name_en" class="form-control" value="{{ $plants->com_name_en }}"> 
                            </div>							
                            @error('com_name_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Native <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="native_en" class="form-control" value="{{ $plants->native_en }}"> 
                            </div>							
                            @error('native_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Uses <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="uses_en" class="form-control" value="{{ $plants->uses_en }}"> 
                            </div>							
                            @error('uses_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Lattitude <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="latitude" class="form-control" value="{{ $plants->latitude }}"> 
                            </div>							
                            @error('latitude') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Longitude <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="longitude" class="form-control" value="{{ $plants->longitude }}"> 
                            </div>							
                            @error('longitude') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Locality <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="locality" class="form-control" value="{{ $plants->locality }}"> 
                            </div>							
                            @error('locality') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Change Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="file" name="file_name" class="form-control"> 
                            </div>							
                            @error('file_name') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                  
                        </div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-info">Update Plant</button>
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
