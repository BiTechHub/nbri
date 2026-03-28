@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Phone Directory</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Phone Directory</li>
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
					<form action="{{url('/')}}/admin-panel/update_directory" method="post" enctype="multipart/form-data">
                      
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
                      
                      <input type="hidden" name="id" value="{{$directory_master->id}}">
					  <div class="row">
                        
                        @if($directory_master->language == 'English')
                        <div class="col-md-6">
							<div class="form-group">
                              <h5>Category <span class="text-danger">*</span></h5>
								<div class="controls">
                                  <select name="category" id="category" class="form-control">
                                    <option value="" selected>--Please Select--</option>
                                    @foreach($category_master as $categorymaster)
                                    <option  value="{{$categorymaster->id}}" {{ $categorymaster->id == $directory_master->category ? 'selected' : '' }}>{{$categorymaster->name}}</option>
                                    @endforeach
                                  </select> 
                                  @error('category') <span class="text-danger"> {{ $message }}</span> @enderror
								</div>
							</div>
                         </div>
                        @else
                        <div class="col-md-6">
							<div class="form-group">
                              <h5>श्रेणी <span class="text-danger">*</span></h5>
								<div class="controls">
                                  <select name="category" id="category" class="form-control">
                                    <option selected value="">--कृपया चयन कीजिए--</option>
                                    @foreach($category_hii as $categorymas)
                                    <option value="{{$categorymas->id}}" {{ $categorymas->id == $directory_master->category ? 'selected' : '' }}>{{$categorymas->name}}</option>
                                    @endforeach
                                  </select> 
                                  @error('category') <span class="text-danger"> {{ $message }}</span> @enderror
								</div>
							</div>
                         </div>
                        
                        @endif
                        
                        <div class="col-md-6">
							 <div class="form-group">
								<h5>Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" value="{{$directory_master->name}}"> </div>
							</div>
							@error('name') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
                        
                        
                        <div class="col-md-6">
							 <div class="form-group">
								<h5>Designation <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="designation" class="form-control" value="{{$directory_master->designation}}"> </div>
							</div>
							@error('designation') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
                        
                        <div class="col-md-6">
							 <div class="form-group">
								<h5>Area <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="area" class="form-control" value="{{$directory_master->area}}"> </div>
							</div>
							@error('area') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
                        <div class="col-md-6">
							 <div class="form-group">
								<h5>Twitter <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="twitter" class="form-control" value="{{$directory_master->twitter}}"> </div>
							</div>
							@error('twitter') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
                        <div class="col-md-6">
							 <div class="form-group">
								<h5>Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="email" class="form-control" value="{{$directory_master->email}}"> </div>
							</div>
							@error('email') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
                        <div class="col-md-6">
							 <div class="form-group">
								<h5>Contact <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="contact" class="form-control" value="{{$directory_master->contact}}"> </div>
							</div>
							@error('contact') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
                        
                        
                        
                        <div class="col-md-12">
						<div class="text-xs-right">
							<button type="submit" class="btn btn-info">Update Directory</button>
						</div>
                        </div>
                        </div>
					</form>

				</div>
				<!-- /.col -->
                
			  </div>
			  <!-- /.row -->
			</div>
            </div>
			  <!-- /.row -->
			</section>
			
		<!-- /.content -->
	  </div>
  </div>
@endsection
