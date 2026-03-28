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
			
            <div class="col-md-12">
                   <div class="card">
                     <div class="card-body">
                   <div class="table-responsive">

                    <table class="table table-striped table-bordered display table-hover" id="table_id" style="100%">
                        <thead>
									<tr>
										<th>Serial No.</th>
										<th>Application Id</th>
										<th>Applicant Name</th>
                                      <th>Employee ID</th>
                                      
										<th>Created At</th>
                                       <th>Status</th>
                                        <th>Action</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($ruchi as $item)
									<tr style="font-weight:bold">
										<td>{{$i}}</td>
										<td>{{$item->application_id}}</td>
                                        <td>{{$item->application_name}}</td>
										<td>{{$item->employee_id}}</td>
                                       
										<td>{{$item->created_at}}</td>
                                       
                                        <td style="color:orange">{{$item->status}}</td>
                                    
                                   
										<td>
                                          @if($item->status == 'Pending')
                                           <a href="{{url('/')}}/admin-panel/ViewApplications/{{$item->id}}" class="btn btn-info btn-circle"><i class="fa fa-eye fa-xl"></i></a>
                                           <a href="{{url('/')}}/admin-panel/ViewRoomAllotment/{{$item->id}}" class="btn btn-warning btn-circle"><i class="fa fa-edit fa-xl"></i></a>
                                           
                                          @if($user_access[0]->fn_delete=="Y")
                                            <form method="post" id="reject_form_{{$item->id}}" action="{{url('/')}}/admin-panel/All-Application/delete">
                                                {{csrf_field()}}
                                                <input type="hidden" name="token" value="{{$item->id}}" >
                                                <input type="hidden" id="remark_{{$item->id}}" name="remark" value="" >
                                            </form>
                                            <a onclick="DeleteRow('{{$item->id}}')" href="javascript:void(0);" title="Delete this row" class="btn btn-danger btn-circle"><i class="fa fa-close"></i></a>
                                           
                                          
                                        <!--  <a href="{{url('/')}}/admin-panel/menudel/{{$item->id}}" class="delete btn btn-danger btn-circle"><i class="fa fa-trash fa-xl"></i></a>-->
                                           @endif
                                          @elseif($item->status == 'Approved')
                                          
                                          @if($user_access[0]->fn_delete=="Y")
                                            <a href="{{url('/')}}/admin-panel/ViewApplications/{{$item->id}}" class="btn btn-info btn-circle"><i class="fa fa-eye fa-xl"></i></a>
                                        <!--   <button class="btn btn-warning btn-circle" data-toggle="modal" type="button" data-target="#update_modal{{$item->id}}">
                                          <i class="fa fa-edit fa-xl"></i>
                                        </button>-->
                                          <form method="post" id="backapprove_form_{{$item->id}}" action="{{url('/')}}/admin-panel/All-Application/backapprove">
                                                {{csrf_field()}}
                                                <input type="hidden" name="token" value="{{$item->id}}" >
                                            </form>
                                            <a onclick="BackApproveRow('{{$item->id}}')" href="javascript:void(0);" title="Back this row" class="btn btn-warning btn-circle"><i class="fa fa-undo"></i></a>
                                        <!-- update slider image  Shani-->
                                        <div id="update_modal{{$item->id}}"  class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content" style="color:#000;">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Room Allotment</h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/update_allotment" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-6">
                                                      <input type="hidden" name="user_id" value="{{$item->application_id}}"/>
                                                      <div class="form-group">
                                                        <h5>No. Of Rooms Required <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="rooms" value="{{$item->room}}" class="form-control"> 								</div>
                                                        @error('rooms') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>Room Category <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <select name="room_cat" class="form-control">
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
                                                        <h5>No. Of Bed <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="no_bed" class="form-control" value=""> 								
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
                                                          <input type="text" name="floor" id="floor" class="form-control" value=""> 								
                                                        </div>
                                                        @error('floor') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror

                                                      </div>
                                                       </div>
                                                        <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>Date & Time Of Arrival <span class="text-danger">*</span></h5>
                                                        <div class="controls" style="display:flex;">
                                                          <input type="date" name="arrival" class="form-control" style="width:60%;" value="{{$item->date_of_arrival}}">
                                                          <input type="time" name="arrival_time" style="width:35%;margin-left:10px;" value="{{$item->arrival_time}}" class="form-control">								
                                                        </div>
                                                        @error('arrival') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror

                                                      </div>
                                                       </div>
                                                          <div class="col-6">
                                                      <div class="form-group">
                                                        <h5>Date & Time Of Departure <span class="text-danger">*</span></h5>
                                                        <div class="controls" style="display:flex;">
                                                          <input type="date" name="departure" class="form-control" style="width:60%;" value="{{$item->date_of_departure}}"> 
                                                          <input type="time" name="dep_time" style="width:35%;margin-left:10px;" class="form-control" value="{{$item->departure_time}}">	
                                                        </div>
                                                        @error('departure') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                      </div> @enderror

                                                      </div>
                                                     </div>
                                                    
                                                  </div>
                                                  <div style="clear:both;"></div>
                                                  <div class="modal-footer">
                                                    <button name="update" class="btn btn-primary" type="submit"><span>&#10004;</span> Approve</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                  </div>
                                                </form>

                                              </div>
                                            </div>
                                          </div>
                                          </div>
                                            <form method="post" id="reject_form_{{$item->id}}" action="{{url('/')}}/admin-panel/All-Application/delete">
                                                {{csrf_field()}}
                                                <input type="hidden" name="token" value="{{$item->id}}" >
                                                <input type="hidden" id="remark_{{$item->id}}" name="remark" value="" >
                                            </form>
                                            <a onclick="DeleteRow('{{$item->id}}')" href="javascript:void(0);" title="Delete this row" class="btn btn-danger btn-circle"><i class="fa fa-close"></i></a>
                                           
                                          
                                          
                                           @endif
                                          @else
                                          <form method="post" id="approve_form_{{$item->id}}" action="{{url('/')}}/admin-panel/All-Application/approve">
                                                {{csrf_field()}}
                                                <input type="hidden" name="token" value="{{$item->id}}" >
                                            </form>
                                            <a onclick="ApproveRow('{{$item->id}}')" href="javascript:void(0);" title="Approve this row" class="btn btn-warning btn-circle"><i class="fa fa-check"></i></a>
                                          <a href="{{url('/')}}/admin-panel/ViewApplications/{{$item->id}}" class="btn btn-info btn-circle"><i class="fa fa-eye fa-xl"></i></a>
                                         <!-- <a href="{{url('/')}}/admin-panel/menudel/{{$item->id}}" class="delete btn btn-danger btn-circle"><i class="fa fa-trash fa-xl"></i></a>-->
                                          @endif
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
					</div>
	
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>

  @endsection
@section('script')
<!-- DataTable Script -->


<script>
$(document).ready(function() {
    $('#table_id').DataTable({
        dom: 'Bfrtip', // Positioning of buttons
      //  responsive: true, // Enable responsive mode
        pageLength: 25,  // Default page length
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' // List of buttons to show
        ]
    });
});
</script>
<!-- SweetAlert Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<!-- Delete Confirmation Script -->
<script type="text/javascript">
$(document).ready(function() {
    // Bind the delete confirmation handler to elements with the class 'delete'
    $('.delete').on('click', function (event) {
        event.preventDefault(); // Prevent the default link action
        const url = $(this).attr('href'); // Get the URL from the href attribute

        // Display the SweetAlert confirmation dialog
        swal({
            title: 'Are you sure?',
            text: 'This record and its details will be permanently deleted!',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "btn btn-secondary",
                    closeModal: true
                },
                confirm: {
                    text: "Yes!",
                    value: true,
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true
                }
            },
        }).then(function(value) {
            if (value) {
                // If 'Yes!' is clicked, redirect to the URL
                window.location.href = url;
            }
        });
    });
});
  
function DeleteRow(id) {
    swal({
        title: "Warning!",
        text: "Are you sure you want to reject this application?",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancel",
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Deny",
                visible: true,
                closeModal: false, // Important: keeps the modal open until validation is complete
            }
        },
        content: {
            element: "input",
            attributes: {
                placeholder: "Rejection Reason",
                type: "text",
                id: "reason_input_" + id
            }
        }
    }).then((value) => {
        if (value === null) return; // Cancel button pressed

        const inputValue = document.getElementById("reason_input_" + id).value.trim();

        if (!inputValue) {
            swal("Error", "You need to provide a rejection reason!", "error");
            return;
        }

        // Set input value to hidden field
        $("#remark_" + id).val(inputValue);

        // Submit form
        $("#reject_form_" + id).submit();
    });
}

function ApproveRow(id) {
    swal({
        title: "Warning!",
        text: "Are you sure you want to approvet this rejected application?",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancel",
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Confirm",
                visible: true,
                closeModal: false, // Important: keeps the modal open until validation is complete
            }
        },
    
    }).then((value) => {
        if (value === null) return; // Cancel button pressed


        // Submit form
        $("#approve_form_" + id).submit();
    });
}
  
function BackApproveRow(id) {
    swal({
        title: "Warning!",
        text: "Are you sure you want to back this approved application?",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancel",
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Confirm",
                visible: true,
                closeModal: false, // Important: keeps the modal open until validation is complete
            }
        },
    
    }).then((value) => {
        if (value === null) return; // Cancel button pressed


        // Submit form
        $("#backapprove_form_" + id).submit();
    });
}


</script>

 

<script type="text/javascript">
   $('#room_cat').change(function(){
    var nid = $(this).val();
    var app_id = $('#app_id').val();

    if(nid){
        $.ajax({
            url: "{{ url('/') }}/fetch_rooms/" + nid + "/" + app_id, 
            dataType: 'json',
            success: function (result) {
                    var msg = '';
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].room_no + '</option>';
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

@endsection
