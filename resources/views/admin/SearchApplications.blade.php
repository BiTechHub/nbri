@extends('admin.layouts.master')
@section('main-section')

<div class="content-wrapper">
	  <div class="container">

		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Search Between Check In date</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Search Applications</li>
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
					<form action="{{ route('admin-panel.searchapplications') }}" method="post" enctype="multipart/form-data">
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
						
						<div class="col-6">
                          	<div class="form-group">
								<h5>From Date <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="date" name="from_date" class="form-control"> 
								</div>
								@error('from_date') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
							</div>
                        </div>
						<div class="col-6">
							<div class="form-group">
							  <h5>To date <span class="text-danger">*</span></h5>
							  <div class="controls">
								  <input type="date" name="to_date" class="form-control"> 
							  </div>
							  @error('to_date') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
						  </div>
					  </div>
					  </div>

						<div class="text-xs-right">
							<button type="submit" class="btn btn-info">Search</button>
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
@section('ajax_script')

@endsection
