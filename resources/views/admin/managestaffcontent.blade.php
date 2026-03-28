@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Manage Staff Content</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Control</li>
							<li class="breadcrumb-item active" aria-current="page">Manage Staff Content</li>
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


			<div class="box mt-20">
				<div class="box-header">
					<h4 class="box-title">Select Category</h4>
                    <div class="" style="float:right;">
                        <select name="contype" id="contype" onchange="get_all_report();" class="form-control">
                        <option value="" selected>Please Select Category</option>
                          @foreach($stm as $stf)
                        <option value="{{$stf->id}}">{{$stf->child_menu}} / {{$stf->childmenu_hi}}</option>
                          @endforeach
                        </select>
                    </div>
				</div>
				<div class="box-body" id="textcon">
                  <div class="panel" id="withoutData" style="display:none;">
                      <div class="panel-body">
                          <h2>No data found</h2>
                      </div>
                  </div>
                  <span style="color:red;" id="totalData"></span>
					<div class="table-responsive">
						<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>Serial No.</th>
                                    <th>Image</th>
									<th>Name</th>
									
                                    <th>Designation</th>
									<th>Email</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                  <th>Delete</th>
								</tr>

							</thead>
							<tbody id="allData">
								@php
								$i=1;
								@endphp
								@foreach($scontent as $item)
								<tr>
									<td>{{$i}}</td>
                                    <td><img src="{{url('/')}}/uploads/staffPics/{{$item->image}}" style="width:100px;height:100px;"></td>
									<td>{{$item->name}} / {{$item->name_hi}}</td>
									
                                    <td>
                                      {{$item->deg}}
                                  </td>
                                      <td>
                                        {{$item->email}}
                                      </td>
                                  <td style="color:red;">
                                        Select Designation First
                                      </td>
                                  <td>
                                    @if($item->status == 'Active')
                                    <a href="{{url('/')}}/admin-panel/deactivestaffcontent/{{$item->id}}" class="btn btn-success">Active</a>
                                    @else
                                    <a href="{{url('/')}}/admin-panel/activestaffcontent/{{$item->id}}" class="btn btn-danger">InActive</a>
                                    @endif
                               
                                      </td>
                                  
									<td><a href="{{url('/')}}/admin-panel/editstaffcontent/{{$item->id}}" class=""><i class="fa fa-edit" style="font-size:48px;color:green"></i></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#update_modal{{$item->id}}" class=""><i class='fa fa-address-card' style='font-size:45px;color:orange'></i></a>
                                  <div class="modal fade" id="update_modal{{$item->id}}" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Profile of <b style="color:red;">{{$item->name}}</b></h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/saveedit_staff_profile" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>Select Language <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <select name="lang" required class="form-control">
                                                            <option value="">Please Select</option>
                                                            
                                                            <option value="English">English</option>
                                                            <option value="Hindi">Hindi</option>
                                                          </select> 		
                                                         </div>
                                                        @error('lang') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <input type="hidden" name="user_id" value="{{$item->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Select Profile Master <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <select name="pf_type" required onchange="getContent();" class="form-control">
                                                            <option value="">Please Select</option>
                                                            @foreach($stmm as $pf)
                                                            <option value="{{$pf->id}}">{{$pf->name}} / {{$pf->name_hi}}</option>
                                                            @endforeach
                                                          </select> 
                                                          <input type="hidden" name="staff_id" value="{{$item->id}}" class="form-control">
                                                         </div>
                                                        @error('pf_type') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                       <div class="form-group" id="">
                    
                                                        <textarea class="textarea" id="summernote"  name="content" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                          <span class="text-danger"> @error('content') {{$message}} @enderror </span>

                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div style="clear:both;"></div>
                                                  <div class="modal-footer">
                                                    <button name="update" class="btn btn-primary" type="submit"><span>&#10004;</span> Save</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                  </div>
                                                </form>

                                              </div>
                                            </div>
                                          </div>
                                          </div>
                                  
                                  </td>

									<td><a href="{{url('/')}}/admin-panel/delstaffcontent/{{$item->id}}" class="delete btn btn-danger">Delete</a></td>

								</tr>
								@php
								$i++;
								@endphp
                              @endforeach
							</tbody>
                            <tbody id="searchData">
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
<script type="text/javascript">
$(document).ready(function() {
$('')
});
</script>
<script>
$(document).on('click', '.move-up, .move-down', function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let url = $(this).hasClass('move-up') 
        ? "{{ url('/admin-panel/staff/move-up') }}/" + id 
        : "{{ url('/admin-panel/staff/move-down') }}/" + id;

    $.ajax({
        url: url,
        type: 'POST',
        data: {_token: "{{ csrf_token() }}"},
        success: function(res) {
            if (res.status === 'success') {
                get_all_report(); // Re-fetch and redraw table
            }
        }
    });
});
function get_all_report()
				{
					//alert();
					$("#withoutData").hide();
					$("#allData").hide();
					$("#portData").hide();
					var port_dist=$('#contype').val();
					var DataUri="port_dist="+port_dist;
					if(port_dist=="" || port_dist==null || port_dist=='')
					{
						alert('Please choose port date.');
						return false;
					}
					//alert(DataUri);
					//return false;
					$("#searchData").html("");
					$.ajax({
                    url: "{{url('/')}}/Search-Staff-Report?" + DataUri,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $("#searchData").empty(); // Clear old results

                        if (data.length == 0 || data == 'no') {
                            $("#withoutData").slideDown(1000);
                            $("#withData").slideUp(1000);
                        } else {
                            for (var i = 0; i < data.length; i++) {

                                // Disable condition checks
                                let upBtn = (i === 0)
                                ? '<button class="btn btn-light" disabled>&#x25B2;</button>'
                                : '<button class="btn btn-light move-up" data-id="' + data[i].id + '">&#x25B2;</button>';
                                let downBtn = (i === data.length - 1)
                                ? '<button class="btn btn-light" disabled>&#x25BC;</button>'
                                : '<button class="btn btn-light move-down" data-id="' + data[i].id + '">&#x25BC;</button>';

                                $("#searchData").append(
                                    '<tr>' +
                                        '<td>' + (i + 1) + '</td>' +
                                        '<td><img src="{{url('/')}}/uploads/staffPics/' + data[i].image + '" style="width:100px;height:100px;"></td>' +
                                        '<td>' + data[i].name + ' / ' + data[i].name_hi + '</td>' +
                                        '<td>' + data[i].deg + '</td>' +
                                        '<td>' + data[i].email + '</td>' +

                                        // Position column with conditional buttons
                                        '<td>' + upBtn + ' ' + downBtn + '</td>' +

                                        '<td><a class="btn btn-success" href="{{url('/')}}/admin-panel/editstaffcontent/' + data[i].id + '">Edit</a></td>' +
                                        '<td><a class="btn btn-danger" href="{{url('/')}}/admin-panel/delstaffcontent/' + data[i].id + '">Delete</a></td>' +
                                    '</tr>'
                                );
                            }
                            $("#withoutData").slideUp(1000);
                            $("#withData").slideDown(1000);
                            $("#totalData").html("Total " + data.length + " records found...");
                        }
                    }
                });


				}
</script>
@endsection
