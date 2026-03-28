@extends('admin.layouts.master')
@section('main-section')

<div class="content-wrapper">
	  <div class="container">

		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Childmenu</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Childmenu</li>
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
					<form action="{{ route('admin-panel.uploadchildmenu') }}" method="post" enctype="multipart/form-data">
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
								<h5>Childmenu Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="childmenu" class="form-control"> 
								</div>
								@error('childmenu') 
									<div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> 
								@enderror
							</div>
                        </div>
						<div class="col-6">
							<div class="form-group">
							  <h5>चाइल्डमेनू नाम <span class="text-danger">*</span></h5>
							  <div class="controls">
								  <input type="text" name="childmenu_hi" class="form-control"> 
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
						<h4 class="box-title">Manage Submenu Item</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Serial No.</th>
                                        <th>Childmenu Name (En)</th>
										<th>Childmenu Name (Hi)</th>

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
										<td>{{$item->childmenu_hi}}</td>

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

                                                <form action="{{url('/')}}/admin-panel/update_childmenu" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <input type="hidden" name="user_id" value="{{$item->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Menu Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="childmenu" class="form-control"  value="{{$item->child_menu}}"> 								</div>
                                                        @error('childmenu') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>मेनू नाम <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="childmenu_hi" class="form-control" value="{{$item->childmenu_hi}}"> 								</div>
                                                        @error('childmenu_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

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
										<a href="{{url('/')}}/admin-panel/childmenudel/{{$item->id}}" class="delete">Delete</a></td>

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
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].sub_name + '</option>';
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
