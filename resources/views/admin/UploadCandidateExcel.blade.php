@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Candidates Excel</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Candidates Excel</li>
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
					<form action="{{ route('admin-panel.SaveAddCandidateExcel') }}" method="post" enctype="multipart/form-data">

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
<div class="alert alert-danger">
{{ session('fail') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@csrf

<div class="row">

<div class="col-md-6">
<div class="form-group">
<h5>Select Exam Category <span class="text-danger">*</span></h5>

<div class="controls">
<select name="exam_cat" class="form-control">
<option>Please Select</option>

@foreach($tempD as $td)
<option value="{{$td->id}}">
{{$td->test_name}} - {{$td->for_post}} - {{$td->advt_no}}
</option>
@endforeach

</select>
</div>

@error('exam_cat')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>


<div class="col-md-6">
<div class="form-group">
<h5>Attach Excel File <span class="text-danger">*</span></h5>

<div class="controls">
<input type="file" name="file" class="form-control">
</div>

<small class="text-primary">
<a href="{{ url('/admin/admit_card_sample.xlsx') }}" download>
⬇ Download Sample Excel
</a>
</small>

@error('file')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>

</div>


<div class="text-xs-right">
<button type="submit" class="btn btn-info">Save</button>
</div>

</form>

				</div>
				<!-- /.col -->
                <div class="box mt-20">
					<div class="box-header">
						<h4 class="box-title">Manage Data</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
<thead>
<tr>
<th>Serial No.</th>
<th>Exam Category</th>
<th>Total Candidate</th>
<th>Form Link</th>
<th>Freeze</th>
<th>Assign Admit Card Format</th>
<th>Created At</th>
<th>Action</th>
</tr>
</thead>

<tbody>
@php $i=1; @endphp

@foreach($ruchi as $item)
<tr>

<td>{{$i}}</td>

<td>
@foreach($tempD as $tD) 
@if($tD->id == $item->test_id)
{{$tD->test_name}}
@endif
@endforeach
</td>

<td>
<a href="{{url('/')}}/admin-panel/CandidateList/{{$item->test_id}}" style="color:red;font-weight:bold">
{{$item->count}}
</a>
</td>
<td>

<div style="display:flex; gap:5px;">

<input type="text"
class="form-control form-control-sm"
id="link{{$item->id}}"
value="{{ url('/en/ExternalDownload/'.$item->test_id.'/admit-card') }}"
readonly>

<button class="btn btn-primary btn-sm"
onclick="copyLink('link{{$item->id}}')">
Copy
</button>

</div>

</td>
{{-- FREEZE COLUMN --}}

<td>
@if($item->freeze_status == 1)

<button class="btn btn-success btn-sm freezeBtn"
data-id="{{$item->id}}" data-status="1">
Freezed
</button>

@else

<button class="btn btn-warning btn-sm freezeBtn"
data-id="{{$item->id}}" data-status="0">
Unfreezed
</button>

@endif
</td>


{{-- FORMAT COLUMN --}}

<td>

<select class="form-control formatChange"
data-id="{{$item->id}}"
@if($item->freeze_status==1) disabled @endif>

<option value="">Select Format</option>

<option value="1" {{$item->format==1?'selected':''}}>Format 1</option>
<option value="2" {{$item->format==2?'selected':''}}>Format 2</option>
<option value="3" {{$item->format==3?'selected':''}}>Format 3</option>

</select>

</td>


<td>{{$item->created_at}}</td>

<td>
<a href="{{url('/')}}/admin-panel/excelCollDelete/{{$item->id}}" class="delete btn btn-danger">
<i class="fa fa-trash"></i>
</a>
</td>

</tr>

@php $i++; @endphp
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

<script>

  function copyLink(id)
{
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999);

    navigator.clipboard.writeText(copyText.value);

    alert("Admit card link copied");
}

$('.freezeBtn').click(function(){

    var id=$(this).data('id');
    var status=$(this).data('status');

    if(status==0){
        var freeze=1;
    }else{
        var freeze=0;
    }

    $.ajax({

        url:"{{url('/admin-panel/updateFreeze')}}",
        type:"POST",
        data:{
            _token:"{{csrf_token()}}",
            id:id,
            freeze:freeze
        },

        success:function(res){

            alert('Status Updated');

            location.reload();

        }

    });

});


$('.formatChange').change(function(){

    var id=$(this).data('id');
    var format=$(this).val();

    $.ajax({

        url:"{{url('/admin-panel/updateFormat')}}",
        type:"POST",
        data:{
            _token:"{{csrf_token()}}",
            id:id,
            format:format
        },

        success:function(res){

            alert('Format Updated');

        }

    });

});

</script>
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
