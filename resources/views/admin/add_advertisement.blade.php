@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Advertisement</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								
								
								<li class="breadcrumb-item" aria-current="page"><a href="{{url('/')}}/admin-panel/ManageAdvertisement" class="btn btn-primary" style="color:#fff">Manage Advertisement</a></li>
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
					<form action="{{ route('admin-panel.uploadAdvertisement') }}" method="post" enctype="multipart/form-data">
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
								<h5>Select Main Menu <span class="text-danger">*</span></h5>
								<div class="controls">
                                  <select name="rec_type" required class="form-control">
                                    <option selected value="">--Please Select--</option>
                                    @foreach($minu as $minus)
                                     <option value="{{$minus->id}}"   >{{ $minus->name }}</option>
                                    @endforeach
                                  </select> 
								</div>
								@error('rec_type') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
							</div>
						</div>
						<div class="col-6">
                          	<div class="form-group">
								<h5>Advertisement Number <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="advt_no" class="form-control"> </div>
							</div>
							@error('advt_no') 
								<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
							@enderror
                        </div>
						
					</div>
					<div class="text-xs-right">
						<button type="submit" class="btn btn-info">Submit</button>
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
