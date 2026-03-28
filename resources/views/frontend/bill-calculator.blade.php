@extends('frontend.layouts.main') 
@section('content')
<link href="{{url('/')}}/assets/organisationstructure.css" rel="stylesheet" media="all">
<!-- Start main-content -->
<style>            
  body
  {
    font-family: 'Rubik', sans-serif;
    font-size: 14px;
  }

  input {
    width: 100%;
    margin-bottom: 20px;
    padding: 15px 10px !important;
  }

  label {
    <!-- margin-top: 20px; -->
    margin-bottom: 10px;
  }


  table, th, td {
    border: 1px solid #000000;
  }

  th, td {
    padding: 15px;
    font-size:14px;
  }



  th {
    font-weight: bold;
    background: #234a66;
    color: #fff;
  }

  .form-control:disabled, .form-control[readonly] {
    background-color: #ffffff;
    opacity: 1;
  }

  .form-control {
    border: 1px solid #ed9521;
    font-size:14px;
  }

  h6 {
    color: #423e3e;
  }


  #submit{
    width: auto !important;
    background: #ed9521;
    padding: 10px 20px !important;
    color: #fff;
    font-weight: 500 !important;
    border:none !important;
    font-size:14px;
  }

  #field_row{
    background-image: linear-gradient(62deg, #e5f5fd 0%, #9acaed 100%);
    padding: 15px;
    margin: 0;
  }
</style>
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
                <span><a href="#"></a>Consumer Services</span>
                <span><i class="fa fa-angle-right"></i></span>
                <span class="active">Bill Calculator</span>
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
          <div class="col-md-12 mt-4">
            <h3 style="text-align: center;" class="font-weight-bold">Bill Calculator</h3>
            <hr>
          </div>


          <div class="col-md-12">
            <form method="post" action="{{ url('/calculate-billing') }}" enctype="multipart/form-data">
              @csrf
              <div class="row" id="field_row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <label tabindex="0">Tarrif</label>
                      <select class="form-control" name="tarrif" id="tarrif" required="required" onchange="getSuppyDetails();" tabindex="0" title="">
                        <option value="">---Select ---</option>
                        <option value="LMV 1" {{ session('tarrif') == 'LMV 1' ? 'selected' : '' }} >LMV 1</option>
                        <option value="LMV 2" {{ session('tarrif') == 'LMV 2' ? 'selected' : '' }} >LMV 2</option>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label tabindex="0">Supply Type</label>
                      <input type="text" tabindex="0" class="form-control" name="supply_type" id="supply_type" required="required" value="{{ session('supply_type') }}" readonly title=""/>
                    </div>
                  </div>
                  <div id="input_div" >
                    @if(session('tarrif'))
                    <div class="row"> 
                      <div class="col-md-12"> 
                        <p style="font-weight: 700;margin-bottom: 0px; margin-top:15px;" tabindex="0">Duration</p> 
                      </div>
                      <div class="col-md-6"> 
                        <label tabindex="0">From:</label> 
                        <input type="date" tabindex="0" class="form-control" name="from_date" id="from_date" required="required" value="{{ session('from_date') }}" autocomplete="off" title=""  max="{{ now()->format('Y-m-d') }}"> </div> <div class="col-md-6"> <label tabindex="0">To:</label>
                      <input type="date" tabindex="0" class="form-control" name="to_date" id="to_date" required="required" value="{{ session('to_date') }}" autocomplete="off"  max="{{ now()->format('Y-m-d') }}" title="dd"> 
                      </div> 
                    </div> 
                    <div class="row"> <div class="col-md-12"> 
                      <label tabindex="0">Load (in KW) </label> 
                      <input type="text" tabindex="0" class="form-control" name="load" id="load" required="required" value="{{ session('load') }}" title=""> 
                      </div> 
                    </div> 
                    <div class="row"> <div class="col-md-6"> <label tabindex="0">Current Month Reading </label> 
                      <input type="text" tabindex="0" class="form-control" name="current_month_reading" id="current_month_reading" required="required" value="{{ session('current_month_reading') }}" title=""> 
                      </div>
                      <div class="col-md-6"> 
                        <label tabindex="0">Previous Month Reading</label> 
                        <input type="text" tabindex="0" class="form-control" name="previous_month_reading" id="previous_month_reading" required="required" value="{{ session('previous_month_reading') }}" title="">
                      </div> 
                    </div> 
                    <div class="row"> 
                      <div style="text-align: center;" class="col-md-12"> 
                        <input style="width: auto;background: #ed9521;padding: 10px 20px !important;color: #fff;font-weight: 500;" type="submit" class="btn btn-primary" value="Submit" name="submit" id="submit"> 
                      </div> 
                    </div>
                    @endif  
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table style="width: 100%;margin-top: 30px;background: #f3f3f3;">
                    <tbody>
                      <tr>
                        <th tabindex="0">Total Month</th>
                        <td tabindex="0">{{ session('total_month') }} month</td>
                      </tr>
                      <tr>
                        <th tabindex="0">Total Unit</th>
                        <td tabindex="0">Rs. {{ session('total_unit') }}</td>
                      </tr>
                      <tr>
                        <th tabindex="0">Total Energy Charges</th>
                        <td tabindex="0">Rs. {{ session('total_energy_charge') }}</td>
                      </tr>
                      <tr>
                        <th tabindex="0">Total Fixed Charges</th>
                        <td tabindex="0">Rs. {{ session('total_fixed_charge') }}</td>
                      </tr>
                      <tr>
                        <th tabindex="0">Total ED Charges</th>
                        <td tabindex="0">Rs. {{ session('total_ed_charge') }}</td>
                      </tr>
                      <tr>
                        <th tabindex="0">RSC Tarrif</th>
                        <td tabindex="0">Rs {{ session('total_rsc_charge') }}</td>
                      </tr>
                      <tr>
                        <th tabindex="0">Total Tarrif</th>
                        <td tabindex="0">Rs. {{ session('total_charges') }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>

    </div>

  </section>
</div>
<script>
  function getSuppyDetails()
  {
    var tarrif=$("#tarrif").val();
    if(tarrif!="")
    {
      if(tarrif=="LMV 1")
      {
        $("#supply_type").val('ST10');
      }
      else
      {
        $("#supply_type").val('ST20');
      }

      $("#input_div").html('<div class="row"> <div class="col-md-12"><p style="font-weight: 700;margin-bottom: 0px; margin-top:15px;" tabindex="0">Duration</p></div> <div class="col-md-6"> <label tabindex="0">From :</label> <input type="date" tabindex="0" class="form-control" name="from_date" id="from_date" required="required" autocomplete="off" title="" max="{{ now()->format('Y-m-d') }}"> </div> <div class="col-md-6"> <label tabindex="0">To :</label> <input type="date" tabindex="0" class="form-control" name="to_date" id="to_date" required="required" autocomplete="off" title="" max="{{ now()->format('Y-m-d') }}" > </div> </div> <div class="row"> <div class="col-md-12"> <label tabindex="0">Load (in KW)"</label> <input type="text" tabindex="0" class="form-control" name="load" id="load" required="required" title=""> </div> </div> <div class="row"> <div class="col-md-6"> <label tabindex="0">Current Month Reading</label> <input type="text" tabindex="0" class="form-control" name="current_month_reading" id="current_month_reading" required="required" title=""> </div> <div class="col-md-6"> <label tabindex="0">Previous Month Reading</label> <input type="text" tabindex="0" class="form-control" name="previous_month_reading" id="previous_month_reading" required="required" title=""> </div> </div> <div class="row"> <div style="text-align: center;" class="col-md-12"> <input style="width: auto;" type="submit" class="btn btn-primary" value="submit"> </div> </div>');
      if(sessionStorage.getItem('black_theme_session')=="Yes")
      {
        $("th,td,h6,label,#submit").css({
          'color' : 'yellow'
        });
        $("#submit").css("background-color","black");
      }
    }
    else
    {
      $("#supply_type").val('');
      $("#input_div").html('');
    }

    $("#from_date").datepicker
    ({
      changeMonth: true,
      changeYear: true,
      yearRange: '1950:<?php echo date("Y"); ?>',
      dateFormat: 'dd-mm-yy'
    });

    $("#to_date").datepicker
    ({
      changeMonth: true,
      changeYear: true,
      yearRange: '1950:<?php echo date("Y"); ?>',
      dateFormat: 'dd-mm-yy'
    });
  }

  $("#from_date").datepicker
  ({
    changeMonth: true,
    changeYear: true,
    yearRange: '1950:<?php echo date("Y"); ?>',
    dateFormat: 'dd-mm-yy'
  });

  $("#to_date").datepicker
  ({
    changeMonth: true,
    changeYear: true,
    yearRange: '1950:<?php echo date("Y"); ?>',
    dateFormat: 'dd-mm-yy'
  });

  if(sessionStorage.getItem('black_theme_session')=="Yes")
  {
    $("body,#submit").css({
      'background-color' : 'black',
      'color' : 'yellow'
    });

    $("td,#field_row").css({
      'background-color' : '#191919',
      'color' : 'yellow',
      'background-image' : 'none'
    });

    $("th").css({
      'background-color' : '#353935',
      'color' : 'yellow',
      'background-image' : 'none'
    });

    $("th,td,h6,p,label,#submit").css({
      'color' : 'yellow'
    });
  }
</script>
<!-- end main-content -->
@endsection
