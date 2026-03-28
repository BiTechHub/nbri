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
    margin-top: 20px;
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
    font-weight: strong;
    width:60%;
    background: #234a66;
                color: #fff;
}

.form-control:disabled, .form-control[readonly] {
    background-color: #ffffff;
    opacity: 1;
}

#submit
{
    border:none;
}

.form-control {
                border: 1px solid #ed9521;
            }

#error
{
    color:red;
}

#field_row
{
    background-image: linear-gradient(62deg, #e5f5fd 0%, #9acaed 100%);
    padding: 15px;
    margin: 0;
    box-shadow: 0 2px 4px 0 rgb(0 0 0 / 20%), 0 3px 10px 0 rgb(0 0 0 / 19%);
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
                  <span><a href="#"></a>Calculators</span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Estimate Calculator</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Estimate Calculator</h3>
              <hr>
            </div>


            <div class="col-md-12">
			<form method="post" novalidate action="{{url('/estimateCalculator')}}" enctype="multipart/form-data">
              @csrf
			<div id="field_row" class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <label tabindex="0">Load Range</label>
                        <select class="form-control" name="load_range" id="load_range" required="required" onchange="underGroundLine();" tabindex="0">
                            <option value="">--- Select ---</option>
                          @foreach($loadmaster as $loadmasters)
                                <option value="{{$loadmasters->id}}" {{ session('load_range') == $loadmasters->id ? 'selected' : '' }}>{{$loadmasters->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-4" id="overhead_div">
                        <label tabindex="0">Length of Overhead Line</label>
                        <input type="text" class="form-control" placeholder="Length of Overhead Line" name="length_of_overhead_line" id="length_of_overhead_line" value="{{ session('length_of_overhead_line') }}" onblur="calculateTotalLength();" required="required" tabindex="0"/>
                    </div>
                    
                    <div class="col-md-4" id="underground_div">
                       
                            <input type="hidden" name="length_of_underground_line" id="length_of_underground_line" value="0" tabindex="0"/>
                            
                        <label tabindex="0">Length of Underground Line</label>
                        <input type="text" class="form-control" placeholder="Length of Underground Line" name="length_of_underground_line" id="length_of_underground_line" value="{{ session('length_of_underground_line') }}" onblur="calculateTotalLength();" tabindex="0"/>
                        
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label tabindex="0">Total Length of Line</label>
                        <input type="number" class="form-control" placeholder="Total Length of Line" name="total_length_of_line" id="total_length_of_line" value="{{ session('total_length_of_line') }}" readonly="readonly" tabindex="0"/>
                    </div>

                    <div class="col-md-4">
                        <label tabindex="0">Area Type</label>
                        <select class="form-control" name="area_type" id="area_type" required="required" tabindex="0" title="">
                            <option value="">--- Select ---</option>
                          @foreach($areamaster as $areamasters)
                                <option value="{{$areamasters->id}}" {{ session('area_type') == $areamasters->id ? 'selected' : '' }}>{{$areamasters->name}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label tabindex="0">Line Installation Option</label>
                        <select class="form-control" name="line_installation_option" id="line_installation_option" required="required" tabindex="0" title="">
                            <option value="">--- Select---</option>
                            @foreach($linemaster as $linemasters)
                                <option value="{{$linemasters->id}}" {{ session('line_installation_option') == $linemasters->id ? 'selected' : '' }}>{{$linemasters->name}}</option>
                         	@endforeach
                        </select>
                    </div>
                </div>
                   <br> 
                <div class="row">
                    <div style="text-align: center;" class="col-md-12">
                        <input style="width: auto;background: #ed9521;padding: 10px 20px !important;color: #fff;font-weight: 500;" type="submit" class="btn btn-primary" value='Submit' name="submit" id="submit" tabindex="0">
                    </div>
                </div>
			</div>
        	</div>
        	<div class="row">
            <div class="col-md-12">
                <table style="width: 100%;margin-top: 30px;background: #f3f3f3;">
                    <tbody>
                        <tr>
                            <th tabindex="0">Cost of Overhead Line</th>
                            <td tabindex="0">Rs. {{ session('cost_of_overhead_line') }}</td>
                        </tr> 
                        <tr>
                            <th tabindex="0">Cost of Underground Line</th>
                            <td tabindex="0">Rs. {{ session('cost_of_underground_line') }}</td>
                        </tr>
                        <tr>
                            <th tabindex="0">Total Estimate (Line Installation by Licensee) (exclusive GST)</th>
                            <td tabindex="0">Rs. {{ session('total_estimate_licensee_exclusive_gst') }}</td>
                        </tr>
                        <tr>
                            <th tabindex="0">GST(18%)</th>
                            <td tabindex="0">Rs. {{ session('gst') }}</td>
                        </tr>
                        <tr>
                            <th tabindex="0">Total Estimate (Line Installation by Licensee) (inclusive GST)</th>
                            <td tabindex="0">Rs. {{ session('total_estimate_licensee_inclusive_gst') }}</td>
                        </tr>
                        <tr>
                            <th tabindex="0">Total Estimate (Line Installation by Applicant) (exclusive GST)</th>
                            <td tabindex="0">Rs. {{ session('total_estimate_applicant_exclusive_gst') }}</td>
                        </tr>
                        <tr>
                            <th tabindex="0">Total Estimate (Line Installation by Applicant) (inclusive GST)</th>
                            <td tabindex="0">Rs. {{ session('total_estimate_applicant_inclusive_gst') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        	</div>
        	<div style="margin-top: 15px;" class="row">
            <h4 tabindex="0"><strong>Disclaimer</strong></h4> 		
            <p tabindex="0">Above estimation is done as per Cost data book approved by Hon. UPERC and esatimation may change based on actual site condition such as :-</p>		
            <ol style="list-style: inside;">
                <li tabindex="0">Additional double pole</li>		
                <li tabindex="0">Railway Crossing</li>		
                <li tabindex="0">River Crossing</li>		
                <li tabindex="0">Highway/Road Crossing</li>		
                <li tabindex="0">Right of Way Objections</li>		
                <li tabindex="0">Avilability of Bay</li>		
                <li tabindex="0">Presence of existing Underground network of power corporation as well as other department</li>		
                <li tabindex="0">Presence of Sewer or IGL network</li>		
                <li tabindex="0">Requirement of underground tranchless line</li>		
            </ol>
        	</div>
        </form>
		</div>


          </div>
        </div>
	  
	      </div>

    </section>
  </div>
 <script>
    function underGroundLine()
    {
        var load_range=$("#load_range").val();
        $("#length_of_overhead_line").focus();
        if(load_range=="1")
        {
            $("#length_of_underground_line").val("");
            $("#underground_div").html('<input type="hidden" name="length_of_underground_line" id="length_of_underground_line" value="0" tabindex="0"/>'); 
        }
        else
        {
            $("#underground_div").html('<label tabindex="0">Length of Underground Line</label> <input type="text" class="form-control" placeholder="Length of Underground Line" name="length_of_underground_line" id="length_of_underground_line" tabindex="0" value="" onblur="calculateTotalLength();" />');
        }

        if(sessionStorage.getItem('black_theme_session')=="Yes")
        {
            $("th,td,h6,h4,h5,label,#submit,#error").css({
            'color' : 'yellow'
            });
        }
    }

    function calculateTotalLength()
    {
        var length_of_overhead_line=$("#length_of_overhead_line").val();
        var length_of_underground_line=$("#length_of_underground_line").val();
        if(length_of_overhead_line<0 || isNaN(length_of_overhead_line))
        {
            alert("Enter Correct Length of Overhead Line");
            $("#length_of_overhead_line").val("");
            $("#length_of_overhead_line").focus();
        }
        else if(length_of_underground_line<0 || isNaN(length_of_underground_line))
        {
            alert("Enter Correct Length of Underground Line");
            $("#length_of_underground_line").val("");
            $("#length_of_underground_line").focus();
        }
        else
        {
            if(length_of_overhead_line=="")
            {
                length_of_overhead_line=0;
            }
            if(length_of_underground_line=="")
            {
                length_of_underground_line=0;
            }
            var total_length_of_line=parseFloat(length_of_overhead_line)+parseFloat(length_of_underground_line);
            $("#total_length_of_line").val(total_length_of_line);
        }
    }

    
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


        $("th,td,h6,h4,h5,label,#submit,#error").css({
            'color' : 'yellow'
        });
    }
    
    </script>
  <!-- end main-content -->
@endsection
