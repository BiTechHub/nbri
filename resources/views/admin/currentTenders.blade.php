@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Current Tenders</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Current Tenders</li>
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
				
			  </div>
				<div class="box">
					<div class="box-header">
						@if(session('status'))
                       <div class="alert alert-success">
                           {{ session('status') }}
                       </div>
                     @endif
                        <a class="btn btn-danger mb-3 ml-3" href="{{url('/')}}/admin-panel/archiveTenders" style="float:right;">Archive Tenders</a>
						<a class="btn btn-success" href="{{url('/')}}/admin-panel/addTender" style="float:right;">Add New Tender</a>
					</div>
					<div class="box-body p-0">
						<div class="table-responsive">
							<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
								<thead>
									<tr>
									  <th>S.No</th>
                                      <th>Tender No</th>
                                      <th>Advertisment Date</th>
                                      <th>Particulars</th>
                                      <th>Start Date Time</th>
                                      <th>Last Date Time</th>
                                      <th>Opening Date Time</th>
                                      <th>Category</th>
                                      <th>Status</th>
                                      <th>Edit</th>
                                      <th>Add Listing</th>
                                      <th>View Listing</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($tender_master as $item)
									<tr>
										<td>{{$i}}</td>
										<td>{{$item->tender_no}}</td>
										<td>
                                     
                                        {{$item->advt_date}}
                                        </td>
                                        <td>{!! $item->name_of_material !!}</td>
										<td>{{$item->start_date}}</td>
										<td>{{$item->last_date}}</td>
										<td>{{$item->opening_date}}</td>
										<td>
                                          @foreach($category_master as $category_masters)
                                          @if($item->category == $category_masters->id)
                                          {{$category_masters->name}}
                                          @endif
                                      	@endforeach
                                      </td>
                                     <td>
										@if($item->status == "0")
                                            <a href="{{url('/admin-panel')}}/activate/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-cross-circle-o" aria-hidden="true"></i>
</a>
                                        @else
                                            <a href="{{url('/admin-panel')}}/deactivate/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                                        @endif

                                      </td>
                                      <td>
                                        <a href="{{url('/admin-panel')}}/edit_tender/{{$item->id}}" class="btn btn-info btn-sm">Edit</a>
                                      </td>
                                      <td>
                                        <a href="{{url('/admin-panel')}}/add_listing/{{$item->id}}" class="btn btn-warning btn-sm">Add Listing</a>
                                      </td>
                                      <td>
                                        <a href="{{url('/admin-panel')}}/view_listing/{{$item->id}}" class="btn btn-primary btn-sm">View Listing</a>
                                      </td>
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
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection
