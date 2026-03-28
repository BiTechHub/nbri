@extends('frontend.layouts.main')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/jquery.dataTables.min.css">
<!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg" style="background-image: url(/img/about-1.jpg);background-size: cover;background-attachment: fixed;padding: 50px 0 33px 0;position: relative;">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center text-white" >
            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
              <div class="breadcrumbs pull-right" style="font-weight: bold;">
                <span><a href="{{url('/')}}" rel="home" style="color: white;">Home</a></span>
                <span><i class="fa fa-angle-right"></i></span>
                <span class="active">Office Orders</span>
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
              <h3 style="" class="font-weight-bold">Office Orders</h3>
            </div>
            <div class="col-md-6">
              <a class="btn btn-danger pull-right" href="{{url('/office-orders-archive')}}">Office Orders Archive</a>
            </div>
          </div>
          <style> th { background: #003630 !important; } </style>
            <div class="col-md-12">
              <div class="table-responsive">
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Order No.</th>
                    <th scope="col">Category</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Order Date</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach ($order as $orders)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$orders->order_no}}</td>
                    <td>{{$orders->category}}</td>
                    <td><a href="{{url('/')}}/uploads/office_order/{{$orders->file_name}}" target="_blank">{{$orders->subject}} <span><img src="/img/pdf.png" alt=""></span></a></td>
                    <td>{{$orders->order_date}}</td>
                  </tr>
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
