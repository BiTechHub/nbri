@extends('admin.layouts.master')
@section('main-section')
  
    
<style>
.card-body {
            padding: 0rem 1.25rem;
        }
        
        p {
            margin-top: 0;
            margin-bottom: 10px;
        }
        
        .card {
            border-radius: 0px;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        
        .flex-wrap {
            margin-bottom: -35px;
        }
        
        div.dataTables_wrapper div.dataTables_paginate {
            margin-top: -25px;
        }
        
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #5D78FF;
            border-color: #5D78FF;
        }
  .select2-selection__rendered li {
    color:#000 !important;
  }

</style>
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Booking Requests</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Booking Requests</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Main content -->
		<section class="content">
		 <!-- Basic Forms -->
		    @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
            @endif
			<!-- /.box-header -->
			<div class="box">
              <div class="box-body">
            <form action="{{url('/')}}/admin-panel/update_allotment" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-6">
                                                      <input type="hidden" name="user_id" id="user_id" value="{{$item->application_id}}"/>
                                                      <input type="hidden" name="id" id="app_id" value="{{$item->id}}"/>
                                                      <div class="form-group">
                                                        <h5>No. Of Rooms Required <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="rooms" readonly value="{{$item->room}}" class="form-control"> 								</div>
                                                        @error('rooms') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                   {{-- <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>No. Of Rooms Allotted <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="rooms_allotted" class="form-control"> 								</div>
                                                        @error('rooms_allotted') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div> --}}
                                                    <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>Room Category <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <select name="room_cat" id="room_cat" class="form-control">
                                                            <option>-- Select Room Category --</option>
                                                            @foreach($room as $rm)
                                                            <option value="{{$rm->id}}">{{$rm->name}}</option>
                                                            @endforeach
                                                          </select> 								
                                                        </div>
                                                        @error('room_cat') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror
                                                      </div>
                                                      </div>
                                                    <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>Room No. <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          
                                                          <select name="room_no" id="room_no" style="color:#000" class="form-control select2">
                                                           
                                                          </select>								
                                                        </div>
                                                        @error('room_no') 
                                                        <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror

                                                      </div>
                                                        </div>
                                                      <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>No. Of Bed <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="no_bed" id="responseInput" readonly class="form-control" value=""> 								
                                                        </div>
                                                        @error('no_bed') 
                                                        <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror

                                                      </div>
                                                        </div>
                                                        <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>Floor <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="floor" id="floor" readonly class="form-control" value=""> 								
                                                        </div>
                                                        @error('floor') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror

                                                      </div>
                                                       </div>
                                                        <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>Date & Time Of Arrival <span class="text-danger">*</span></h5>
                                                        <div class="controls" style="display:flex;">
                                                          <input type="text" name="" id="" readonly class="form-control" value="{{\Carbon\Carbon::parse($item->date_of_arrival)->format('d/m/Y')}} {{$item->arrival_time}}">
                                                          <input type="hidden" name="arrival" id="arrival" readonly class="form-control" value="{{$item->date_of_arrival}} {{$item->arrival_time}}">
                                                        {{--  <input type="time" name="arrival_time" id="arrival_time" style="width:35%;margin-left:10px;" value="{{$item->arrival_time}}" class="form-control">	--}}							
                                                        </div>
                                                        @error('arrival') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror

                                                      </div>
                                                       </div>
                                                          <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>Date & Time Of Departure <span class="text-danger">*</span></h5>
                                                        <div class="controls" style="display:flex;"> 
                                                          <input type="text" name="" readonly id="" class="form-control" value="{{\Carbon\Carbon::parse($item->date_of_departure)->format('d/m/Y')}} {{$item->departure_time}}"> 
                                                          <input type="hidden" name="departure" readonly id="departure" class="form-control" value="{{$item->date_of_departure}} {{$item->departure_time}}"> 
                                                        {{--  <input type="time" name="dep_time" id="dep_time" style="width:35%;margin-left:10px;" class="form-control" value="{{$item->departure_time}}">	--}}
                                                        </div>
                                                        @error('departure') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror

                                                      </div>
                                                     </div>
                                                      <div class="col-6">
                                                      <div class="form-group">
                                                      <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" checked id="inlineRadio1" value="1">
                                                        <label class="form-check-label" style="font-weight:bold;font-size:14px" for="inlineRadio1">Total Room Wise</label>
                                                      </div>
                                                      
                                                      <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" style="font-weight:bold;font-size:14px" for="inlineRadio2">Bed Wise Booking</label>
                                                      </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group" id="bed_div">
                                                          
                                                      </div>
                                                    </div>
                                                    
                                                  </div>
                                                  <div style="clear:both;"></div>
                                                  <div class="modal-footer">
                                                    <button name="update" class="btn btn-primary" type="submit"><span>&#10004;</span> Add</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                  </div>
                                                </form>
	
		  <!-- /.box -->
          </div>
              </div>
          <div class="box">
              <div class="box-body">
                <form action="{{url('/')}}/admin-panel/confirm_allotment" method="post" enctype="multipart/form-data"> 
                  @csrf
                <div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
                                      <th>Application ID</th>
										<th>Applicant Name</th>
                                        <th>Room Category</th>
										<th>Room No.</th>
										<th>Allotment Category</th>
                                        <th>Allotment Bed Name</th>
                                        <th>Floor</th>
                                        <th>Arrival date & Time</th>
                                        <th>Departure date & Time</th>
										<th>Allotment Date</th>

                                        <th>Action</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($bookings as $itemm)
									<tr>
                                      <td>{{$item->application_id}}</td>
										<td>{{$item->application_name}}</td>
										<td>{{$itemm->room_name}}</td>
										<td>{{$itemm->room_number}}</td>
										<td>
                                          @if($itemm->booking_type == 1)
                                          Full Room
                                          @else
                                          Bed Wise
                                          @endif
                                        </td>
                                      @php
                                          $bd = explode(',', $itemm->bed_id);
                                      @endphp
                                      <td>
                                          @foreach($bed as $bb)
                                              @if(in_array($bb->id, $bd))
                                                  {{ $bb->bed }},
                                              @endif
                                          @endforeach
                                      </td>

                                      </td>
										<td>{{$itemm->floor}}</td>
										<td>{{$itemm->booking_from}}</td>
                                      <td>{{$itemm->booking_to}}</td>
										<td>{{$itemm->created_at}}</td>

										<td><a href="{{url('/')}}/admin-panel/delallottment/{{$itemm->id}}" class="delete">Delete</a></td>

									</tr>
									@php
									$i++;
									@endphp
                                  @endforeach
								</tbody>

							</table>
						</div>
                                <div class="modal-footer">
                                        <input type="hidden" class="btn btn-primary" name="app_id" value="{{$item->application_id}}">
                                        <input type="hidden" class="btn btn-primary" name="status" value="1">
                                        <button name="confirm" class="btn btn-primary" type="submit"><span>&#10004;</span> Confirm</button>
                                                    
                                </div>
            </form>
            </div>
          </div>
		</section>
		<!-- /.content -->
	  </div>
  </div>

  @endsection
@section('script')
<!-- DataTable Script -->
 

<script type="text/javascript">
   $('#room_cat').change(function(){
    var nid = $(this).val();
    var app_id = $('#app_id').val();

    if(nid){
        $.ajax({
            url: "{{ url('/') }}/fetch_rooms/" + nid + "/" + app_id, 
            dataType: 'json',
            success: function (result) {
                    var msg = "<option></option>";
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].room_id + '">' + result[i].room_no + '</option>';
                }
                $("#room_no").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log error messages for debugging
            }
        });
    }
});
  

$(document).ready(function() {

 //function to initialize select2
  function initializeSelect2(selectElementObj) {
    selectElementObj.select2({
      width: "100%",
      tags: true
    });
  }
 

 //onload: call the above function 
  $(".select2").each(function() {
    initializeSelect2($(this));
  });

 $('.select2').select2({
    placeholder: "Please Select Room No"
});


});

    </script>
<script>
$(document).ready(function() {


  // Handle the select2 change event for multiple selections
  $(".select2").on("select2:select", function() {
    
    var nid = $(this).val();
    var app_id = $('#app_id').val();
    
   
    $.ajax({
      url: "{{ url('/') }}/fetch_no_bed/" + nid + "/" + app_id,
      type: 'GET',
     
      success: function(response) {
        // Handle the response from the server and print it into an input box
        console.log('AJAX success:', response);

        // Assuming the response is a string or simple value
        $('#responseInput').val(response.response1); // Set the response to the input box with id 'responseInput'
        
        $('#floor').val(response.response2);

      },
      error: function(xhr, status, error) {
        // Handle any errors from the AJAX request
        console.error('AJAX error:', error);
      }
    });
  });

});
  

</script>
<script>
$(document).ready(function() {
    $("input[type='radio']").on("change", function() {
        var selectedOption = $("input[type='radio']:checked").val();

        // If selected option is 1, clear the div and exit
        if (selectedOption == 1) {
            $("#bed_div").html('');
            return;
        }

        // Get app_id and room_no values
        var app_id = $('#app_id').val();
        var room_no = $('#room_no').val(); // Fixed: use room_no for clarity

        $.ajax({
            url: "{{ url('/') }}/fetch_bed_record/" + room_no + "/" + app_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var msg = '';

                if (response.length > 0) {
                    for (var i = 0; i < response.length; i++) {
                        msg += '<div class="form-check form-switch">';
                        msg += '<input class="form-check-input" value="' + response[i].id + '" name="beds_nn[]" type="checkbox" id="bed_' + response[i].id + '">';
                        msg += '<label class="form-check-label" for="bed_' + response[i].id + '">' + response[i].bed + '</label>';
                        msg += '</div>';
                    }
                } else {
                    msg = '<p>No beds found.</p>';
                }

                $("#bed_div").html(msg);
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error);
                $("#bed_div").html('<p class="text-danger">Failed to load beds.</p>');
            }
        });
    });
});
</script>



@endsection
