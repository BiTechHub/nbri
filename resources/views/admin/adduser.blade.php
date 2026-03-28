@extends('admin.layouts.master')
@section('main-section')

<div class="content-wrapper">
	  <div class="container">

		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add User</h3>
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
                     
                            <form method="post" action="">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="live-preview">
                <div class="row gy-4">
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" id="fullName" value="{{ old('full_name') }}">
                            @error('full_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" name="mobile" class="form-control" id="contact" value="{{ old('mobile') }}">
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="userType" class="form-label">User Type</label>
                            <select name="user_type" class="form-control" id="userType">
                                <option value="">Please Select</option>
                                <option value="Admin" {{ old('user_type') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="User" {{ old('user_type') == 'User' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('user_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="A" {{ old('status') == 'A' ? 'selected' : '' }}>Active</option>
                                <option value="I" {{ old('status') == 'I' ? 'selected' : '' }}>In-Active</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-md-6" style="margin-top:15px;">
                        <div>
                            <input type="submit" name="submit" value="Save" class="btn btn-primary" id="submitBtn">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

                     

				</div>
				<!-- /.col -->
			  </div>

				<div class="box mt-20">
					<div class="box-header">
						<h4 class="box-title">Manage Users</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Serial No.</th>
                                        <th>Name</th>
										<th>User Type</th>
										<th>UserName</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Action</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($tabledata as $item)
									<tr>
										<td>{{$i}}</td>
                                        <td>{{$item->name}}</td>
										<td>{{$item->user_type}}</td>
										<td>{{$item->username}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->created_at}}</td>

										<td><a href="{{url('/')}}/admin-panel/deluser/{{$item->id}}" class="delete">Delete</a></td>

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
