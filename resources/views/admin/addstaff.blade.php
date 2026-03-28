@extends('admin.layouts.master')
@section('main-section')

<div class="content-wrapper">
	  <div class="container">

		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Our People</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Our People</li>
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
					<form action="{{ route('admin-panel.uploadaddstaff') }}" method="post" enctype="multipart/form-data">
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
						<div class="col-12">
							<div class="form-group">
								<h5>Select Main Menu <span class="text-danger">*</span></h5>
								<div class="controls">
                                  <select name="main_cat" id="menu_name" onchange="sub_menu(this.value);" required class="form-control">
                                    <option selected value="">--Please Select--</option>
                                    @foreach($minu as $minus)
                                     <option value="{{ $minus->id }}">{{ $minus->menu_name }}</option>
                                    @endforeach
                                  </select> 
								</div>
								@error('menu_name') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
							</div>
						</div>
						<div class="col-12">
                            <div class="form-group">
								<h5>Select Sub Menu <span class="text-danger">*</span></h5>
								<div class="controls">
                                  <select name="sub_menu" id="sub_menuu" class="form-control">
                                  </select> 
								</div>
								@error('sub_menu') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
							</div>
						</div>
						<div class="col-6">
                          	<div class="form-group">
								<h5>Child Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="childcat" class="form-control"> 
								</div>
								@error('childmenu') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
							</div>
                        </div>
						<div class="col-6">
							<div class="form-group">
							  <h5>चचाइल्ड केटेगरी <span class="text-danger">*</span></h5>
							  <div class="controls">
								  <input type="text" name="childcat_hi" class="form-control"> 
							  </div>
							  @error('childmenu_hi') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
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
						<h4 class="box-title">Manage Staff Category</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Serial No.</th>
                                        <th>Category Name</th>
										<th>Submenu Name</th>
										<th>Main Menu Name</th>
                                        <th>Position</th>
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
                                        <td>{{$item->child_menu}}</td>
										<td>{{$item->sub_name}}</td>
										<td>{{$item->menu_name}}</td>
                                        <td>{{$item->position}}</td>
										<td><a data-toggle="modal" type="button" class="btn btn-info" data-target="#update_modal{{$item->id}}" style="color:#fff"><i class="fa fa-edit"></i></a>
                                          <div class="modal fade" id="update_modal{{$item->id}}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Staff Category</h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/uploadeditstaff" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <h5>Child Category <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="hidden" name="id" value="{{$item->id}}" class="form-control"> 
                                                                    <input type="text" name="childcat" value="{{$item->child_menu}}" class="form-control"> 
                                                                </div>
                                                                @error('childmenu') 
                                                                    <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                              <h5>चचाइल्ड केटेगरी <span class="text-danger">*</span></h5>
                                                              <div class="controls">
                                                                  <input type="text" name="childcat_hi" value="{{$item->childmenu_hi}}" class="form-control"> 
                                                              </div>
                                                              @error('childmenu_hi') 
                                                                    <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
                                                                @enderror
                                                          </div>
                                                      </div>
                                                      <div class="col-6">
                                                            <div class="form-group">
                                                              <h5>Position <span class="text-danger">*</span></h5>
                                                              <div class="controls">
                                                                  <input type="text" name="position" value="{{$item->position}}" class="form-control"> 
                                                              </div>
                                                              @error('position') 
                                                                    <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
                                                                @enderror
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
                                          <a href="{{url('/')}}/admin-panel/staffdel/{{$item->id}}" class="delete btn btn-danger"><i class="fa fa-trash"></i></a></td>

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

@endsection
@section('ajax_script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $('#menu_name').change(function(){
    var nid = $(this).val();
    if(nid){
        $.ajax({
            url: "{{ url('/') }}/subcatfetch/" + nid, 
            dataType: 'json',
            success: function (result) {
                var msg = '<option value="">--Select Sub Category--</option>';
                for (var i = 0; i < result.length; i++) {
                    if(result[i].sub_name != 'Director'){
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].sub_name + '</option>';
                    }
                }
                $("#sub_menuu").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log error messages for debugging
            }
        });
    }
});

    </script>
@endsection
