
@extends('frontend.layouts.main')
@section('content')
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
padding: 4px !important;


}
body
{
font-family: 'Rubik', sans-serif;
font-size: 14px;
}
p {
margin-bottom: 0px !important;
}
</style>
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/jquery.dataTables.min.css">
<!-- Start main-content -->
<div class="main-content-area">
<!-- Section: page title -->
<section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg" style="background-image: url({{url('/')}}/img/about-1.jpg);background-size: cover;background-attachment: fixed;padding: 50px 0 33px 0;position: relative;">
<div class="container pt-50 pb-50">
<div class="section-content"> 
  <div class="row">
    
    <div class="col-md-12 text-center text-white">
      <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
        <div class="breadcrumbs pull-right" style="font-weight: bold;">
          <span><a href="{{url('/')}}" rel="home" style="color: white;">Home</a></span>
          <span><i class="fa fa-angle-right"></i></span>
          
          <span>
            
            @if($menu == 'About Us')
            <a href="{{url('/')}}/about-us" style="color: white;">{{$menu}}</a>
          @else
            <a href="{{url('/')}}/{{$main_cat}}/{{$menu}}" style="color: white;">{{$menu}}</a>
           @endif
          </span>
          
          <span><i class="fa fa-angle-right"></i></span>
          <span class="active">{{$submenu}}</span>
        </div>
      </nav>
    </div>
  </div>
</div>
</div>
</section>
<!-- Section: About -->
<section id="skipCont">
<div class="container">
<div class="section-content">
  <div class="row">
    <div class="col-md-12 mt-4">
      <h3 style="text-align: center;" class="font-weight-bold">{{$submenu}}</h3>
      <hr>
    </div>
    <style> th { background: #003630 !important; } </style>
	
    @if ($sitecontents && count($sitecontents) > 0 || $directorymaster && $submenu =='Who’s Who' || $directorymaster && $submenu =='Apply For New Connection' || $directorymaster && $submenu =='Locate Us' )


    @if ($sitecontents && $sitecontents->first() && $sitecontents->first()->con_type == 'Pdf')
    <div class="col-md-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Contents</th>
            <th scope="col">View/Downloads</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach ($sitecontents as $itam)
          @if ($itam->con_type == 'Pdf')  
          <tr>
            <td>{{$i++}}</td>
            <td><?php echo $itam->heading; ?>
<span>
    – 
    <?php if($itam->lang): ?>
        (भाषा – हिंदी)
    <?php else: ?>
        (Language – <?php echo $itam->language; ?>)
    <?php endif; ?>
</span>
</td>

<td><a class="btn btn-success btn-sm" href="<?php echo url('/') . '/uploads/' . $itam->image; ?>" target="_blank">
View/Download<img src="<?php echo url('/') . '/img/pdf.png'; ?>" alt="">
</a></td>
            <!--<td>{{ \Carbon\Carbon::parse($itam->created_at)->format('d-m-Y') }}</td>-->

          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
    @endif


    @if ($sitecontents && count($sitecontents) > 0)
          @foreach ($sitecontents as $itam)
          @if ($itam->con_type == 'Text' && $submenu != 'Apply For New Connection')  
    <div class="col-md-12 mt-4">
        @if ($itam->image)
        <img class="card-img-top col-md-4" src="{{url('/')}}/uploads/{{$itam->image}}" alt="Card image cap">
        @endif
          <!--<h5>{{$itam->heading}}</h5>-->
          <p>{!!$itam->content!!}</p>
    </div>
      @endif
      @endforeach
      @endif
      
  @if ($submenu == 'Who’s Who')
  <div class="col-md-12 mt-4">
        <h3>Officers Phone Directory</h3>
  </div>
  <div class="col-md-12">
    @foreach($category as $cate)
        <button class="btn btn-info mb-4 btn-data btn-lg" data-name="{{$cate->name}}" data-id="{{$cate->id}}" title="{{ $cate->name }}">{{ $cate->name }}</button>
    @endforeach
  </div>
      <div class="col-md-12">
        <h4 class="text-center" id="directori_name">{{ $name ?? 'Phone Directory' }}</h4>
        <div class="table-responsive">
      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Name of Office</th>
              <th scope="col">Designation</th>
              <th scope="col">Area</th>
              <th scope="col">Twitter</th>
              <th scope="col">Email Id</th>
              <th scope="col">Contact No.</th>
            </tr>
          </thead>
          <tbody id="director">
            @php
              $i = 1;
            @endphp
            @foreach ($directorymaster as $dire)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$dire->name}}</td>
              <td>{{$dire->designation}}</td>
              <td>@if($dire->area){{$dire->area}}@else --- @endif</td>
              <td>@if($dire->twitter){{$dire->twitter}}@else --- @endif</td>
              <td>@if($dire->email){{$dire->email}}@else --- @endif</td>
              <td>@if($dire->contact){{$dire->contact}}@else --- @endif</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
      @endif

	@if ($submenu == 'Apply For New Connection')
		<div class="col-md-4 mt-4">
		  <div class="card" >
			<img class="card-img-top" src="{{url('/')}}/img/conection1.png" alt="Card image cap">
			<div class="card-body p-2">
			  <h5 class="card-title"></h5>
			  <p class="card-text" style="text-align: center;">
			 <a href="https://jhatpatportal.uppcl.org/jhatpat/deptLogin" style="color: #ff7c1b;font-weight: 600;" target="_blank">Apply For New Domestic Connection &amp; Comm. / Indus. Connection (Upto 20KW) (Jhatpat Connection)</a></p>
			  </p>
			</div>
		  </div>
		</div>
		<div class="col-md-4 mt-4">
		  <div class="card" >
			<img class="card-img-top" src="{{url('/')}}/img/conection2.jpg" alt="Card image cap">
			<div class="card-body p-2">
			  <h5 class="card-title"></h5>
			  <p class="card-text" style="text-align: center;">
			 <a href="http://niveshmitra.up.nic.in/" style="color: #ff7c1b;font-weight: 600;" target="_blank">Apply for New Electricity Connection for Commerical, Industrial & Institutional Users (Above 20KW) (Nivesh Mitra)</a></p>
			  </p>
			</div>
		  </div>
		</div>
		<div class="col-md-4 mt-4">
		  <div class="card" >
			<img class="card-img-top" src="{{url('/')}}/img/conection3.jpg" alt="Card image cap">
			<div class="card-body p-2">
			  <h5 class="card-title"></h5>
			  <p class="card-text" style="text-align: center;">
			 <a href="http://ptw.uppcl.org/online/account/login" style="color: #ff7c1b;font-weight: 600;" target="_blank">Apply for New Electricity Connection for Private Tube Well</a></p>
			  </p>
			</div>
		  </div>
		</div>
		<div class="col-md-4 mt-4">
		  <div class="card" >
			<img class="card-img-top" src="{{url('/')}}/img/conection4.jpg" alt="Card image cap">
			<div class="card-body p-2">
			  <h5 class="card-title"></h5>
			  <p class="card-text" style="text-align: center;">
			 <a href="https://jtp.uppcl.org/online/frmLogin.aspx" style="color: #ff7c1b;font-weight: 600;" target="_blank">Apply for single point to multi point connection</a></p>
			  </p>
			</div>
		  </div>
		</div>
    @endif
	  
@if ($submenu == 'Locate Us')
<link href="{{url('/')}}/assets/organisationstructure.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/assets/organisationstructure2.css" rel="stylesheet" media="all">

<div class="col-md-12">
<div class="wpb_column vc_column_container vc_col-sm-6">
<div class="vc_column-inner">
<div class="wpb_wrapper">
<div class="vc-hoverbox-wrapper  cntct vc-hoverbox-shape--square vc-hoverbox-align--center vc-hoverbox-direction--default vc-hoverbox-width--100" ontouchstart="">
<div class="vc-hoverbox" style="perspective: 2280px;">
<div class="vc-hoverbox-inner" style="min-height: 259px;">
<div class="vc-hoverbox-block vc-hoverbox-front lazy" style="background-image: url(&quot;{{url('/')}}/img/pvvnl-office.jpg&quot;);" data-bg="url(/img/pvvnl-office.jpg)" data-was-processed="true">
<div class="vc-hoverbox-block-inner vc-hoverbox-front-inner">
    <h2 style="text-align:center" tabindex="0" data-swp-font-size="20px">Corporate Office</h2>
</div>
</div>
<div class="vc-hoverbox-block vc-hoverbox-back" style="background-color: #5aa1e3;">
<div class="vc-hoverbox-block-inner vc-hoverbox-back-inner">
    <h2 style="text-align:center" tabindex="0" data-swp-font-size="20px">Corporate Office</h2>
    <p style="text-align: center;" tabindex="0" data-swp-font-size="14px">Office of the Managing Director</p>
<p tabindex="0" data-swp-font-size="14px">Urja Bhawan</p>
<p tabindex="0" data-swp-font-size="14px">Pashchimanchal Vidyut Vitran Nigam Ltd., Victoria Park, Meerut-250001, UP, India</p>
<p tabindex="0" data-swp-font-size="14px"><a tabindex="0" title="1800-180-3002/1912" href="tel:1800-180-3002">1800-180-3002/1912</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="wpb_column vc_column_container vc_col-sm-6">
<div class="vc_column-inner">
<div class="wpb_wrapper">
<div class="vc-hoverbox-wrapper  cntct vc-hoverbox-shape--square vc-hoverbox-align--center vc-hoverbox-direction--default vc-hoverbox-width--100" ontouchstart="">
<div class="vc-hoverbox" style="perspective: 2280px;">
<div class="vc-hoverbox-inner" style="min-height: 259px;">
<div class="vc-hoverbox-block vc-hoverbox-front lazy" style="background-image: url(&quot;{{url('/')}}/img/contact.png&quot;);" data-bg="url(/img/contact.png)" data-was-processed="true">
<div class="vc-hoverbox-block-inner vc-hoverbox-front-inner">
    <h2 style="text-align:center" tabindex="0" data-swp-font-size="20px">Help Line No.</h2>
</div>
</div>
<div class="vc-hoverbox-block vc-hoverbox-back" style="background-color: #5aa1e3;">
<div class="vc-hoverbox-block-inner vc-hoverbox-back-inner">
    <h2 style="text-align:center" tabindex="0" data-swp-font-size="20px">Help Line No.</h2>
    <p data-swp-font-size="14px"><a tabindex="0" href="tel:1800-180-3002" title="1800-180-3002/1912">1800-180-3002/1912</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>	  
	  
@endif	  
   @else
    <td colspan="5" class="text-center">At present there is no content available for this page, once content will be available would be updated.</td>
    @endif
    <div class="col-md-12">
      <div class="a" style="height: 170px"><span class="a"></span></div>
    </div>
  </div>
</div>
</div>
</section>
</div>
<!-- end main-content -->
<script src="{{url('/')}}/assets/jquery.min.js"></script>
<script>
$(document).ready(function () {
  var prevClickedButton = null;
$('.btn-data').on('click', function () {
  
    var dataValue = $(this).data('id'); 
  	var dataname = $(this).data('name'); 
  
  if (prevClickedButton !== null) {
        prevClickedButton.removeClass('btn-warning').addClass('btn-info');
    }
  $(this).removeClass('btn-info').addClass('btn-warning');
   prevClickedButton = $(this);
    $.ajax
			({
				url:"{{url('/')}}/read_data/"+dataValue,
				dataType:'json',
				success:function(data)
				{
      var j=1;
					var msg='';
					for(var i=0;i<data.length;i++)
					{
					    if(data[i].name=='Nodal Officer Name of Helpdesk'){
                      msg += '<tr style="background: #003630 !important;color: white;">';
                      msg += '<td>' + j++ + '</td>';
                      msg += '<td>' + (data[i].name || '---') + '</td>';
                      msg += '<td>' + (data[i].designation || '---') + '</td>';
                      msg += '<td>' + (data[i].area || '---') + '</td>';
                      msg += '<td>' + (data[i].twitter || '---') + '</td>';
                      msg += '<td>' + (data[i].email || '---') + '</td>';
                      msg += '<td>' + (data[i].contact || '---') + '</td>';
                      msg += '</tr>';
                      
					    }else{
					        msg += '<tr>';
                      msg += '<td>' + j++ + '</td>';
                      msg += '<td>' + (data[i].name || '---') + '</td>';
                      msg += '<td>' + (data[i].designation || '---') + '</td>';
                      msg += '<td>' + (data[i].area || '---') + '</td>';
                      msg += '<td>' + (data[i].twitter || '---') + '</td>';
                      msg += '<td>' + (data[i].email || '---') + '</td>';
                      msg += '<td>' + (data[i].contact || '---') + '</td>';
                      msg += '</tr>';
					        
					    }

					}

					$("#director").html(msg);
                  	$("#directori_name").html(dataname);
                  	$("#dtBasicExample_paginate").css("display", "none");
                    $("#dtBasicExample_info").css("display", "none");
				}
			});
});
});

</script>

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