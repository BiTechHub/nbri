@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Test Category</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Test Category</li>
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
					<form action="{{ route('admin-panel.AddTestCategory') }}" method="post" enctype="multipart/form-data">
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
                         
                        <div class="col-md-4">
                          <div class="form-group">
                            <h5>Title <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="subject" class="form-control"> 
                            </div>							
                            @error('subject') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-4">
                          <div class="form-group">
                            <h5>विषय <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="subject_hi" class="form-control"> 
                            </div>							
                            @error('subject_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                       
                        <div class="col-md-4">
                          <div class="form-group">
                            <h5>Advrts No. <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="advt_no" class="form-control"> 
                            </div>							
                            @error('advt_no') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
					  	</div>
                      
                       
                        
						<div class="text-xs-right">
							<button type="submit" class="btn btn-info">Add Test</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
                <div class="box mt-20">
					<div class="box-header">
						<h4 class="box-title">Manage Test Category</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Serial No.</th>
										<th>Test Name</th>
										<th>Test ID</th>
                                       
                                        <th>Advt No.</th>
                                       
                                        
										<th>Created At</th>
                                        <th>Created By</th>
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
										<td>{{$item->test_name}}</td>
										<td>{{$item->id}}</td>
                                       
										<td>{{$item->advt_no}}</td>
                                        
										<td>{{$item->created_at}}</td>
                                        <td>{{$item->created_by}}</td>
										<td>
                                           <button class="btn btn-info" data-toggle="modal" type="button" data-target="#update_modal{{$item->id}}">
                                          <i class="fa fa-edit"></i>
                                        </button>
                                          
                                        <!-- update slider image  Shani-->
                                        <div class="modal fade" id="update_modal{{$item->id}}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Test Category</h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/update_testcat" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <input type="hidden" name="user_id" value="{{$item->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Test Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="menu" class="form-control"  value="{{$item->test_name}}"> 								</div>
                                                        @error('menu') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>टेस्ट नाम <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="menu_hi" class="form-control" value="{{$item->test_name_hi}}"> 								</div>
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
                                          
                                          
                                          <a href="{{url('/')}}/admin-panel/testdelete/{{$item->id}}" class="delete btn btn-danger"><i class="fa fa-trash"></i></a></td>

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

   function getBox(){
     var have = $('#have_lin').val();
     if(have == 'Yes'){
       $('#fln').hide();
       $('#dln').hide();
       $('#lnk').show();
     }else{
       $('#fln').show();
       $('#dln').show();
       $('#lnk').hide();
     }
   }
 </script>
<script>
(function ($) {
    $(function () {

        var addFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
            var $formGroupClone = $formGroup.clone();

            $(this)
                .toggleClass('btn-success btn-add btn-danger btn-remove')
                .html('–');

            $formGroupClone.find('input').val('');
            $formGroupClone.find('.concept').text('Phone');
            $formGroupClone.insertAfter($formGroup);

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', true);
            }
        };

        var removeFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', false);
            }

            $formGroup.remove();
        };

        var selectFormGroup = function (event) {
            event.preventDefault();

            var $selectGroup = $(this).closest('.input-group-select');
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();

            $selectGroup.find('.concept').text(concept);
            $selectGroup.find('.input-group-select-val').val(param);

        }

        var countFormGroup = function ($form) {
            return $form.find('.form-group').length;
        };

        $(document).on('click', '.btn-add', addFormGroup);
        $(document).on('click', '.btn-remove', removeFormGroup);
        $(document).on('click', '.dropdown-menu a', selectFormGroup);

    });
})(jQuery);


</script>
@endsection
