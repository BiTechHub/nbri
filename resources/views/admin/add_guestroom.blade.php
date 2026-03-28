@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Guest Room Master</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">Guest Room Master</li>
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
              <form action="{{ route('admin-panel.uploadAddGuestRoom') }}" method="post" enctype="multipart/form-data">
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
                      <h5>Select Room <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="room_name" required id="room_name" class="form-control">
                        <option>Please Select</option>
                        @foreach($ruchi as $vijay)
                        <option value="{{$vijay->id}}">{{$vijay->name}}</option>
                        @endforeach
                        </select> </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Room No. <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="room_no" required id="room_no" class="form-control"> </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>No. Of Bed <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="bed_no" class="form-control"> </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Floor <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="floor" class="form-control"> </div>
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
              <h4 class="box-title">Manage Guest Room Master</h4>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Name</th>
                      <th>Room No.</th>
                      <th>No. Of Bed</th>
                      <th>Floor</th>
                      <th>Status</th>
                      <th>Blocked Status</th>
                      <th>Update</th>
                      <th>Action</th>
                    </tr>

                  </thead>
                  <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($rooms as $item)
                    <tr>
                      <td>{{$i}}</td>
                      <td>
                        @foreach($ruchi as $vijay)
                          @if($vijay->id == $item->room_name)
                        <b>{{$vijay->name}}</b>
                          @endif
                        @endforeach
                        
                      </td>
                      <td>{{$item->room_no}}</td>                      
                     <td>{{$item->bed_no}} (@foreach($bed as $b) @if($b->room_id==$item->id) {{$b->bed}}, @endif @endforeach)</td> 
                      <td>{{$item->floor}}</td>
                      <td>
                        @if($item->status == 'Active')
                            <!-- Active: give option to block with till-date -->
                            <form action="{{ url('/admin-panel/rooms/Blocked/'.$item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <label>From Date</label>
                                <input type="date" name="from_date" required class="form-control mb-2">
                                <label>To Date</label>
                                <input type="date" name="deactive_till" required class="form-control mb-2">
                                <button type="submit" class="btn btn-success" title="Block This Room">Active</button>
                            </form>
                        @else
                            <!-- Blocked: show unblock option -->
                            <a href="{{url('/')}}/admin-panel/rooms/Active/{{$item->id}}" class="btn btn-danger" title="Activate This Room">Blocked</a>
                            @if($item->deactive_till)
                                <p class="text-sm text-muted">Blocked till: {{ $item->deactive_till }}</p>
                            @endif
                        @endif

                      </td>
                      <td>
                        @if($item->from_date)
                       <strong style="color:red">Scheduled Block From {{ $item->from_date }} To {{ $item->deactive_till }}</strong>
                        @else
                        <strong style="color:red">Not Scheduled</strong>
                        @endif
                      </td>
                      <td>
                        <button class="btn btn-info" data-toggle="modal" type="button" data-target="#update_modal{{$item->id}}">
                                          <i class="fa fa-edit"></i>
                                        </button>
                        
                                        <div class="modal fade" id="update_modal{{$item->id}}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Room Master</h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/update_AddGuestRoom" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    
                                                    <div class="col-12">
                                                      <input type="hidden" name="id" value="{{$item->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Room Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                         <select name="room_name" required id="room_name" class="form-control">
                                                          <option>Please Select</option>
                                                          @foreach($ruchi as $vijay)
                                                          <option @if($vijay->id == $item->room_name) selected @endif value="{{$vijay->id}}">{{$vijay->name}}</option>
                                                          @endforeach
                                                          </select>								
                                                       
                                                        @error('room_name') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror

                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>No. Of Room<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="room_no" class="form-control" value="{{$item->room_no}}"> 								</div>
                                                        @error('room_no') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                        </div> @enderror

                                                      </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>Floor<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" name="floor" class="form-control" value="{{$item->floor}}"> 								</div>
                                                        @error('floor') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}
                                                        </div> @enderror

                                                      </div>
                                                    </div>
                                                     
                                                  </div>
                                                  <div style="clear:both;"></div>
                                                  <div class="modal-footer">
                                                    <button name="update" class="btn btn-primary" type="submit"><span>&#10004;</span> Update</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                  </div>
                                                </form>

                                              </div>
                                            </div>
                                          </div>
                                          </div>
                      </td>
                      <td><a href="{{url('/')}}/admin-panel/delAddGuestRoom/{{$item->id}}" class="delete btn btn-danger" title="Delete Guest Room Master Category"><i class="fa fa-trash"></i></a></td>

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
