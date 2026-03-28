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
					<h3 class="page-title">Manage Extra Cols</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}/admin-panel/ManageNewPlants">Manage Extra Cols</a></li>
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
					<form action="{{ route('admin-panel.SaveNewCols') }}" method="post" enctype="multipart/form-data">
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
                        <input type="hidden" name="col_id" value="{{$id}}"/>
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
							<button type="submit" class="btn btn-info">Add Cols</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
      <div class="box-body">
          <div class="row">

          </div>
          <div class="box">
            <div class="box-header">
              @if(session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif
   
            </div>
            <div class="box-body p-0">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Col. Name</th>
                      <th>Col. Data</th>
                     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($plants_data as $plantss)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{ $plantss->column_name }}</td>
                      <td>{{ $plantss->column_value }}</td>
                     
                      
                      <td>
                      <button class="btn btn-info" data-toggle="modal" type="button" data-target="#update_modal{{$plantss->id}}">
                                          <i class="fa fa-edit"></i>
                                        </button>
                                          
                                        <!-- update slider image  Shani-->
                                        <div class="modal fade" id="update_modal{{$plantss->id}}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Cols</h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="#" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>Cols. Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="cols_name" id="cols_name" value="{{ $plantss->column_name }}" class="form-control"> 
                                                        
                                                        </div>							
                                                        @error('cols_name') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <input type="hidden" name="col_id" value="{{$plantss->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Cols Data <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="cols_data" id="cols_data" value="{{ $plantss->column_value }}" class="form-control"> 
                                                        </div>							
                                                        @error('cols_data') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                                                      </div>
                                                    </div>
                                                   
                                                  </div>
                                                  <div style="clear:both;"></div>
                                                  <div class="modal-footer">
                                                    <button name="update" class="btn btn-primary" type="submit"><span>&#10004;</span> Update</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                  </div>
                                                </form>

                                              </div>
                                            </div>
                                          </div>
                                          </div>  
                      <a href="{{url('/')}}/admin-panel/deletenewcol/{{$plantss->id}}" class=" btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      
                      </td>
                    </tr>
                    @endforeach
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


@endsection
