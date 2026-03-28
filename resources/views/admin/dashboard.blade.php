@extends('admin.layouts.master')
@section('main-section')
<style>
.wrapper {
position: static !important;
}

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container">
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
  @if(session()->get('Loggeduser') == 9 || session()->get('Loggeduser') == 10)
  <div class="row">
  <style>
  .room-box {
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 1rem;
    color: #fff;
    transition: transform 0.2s ease-in-out;
    position: relative;
    overflow: hidden;
  }

  .room-box:hover {
    transform: scale(1.02);
  }

  .room-header {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }

  .room-status {
    position: absolute;
    top: 10px;
    right: 12px;
    background-color: rgba(255, 255, 255, 0.2);
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
  }

  .bed-tag {
    display: inline-block;
    padding: 4px 10px;
    margin: 4px 4px 0 0;
    border-radius: 20px;
    font-size: 0.75rem;
    background-color: rgba(255, 255, 255, 0.2);
  }

  .bg-available {
    background: linear-gradient(135deg, #5e5c05, #a36b18);
  }

  .bg-occupied {
    background: linear-gradient(135deg, #dc3545, #bd2130);
  }

  .bg-partial {
    background: linear-gradient(135deg, #ffc107, #e0a800);
    color: #212529;
  }

  .bed-occupied {
    background-color: rgba(255, 0, 0, 0.3);
  }

  .bed-available {
    background-color: rgba(0, 255, 0, 0.3);
  }
</style>

      <div class="container-fluid">
       <!-- <h4 class="fw-bold text-dark mb-3">🛏️ Room & Bed Status Overview</h4>-->

        <div class="row">
          @foreach($roomAvailability as $room)
            <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="room-box 
                  {{ $room['room_status'] == 'fully occupied' ? 'bg-occupied' : 
                     ($room['room_status'] == 'partially occupied' ? 'bg-partial' : 'bg-available') }}">

                <div class="room-header">
                  Room #{{ $room['room_no'] }} 
                  <span class="room-status">{{ ucfirst($room['room_status']) }}</span>
                </div>

                <div class="mb-1">
                  <small class="text-white-50">Category: {{ $room['room_cat'] }}</small>
                </div>

                <div class="mt-2">
                  @foreach($room['beds'] as $bed)
                    <span class="bed-tag {{ $bed['status'] == 'occupied' ? 'bed-occupied' : 'bed-available' }}">
                      {{ $bed['bed_name'] }} - {{ ucfirst($bed['status']) }}
                    </span>
                  @endforeach
                </div>

              </div>
            </div>
          @endforeach
        </div>
      </div>

  </div>
  @else
  <div class="row">
	<div class="col-xl-6 col-12">
	  <div class="box">
		<div class="box-header with-border">
		  <ul class="box-controls pull-right">
			  <li><a class="box-btn-slide" href="#"></a></li>
			  <li><a class="box-btn-fullscreen" href="#"></a></li>
			</ul>
		</div>
		<div class="box-body p-0">
		  <div id="calendar" class="dask"></div>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	
	
	<div class="col-xl-6 col-12">
	  <div class="box">
		<div class="box-header with-border pt-0">
		    <form action="{{url('/')}}/admin-panel/alert_image" method="post" enctype="multipart/form-data">
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
                        <div class="col-12">
                            <h3 class="page-title">Update Alert Image</h3>
                        </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Image<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger"> @error('image') {{$message}} @enderror </span>
                        </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Image(Hindi) <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="file" name="image_hi" class="form-control"> 
                        <span class="text-danger"> @error('image_hi') {{$message}} @enderror </span>
                        </div>
                        
                        
                    </div>
                  </div>
                  <div class="col-12 text-center">
                      <button type="submit" class="btn btn-info">Update</button>
                      </div>
                   </div>
          </form>
                  
		</div>
		<div class="box-body p-0">
		    <table class="table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Image(Hindi)</th>
                </tr>
              </thead>
              <tbody>
                  <td><img src="{{url('/img')}}/{{$img->image}}"></td>
                   <td><img src="{{url('/img')}}/{{$img->image_hi}}"></td>
                </tr>
                </tbody>
            </table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	<!-- col -->
	
	<!-- /col -->

  </div>
@endif

  <!-- /.row -->
</section>
<!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->

<!--Model Popup Area-->

<!-- result modal content -->


@endsection
