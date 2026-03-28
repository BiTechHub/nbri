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
					<h3 class="page-title">Search Results</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Search Results</li>
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
									<tr class="table-danger">
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
									<tr class="table-success" style="font-weight:bold">
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
                                           
                                          
                                       {{--   <a href="{{url('/')}}/admin-panel/menudel/{{$item->id}}" class="delete btn btn-danger btn-circle"><i class="fa fa-trash fa-xl"></i></a>--}}
                                           @endif
                                          @elseif($item->status == 'Approved')
                                          
                                          @if($user_access[0]->fn_delete=="Y")
                                            <a href="{{url('/')}}/admin-panel/ViewApplications/{{$item->id}}" class="btn btn-info btn-circle"><i class="fa fa-eye fa-xl"></i></a>
                                           <a href="{{url('/')}}/admin-panel/ViewRoomAllotment/{{$item->id}}" class="btn btn-warning btn-circle"><i class="fa fa-edit fa-xl"></i></a>
                                          
                                       
                                            <form method="post" id="reject_form_{{$item->id}}" action="{{url('/')}}/admin-panel/All-Application/delete">
                                                {{csrf_field()}}
                                                <input type="hidden" name="token" value="{{$item->id}}" >
                                                <input type="hidden" id="remark_{{$item->id}}" name="remark" value="" >
                                            </form>
                                            <a onclick="DeleteRow('{{$item->id}}')" href="javascript:void(0);" title="Delete this row" class="btn btn-danger btn-circle"><i class="fa fa-close"></i></a>
                                           
                                          
                                          
                                           @endif
                                          @else
                                          <a href="{{url('/')}}/admin-panel/ViewApplications/{{$item->id}}" class="btn btn-info btn-circle"><i class="fa fa-eye fa-xl"></i></a>
                                        {{--  <a href="{{url('/')}}/admin-panel/menudel/{{$item->id}}" class="delete btn btn-danger btn-circle"><i class="fa fa-trash fa-xl"></i></a> --}}
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
        icon: "warning", // Use 'icon' instead of 'type'
        buttons: {
            cancel: {
                text: "Cancel",
                visible: true
            },
            confirm: {
                text: "Confirm",
                visible: true
            }
        },
        content: {
            element: "input",
            attributes: {
                placeholder: "Rejection Reason",
                type: "text"
            }
        }
    }).then((inputValue) => {
        if (inputValue === false) return;

        if (inputValue === "") {
            swal("Error", "You need to write a deletion reason!", "error");
            return false;
        }

        // Set the input value to the hidden field
        $("#remark_" + id).val(inputValue);
        // Submit the form
        $("#reject_form_" + id).submit();
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
