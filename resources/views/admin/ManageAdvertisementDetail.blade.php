@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Manage Advertisement Detail</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}/admin-panel/Position-Recruitment" style="color:#fff" class="btn btn-primary">Manage Positions</a></li>
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
            @if(session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif
			<!-- /.box-header -->
			<div class="box-body">
		
					
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Serial No.</th>
										<th>Advertisement Number/Name</th>
										<th>Recruitment Type</th>
                                        <th>Title</th>
                                        <th>Add Listing</th>
										<th>Created At</th>

                                        <th>Action</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($swrn as $item)
									<tr>
										<td>{{$i}}</td>
										<td>{{$item->ad_no}}</td>
										<td>{{$item->name}}</td>
                                      <td>{{$item->title_en}}   <br><br>  {{$item->title_hi}}</td>
                                         <td>
                                        <a href="{{url('/admin-panel')}}/add_listing_recruit/{{$item->id}}" class="btn btn-warning btn-sm">Add Listing</a>
                                      </td>
                                     
										<td>{{$item->created_at}}</td>

										<td>
                                           <button class="btn btn-info" data-toggle="modal" type="button" data-target="#update_modal{{$item->id}}">
                                          <i class="fa fa-edit"></i>
                                        </button>
                                          
                                        <!-- update slider image  Shani-->
                                        <div class="modal fade" id="update_modal{{$item->id}}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Menu</h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/updateRecruitDetail" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <input type="hidden" name="user_id" value="{{$item->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Advertisement Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="ad_no" readonly class="form-control"  value="{{$item->ad_no}}"> 								
                                                        </div>
                                                        @error('ad_no') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                      <div class="form-group">
                                                        <h5>Title (English) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="title_en" class="form-control"  value="{{$item->title_en}}"> 								
                                                        </div>
                                                        @error('title_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                      <div class="form-group">
                                                        <h5>Title (Hindi) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="title_hi" class="form-control"  value="{{$item->title_hi}}"> 								
                                                        </div>
                                                        @error('title_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    
                                                  </div>
                                                  <div style="clear:both;"></div>
                                                  <div class="modal-footer">
                                                    <button name="update" class="btn btn-primary" type="submit"><span>&#10004;</span> Update</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                  </div>
                                                </form>

                                              </div>
                                            </div>
                                          </div>
                                          </div>
                                          
                                          
                                          <a href="{{url('/')}}/admin-panel/advtdetaildel/{{$item->id}}" class="delete btn btn-danger"><i class="fa fa-trash"></i></a></td>

									</tr>
									@php
									$i++;
									@endphp
                                  @endforeach
								</tbody>

							</table>
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
<script>
$(document).ready(function() {
    $('#complex_header').DataTable({
        dom: 'Bfrtip', // Positioning of buttons
      //  responsive: true, // Enable responsive mode
        pageLength: 50,  // Default page length
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' // List of buttons to show
        ]
    });
});
</script>
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
