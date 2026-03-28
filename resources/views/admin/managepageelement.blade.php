@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Manage Page Element</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item" aria-current="page">Control</li>
							<li class="breadcrumb-item active" aria-current="page">Manage Page Element</li>
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
				
				<div class="box-body" id="">
					<div class="table-responsive">
						<table id="complex_header" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Title</th>
									
									<th>Language</th>
                                    <th>Edit</th>
                                 
								</tr>

							</thead>
							<tbody>
								@php
								$i=1;
								@endphp
								@foreach($scontent as $item)
								<tr>
									<td>{{$i}}</td>
									<td>{{$item->title}}</td>
                                    <td>
                                     {{$item->lang}}
                                  </td>
                                   
                                 
									<td><a href="{{url('/')}}/admin-panel/editpageelement/{{$item->id}}" class="btn btn-success">Edit</a></td>

									

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
