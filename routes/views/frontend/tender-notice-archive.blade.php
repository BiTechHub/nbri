@extends('frontend.layouts.main')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/jquery.dataTables.min.css">
<!-- Start main-content -->
<div class="main-content-area">
  <!-- Section: page title -->
  <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg" style="background-image: url({{url('/')}}/img/about-1.jpg);background-size: cover;background-attachment: fixed;padding: 50px 0 33px 0;position: relative;">
    <div class="container pt-50 pb-50">
      <div class="section-content">
        <div class="row">
          
          <div class="col-md-12 text-center text-white" >
            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
              <div class="breadcrumbs pull-right" style="font-weight: bold;">
                <span><a href="{{url('/')}}" rel="home" style="color: white;">Home</a></span>
                <span><i class="fa fa-angle-right"></i></span>
                <span><a href="#"></a>Notice Board</span>
                <span><i class="fa fa-angle-right"></i></span>
                <span class="active">Tenders & Notice Archive</span>
              </div>
            </nav>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <!-- Section: About -->
  <section>
    <div class="container">
      <div class="section-content">
        <div class="row">
          <div class="col-md-12 my-4 border-bottom">
            <div class="col-md-6">
              <h3 style="" class="font-weight-bold">Tenders & Notice Archive</h3>
            </div>
            <div class="col-md-6">
              <a class="btn btn-danger pull-right" href="{{url('/Tenders-Notice')}}">Tenders & Notice</a>
            </div>
          </div>
          <style> th { background: #003630 !important; } </style>
          <div class="col-md-12">
            <div class="table-responsive">
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Tender No</th>
                    <th>Issuing Authority</th>
                    <th>Particulars</th>
                    <th>Status</th>
                    <th>Start Date Time</th>
                    <th>Last Date Time</th>
                    <th>Document</th>
                  </tr>

                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @foreach($tender_master as $item)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->tender_no}}</td>
                    <td>
                      @foreach($department_master as $department_masters)
                      @if($item->department == $department_masters->id)
                      {{$department_masters->name}}
                      @endif
                      @endforeach
                    </td>
                    <td>{!! $item->name_of_material !!}</td>
                    <td>{{ DB::table('category_master')->where('id', $item->category)->first()->name }}</td>
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->opening_date}}</td>
                    <td><a href="{{url('/')}}/uploads/tender/{{$item->file}}" target="_blank" class="btn btn-danger btn-sm" tabindex="0" title="Download File" download="">Download (Language - Hindi and English) <i class="fa fa-file-archive-o" aria-hidden="true"></i></a></td>

                  </tr>
                  @php
                  $i++;
                  @endphp

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-12">
            <div class="a" style="height: 170px"><span class="a"></span></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- end main-content -->
@endsection
@section('script')
<script src="{{url('/')}}/assets/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>
@endsection