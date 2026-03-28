@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Manage Video</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Slider Images</li>
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
					<form action="{{ route('admin-panel.uploadvideo') }}" method="post" enctype="multipart/form-data">
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
						<div class="col-6">
							<div class="form-group">
								<h5>Heading<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="heading" class="form-control" > 
								</div>
								@error('heading') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<h5>शीर्षक<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="heading_hi" class="form-control" > 
								</div>
								@error('heading_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<h5>Insert Youtube Video Link <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="link" class="form-control" > 
								</div>
							</div>
							 @error('link') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
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
                                        <th>Videos</th>
										<th>Heading</th>
                                      <th>Heading(Hindi)</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($me as $item)
									<tr>
										<td>{{ $i }}</td>
										<td><iframe width="" height="" src="https://www.youtube.com/embed/{{$item->video_link}}" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></td>
									<td>{{$item->heading}}</td>
                                    <td>{{$item->heading_hi}}</td>
										<td><a href="{{ url('/') }}/admin-panel/video/{{ $item->id }}" class="delete btn btn-danger">Delete</a></td>
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
