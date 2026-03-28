@extends('admin.layouts.master')
@section('main-section')
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
		  <div class="box">
			<!-- /.box-header -->
            <button class="btn btn-primary no-print" onclick="printDiv('printArea')">🖨️ Print This Section</button>
			<div class="box-body" id="printArea">
			 

			
					<div class="row">
                <!-- First Column -->
                <div class="col-md-6">
                    <!-- Application Name -->
                    <div class="mb-3">
                        <label for="application_name" class="form-label">
                            Application ID <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="application_id" readonly name="application_id" class="form-control" value="{{$tableData->application_id}}">
                    </div>
                    <div class="mb-3">
                        <label for="application_name" class="form-label">
                            Applicant Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="application_name" readonly name="application_name" class="form-control" value="{{$tableData->application_name}}">
                    </div>

                    <!-- Designation -->
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation<span class="text-danger">*</span></label>
                        <input type="text" readonly id="designation" name="designation" class="form-control"  value="{{$tableData->designation}}">
                    </div>
                    {{-- employee id --}}
                    <div class="mb-3">
                        <label for="employee" class="form-label">Employee Id<span class="text-danger">*</span></label>
                        <input type="text" readonly id="employee_id" name="employee_id" class="form-control"  value="{{$tableData->employee_id}}">
                    </div>
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Contact/Mobile No<span class="text-danger">*</span></label>
                        <input type="text" readonly id="contact_no" name="contact_no" class="form-control"  value="{{$tableData->contact_no}}">
                    </div>

                    <!-- Official Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Official Email Address<span class="text-danger">*</span></label>
                        <input type="email" readonly id="email" name="email" class="form-control"  value="{{$tableData->email}}">
                    </div>
                   
                    <div class="mb-3">
                        <label for="image" class="form-label">Scanned Copy of Office ID<span class="text-danger">*</span></label>
                        <a href="{{url('/')}}/{{$tableData->image_path}}" title="Photo" target="_blank" data-effect="mfp-newspaper" class="image-popups">
								<img style="width:100px;height:150px" src ="{{url('/')}}/{{$tableData->image_path}}">
                                
                            </a>
                    </div>
                </div>

                <!-- Vertical Divider -->
                <div class="col-md-1 divider"></div>

                <!-- Second Column -->
                <div class="col-md-5">
                    <!-- Scanned Office ID -->
                    
                     <!-- Contact Number -->
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Application Date<span class="text-danger">*</span></label>
                        <input type="text" readonly id="organization_type" name="organization_type" class="form-control"  value="{{$tableData->created_at->format('d/m/Y h:i A')}}">
                    </div>
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Application Status<span class="text-danger">*</span></label>
                        <input type="text" readonly id="organization_type" name="organization_type" class="form-control"  value="{{$tableData->status}}">
                    </div>
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Organization Type<span class="text-danger">*</span></label>
                        <input type="text" readonly id="organization_type" name="organization_type" class="form-control"  value="{{$tableData->organization_type}}">
                    </div>
                   @if($tableData->manual_organization)
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Organization Name<span class="text-danger">*</span></label>
                        <input type="text" readonly id="manual_organization" name="manual_organization" class="form-control"  value="{{$tableData->manual_organization}}">
                    </div>
                  @else
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Organization Name<span class="text-danger">*</span></label>
                        <input type="text" readonly id="organization_id" name="organization_id" class="form-control"  value="{{$tableData->organization_id}}">
                    </div>
                  @endif
                    
                    <!-- Purpose of Visit -->
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose of Visit<span class="text-danger">*</span></label>
                        <input type="text" readonly id="purpose" readonly name="purpose" class="form-control"  value="{{$tableData->purpose}}">
                    </div>

                    <div class="mb-3 row">
                        <!-- Date of Arrival -->
                        <div class="col-md-6">
                            <label for="date_of_arrival" class="form-label">Date of Arrival <span class="text-danger">*</span></label>
                            <input type="date" id="date_of_arrival" readonly name="date_of_arrival" class="form-control" value="{{$tableData->date_of_arrival}}">
                        </div>
                    
                        <!-- Time of Arrival -->
                        <div class="col-md-6">
                            <label for="time_of_arrival" class="form-label">Time of Arrival <span class="text-danger">*</span></label>
                            <input type="time" id="arrival_time" readonly name="arrival_time" class="form-control" value="{{$tableData->arrival_time}}">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <!-- Date of Departure -->
                        <div class="col-md-6">
                            <label for="date_of_departure" class="form-label">Date of Departure <span class="text-danger">*</span></label>
                            <input type="date" id="date_of_departure" readonly name="date_of_departure" class="form-control" value="{{$tableData->date_of_departure}}">
                        </div>
                    
                        <!-- Time of Departure -->
                        <div class="col-md-6">
                            <label for="time_of_departure" class="form-label">Time of Departure <span class="text-danger">*</span></label>
                            <input type="time" id="departure_time" readonly name="departure_time" class="form-control" value="{{$tableData->departure_time}}">
                        </div>
                    </div>

                    <!-- Number of Rooms -->
                    <div class="mb-3">
                        <label for="room" class="form-label">No. of Rooms Required<span class="text-danger">*</span></label>
                        <input type="number" id="room" readonly name="room" class="form-control" value="{{$tableData->room}}">
                    </div>

                    <!-- Payment to be Borne By -->
                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment to be Borne By<span class="text-danger">*</span></label>
                        <input type="text" id="payment" readonly name="payment" class="form-control" value="{{$tableData->payment}}">
                    </div>
                </div>
            </div>

            <!-- Table for Guest Information -->
            <div class="mt-4">
                <div class="container mt-3">
                  <h4 class="mb-3">Guest Details</h4>

                  <div class="table-responsive">
    <table class="table table-bordered table-sm" style="font-size: 12px;">
        <thead class="thead-light">
            <tr style="background-color: #f0f0f0; font-weight: 600;">
                <th style="width: 4%;">S.No</th>
                <th style="width: 15%;">Guest Name</th>
                <th style="width: 15%;">Organization</th>
                <th style="width: 6%;">Age</th>
                <th style="width: 8%;">Gender</th>
                <th style="width: 15%;">Contact</th>
                <th style="width: 15%;">Category</th>
                <th style="width: 22%;">Photo ID Proof No</th>
            </tr>
        </thead>
        <tbody>
           @php $sn = 1; @endphp

@foreach($guestData as $gd)

        <tr>
            <td>{{ $sn++ }}</td>
            <td>{{ $gd->guest_name }}</td>
            <td>{{ $gd->organization }}</td>
            <td>{{ $gd->age }}</td>
            <td>{{ ucfirst($gd->gender) }}</td>
            <td>{{ $gd->contact }}</td>
            <td>{{ $gd->cat_name }}</td>
            <td>{{ $gd->photo_id_proof }}</td>
        </tr>
  
@endforeach

        </tbody>
    </table>
</div>

              </div>

            </div>
              @if($tableData->status == 'Approved')
               <div class="table-responsive mt-4">
    <h4 class="mb-3">Booking Details</h4>
    <table class="table table-bordered table-sm" style="font-size: 12px;">
        <thead style="background-color: #f0f0f0; font-weight: 600;">
            <tr>
                <th style="width: 5%;">S.No</th>
                <th style="width: 15%;">Booking Type</th>
                <th style="width: 20%;">Room Type</th>
                <th style="width: 10%;">Room Number</th>
                <th style="width: 20%;">Bed</th>
                <th style="width: 10%;">Floor</th>
                <th style="width: 20%;">Booking Status</th>
            </tr>
        </thead>
        <tbody>
            @php $sn = 1; @endphp
            @foreach($bookingData as $bkdata)
                @if($bkdata->application_id == $tableData->application_id)
                <tr>
                    <td>{{ $sn++ }}</td>
                    <td>{{ $bkdata->booking_type == 1 ? 'Full Room' : 'Bed Wise' }}</td>
                    <td>{{ $bkdata->room_cat }}</td>
                    <td>{{ $bkdata->room_number }}</td>
                    <td>{{ $bkdata->bed_names }}</td>
                    <td>{{ $bkdata->floor }}</td>
                    <td>{{ $bkdata->status == 1 ? 'Confirmed' : 'Pending' }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

        @endif
           
             

            <div class="">
                <label for="File1"> Remarks
                    </label>
              <textarea class="form-control" id="remarks" name="remarks" placeholder="" readonly style="width:50%;">{{$tableData->remarks}}</textarea>
                
            </div>
        
            <!-- Submit Button -->
			

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
function printDiv(divId) {
    var content = document.getElementById(divId).innerHTML;
    var printWindow = window.open('', '', 'height=1000,width=800');

    printWindow.document.write('<html><head><title>Booking Application</title>');

    printWindow.document.write(`
        <style>
            @page {
                size: A4 portrait;
                margin: 1cm;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: #000;
                padding: 10px;
                font-size: 13px;
                line-height: 1.4;
            }

            h2, h3 {
                font-size: 17px;
                border-bottom: 1px solid #000;
                padding-bottom: 4px;
                margin-bottom: 12px;
            }

            .form-label {
                font-weight: bold;
                margin-bottom: 3px;
                display: block;
                font-size: 12px;
            }

            .form-control {
                border: none;
                border-bottom: 1px solid #888;
                padding: 2px 0;
                font-size: 12px;
                background: transparent;
                width: 100%;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
                font-size: 12px;
            }

            th, td {
                border: 1px solid #666;
                padding: 5px;
                text-align: left;
            }

            th {
                background-color: #eee;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                margin-bottom: 10px;
            }

            .col-md-6, .col-md-5, .col-md-1 {
                flex: 0 0 auto;
                width: 48%;
                padding: 5px;
                box-sizing: border-box;
            }

            .col-md-1 {
                width: 4%;
            }

            .divider {
                border-left: 1px solid #ccc;
                height: auto;
            }

            img {
                max-width: 100%;
                height: 170px;
                border: 1px solid #ccc;
                margin-top: 5px;
            }

            textarea {
                width: 100%;
                font-size: 12px;
                padding: 6px;
                resize: none;
                border: 1px solid #aaa;
                background-color: #f9f9f9;
                box-sizing: border-box;
            }

            @media print {
                .no-print {
                    display: none !important;
                }
            }
        </style>
    `);

    printWindow.document.write('</head><body>');
    printWindow.document.write(content);
    printWindow.document.write('</body></html>');

    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.close();
}
</script>




@endsection
