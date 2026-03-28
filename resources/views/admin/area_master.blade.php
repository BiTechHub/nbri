@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Manage Staff Area</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">Staff Area</li>
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
              <form action="{{ route('admin-panel.uploadstaffarea') }}" method="post" enctype="multipart/form-data">
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
                  
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Area (English) <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <textarea name="area" class="form-control"></textarea> </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Area (Hindi) <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <textarea name="area_hi" class="form-control"></textarea> </div>
                    </div>
                  </div>
                 
                <div class="text-xs-right">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>

            </div>
            <!-- /.col -->
          </div>

          <div class="box mt-20">
            <div class="box-header">
              <h4 class="box-title">Manage Staff Area</h4>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Area</th>
                      <th>Area (Hindi)</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>

                  </thead>
                  <tbody>
                   @php $i = 1; @endphp
                    @foreach($swrn as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->area }}</td>
                        <td>{{ $item->area_hi }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#update_modal_{{ $item->id }}">
                                <i class="fa fa-edit"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="update_modal_{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h3 class="modal-title">Update Staff Area</h3>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ url('/') }}/admin-panel/update_staffarea" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}"/>

                                                <div class="form-group">
                                                    <h5>Heading <span class="text-danger">*</span></h5>
                                                    <textarea name="area" class="form-control">{{ $item->area }}</textarea>
                                                    @error('area')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <h5>Area (Hindi) <span class="text-danger">*</span></h5>
                                                    <textarea name="area_hi" class="form-control">{{ $item->area_hi }}</textarea>
                                                    @error('area_hi')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="modal-footer">
                                                    <button name="update" class="btn btn-primary" type="submit">
                                                        &#10004; Update
                                                    </button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal">
                                                        &times; Close
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                           <a href="{{url('/')}}/admin-panel/delstArea/{{ $item->id }}" class="delete btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @php $i++; @endphp
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
function verifyPosition() {
      
       var ch_cat = $('#position').val();
  
                $.ajax({
                    url: "{{ url('/') }}/verifyProfilePosition/" + ch_cat,
                    success: function(data) {
                        console.log(data);
                        if (data != "") {
                            $("#position").val("");
                            alert("Position not available.");
                        }
                    }
                });
        }
</script>
@endsection
