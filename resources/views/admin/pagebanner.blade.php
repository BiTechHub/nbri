@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Manage Page Banner</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">Page Banner</li>
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
              <form action="{{ route('admin-panel.uploadpagebanner') }}" method="post" enctype="multipart/form-data">
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
                  
                  {{--  <div class="form-group">
                  <h5>Title <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="title" class="form-control"> </div>
                  </div>  --}}
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Select Image <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="file" name="image" class="form-control"> 
                      </div>
                      @error('image')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Title Color <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="color" name="color" class="form-control"> 
                      </div>
                      @error('color')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
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
              <h4 class="box-title">Manage Page Banner</h4>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                    
                      <th>Image</th>
                     
                      <th>Action</th>
                    </tr>

                  </thead>
                  <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($ruchi as $item)
                    <tr>
                      <td>{{$i}}</td>
                                         
                      <td><img src="{{url('/')}}/uploads/PageBanner/{{$item->image}}" style="width:150px; height:150px;"></td>
                   
                      <td><a href="{{url('/')}}/admin-panel/delpagebanner/{{$item->id}}" class="delete btn btn-danger" title="Delete Slider Photos"><i class="fa fa-trash"></i></a></td>

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
@endsection
