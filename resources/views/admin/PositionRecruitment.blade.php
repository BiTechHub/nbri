@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Change Position Of Recruitments</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Control</li>
							<li class="breadcrumb-item active" aria-current="page">Position Change</li>
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
					<h4 class="box-title">Select Recruitment Type</h4>
                    <div class="" style="float:right;">
                        <select name="stafftype" id="stafftype" class="form-control" style="width:200px;margin-left:20px">
    <option value="">Select Recruitment Type</option>
    @foreach($rec_type as $rec)
        <option value="{{ $rec->id }}">{{ $rec->name }}</option>
    @endforeach
</select>
                    </div>
                    <div class="" style="float:right;">
                        <select name="contype" id="contype" onchange="get_all_report()" class="form-control" style="margin-left:20px">
    <option value="">Please Select Advt No.</option>
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
                                    <th>Recruitment Type</th>
                                    <th>Advt No.</th>
									<th>Title</th>
									
                                    
                                    
                                    <th>Position</th>
                                    
                                   
								</tr>

							</thead>
							<tbody id="sortableRows"></tbody>
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
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

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

function get_all_report() {
    let staffId = $("#stafftype").val();
    let advtId = $("#contype").val();

    if(!advtId){
        alert('Please select Advertisement Number');
        return;
    }

    $.ajax({
        url: "{{ url('/admin-panel/recruitment-list') }}",
        type: "GET",
        data: {stafftype: staffId, contype: advtId},
        success: function(data){
            $("#sortableRows").empty();

            $.each(data, function(i, item){
                $("#sortableRows").append(`
                    <tr data-id="${item.id}">
                        <td>${i+1}</td>
                        <td>${item.rname}</td>
                        <td>${item.ad_no}</td>
                        <td>${item.title_en}</td>
                        <td>${item.position}</td>
                    </tr>
                `);
            });
        }
    });
}


$("#sortableRows").sortable({
    update: function() {
        let order = [];
        $("#sortableRows tr").each(function(index){
            order.push({
                id: $(this).data("id"),
                position: index + 1
            });
        });

        // Save ordering
        $.ajax({
            url: "{{ url('/admin-panel/update-position') }}",
            type: "POST",
            data: {
                order: order,
                _token: "{{ csrf_token() }}"
            },
            success: function(res){
                console.log("Order Updated");
            }
        });
    }
});
$('#stafftype').change(function () {
    let staffId = $(this).val();
    $("#contype").html('<option value="">Loading...</option>');

    $.ajax({
        url: "{{ url('/admin-panel/get-advertisement') }}/" + staffId,
        type: "GET",
        success: function(res){
            $("#contype").html('<option value="">Please Select Advt No.</option>');
            $.each(res, function(i, item){
                $("#contype").append(
                    '<option value="'+ item.id +'">'+ item.ad_no +'</option>'
                );
            });
        }
    });
});
</script>
@endsection
