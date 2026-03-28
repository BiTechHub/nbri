@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Manage Sitecontent</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Control</li>
							<li class="breadcrumb-item active" aria-current="page">Manage Sitecontent</li>
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


			<div class="box mt-20">
				<div class="box-header">
					<h4 class="box-title">Manage Sitecontent</h4>
                    <div class="" style="float:right;">
                        <select name="contype" id="contype">
                        <option value="" selected>Please Select Content Type</option>
                        <option value="Text">Text Contents</option>
                        <option value="Pdf">Pdf File Uploaded Contents</option>
                        </select>
                    </div>
				</div>
				<div class="box-body" id="textcon">
					<div class="table-responsive">
						<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Heading</th>
									<!-- <th>Image</th> --->
                                    <th>Category Name</th>
									<th>Sub Category</th>
                                    <!--<th>Child Category</th>-->
									<th>Language</th>
                                    <th>Edit</th>
                                  <th>Delete</th>
								</tr>

							</thead>
							<tbody>
								@php
								$i=1;
								@endphp
								@foreach($scontent as $item)
								<tr>
									<td>{{$i}}</td>
									<td>{{$item->heading}}</td>
									<!-- <td><img src="{{url('/')}}/uploads/{{$item->image}}" style="width:300px;height:100px;"></td>-->
                                    <td>
                                      {{DB::table('menus')->where('id', $item->main_cat)->first()->menu_name}}
                                  </td>
                                      <td>
                                        @php
                                        $submenu = DB::table('submenus')->where('id', $item->sub_cat)->first();
                                        @endphp

                                        @if($submenu)
                                        {{ $submenu->sub_name }}
                                        @endif
                                      </td>
                                      <!--<td>{{$item->child_cat}}</td>-->
                                  <td>{{$item->language}}</td>
									<td><a href="{{url('/')}}/admin-panel/editsitecontent/{{$item->id}}" class="btn btn-success">Edit</a></td>

									<td><a href="{{url('/')}}/admin-panel/delsitecontent/{{$item->id}}" class="delete btn btn-danger">Delete</a></td>

								</tr>
								@php
								$i++;
								@endphp
                              @endforeach
							</tbody>

						</table>
					</div>
				</div>

                <div class="box-body" id="pdfcon">
					<div class="table-responsive">
						<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Heading</th>
                                    <th>Category Name</th>
									<th>Sub Category</th>
                                    <th>Language</th>
                                    <th>Edit</th>
                                  <th>Delete</th>
								</tr>

							</thead>
							<tbody>
								@php
								$i=1;
								@endphp
								@foreach($scontents as $item)
								<tr>
									<td>{{$i}}</td>
									<td><a href="{{url('/')}}/uploads/{{$item->image}}" download="download">{{$item->heading}}</a></td>
									
									
									
                                  <td>
                                    {{DB::table('menus')->where('id', $item->main_cat)->first()->menu_name}}
                                    </td>
                                    
                                      <td>
                                        @php
                                        $submenu = DB::table('submenus')->where('id', $item->sub_cat)->first();
                                        @endphp

                                        @if($submenu)
                                        {{ $submenu->sub_name }}
                                        @endif
                                      </td>

                                   <td>{{$item->language}}</td>
									<td><a href="{{url('/')}}/admin-panel/editsitecontent/{{$item->id}}" class="btn btn-success">Edit</a></td>

									<td><a href="{{url('/')}}/admin-panel/delsitecontent/{{$item->id}}" class="delete btn btn-danger">Delete</a></td>

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
<script type="text/javascript">
$(document).ready(function() {
$('')
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#textcon').hide();
    $('#pdfcon').hide()
});


$('#contype').on('change', function () {
    var Cat = this.value;
    if(this.value == 'Text'){
        $('#textcon').show();
        $('#pdfcon').hide();
    }else{
        $('#pdfcon').show();
        $('#textcon').hide();
    }

});
</script>
@endsection
