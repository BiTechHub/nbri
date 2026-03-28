@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add News</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add News</li>
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
					<form action="{{ route('admin-panel.newsadd') }}" method="post" enctype="multipart/form-data">
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
								<h5>Section<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="section" class="form-control">
									  <option selected value="">--Please Select--</option>
									  @foreach ($section_master as $section)
									  <option  value="{{$section->id}}">{{$section->name}}</option>
									  @endforeach
									</select> 
								  </div>
								@error('section') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
                            </div>
                        
                        <div class="col-md-12">
                          <div class="form-group">
                            <h5>Subject <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="subject" class="form-control"> 
                            </div>							
                            @error('subject') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-12">
                          <div class="form-group">
                            <h5>विषय <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="subject_hi" class="form-control"> 
                            </div>							
                            @error('subject_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                          <div class="col-md-6">
							<div class="form-group">
								<h5>News Date <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="date" name="news_date" class="form-control"> </div>
							</div>
							@error('news_date') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
						</div>
                        <div class="col-md-6">
								<div class="form-group">
									<h5>Have Link? <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="have_link" class="form-control" onchange="getBox()" id="have_lin" required>
										  <option selected value="">-- Please Select --</option>
										  <option  value="Yes">Yes</option>
										  <option  value="No" selected>No</option>
										</select> 
										@error('have_link') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

									</div>
                            </div>
					  	</div>
                          <div class="col-md-6" id="fln">
							<div class="form-group">
								<h5>Select file <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="file_name" class="form-control"> </div>
							        @error('file_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                         <div class="col-md-6" id="lnk" style="display:none">
							<div class="form-group">
								<h5>Enter Url <span class="text-danger">*(Enter with prefix https://)</span></h5>
								<div class="controls">
									<input type="text" name="link" placeholder="https://www.nbri.res.in/...." class="form-control"> </div>
							        @error('link')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                          <div class="col-md-6" id="dln">
								<div class="form-group">
									<h5>Document Language <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="document_language" class="form-control">
										  <option selected value="">-- Choose Document Language --</option>
										  <option  value="English">English</option>
										  <option  value="Hindi">Hindi</option>
										  <option  value="English and Hindi">English and Hindi</option>
										</select> 
										@error('document_language') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

									</div>
                            </div>
					  	</div>
                        </div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-info">Add Order</button>
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

   function getBox(){
     var have = $('#have_lin').val();
     if(have == 'Yes'){
       $('#fln').hide();
       $('#dln').hide();
       $('#lnk').show();
     }else{
       $('#fln').show();
       $('#dln').show();
       $('#lnk').hide();
     }
   }
 </script>
@endsection
