@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Change Position Area Wise</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Control</li>
							<li class="breadcrumb-item active" aria-current="page">Position Area Wise</li>
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
				<div class="box-header" style="display:inline-flex !important;">
					<h4 class="box-title">Select Area</h4>
                    <div class="" style="float:right;">
                        <select name="stafftype" id="stafftype" style="width:200px;margin-left:20px" class="form-control">
                        <option value="" disabled>Select Staff Type</option>
                        
                        <option selected value="Scientists">Scientists</option>
                        <option value="Administration">Administration</option>
                        <option value="Technical and Support Staff">Technical and Support Staff</option>
                        
                        </select>
                    </div>
                    <div class="" style="float:right;">
                        <select name="contype" id="contype" onchange="get_all_report();" style="margin-left:20px" class="form-control">
                        <option value="" selected>Please Select Area</option>
                          @foreach($sarea as $stf)
                        <option value="{{$stf->id}}">{{$stf->area}}</option>
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
                                    
                                    <th>Position</th>
                                    <th>Head</th>
                                   
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
                                  
                                      
                                  <td style="color:red;">
                                        Select Area First
                                      </td>
                                   <td style="color:red;">
                                        Select Area First
                                      </td>
                                  
									

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
        ? "{{ url('/admin-panel/staffarea/move-up') }}/" + id 
        : "{{ url('/admin-panel/staffarea/move-down') }}/" + id;

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
function get_all_report() {
    $("#withoutData").hide();
    $("#allData").hide();
    $("#portData").hide();
    var baseUrl = "{{ url('/') }}";
    var port_dist1 = $('#stafftype').val();
    var port_dist = $('#contype').val();
    var DataUri = "port_dist1=" + port_dist1 + "&port_dist=" + port_dist;

    if (!port_dist) {
        alert('Please choose port date.');
        return false;
    }

    $("#searchData").html("");

    $.ajax({
        url: "{{ url('/') }}/Search-Staff-Report-Area?" + DataUri,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $("#searchData").empty(); // Clear old results

            if (data.length === 0 || data === 'no') {
                $("#withoutData").slideDown(1000);
                $("#withData").slideUp(1000);
            } else {
                $.each(data, function (i, item) {

                    // Up / Down buttons
                    let upBtn = (i === 0)
                        ? '<button class="btn btn-danger" disabled>&#x25B2;</button>'
                        : '<button class="btn btn-danger move-up" data-id="' + item.id + '">&#x25B2;</button>';

                    let downBtn = (i === data.length - 1)
                        ? '<button class="btn btn-danger" disabled>&#x25BC;</button>'
                        : '<button class="btn btn-danger move-down" data-id="' + item.id + '">&#x25BC;</button>';

                    // Head button
                    let headBtn = (item.area_head != item.id)
                        ? '<td><a href="' + baseUrl + '/admin-panel/MakeHead/' + item.id + '/' + port_dist +'" class="btn btn-info">Make Head</a></td>'
                        : '<td><a href="#" class="btn btn-success">Area Head</a></td>';

                    // Append row
                    $("#searchData").append(
                        '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td><img src="' + baseUrl + '/uploads/staffPics/' + item.image + '" style="width:100px;height:100px;"></td>' +
                            '<td>' + item.name + ' / ' + item.name_hi + '</td>' +
                            '<td>' + item.deg + '</td>' +
                            '<td>' + upBtn + ' ' + downBtn + '</td>' +
                            headBtn +
                        '</tr>'
                    );
                });

                $("#withoutData").slideUp(1000);
                $("#withData").slideDown(1000);
                $("#totalData").html("Total " + data.length + " records found...");
            }
        }
    });
}

</script>
@endsection
