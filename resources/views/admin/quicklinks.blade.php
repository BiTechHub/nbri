@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Manage Quick Links</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">Quick Links</li>
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
              <form action="{{ route('admin-panel.uploadquicklinks') }}" method="post" enctype="multipart/form-data">
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
                      <h5>Title (English) <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="name" class="form-control"> </div>
                      @error('name')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Title (Hindi) <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="name_hi" class="form-control"> </div>
                      @error('name_hi')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Link For English <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="deg" class="form-control"> </div>
                      @error('deg')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Link For Hindi <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="deg_hi" class="form-control"> </div>
                      @error('deg_hi')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <h5>Placing Position <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="position" class="form-control">
                          <option value="">Please Select Position</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select> </div>
                      @error('position')
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
          </div>
          <div class="box mt-20">
            <div class="box-header">
              <h4 class="box-title">Manage Quick Links</h4>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                     
                      <th>Title (English) </th>
                      <th>Title (Hindi) </th>
                      <th>Link (English) </th>
                      <th>Link (Hindi)</th>
                      <th>Position</th>
                      <th>Status</th>
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
                     
                      <td>{{$item->name}}</td>
                      <td>{{$item->name_hi}}</td>
                      <td>{{$item->deg}}</td>
                      <td>{{$item->deg_hi}}</td>
                      <td>{{$item->position}}</td>
                      <td>
                        @if($item->status == 'Active')
                      	<a href="{{url('/')}}/admin-panel/quicklink_deactivate/{{$item->id}}" class="btn btn-danger btn-sm">Deactivate</a>
                        @else
                        <a href="{{url('/')}}/admin-panel/quicklink_active/{{$item->id}}" class="btn btn-success btn-sm">Active</a>
                        
                        @endif
                      </td>
                       <td>
                        <a href="{{url('/')}}/admin-panel/quicklinksdel/{{$item->id}}" class="delete btn btn-danger"><i class="fa fa-trash"></i></a>
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
        </div>
      </div>
    </section>
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
