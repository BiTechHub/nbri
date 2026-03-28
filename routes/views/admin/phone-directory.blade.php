@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Add Phone Directory</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">Add Phone Directory</li>
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
              <form action="{{url('/')}}/admin-panel/import" method="post" enctype="multipart/form-data">
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>Category <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="category" id="category" class="form-control">
                          <option value="" selected>--Please Select--</option>
                          @foreach($category_master as $categorymaster)
                          <option  value="{{$categorymaster->id}}">{{$categorymaster->name}}</option>
                          @endforeach
                        </select> 
                        @error('category') <span class="text-danger"> {{ $message }}</span> @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>श्रेणी <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="category_hi" id="category_hi" class="form-control">
                          <option selected value="">--कृपया चयन कीजिए--</option>
                          @foreach($category_hii as $categorymas)
                          <option value="{{$categorymas->id}}">{{$categorymas->name}}</option>
                          @endforeach
                        </select> 
                        @error('category_hi') <span class="text-danger"> {{ $message }}</span> @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>CSV File <span class="text-danger">* <a href="{{url('/')}}/img/phone_directory_english.csv"> (Only CSV file can be Uploaded) <i class="fa fa-download" aria-hidden="true"></i></a></span> </h5>
                      <div class="controls">
                        <input type="file" name="file" class="form-control"> 
                      </div>
                      @error('file') <span class="text-danger"> {{ $message }}</span> @enderror

                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>सीएसवी फाइलें <span class="text-danger">* <a href="{{url('/')}}/img/phone_directory_hindi.csv"> (Only CSV file can be Uploaded) <i class="fa fa-download" aria-hidden="true"></i></a></span></h5>
                      <div class="controls">
                        <input type="file" name="file_hi" class="form-control"> 
                      </div>
                      @error('file_hi') <span class="text-danger"> {{ $message }}</span> @enderror

                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="text-xs-right">
                      <button type="submit" class="btn btn-info">Add Directory</button>
                    </div>
                  </div>
                </div>
              </form>

            </div>
            <!-- /.col -->


          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.box-body -->
    <section class="content">

      <!-- Basic Forms -->
      <div class="box">
        <div class="box-body">

          <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <h5>Category <span class="text-danger">*</span></h5>
              <div class="controls">
                <select name="category" id="category2" class="form-control">
                  <option value="" selected>--Please Select--</option>
                  @foreach($category_master as $categorymaster)
                  <option value="{{$categorymaster->id}}" {{ (isset($category_id->id) && $category_id->id == $categorymaster->id) ? 'selected' : '' }}>{{$categorymaster->name}}</option>
                  @endforeach
                </select> 
                @error('category') <span class="text-danger"> {{ $message }}</span> @enderror
              </div>
            </div>
          </div>
		<div class="col-md-6 text-center">
          <h4> 
            {{ (isset($category_id->id)) ? $category_id->name : '' }}
          </h4>
  		</div>
         </div> 
          
          <div class="table-responsive">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Area</th>
                  <th>Twitter</th>
                  <th>Email</th>
                  <th>contact</th>
                  <th>Action</th>
                </tr>

              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($directory as $item)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->designation}}</td>
                  <td>{{$item->area}}</td>
                  <td>{{$item->twitter}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->contact}}</td>
                  <td>
                    <a href="{{url('/')}}/admin-panel/edit-phone-directory/{{$item->id}}" class=" btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{url('/')}}/admin-panel/delete-phone-directory/{{$item->id}}" class="delete btn btn-danger mt-3"><i class="fa fa-trash"></i></a>
                  </td>
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
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
</div>

@endsection
@section('script')




<script>
  $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>
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

<script>
  document.getElementById('category2').addEventListener('change', function() {
    var selectedCategoryId = this.value;
    if (selectedCategoryId !== "") {
      var url = "{{url('/')}}/admin-panel/phone-directory/" + selectedCategoryId;
      window.location.href = url; // Redirect to the generated URL
    }
  });
</script>

@endsection
