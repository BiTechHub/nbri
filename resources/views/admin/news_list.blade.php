@extends('admin.layouts.master')
@section('main-section')
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">News</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Control</li>
                <li class="breadcrumb-item active" aria-current="page">News List</li>
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
              <a class="btn btn-warning" href="{{url('/')}}/admin-panel/add-news" style="float:right;">Add News</a>
            </div>
            <div class="box-body p-0">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Section</th>
                      <th>Subject</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($news as $newss)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>
                       @if($newss->section == 1)
                        Important Link
                       @elseif($newss->section == 2)
                        Highlights
                       @elseif($newss->section == 3)
                        News & Notifications
                        @elseif($newss->section == 4)
                        Latest Updates
                        @elseif($newss->section == 6)
                        Whats New
                       @endif
                      </td>
                      @if($newss->link)
                      <td><a href="{{url('/') }}/en/news/{{ $newss->link }}" target="_blank">{{ $newss->subject}} <span><img src="/img/pdf.png" alt=""></span></a><br>
                      <a href="{{url('/') }}/hi/news/{{ $newss->link }}" target="_blank">{{ $newss->subject_hi}} <span><img src="/img/pdf.png" alt=""></span></a>
                      </td>
                      @else
                      <td><a href="{{url('/') }}/uploads/news/{{ $newss->file_name }}" target="_blank">{{ $newss->subject}} <span><img src="/img/pdf.png" alt=""></span></a></td>
                      @endif
                      <td>
                      @if($newss->status == 1)
                      <a href="{{url('/')}}/admin-panel/newsdelete/{{$newss->id}}" class=" btn btn-danger">De-active</a>
                      @else
                      <a href="{{url('/')}}/admin-panel/newsback/{{$newss->id}}" class=" btn btn-success">Active</a> 
                      @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $news->links('pagination::bootstrap-4') }}
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
