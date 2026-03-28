@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Manage Gallery</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Gallery Images</li>
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
					<form action="{{ route('admin-panel.uploadgallery') }}" method="post" enctype="multipart/form-data">
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
                       <div class="alert alert-danger">
                           {{ session('fail') }}
                       </div>
                     @endif
                        @csrf
					  <div class="row">
						<div class="col-12">
							<div class="form-group">
								<h5>Image Category <span class="text-danger">*</span></h5>
								<div class="form-group">
								<select name="category" required class="form-control">
									<option selected="" value="">--Please Select--</option>
									@foreach ($category as $categorys)
									<option value="{{$categorys->id}}">{{$categorys->name}}</option>
									@endforeach
								</select>
							</div>
								@error('category') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<h5>Select Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="image" class="form-control" required> 
								</div>
								@error('image') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<h5>Heading</h5>
								<div class="controls">
									<input type="text" name="heading" class="form-control" > 								</div>
									
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<h5>शीर्षक</h5>
								<div class="controls">
									<input type="text" name="heading_hi" class="form-control" > 					</div>
									
							</div>
						</div>
					  </div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</form>
				</div>
				<!-- /.col -->
			  </div>
				<div class="box mt-20">
					<div class="box-header">
						<h4 class="box-title">Gallery List</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Serial No.</th>
                                      <th>Image</th>
                                      <th>Category</th>      
										<th>Heading</th>
										<th>Heading(hindi)</th>
										                                  <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($photos as $item)
									<tr>
										<td>{{ $i }}</td>
                                      	<td><img src="{{ url('/') }}/uploads/{{ $item->image }}" style="width:150px;height:150px;"></td>
                                      	<td>
                                         ----
                                         </td>
										<td>{{ $item->title }}</td>
										<td>{{ $item->title_hi }}</td>
										
										<td><a href="{{ url('/') }}/admin-panel/gallery/{{ $item->id }}" class="delete btn btn-danger">Delete</a></td>
									</tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
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
