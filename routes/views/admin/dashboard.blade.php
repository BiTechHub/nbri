@extends('admin.layouts.master')
@section('main-section')
<style>
	.wrapper {
    position: static !important;
}


</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto w-p50">
					<h3 class="page-title">{{ $LoggeduserInfo['username'] }}</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Control</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- <div class="right-title w-170">
					<span class="subheader_daterange font-weight-600" id="dashboard_daterangepicker">
						<span class="subheader_daterange-label">
							<span class="subheader_daterange-title"></span>
							<span class="subheader_daterange-date text-primary"></span>
						</span>
						<a href="#" class="btn btn-sm btn-primary">
							<i class="fa fa-angle-down"></i>
						</a>
					</span>
				</div> -->
			</div>
		</div>

		<!-- Main content -->
		<section class="content">

		  

		  <div class="row">

			
			</div>

			

			<div class="col-xl-6 col-12">
			  <div class="box">
				<div class="box-header with-border">
				  

				  <ul class="box-controls pull-right">
		
					  
					  <li><a class="box-btn-slide" href="#"></a></li>
					  <li><a class="box-btn-fullscreen" href="#"></a></li>
					</ul>
				</div>
				<div class="box-body p-0">
				  <!-- THE CALENDAR -->
				  <div id="calendar" class="dask"></div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
			<!-- col -->
			
			<!-- /col -->

		  </div>


		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

	<!--Model Popup Area-->

	<!-- result modal content -->
	

@endsection
