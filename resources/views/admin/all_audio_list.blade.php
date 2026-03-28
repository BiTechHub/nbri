@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">All Garden Audio List</h3>
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
              <a class="btn btn-warning" href="{{url('/')}}/admin-panel/AddNewGardenAudio" style="float:right;">Add Audio</a>
            </div>
            <div class="box-body p-0">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Garden Category</th>
                      <th>Sr. No.</th>
                      <th>Audio EN</th>
                      <th>Audio HI</th>
                      <th>Generate QR</th>
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
                      <td>{{ $plantss->cat }}</td>
                      <td>{{ $plantss->sr_no }}</td>
                      <td>
                        <audio controls>
                          <source src="{{url('/')}}/uploads/audio_en/{{ $plantss->file_en }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                     
                      </td>
                       <td>
                     <audio controls>
                          <source src="{{url('/')}}/uploads/audio_hi/{{ $plantss->file_hi }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                      </td>
                      <td>
                        <button class="btn btn-success" 
                                onclick="generateQR('{{ $plantss->audio_cat }}','{{ $plantss->sr_no }}','{{ $plantss->id }}')">
                          <i class="fa fa-qrcode"></i>
                        </button>

                        <!-- QR Container -->
                        <div id="qrcode-{{ $plantss->id }}" style="margin-top:10px;"></div>

                        <!-- Download Button -->
                        <a id="download-qr-{{ $plantss->id }}" 
                           class="btn btn-primary mt-2" 
                           style="display:none;" 
                           download="Audio-{{ $plantss->sr_no }}.png">
                          Download QR
                        </a>
                      </td>
                      
                      <td>
                      <button class="btn btn-info" data-toggle="modal" type="button" data-target="#update_modal{{$plantss->id}}">
                                          <i class="fa fa-edit"></i>
                                        </button>
                                          
                                        <!-- update slider image  Shani-->
                                        <div class="modal fade" id="update_modal{{$plantss->id}}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <h3 class="modal-title">Update Menu</h3>
                                              </div>
                                              <div class="modal-body">

                                                <form action="{{url('/')}}/admin-panel/update_newaudio" method="post" enctype="multipart/form-data"> 
                                                  @csrf
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>Audio Code <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="text" readonly name="audio_code" id="audio_code" value="{{ $plantss->sr_no }}" class="form-control"> 
                                                        
                                                        </div>							
                                                        @error('audio_code') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <input type="hidden" name="audio_id" value="{{$plantss->id}}"/>
                                                      <div class="form-group">
                                                        <h5>Audio (English) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="file" name="file_en" class="form-control"> 
                                                        </div>							
                                                        @error('file_en') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                        <h5>Audio (Hindi) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                          <input type="file" name="file_hi" class="form-control"> 
                                                        </div>							
                                                        @error('file_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
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
                      <a href="{{url('/')}}/admin-panel/newaudiodelete/{{$plantss->id}}" class=" btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
function generateQR(cat, srno, id) {
    let containerId = "qrcode-" + id;
    let container = document.getElementById(containerId);
    let downloadBtn = document.getElementById("download-qr-" + id);

    if (!container) return;

    // Clear previous QR
    container.innerHTML = "";

    // Generate QR with bigger size
    let qr = new QRCode(container, {
        text: window.location.origin + "/GardenAudio/" + cat + "/" + srno,
        width: 256,   // large size
        height: 256
    });

    // Show download button after QR is created
    setTimeout(() => {
        let img = container.querySelector("img") || container.querySelector("canvas");
        if (img) {
            let dataUrl = img.src || img.toDataURL("image/png");
            downloadBtn.href = dataUrl;
            downloadBtn.style.display = "inline-block";
        }
    }, 500);
}
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
@endsection
