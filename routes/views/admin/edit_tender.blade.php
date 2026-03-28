@extends('admin.layouts.master')
@section('main-section')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">

<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Edit Tender</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Edit Tender</li>
              </ol>
            </nav>
          </div>

        </div>

      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('admin-panel.EditTender') }}" method="post" enctype="multipart/form-data">
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
                <input type="hidden" name="id" value="{{$tender_master->id}}">

                <div class="row">
                  <div class="form-group col-6">
                    <h5>Tender No.<span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="tender_no" class="form-control" value="{{$tender_master->tender_no}}">
                    </div>
                     @error('tender_no') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>
                  <div class="form-group col-6">
                    <h5>Issuing Authority </h5>
                    <div class="controls">
                      <select name="department" id="department" name="department" class="form-control">
                        <option selected>-Select-</option>

                        @foreach($department_master as $departmentMaster)
                        <option value="{{$departmentMaster->id}}" {{ $tender_master->department == $departmentMaster->id ? 'selected' : '' }} >{{ $departmentMaster->name}}</option>
                        @endforeach

                      </select>
                    </div>
                     @error('department') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>

                  <div class="form-group col-12">
                    <h5>Particulars</h5>
                    <textarea class="textarea" id="summernote"  name="name_of_material" placeholder="Place some text here" style="width: 100%; height: 150; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$tender_master->name_of_material}}</textarea>

                  </div>
                   @error('name_of_material') <div class="text-danger"> {{ $message }}</div> @enderror
                  <div class="col-3">
                    <div class="form-group">
                      <label>Start Date</label>
                      <input type="date" class="form-control" autocomplete="off" placeholder="Start Date" name="start_date" id="start_date" value="{{$tender_master->start_date}}" />
                    </div>
                     @error('start_date') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="time" class="form-control" autocomplete="off" placeholder="Start Time" name="start_time" id="start_time" value="{{$tender_master->start_time}}" />
                    </div>
                     @error('start_time') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Last date of Tender Submission</label>
                      <input type="date" class="form-control" autocomplete="off" placeholder="Last Date" name="last_date" id="last_date" value="{{$tender_master->last_date}}" />
                    </div>
                     @error('last_date') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label>Last Time</label>
                      <input type="time" class="form-control" autocomplete="off" placeholder="Last Time" name="last_time" id="last_time" value="{{$tender_master->last_time}}"/>
                    </div>
                     @error('last_time') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Tender Opening Date<span class="text-danger">*</span></label>
                      <input type="date" class="form-control" autocomplete="off" placeholder="Opening Date" name="opening_date" id="opening_date" required="required" value="{{$tender_master->opening_date}}" />
                    </div>
                     @error('opening_date') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label>Opening Time</label>
                      <input type="time" class="form-control" autocomplete="off" placeholder="Opening Time" name="opening_time" id="opening_time" value="{{$tender_master->opening_time}}" />
                    </div>
                     @error('opening_time') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Category<span class="text-danger">*</span></label>
                      <select class="form-control" name="category" required>
                        <option value="" selected>-- Select --</option>
                        @foreach($category_master as $categoryMaster)
                        <option value="{{ $categoryMaster->id }}" {{ $tender_master->category == $categoryMaster->id ? 'selected' : '' }}  >{{ $categoryMaster->name }}</option>
                        @endforeach
                      </select>
                    </div>
                     @error('category') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>

                  <div class="form-group col-12">
                    <h5>File <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="file" name="file" class="form-control">
                      
                    </div>
                     @error('file') <div class="text-danger"> {{ $message }}</div> @enderror
                  </div>



                  <br>
                  <div class="text-xs-right">
                    <button type="submit" class="btn btn-success">Update Tender</button>
                  </div>
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
    $('#main_cat').on('change', function () {
      var Cat = this.value;

      $.ajax({
        url: "{{url('subcatfetch')}}",
        type: "POST",
        data: {
          cat: Cat,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (result) {
          if($.isEmptyObject(result.states)){
            $('#mee').hide();
            $('#chdl').hide();
          }else{
            $('#mee').show();
          }
          $('.sub').html('<option value="">Select Sub Category</option>');
          $.each(result.states, function (key, value) {
            $(".sub").append('<option value="' + value + '">' + value + '</option>');
          });
          // $('.ss').selectpicker();
          // $('#city-dd').html('<option value="">Select City</option>');
        }
      });
    });
  });
  $(document).ready(function () {
    $('#sub').on('change', function () {
      var Cat = this.value;

      $.ajax({
        url: "{{url('childcatfetch')}}",
        type: "POST",
        data: {
          cat: Cat,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (result) {
          if($.isEmptyObject(result.states)){
            $('#chdl').hide();
          }else{
            $('#chdl').show();
          }
          $('.child').html('<option value="">Select child Category</option>');
          $.each(result.states, function (key, value) {
            $(".child").append('<option value="' + value + '">' + value + '</option>');
          });
          // $('.ss').selectpicker();
          // $('#city-dd').html('<option value="">Select City</option>');
        }
      });
    });
  });
  $(document).ready(function () {
    $('#edtr').hide();
    $('#con_type').on('change', function () {
      if(this.value == 'Text'){
        $('#edtr').show();
      }else{
        $('#edtr').hide();
      }
    });
  });

</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script>
  $('#summernote').summernote({
    placeholder: '',
    tabsize: 2,
    height: 150,
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