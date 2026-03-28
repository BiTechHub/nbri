@extends('admin.layouts.master')
@section('main-section')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">

<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Staff Content</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}/admin-panel/managestaffcontent" style="color:red">Manage Staff Content</a></li>
							</ol>
						</nav>
					</div>
          
				</div>
        <button class="btn btn-info" data-toggle="modal" type="button" data-target="#update_modal{{$scontent->id}}">
                                          <i class="fa fa-edit"></i> Update Profile
                                        </button>
                                       
                                        <div class="modal fade" id="update_modal{{$scontent->id}}" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Profile of <b style="color:red;">{{$scontent->name}}</b></h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/update_staff_profile" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>Select Language <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <select name="lang" id="lang" class="form-control">
                                                            <option value="">Please Select</option>
                                                            
                                                            <option value="English">English</option>
                                                            <option value="Hindi">Hindi</option>
                                                          </select> 		
                                                         </div>
                                                        @error('lang') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <input type="hidden" name="user_id" value="{{$scontent->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Select Profile Master <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <select name="pf_type" id="pf_type" onchange="getPfContent();" class="form-control">
                                                            <option value="">Please Select</option>
                                                            @foreach($stmm as $pf)
                                                            <option value="{{$pf->id}}">{{$pf->name}} / {{$pf->name_hi}}</option>
                                                            @endforeach
                                                          </select> 
                                                          <input type="hidden" name="staff_id" id="staff_id" value="{{$scontent->id}}" class="form-control">
                                                         </div>
                                                        @error('pf_type') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                       <div class="form-group" id="">
                    
                                                        <textarea class="textarea ishank" id="summernote"  name="content" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                          <span class="text-danger"> @error('content') {{$message}} @enderror </span>

                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div style="clear:both;"></div>
                                                  <div class="modal-footer">
                                                    <button name="update" class="btn btn-primary" type="submit"><span>&#10004;</span> Save</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                  </div>
                                                </form>

                                              </div>
                                            </div>
                                          </div>
                                          </div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-12">


			  <!-- /.box -->

			  <div class="box">

				<!-- /.box-header -->
				<div class="box-body">
				  <form action="{{ route('admin-panel.updatestaffcontent') }}" method="post" enctype="multipart/form-data">
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
                 <div class="col-md-3">
                  <div class="form-group">
                      <h5>Main Menu Name <span class="text-danger">*</span></h5>
                      <div class="controls">
                         @foreach($swt as $ddt)
                         @if($scontent->menu == $ddt->id)
                        <input type="text" readonly name="" value="{{$ddt->menu_name}}" id="main_cat" class="form-control">
                         @endif
                        @endforeach
                        
                        <span class="text-danger"> @error('main') {{$message}} @enderror </span>
                    </div>
                  </div>
                 </div>
                  <div class="col-md-3">
                  <div class="form-group" id="">
                      <h5>Sub Menu Name (If Any) <span class="text-danger">*</span></h5>
                      <div class="controls">
                        
                      
                        <select name="sub_area_menu" class="form-control">
                          <option>Please Select</option>
                          @foreach($swtt as $dtt)
                          <option @if($scontent->submenu == $dtt->id) selected @endif value="{{$dtt->id}}">{{$dtt->sub_name}}</option>
                          @endforeach
                        </select>
                       
                       
                        <span class="text-danger"> @error('sub_area_menu') {{$message}} @enderror </span>
                    </div>
                  </div>
                    </div>
                    <div class="col-md-3">
                  <div class="form-group" id="">
                      <h5>Child Menu Name (If Any) <span class="text-danger">*</span></h5>
                      <div class="controls">
                         @foreach($swttt as $ddt)
                         @if($scontent->childmenu == $ddt->id)
                        <input type="text" readonly name="" value="{{$ddt->child_menu}}" id="main_cat" class="form-control">
                         @endif
                        @endforeach
                    <span class="text-danger"> @error('child') {{$message}} @enderror </span>
                    </div>
                  </div>
                       </div>
                      <div class="col-md-3">
                  <div class="form-group" id="edtrpdf">
                    <h5>Position <span class="text-danger">*</span></h5>
                    <div class="controls">
                       <input type="text" name="position" readonly id="position" value="{{$scontent->position}}" class="form-control">
                      <span class="text-danger"> @error('position') {{$message}} @enderror </span>
                    </div>
                  </div>
                      </div>
                    </div>
                 
                  <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <h5>Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" onfocus="return verifyPosition();" name="name"  value="{{$scontent->name}}" class="form-control">
                      <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>नाम <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="name_hi" value="{{$scontent->name_hi}}" class="form-control">
                      <span class="text-danger"> @error('heading') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Designation <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <select name="deg" class="form-control">
                       <option>Please Select</option>
                       @foreach($stm as $smw)
                       <option @if($scontent->deg == $smw->child_menu) selected @endif value="{{$smw->id}}">{{$smw->child_menu}}</option>
                        @endforeach
                      </select>
                      <input type="hidden" name="id" value="{{$scontent->id}}">
                      <span class="text-danger"> @error('deg') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <h5>Designation (Hindi) <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <select name="deg_hi" class="form-control">
                       <option>Please Select</option>
                       @foreach($stm as $smw)
                       <option @if($scontent->deg_hi == $smw->childmenu_hi) selected @endif value="{{$smw->id}}">{{$smw->childmenu_hi}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger"> @error('deg_hi') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    @if($scontent->submenu != '112')
                    <div class="col-md-6">
                    <div class="form-group">
                      <h5>Area <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="area[]" class="form-control" multiple>
                          <option value="">Please Select Area</option>
                          @php
                            $selectedAreas = explode(',', $scontent->area);
                          @endphp
                          @foreach($StaffArea as $aa)
                            <option value="{{ $aa->id }}" 
                              @if(in_array($aa->id, $selectedAreas)) selected @endif>
                              {{ $aa->area }}
                            </option>
                          @endforeach
                        </select>
                        <span class="text-danger">@error('area') {{ $message }} @enderror</span>
                      </div>
                    </div>
                  </div>
                   @endif
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Address <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="address" value="{{$scontent->address}}" class="form-control">
                      <span class="text-danger"> @error('address') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>पता <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="address_hi" value="{{$scontent->address_hi}}" class="form-control">
                      <span class="text-danger"> @error('address_hi') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Email Id <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="email" name="email" value="{{$scontent->email}}" class="form-control">
                      <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    <h5>Contact <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="contact" value="{{$scontent->contact}}" class="form-control">
                      <span class="text-danger"> @error('contact') {{$message}} @enderror </span>
                    </div>
                  </div>
                   </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                  <div class="form-group" id="edtrpdf">
                    <span><img src="{{url('/')}}/uploads/staffPics/{{$scontent->image}}" style="width:100px;height:100px;"></span>
                    <h5>Change Profile Photo <span class="text-danger">*</span></h5>
                    <div class="controls">
                       <input type="file" name="image" class="form-control">
                      <span class="text-danger"> @error('image') {{$message}} @enderror </span>
                    </div>
                  </div>
                      </div>
                    <div class="col-md-6">
                  <div class="form-group" id="edtrpdf">
                    <span><a href="{{url('/')}}/uploads/staffResume/{{$scontent->resume}}" target="_blank">View Old Resume</a></span>
                    <h5>Change Resume 
                      {{-- <span class="text-danger">*</span> --}}
                    </h5>
                    <div class="controls">
                       <input type="file" name="resume" class="form-control" accept="application/pdf">
                      <span class="text-danger"> @error('resume') {{$message}} @enderror </span>
                    </div>
                  </div>
                      </div>
                    
                    </div>

                  
                    <br>
              <div class="text-xs-right">
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
				  </form>
				</div>
			  </div>

			  <!-- /.box -->

			</div>
			<!-- /.col-->
		  </div>
		  <!-- ./row -->
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
$(document).ready(function () {
  $('#mee').hide();
});
$(document).ready(function () {
  $('#chdl').hide();
});

$(document).ready(function () {
  var Cat = $('#main_cat').val();

        $.ajax({
            url: "{{ url('/') }}/subcatfetch/" + Cat, 
            dataType: 'json',
            success: function (result) {
                if ($.isEmptyObject(result)) {
                    $('#mee').hide();
                    $('#chdl').hide();
                } else {
                    $('#mee').show();
                }

                var msg = '<option value="">--Select Sub Category--</option>';
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].sub_name + '</option>';
                }
                $("#sub").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log error messages for debugging
            }
        });
});
$(document).ready(function () {
   var Cat = $('#sub').val();

        $.ajax({
            url: "{{ url('/') }}/staffcatfetch/" + Cat,
            dataType: 'json',
            success: function (result) {
                if ($.isEmptyObject(result)) {
                    $('#chdl').hide();
                } else {
                    $('#chdl').show();
                }

                var msg = '<option value="">--Select child Category--</option>';
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].child_menu + '</option>';
                }
                $("#child").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
});  
   
$(document).ready(function () {
    $('#main_cat').on('change', function () {
        var Cat = this.value;

        $.ajax({
            url: "{{ url('/') }}/subcatfetch/" + Cat, 
            dataType: 'json',
            success: function (result) {
                if ($.isEmptyObject(result)) {
                    $('#mee').hide();
                    $('#chdl').hide();
                } else {
                    $('#mee').show();
                }

                var msg = '<option value="">--Select Sub Category--</option>';
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].sub_name + '</option>';
                }
                $("#sub").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log error messages for debugging
            }
        });
    });
});

   $(document).ready(function () {
    $('#sub').on('change', function () {
        var Cat = this.value;

        $.ajax({
            url: "{{ url('/') }}/staffcatfetch/" + Cat,
            dataType: 'json',
            success: function (result) {
                if ($.isEmptyObject(result)) {
                    $('#chdl').hide();
                } else {
                    $('#chdl').show();
                }

                var msg = '<option value="">--Select child Category--</option>';
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].child_menu + '</option>';
                }
                $("#child").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    });
});

   
   
                    $(document).ready(function () {
                        $('#edtr').hide();
                        $('#con_type').on('change', function () {
                        if(this.value == 'Text'){
                            $('#edtr').show();
                          	$('#edtrpdf').hide();
                        }else{
                            $('#edtr').hide();
                          	$('#edtrpdf').show();
                        }
                      });
                    });
   
   function verifyPosition() {
       var ch_cat = $('#child').val();
       var ch_po = $('#position').val();
                $.ajax({
                    url: "{{ url('/') }}/verifyPosition/" + ch_cat + "/" + ch_po,
                    success: function(data) {
                        console.log(data);
                        if (data != "") {
                            $("#position").val("");
                            alert("Position not available.");
                        }
                    }
                });
        }
   function getPfContent() {
    var ch_cat = $('#pf_type').val();
    var ch_po = $('#lang').val();
    var st_id = $('#staff_id').val();

    $.ajax({
        url: "{{ url('/') }}/getProfileContent/" + 
             encodeURIComponent(ch_cat) + "/" + 
             encodeURIComponent(ch_po) + "/" + 
             encodeURIComponent(st_id),
        method: "GET",
        success: function(data) {
            console.log("Response Data:", data);
            if (data.status === "SUCCESS" && data.data.length > 0 && data.data[0].content) {
                $('#summernote').summernote('code', data.data[0].content);
            } else {
                console.warn("No content found.");
                $('#summernote').summernote('code', ''); // Clear content
            }
        },
        error: function(xhr, status, error) {
            console.error("Error fetching profile content:", error);
        }
    });
}


 </script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
 <script>
$('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 400,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
	  </script>
	 @endsection
