@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Orders</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Office Orders List</li>
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
						<a class="btn btn-warning" href="{{url('/')}}/admin-panel/office_orders" style="float:right;">Add New</a>
					</div>
					<div class="box-body p-0">
						<div class="table-responsive">
							<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Order No.</th>
										<th>Category</th>
                                        <th>Subject</th>
										<th>Order Date</th>
                                      <th>Order Date</th>
										<th>Action</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($order as $item)
									<tr>
										<td>{{$i}}</td>
										<td>{{$item->order_no}}</td>
										<td>{{$item->category}}</td>
										<td><a href="{{url('/')}}/uploads/office_order/{{$item->file_name}}" target="_blank">{{$item->subject}} <span><img src="/img/pdf.png" alt=""></span></a></td>
                                      <td>{{$item->order_date}}</td>
										<td>{{$item->order_date}}</td>
										<td><a href="{{url('/')}}/admin-panel/order_edit/{{$item->id}}" class=" btn btn-success">Edit</a></td>
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
