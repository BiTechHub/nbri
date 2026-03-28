@extends('admin.layouts.master')
@section('main-section')

<div class="content-wrapper">
	  <div class="container">

		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Room Status Between Dates</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">View Room Status</li>
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
					<form action="{{ route('admin-panel.GetViewRoomStatus') }}" method="post" enctype="multipart/form-data">
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
								<h5>From Date <span class="text-danger">*</span></h5>
								<div class="controls" style="display:flex;">
									<input type="date" name="from_date" id="from_date" style="width:70%" class="form-control"> 
                                    <input type="time" name="from_time" id="from_time" style="width:20%; margin-left:5px;" class="form-control"> 
								</div>
								@error('from_date') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
							</div>
                        </div>
						<div class="col-6">
							<div class="form-group">
							  <h5>To date <span class="text-danger">*</span></h5>
							  <div class="controls" style="display:flex;">
								  <input type="date" name="to_date" id="to_date" style="width:70%" class="form-control"> 
                                  <input type="time" name="to_time" id="to_time"  style="width:20%; margin-left:5px;" class="form-control"> 
							  </div>
							  @error('to_date') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
						  </div>
					  </div>
					  </div>

						<div class="text-xs-right">
							<button type="button" class="btn btn-info" onclick="getRooms()">
                              <i class="bi bi-search"></i> Search
                            </button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>

				

			  <!-- /.row -->
			</div>
            <div class="box-body">
            <div class="row gy-4">
                     <div class="panel" id="withoutData" style="display:none;">
						<div class="panel-body">
							<h2>No data found</h2>
						</div>
					</div>
                    <div class="panel" id="withData" style="display:none;width:100%">
						<div class="panel-body">
							<div class="table-responsive">
                              <table class="table table-bordered table-hover align-middle text-center shadow-sm">
                                  <thead class="table-primary text-dark">
                                      <tr>
                                          <th scope="col">S.No</th>
                                          <th scope="col">Room No</th>
                                          <th scope="col">Category</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Beds</th>
                                          <th scope="col">Total Beds</th>
                                          <th scope="col">Available</th>
                                          <th scope="col">Occupied</th>
                                      </tr>
                                  </thead>
                                  <tbody id="searchData" class="table-group-divider">
                                      <!-- Data will be dynamically loaded here -->
                                  </tbody>
                              </table>
                          </div>

						</div>
					</div>
            </div>
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
  function getRooms() {
    $("#withoutData").hide();
    $("#withData").hide();
    $("#portData").hide();

    // Collect form inputs
    var from_date = $('#from_date').val();
    var from_time = $('#from_time').val();
    var to_date = $('#to_date').val();
    var to_time = $('#to_time').val();

    // Validate input
    if (from_date === "" || from_time === "" || to_date === "" || to_time === "") {
      alert('Please choose all fields.');
      return false;
    }

    // Clear table data
    $("#searchData").html("");

    // Build query string safely
    var DataUri = `from_date=${encodeURIComponent(from_date)}&from_time=${encodeURIComponent(from_time)}&to_date=${encodeURIComponent(to_date)}&to_time=${encodeURIComponent(to_time)}`;

    // Optional: show loading message
    $("#totalData").html("Searching...");

    // AJAX request
    $.ajax({
      url: "{{ url('/') }}/admin-panel/GetViewRoomStatus?" + DataUri,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        console.log(data);

        if (!data || data.length === 0 || data === 'no') {
          $("#withoutData").slideDown(1000);
          $("#withData").slideUp(1000);
          $("#totalData").html("No records found.");
        } else {
          for (var i = 0; i < data.length; i++) {
            let room = data[i];
            let beds = room.beds;

            let available = 0;
            let occupied = 0;

            let bedList = beds.map(bed => {
              if (bed.status === 'available') available++;
              if (bed.status === 'occupied') occupied++;
              let badgeClass = bed.status === 'available' ? 'success' : 'danger';
              return `<span class="badge bg-${badgeClass} me-1">${bed.bed_name} (${bed.status})</span>`;
            }).join('<br>');

            $('#searchData').append(`
              <tr>
                <td>${i + 1}</td>
                <td>${room.room_no}</td>
                <td>${room.room_cat}</td>
                <td>${room.room_status}</td>
                <td>${bedList}</td>
                <td>${beds.length}</td>
                <td>${available}</td>
                <td>${occupied}</td>
              </tr>
            `);
          }

          $("#withoutData").slideUp(1000);
          $("#withData").slideDown(1000);
          $("#totalData").html(`Total ${data.length} records found.`);
        }
      },
      error: function () {
        alert('Error fetching room status. Please try again.');
      }
    });
  }
</script>

@endsection
@section('ajax_script')

@endsection
