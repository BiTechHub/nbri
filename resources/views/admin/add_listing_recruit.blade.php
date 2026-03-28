@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Recruitment Listing</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Control</li>
								<li class="breadcrumb-item active" aria-current="page">Add Recruitment Listing</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>
		<!-- Main content -->
		<section class="content">
            @if(session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
                          @endif
						<div class="box">
                          
							<form method="post" enctype="multipart/form-data">
                              @csrf;
                          
							
							<div class="box-body">
                              <div class="form-group">
									<label>Content Type</label>
                                <select class="form-control" name="con_type" id="con_type" required="required">
                                  <option>Please Select</option>
                                  <option value="pdf">PDF</option>
                                  <option value="link">Link</option>
                                </select>
								</div>
								<div class="form-group">
									<label>Title (English)</label>
									<input type="text" class="form-control" placeholder="Enter Title" name="title_en" id="title" required="required">
                                    <input type="hidden" class="form-control" value="{{$recruit_id}}" name="recruit_id" id="title" required="required">
								</div>
                                <div class="form-group">
									<label>Title (Hindi)</label>
									<input type="text" class="form-control" placeholder="Enter Title" name="title_hi" id="title" required="required">
								</div>
								
								<div class="form-group" id="fileDiv" style="display:none;">
									<label>File</label>
									<input type="file" class="form-control" name="file" id="file">
								</div>
                                <div class="form-group" id="fileDiv1" style="display:none;">
									<label>Link</label>
									<input type="text" class="form-control" name="link" id="link">
								</div>
							
								
								<div class="form-group">
									<input type="submit" name="add_listing" class="btn btn-success" value="Add Listing"/>
								</div>
							</div>
                              </form>
						</div>
                        <div class="box">
                        <div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>	
                                        <th>S.No</th>
                                        <th>Title</th>
                                      
                                        <th>Action</th>
                                    </tr>
								</thead>
								<tbody>
                                    @php $i = 1; @endphp
                                    @foreach($listing_master as $listingMaster)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                @if($listingMaster->con_type == "pdf")
                                                   <a href="{{url('/')}}/uploads/RecruitmentFile/{{ $listingMaster->file }}" target="_blank">{{ $listingMaster->title_en }}</a>
                                                @else
                                                    <a href="{{ $listingMaster->link }}" target="_blank">{{ $listingMaster->title_en }}</a>
                                                @endif
                                            </td>
                                           
                                          
                                            <td>
                                                <a href="{{url('/')}}/admin-panel/delrecruitlisting/{{ $listingMaster->id }}" class="btn btn-danger delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
							</table>
						</div>
                          </div>
					</div>
					</section>
		<!-- /.content -->
	  </div>
  </div>
<script>
  document.getElementById('con_type').addEventListener('change', function () {
    const value = this.value;
    const div1 = document.getElementById('fileDiv'); // get by div ID
    const div2 = document.getElementById('fileDiv1'); // get by div ID

    if (value === 'pdf') {
      div1.style.display = 'block';
      div2.style.display = 'none';
    } else {
       div1.style.display = 'none';
      div2.style.display = 'block';
    }
  });
</script>
@endsection
