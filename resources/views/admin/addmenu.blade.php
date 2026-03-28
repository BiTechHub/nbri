@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Menu</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Menu</li>
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
					<form action="{{ route('admin-panel.uploadmenu') }}" method="post" enctype="multipart/form-data">
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
								<h5>Menu Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="menu" class="form-control"> 
								</div>
								@error('menu') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
                        </div>
						<div class="col-6">
							<div class="form-group">
								<h5>मेनू नाम <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="menu_hi" class="form-control"> 
								</div>
								@error('menu_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
						</div>
                      <div class="col-6">
							<div class="form-group">
								<h5>Position <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="position" class="form-control"> 
								</div>
								@error('menu_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
						</div>
                       <div class="col-6">
							<div class="form-group">
								<h5>Have SubCategory ? <span class="text-danger">*</span></h5>
								<div class="controls">
                                  <select name="havesub" id="havesub" class="form-control">
                                    <option>Please Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                  </select>
								</div>
								@error('havesub') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
						</div>
                      <div class="col-6" id="mnt" style="display:none;">
							<div class="form-group">
								<h5>Menu Type <span class="text-danger">*</span></h5>
								<div class="controls">
                                  <select name="menu_type" id="menu_type" class="form-control">
                                    <option>Please Select</option>
                                    <option value="Internal">Internal</option>
                                    <option value="External">External</option>
                                  </select>
								</div>
								@error('menu_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
						</div>
                        <div class="col-6" style="display:none;" id="link">
							<div class="form-group">
								<h5>External Link <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="link" class="form-control"> 
								</div>
								@error('link') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

							</div>
						</div>
					</div>
					<div class="text-xs-right">
						<button type="submit" class="btn btn-info">Submit</button>
					</div>
					</form>
				</div>
				<!-- /.col -->
			  </div>

				<div class="box mt-20">
					<div class="box-header">
						<h4 class="box-title">Manage Menu Item</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Serial No.</th>
										<th>Menu Name</th>
										<th>Menu Name(Hindi)</th>
										
                                        <th>Position</th>
                                        <th>Menu Type</th>
                                        <th>Link</th>
                                        <th>Action</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($ruchi as $item)
									<tr>
										<td>{{$i}}</td>
										<td>{{$item->menu_name}}</td>
										<td>{{$item->menu_hi}}</td>
										<td>{{$item->position}}</td>
                                        <td>{{$item->menu_type}}</td>
                                        <td>{{$item->link}}</td>

										<td>
                                           <button class="btn btn-info" data-toggle="modal" type="button" data-target="#update_modal{{$item->id}}">
                                          <i class="fa fa-edit"></i>
                                        </button>
                                          
                                        <!-- update slider image  Shani-->
                                        <div class="modal fade" id="update_modal{{$item->id}}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Menu</h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/update_menu" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <input type="hidden" name="user_id" value="{{$item->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Menu Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="menu" class="form-control"  value="{{$item->menu_name}}"> 								</div>
                                                        @error('menu') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>मेनू नाम <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="menu_hi" class="form-control" value="{{$item->menu_hi}}"> 								</div>
                                                        @error('menu_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

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
                                          
                                          
                                          <a href="{{url('/')}}/admin-panel/menudel/{{$item->id}}" class="delete btn btn-danger"><i class="fa fa-trash"></i></a></td>

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
    $('#menu_type').on('change', function () {
        if ($(this).val() === 'External') {
            $('#link').show();
        } else {
            $('#link').hide();
        }
    });
</script>
<script>
    $('#havesub').on('change', function () {
        if ($(this).val() === 'No') {
            $('#mnt').show();
        } else {
            $('#mnt').hide();
        }
    });
</script>


@endsection
