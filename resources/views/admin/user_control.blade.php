@extends('admin.layouts.master')
@section('main-section')

<div class="content-wrapper">
	  <div class="container">

		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">User Control Panel</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Control Panel</li>
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
					
                    <div class="row">
                        <div class="col-lg-12">
                            <select id="user" onchange="getDetail(this.value);" class="form-control">
                              <option value="">--Select User--</option>
                              @foreach($userslist as $value)
                              <option value="{{$value->id}}">{{$value->username}}--{{$value->user_type}}</option>
                              @endforeach
                            </select>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                   <div class="row">
                        <div class="col-lg-12 block1">
                            <div class="table-responsive">
                            <table class="table color-table primary-table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Menu</th>
                                        <th>Sub Menu</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>View</th>
                                        <th>Excel</th>
                                    </tr>
                                </thead>
                                <tbody id="tData"></tbody>
                            </table>
                        </div>
                        </div>
                        <!--end col-->
                    </div>
                     

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
<script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
            
        });

        function statusChange(type,id)
        {
            
            if($('#'+type+''+id).is(':checked')){
                $.ajax({
                    url:"{{url('/')}}/admin-panel/changeUserControl",
                    data:"id="+id+"&type="+type+"&status=Y",
                    type:"get",
                    //dataType:'json',
                    success:function(data){
                        //swal("Service Activated");
                        $("#errorTopMsg").html("Service successfully activated please refresh page.");
                        $(".alerttop").addClass('alert-success')
                        $(".alerttop").fadeToggle(350);
                      
                    }
                });
             }else{
                  $.ajax({
                    url:"{{url('/')}}/admin-panel/changeUserControl",
                    data:"id="+id+"&type="+type+"&status=N",
                    type:"get",
                    //dataType:'json',
                    success:function(data){
                        //swal("Service De-activated");
                        $("#errorTopMsg").html("Service successfully Stopped please refresh page.");
                        $(".alerttop").addClass('alert-danger')
                        $(".alerttop").fadeToggle(350);
                      
                    }
                });
             }
            
        }
        function getDetail(id)
        {
            $("#tData").html("");
            
            
            $.ajax({
                url:"{{url('/')}}/admin-panel/UserControlList/"+id,
                dataType:'json',
                success:function(data){
                    //console.log(data);
                    var msg="";
                    var fnbtn;
                    for(var i=0;i<data.length;i++)
                    {
                        if(data[i].fn_add=='Y'){fnaddbtn='Checked'}else {fnaddbtn='';}
                        if(data[i].fn_delete=='Y'){fndelbtn='Checked'}else {fndelbtn='';}
                        if(data[i].fn_update=='Y'){fneditbtn='Checked'}else {fneditbtn='';}
                        if(data[i].fn_view=='Y'){fnviewbtn='Checked'}else {fnviewbtn='';}
                        if(data[i].fn_excel=='Y'){fnexcelbtn='Checked'}else {fnexcelbtn='';}
                        msg=msg+'<tr><td>'+(parseInt(i)+1)+'</td>'+
                        '<td>'+data[i].menu_name+'</td>'+
                        '<td>'+data[i].sub_menu+'</td>'+
                        '<td><input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" data-size="small" id="add'+data[i].id+'" onchange="statusChange(\'add\','+data[i].id+');" '+fnaddbtn+'></td>'+
                        '<td><input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" data-size="small" id="edit'+data[i].id+'" onchange="statusChange(\'edit\','+data[i].id+');" '+fneditbtn+'></td>'+
                        '<td><input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" data-size="small" id="delete'+data[i].id+'" onchange="statusChange(\'delete\','+data[i].id+');" '+fndelbtn+'></td>'+
                        '<td><input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" data-size="small" id="view'+data[i].id+'" onchange="statusChange(\'view\','+data[i].id+');" '+fnviewbtn+'></td>'+
                        '<td><input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" data-size="small" id="excel'+data[i].id+'" onchange="statusChange(\'excel\','+data[i].id+');" '+fnexcelbtn+'></td></tr>';
                    }
                    //$("#tData").append(msg);
                    $("#tData").html(msg);
                    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                    $('.js-switch').each(function() {
                        new Switchery($(this)[0], $(this).data());

                    });
                    $('div.block1').unblock();
                }
            });
        }
    </script>
@endsection

