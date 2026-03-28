@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Designation</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Designation</li>
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
					<form action="{{ route('admin-panel.SaveAddDeg') }}" method="post" enctype="multipart/form-data">
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
                         
                        <div class="col-md-5">
                          <div class="form-group">
                            <h5>Select Advrts No. <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <select name="advt_no" class="form-control">
                                <option>Please Select</option>
                                @foreach($ruchi as $swrn)
                                <option value="{{$swrn->advt_no}}">{{$swrn->advt_no}}</option>
                                @endforeach
                              </select>
                            </div>							
                            @error('advt_no') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                         <div class="col-md-3">
                          <div class="form-group">
                            <h5>Exam Post Code <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="post_code" class="form-control"> 
                            </div>							
                            @error('post_code') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <h5>Exam Post/Designation <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="deg" class="form-control"> 
                            </div>							
                            @error('deg') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                          </div>
                        </div>
                        
                        
					  	</div>
                      
                       <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom:10px;">

                                    <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                    <th>Paper Name</th>
                                    <th>Paper Start Date</th>
                                    <th>Paper Start Time</th>
                                    <th>Paper End Time</th>
                                    
                                    <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody >
                                    <tr class="form-group multiple-form-group">
                                        
                                        <td><input type="text" name="papername[]" class="form-control"></td>
                                        <td><input type="date" name="paper_start_date[]" class="form-control"></td>
                                        <td><input type="time" name="paper_start_time[]" class="form-control"></td>
                                        <td><input type="time" name="paper_end_time[]" class="form-control"></td>
                                        <td>
                                            <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-add">+</button>
                                            </span>
                                        </td>
                                        </tr>
                                    </tbody>

                                </table>
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
										
                                        <th>Post/Designation</th>
                                        <th>Advt No.</th>
                                        <th>Paper Detail</th>
                                        
										<th>Created At</th>
                                        <th>Created By</th>
                                        <th>Action</th>
									</tr>

								</thead>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($deg_item as $itemm)
									<tr>
										<td>{{$i}}</td>
										
                                        <td>{{$itemm->deg}}</td>
										<td>{{$itemm->advt_no}}</td>
                                        <td>
                                        @foreach($testp as $tp)
                                          @if($tp->test_id == $itemm->test_id)
                                        Paper: {{$tp->papername}} <br>
                                        Paper Date: {{$tp->paper_start_date}} <br>
                                        Paper Time: {{$tp->paper_start_time}} To {{$tp->paper_end_time}} <br>
                                          @endif
                                        @endforeach
                                        </td>
										<td>{{$itemm->created_at}}</td>
                                        <td>{{$itemm->created_by}}</td>
										<td>
                                       
                                          
                                          
                                          <a href="{{url('/')}}/admin-panel/degdelete/{{$itemm->id}}" class="delete btn btn-danger"><i class="fa fa-trash"></i></a></td>

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
