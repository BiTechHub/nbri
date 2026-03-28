@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">All Candidate List</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">Candidate List</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

      <!-- Basic Forms -->
     
          <div class="box" style="padding:10px;">
           
              @if(session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif
            <div class="box-body p-3">
              <div class="table-responsive">
                <table id="table_id" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>View Admit Card</th>
                      <th>Roll No</th>
                      <th>Reg No.</th>
                      <th>Name</th>
                      <th>Father Name</th>
                      <th>DOB</th>
                      <th>Address</th>
                      <th>Gender</th>
                      <th>Caste Category</th>
                      <th>Physically Disabled</th>
                      <th>Email</th>
                      <th>Login</th>
                      <th>Download</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($candidates as $cnd)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>

<a href="{{ route('download.admitt',$cnd->application_no) }}" 
target="_blank"
class="btn btn-sm btn-success">

<i class="fa fa-id-card"></i> View

</a>

</td>
                      <td>{{ $cnd->roll_no }}</td>
                      <td>{{ $cnd->application_no }}</td>
                      <td>{{ $cnd->candidate_name }}</td>
                      <td>{{ $cnd->father_name }}</td>
                      <td>{{ $cnd->date_of_birth }}</td>
                      <td>{{ $cnd->address }}</td>
                      <td>{{ $cnd->gender }}</td>
                      <td>{{ $cnd->caste_category }}</td>
                      <td>{{ $cnd->type_of_disability }}</td>
                      <td>{{ $cnd->email }}</td>
                      <td>{{ $cnd->login }}</td>
                      <td>{{ $cnd->download }}</td>
                      
                      <td>
                        @if($excel_col->freeze_status == 0)
                    <button class="btn btn-sm btn-primary"
    data-toggle="modal"
data-target="#editCandidateModal"
    onclick="openEditModal({{ $cnd->id }})">
    <i class="fa fa-edit"></i>
</button>

                      <a href="{{url('/')}}/admin-panel/candidatedelete/{{$cnd->id}}" class=" btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      @else
                      <span style="color:red; font-style:italic">Freezed</span>
                      @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- /.row -->
      
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
</div>
<div class="modal fade" id="editCandidateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('candidate.update') }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="candidate_id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Candidate</h5>
                    <button type="button" class="btn-close" data-dismiss="modal">X</button>
                </div>

                <div class="modal-body row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Roll No</label>
                        <input type="text" class="form-control" name="roll_no" id="roll_no">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Application No</label>
                        <input type="text" class="form-control" name="application_no" id="application_no">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Candidate Name</label>
                        <input type="text" class="form-control" name="candidate_name" id="candidate_name">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Father Name</label>
                        <input type="text" class="form-control" name="father_name" id="father_name">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Caste Category</label>
                        <input type="text" class="form-control" name="caste_category" id="caste_category">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Type of Disability</label>
                        <input type="text" class="form-control" name="type_of_disability" id="type_of_disability">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="2"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
function openEditModal(id) {
    fetch(`/admin-panel/candidate/${id}`)
        .then(res => res.json())
        .then(data => {

            document.getElementById('candidate_id').value = data.id;
            document.getElementById('roll_no').value = data.roll_no || '';
            document.getElementById('application_no').value = data.application_no || '';
            document.getElementById('candidate_name').value = data.candidate_name || '';
            document.getElementById('father_name').value = data.father_name || '';
            document.getElementById('date_of_birth').value = data.date_of_birth || '';
            document.getElementById('address').value = data.address || '';
            document.getElementById('gender').value = data.gender || '';
            document.getElementById('caste_category').value = data.caste_category || '';
            document.getElementById('type_of_disability').value = data.type_of_disability || '';
            document.getElementById('email').value = data.email || '';

        })
        .catch(err => console.error(err));
}
</script>


<script>
$(document).ready(function() {
    $('#table_id').DataTable({
        dom: 'Bfrtip', // Positioning of buttons
      //  responsive: true, // Enable responsive mode
        pageLength: 25,  // Default page length
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' // List of buttons to show
        ]
    });
});
</script>
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
