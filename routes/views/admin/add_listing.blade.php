@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Listing</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Listing</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>
		<!-- Main content -->
		<section class="content">
						<div class="box">
							<div class="box-header with-border">
								<div class="col-sm-12">
									<h3 class="box-title">New Listing</h3>
									<center></center>
								</div>
							</div>
							
							<div class="box-body">
								<div class="form-group">
									<label>Title</label>
									<input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" required="required">
								</div>
								
								<div class="form-group" id="fileDiv">
									<label>File</label>
									<input type="file" class="form-control" name="file" id="file">
								</div>
								
								
								<div class="form-group">
									<label>Text Color</label>
									<input type="text" class="form-control" placeholder="Text Color" name="color" id="color">
								</div>
								
								<div class="form-group">
									<input type="submit" name="add_listing" class="btn btn-success" value="Add Listing"/>
								</div>
							</div>
						</div>
					</section>
		<!-- /.content -->
	  </div>
  </div>
@endsection
