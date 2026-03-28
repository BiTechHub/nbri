@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
<div class="container">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="page-title">Upload PDF</h3>
      <div class="d-inline-block align-items-center">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">Control</li>
            <li class="breadcrumb-item active" aria-current="page">Upload pdf, xlsx, zip, doc, docx</li>
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
          <form action="{{ route('admin-panel.uploadpdf') }}" method="post" enctype="multipart/form-data">
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
              <div class="form-group">
              <h5>Title <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="title" class="form-control"> </div>
              </div> 
               </div> 
              <div class="col-12">
                <div class="form-group">
                  <h5>Select PDF <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" name="pdf" class="form-control"> 
                  </div>
                  @error('pdf')
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
          <h4 class="box-title">PDF Link Copy</h4>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Title</th>
                  <th>PDF Link</th>
                  <th>Copy Link </th>
                  <th>Created At</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach($pdf_file as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td><a target="_blank" href="{{ url('/') }}/uploads/pdf_file/{{ $item->url }}">{{ $item->title }}</a></td>
                    <td id="urlCell{{ $i }}">{{ url('/') }}/uploads/pdf_file/{{ $item->url }}</td>
                    <td>
                        <i class="fa fa-clone btn btn-info" onclick="copyToClipboard('#urlCell{{ $i }}')" data-placement="left" data-toggle="popover" data-content="Copied!"></i>
                    </td>
                    <td>{{ $item->created_at }}</td>
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

</script>
<script>
function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    setTimeout(function() {
    }, 2000);
}
</script>
@endsection
