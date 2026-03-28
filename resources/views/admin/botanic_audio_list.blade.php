@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Botanic Garden Audio List</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">Audio List</li>
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

          </div>
          <div class="box">
            <div class="box-header">
              @if(session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif
              <a class="btn btn-warning" href="{{url('/')}}/admin-panel/Add-GardenAudio" style="float:right;">Add Audio</a>
            </div>
            <div class="box-body p-0">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Sr. No.</th>
                      <th>Audio</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($plants as $plantss)
                    <tr>
                      <td>{{$i++}}</td>
                      
                      <td>{{ $plantss->sr_no }}</td>
                      <td>
                        <audio controls>
                          <source src="{{url('/')}}/uploads/GardenAudioFiles/{{ $plantss->file }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                     
                      </td>
                       
                      
                      
                      <td><a href="{{url('/')}}/admin-panel/audiodelete/{{$plantss->id}}" class=" btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $plants->links('pagination::bootstrap-4') }}
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
