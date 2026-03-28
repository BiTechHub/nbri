@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Advertisement Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								
								
								<li class="breadcrumb-item" aria-current="page"><a href="{{url('/')}}/admin-panel/ManageAdvertisementDetail" class="btn btn-primary" style="color:#fff">Manage Advertisement Details</a></li>
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
					<form action="{{ route('admin-panel.AddAdvertisementDetail') }}" method="post" enctype="multipart/form-data">
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
						<div class="col-4">
							<div class="form-group">
								<h5>Select Main Menu <span class="text-danger">*</span></h5>
								<div class="controls">
                                  <select name="rec_type" id="rec_type" required class="form-control">
                                    <option selected value="">--Please Select--</option>
                                    @foreach($minu as $minus)
                                     <option value="{{$minus->id}}"   >{{ $minus->name }}</option>
                                    @endforeach
                                  </select> 
								</div>
								@error('rec_type') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
							</div>
						</div>
						<div class="col-4" style="display:none" id="advt">
                          	<div class="form-group">
								<h5>Advertisement Number <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="advt_no" id="advt_no" class="form-control">
                                    
                                  </select> 
                              </div>
							</div>
							@error('advt_no') 
								<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
							@enderror
                        </div>
                      <div class="col-4" style="display:none" id="pdf">
                          	<div class="form-group">
								<h5>Select PDF/Link <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="con_type" id="con_type" class="form-control">
                                      <option value="">Please Select</option>
                                      <option value="pdf">PDF</option>
                                      <option value="link">Link</option>
                                      <option value="none">None</option>
                                  </select> 
                              </div>
							</div>
							@error('advt_no') 
								<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
							@enderror
                        </div>
                      </div>
                      <div class="row">
                       <div class="col-6" style="" >
                          	<div class="form-group">
								<h5>Title (English) <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea class="form-control" name="title_en"></textarea>
                              </div>
							</div>
							@error('title_en') 
								<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
							@enderror
                        </div>
                      <div class="col-6" style="" >
                          	<div class="form-group">
								<h5>Title (Hindi) <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea class="form-control" name="title_hi"></textarea>
                              </div>
							</div>
							@error('title_hi') 
								<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
							@enderror
                        </div>
                        <div class="col-4" style="display:none;" id="up_link">
                          	<div class="form-group">
								<h5>Enter Full Link <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" class="form-control" name="link">
                              </div>
							</div>
							@error('link') 
								<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
							@enderror
                        </div>
                        <div class="col-4" style="display:none;" id="up_file">
                          	<div class="form-group">
								<h5>Upload File <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" class="form-control" name="pdf_file">
                              </div>
							</div>
							@error('link') 
								<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
							@enderror
                        </div>
						
					</div>
					<div class="text-xs-right">
						<button type="submit" class="btn btn-info">Submit</button>
					</div>
					</form>
				</div>
				<!-- /.col -->
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

        // Recruitment Type Dropdown Change Event
        $('#rec_type').on('change', function () {
            var idrec = $(this).val();
            var $advtNo = $('#advt_no');

            $advtNo.empty(); // Clear previous options

            if (idrec == 1 || idrec == 2 || idrec == 3) {
                $('#advt').show();
                $('#pdf').show();
            } else {
                $('#advt').hide();
                $('#pdf').hide();
            }

            $.ajax({
                url: "{{ url('admin-panel/fetch-rectype') }}",
                type: "POST",
                data: {
                    rec_id: idrec,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    $advtNo.append('<option value="">-- Select Advt No. --</option>');
                    $.each(result.advt_no, function (key, value) {
                        $advtNo.append('<option value="' + value.id + '">' + value.ad_no + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });

    });
</script>
<script>
  document.getElementById('con_type').addEventListener('change', function () {
    const value = this.value;
    const div1 = document.getElementById('up_link'); // get by div ID
    const div2 = document.getElementById('up_file'); // get by div ID

    if (value === 'pdf') {
      div2.style.display = 'block';
      div1.style.display = 'none';
    } else if(value === 'link') {
       div2.style.display = 'none';
      div1.style.display = 'block';
    }else{
      div2.style.display = 'none';
      div1.style.display = 'none'; 
    }
  });
</script>
@endsection
