@extends('admin.layouts.master')
@section('main-section')
<style>
  table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        button {
            padding: 5px 10px;
            margin: 0 2px;
            cursor: pointer;
        }
        input {
            width: 90%;
            padding: 5px;
        }
        .alert {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 15px;
        }
</style>
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add New Plants</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}/admin-panel/ManageNewPlants">Manage New Plants</a></li>
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
					<form action="{{ route('admin-panel.SaveAddNewPlants') }}" method="post" enctype="multipart/form-data">
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
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Plant Code <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <select readonly name="cat" id="cat_id" class="form-control">
                              <option>Please Select Category</option>
                                @foreach($section_cat as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cat }}</option>
                                @endforeach
                              </select>
                            </div>							
                            @error('plant_code') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <h5>Plant Code <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" readonly name="plant_code" id="plant_code" class="form-control"> 
                            </div>							
                            @error('plant_code') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                          <div class="col-md-6">
                          <div class="form-group">
								<h5>Plant Name (English)<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="plant_name_en" placeholder="Enter Plant Name In English" class="form-control">
									 
								  </div>
								@error('plant_name_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
                            </div>
                        <div class="col-md-6">
                          <div class="form-group">
								<h5>Plant Name (Hindi)<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="plant_name_hi" placeholder="Enter Plant Name In Hindi" class="form-control">
									 
								  </div>
								@error('plant_name_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
                            </div>
                         <div class="col-md-6">
                          <div class="form-group">
                            <h5>Author <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="author" class="form-control" placeholder="Enter Author Name"> 
                            </div>							
                            @error('author') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Family <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="family_en" class="form-control" placeholder="Enter Family Of Plant"> 
                            </div>							
                            @error('family_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                       
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Common Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="com_name_en" class="form-control" placeholder="Enter Common Name Of Plant"> 
                            </div>							
                            @error('com_name_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Native </h5>
                            <div class="controls">
                              <input type="text" name="native_en" class="form-control" placeholder="Enter Native Of Plant"> 
                            </div>							
                            @error('native_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Uses </h5>
                            <div class="controls">
                              <input type="text" name="uses_en" class="form-control" placeholder="Enter Uses Of Plant In English"> 
                            </div>							
                            @error('uses_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Lattitude </h5>
                            <div class="controls">
                              <input type="text" name="latitude" class="form-control" placeholder="Enter Plant Lattitude"> 
                            </div>							
                            @error('latitude') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Longitude </h5>
                            <div class="controls">
                              <input type="text" name="longitude" class="form-control" placeholder="Enter Plant Longitude"> 
                            </div>							
                            @error('longitude') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Locality </h5>
                            <div class="controls">
                              <input type="text" name="locality" class="form-control" placeholder="Enter Plant Locality"> 
                            </div>							
                            @error('locality') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Upload Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="file" name="file_name" class="form-control"> 
                            </div>							
                            @error('file_name') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                  
                        </div>
                        <div class="col-md-12">
                          <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Column Name</th>
                                    <th>Column Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="serial_no[]" required></td>
                                    <td><input type="text" name="column_name[]" required></td>
                                    <td><input type="text" name="column_value[]" required></td>
                                    <td>
                                        <button type="button" class="addBtn">+</button>
                                        <button type="button" class="removeBtn">-</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-info">Add Plant</button>
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
<script>
        const table = document.querySelector('#dataTable tbody');

        // Add or remove rows
        table.addEventListener('click', function(e) {
            if (e.target.classList.contains('addBtn')) {
                const newRow = e.target.closest('tr').cloneNode(true);
                newRow.querySelectorAll('input').forEach(input => input.value = '');
                table.appendChild(newRow);
            }

            if (e.target.classList.contains('removeBtn')) {
                const rows = table.querySelectorAll('tr');
                if (rows.length > 1) {
                    e.target.closest('tr').remove();
                } else {
                    alert("At least one row is required!");
                }
            }
        });
    </script>
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
    $(document).on('change', '#cat_id', function () {
        var cat_id = $(this).val();

        if (cat_id) {
            $.ajax({
                url: "{{ route('get.plant.code') }}",  // Laravel route
                type: "GET",
                data: { cat_id: cat_id },
                success: function (data) {
                    // If plant_code is an input field
                    $('#plant_code').val(data);

                    // If plant_code is a <div> or <span>
                    // $('#plant_code').text(data);
                },
                error: function (xhr) {
                    alert("Error: " + xhr.status + " - " + xhr.statusText);
                }
            });
        }
    });
</script>

@endsection
