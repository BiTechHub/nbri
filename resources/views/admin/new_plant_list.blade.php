@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">New Plants</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">New Plants List</li>
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
              <a class="btn btn-warning" href="{{url('/')}}/admin-panel/AddNewPlants" style="float:right">Add New Plants</a>
        
             @if(session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif
           
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Category</th>
                      <th>Plant Image</th>
                      <th>Plant Name</th>
                      <th>Sr. No.</th>
                      <th>Author Name</th>
                      <th>Family</th>
                      <th>Common Name</th>
                      <th>Native</th>
                      <th>Uses</th>
                      
                      <th>GO Co-Ordinates</th>
                      <th>Extra Cols</th>
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
                      <td>{{ $plantss->pl_cat }}</td>
                      <td><img src="{{ url('/') }}/uploads/plant_image_files/{{$plantss->image}}" style="width:150px;height:150px;"></td>
                      <td>
                      EN : {{ $plantss->plant_name_en}} <br>
                      HI : {{ $plantss->plant_name_hi}}
                      </td>
                      <td>{{ $plantss->sr_no }}</td>
                      <td>
                     {{ $plantss->family_en }}
                      </td>
                       <td>
                     {{ $plantss->author }}
                      </td>
                      <td>
                      {{ $plantss->com_name_en}}
                      </td>
                      <td>
                      {{ $plantss->native_en}}
                      </td>
                      <td>
                      {{ $plantss->uses_en}}
                      </td>
                      <td>Lattitude: {{ $plantss->latitude}}<br>
                      Longitude: {{ $plantss->longitude }}
                      </td>
                      <td>
                     <a href="{{url('/')}}/admin-panel/ManageNewPlantsCols/{{$plantss->id}}" class=" btn btn-success">Manage Extra Cols</a>
                      </td>
                     <td>
                        <button class="btn btn-success" 
                                onclick="generateQR('{{ $plantss->plant_cat }}','{{ $plantss->sr_no }}','{{ $plantss->id }}')">
                          <i class="fa fa-qrcode"></i>
                        </button>

                        <!-- QR Container -->
                        <div id="qrcode-{{ $plantss->id }}" style="margin-top:10px;"></div>

                        <!-- Download Button -->
                        <a id="download-qr-{{ $plantss->id }}" 
                           class="btn btn-primary mt-2" 
                           style="display:none;" 
                           download="plant-{{ $plantss->sr_no }}.png">
                          Download QR
                        </a>
                      </td>

                      </td>
                      <td><a href="{{url('/')}}/Garden/{{ $plantss->plant_cat }}/{{$plantss->sr_no}}" target="_blank" class=" btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <br>
                        <a href="{{url('/')}}/admin-panel/deleteNewPlants/{{$plantss->id}}" class=" btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      <br>
                        <a href="{{url('/')}}/admin-panel/edit-NewPlants/{{$plantss->id}}" class=" btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $plants->links('pagination::bootstrap-4') }}
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
        text: window.location.origin + "/Garden/" + cat + "/" + srno,
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

<script>
$(document).ready(function() {
    $('#complex_header').DataTable({
        dom: 'Bfrtip', // Positioning of buttons
      //  responsive: true, // Enable responsive mode
        pageLength: 50,  // Default page length
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' // List of buttons to show
        ]
    });
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
@endsection
