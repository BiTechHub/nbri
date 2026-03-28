@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Software</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Software</li>
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
					<form action="{{ route('admin-panel.uploadteacher') }}" method="post" enctype="multipart/form-data">
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
						<div class="col-12">
							<div class="form-group">
								<h5>Software Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" placeholder="Ex. Complaint Management" class="form-control"> </div>
							</div>
                          <div class="form-group">
								<h5>Software Complete URL <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="deg" placeholder="http://www.sample.com" class="form-control"> </div>
							</div>


							<!-- <div class="form-group">
								<h5>Subject <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subject" class="form-control"> </div>
							</div>

							<div class="form-group">
								<h5>Select Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="image" class="form-control"> </div>
							        @error('image')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>



                        <div class="form-group">
								<h5>Facebook Link <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="fb_link" class="form-control"> </div>
							</div>
                            <div class="form-group">
								<h5>Twitter Link <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="twt_link" class="form-control"> </div>
							</div>
                            <div class="form-group">
								<h5>Insta Link <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="insta" class="form-control"> </div>
							</div> -->
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
						<h4 class="box-title">Manage Software Details</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Serial No.</th>
										<th>Software Name</th>
										<th>Software Link (URL)</th>

                                        <th>Action</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($ruchi as $item)
									<tr>
										<td>{{$i}}</td>
										<td>{{$item->name}}</td>
										<td>{{$item->subject}}</td>

										<td><a href="{{url('/')}}/admin-panel/teachers/{{$item->id}}" class="delete">Delete</a></td>

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
