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
                width: 60%;
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
            }

            #submit
            {
                border:none;
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
                  <span><a href="#"></a>Regulatory Information</span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Theft Assessment Calculator</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Theft Assessment Calculator</h3>
              <hr>
            </div>


            <div class="col-md-12">
            <form method="post" novalidate  action="{{url('/assessment-calculator')}}" enctype="multipart/form-data">
               @csrf

                <div id="field_row" class="row">
                    <div class="col-md-12">
                        <h4 style="text-align: center;color: #3c3a3a; font-weight:bold;" tabindex="0">Assessment in case of unauthorized use of electricity (for domestic and commercial consumers)</h4>
                        <p style="text-align: center;color: #3c3a3a;border-bottom: 4px solid #f39519;padding-bottom: 12px; font-weight:bold;" tabindex="0">Please fill the following information"</p>
                        <div class="row">
                            <div class="col-md-4">
                                <label tabindex="0">Fixed load - (L)</label>
                                <input type="text" class="form-control" placeholder="Fixed load" name="nirdharit_load" id="nirdharit_load" value="{{ session('nirdharit_load') }}" tabindex="0"/>
                            </div>
                            <div class="col-md-4">
                                <label tabindex="0">Duration in months - (D)</label>
                                <input type="text" class="form-control" placeholder="Duration in months" name="awadhi_mahino_mai" id="awadhi_mahino_mai" value="{{ session('awadhi_mahino_mai') }}" tabindex="0"/>
                            </div>
                            <div class="col-md-4">
                                <label tabindex="0">Actual Power Supply (in hours) - (H)</label>
                                <input type="text" class="form-control" placeholder="Actual Power Supply (in hours)" name="vidyut_aapurti" id="vidyut_aapurti" value="{{ session('vidyut_aapurti') }}" tabindex="0"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label tabindex="0">Load factor - (F) The load factor for outright theft would be 1</label>
                                
                                <select class="form-control" name="load_factor" id="load_factor" required="required" tabindex="0" oninvalid="this.setCustomValidity('')" oninput="setCustomValidity('')" title="">
                                          <option value="">--- Select ---</option>
                                          <option value="A" {{ session('load_factor') == 'A' ? 'selected' : '' }}>
                                              For L&F and domestic energy consumers (F = 0.30)
                                          </option>
                                          <option value="B" {{ session('load_factor') == 'B' ? 'selected' : '' }}>
                                              For non-domestic L&F and energy consumers (F = 0.50)
                                          </option>
                                          <option value="C" {{ session('load_factor') == 'C' ? 'selected' : '' }}>
                                              For small and medium energy consumers (F = 0.50)
                                          </option>
                                          <option value="D" {{ session('load_factor') == 'D' ? 'selected' : '' }}>
                                              For large and heavy energy consumers (F = 0.75)
                                          </option>
                                          <option value="E" {{ session('load_factor') == 'E' ? 'selected' : '' }}>
                                              For agriculture (F = 0.30)
                                          </option>
                                          <option value="F" {{ session('load_factor') == 'F' ? 'selected' : '' }}>
                                              Cadre not covered above (F= 0.50)
                                          </option>

                                </select>
                            </div>

                            <div class="col-md-6">
                                <label tabindex="0">Nature of combination</label>
                                <select class="form-control" name="area_type" id="area_type" required="required" tabindex="0" oninvalid="this.setCustomValidity('')" oninput="setCustomValidity('')" title="">
                                    <option value="" {{ session('area_type') == '' ? 'selected' : '' }}>--- Select ---</option>
                                    <option value="Domestic" {{ session('area_type') == 'Domestic' ? 'selected' : '' }}>Domestic</option>
                                    <option value="Commercial" {{ session('area_type') == 'Commercial' ? 'selected' : '' }}>Commercial</option>
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
                                    <th tabindex="0">Fixed unit</th>
                                    <td tabindex="0">Rs. {{ session('nirdharit_ikai') }}  </td>
                                </tr>
                                <tr>
                                    <th tabindex="0">Provisional Assessment Amount (Rs.)</th>
                                    <td tabindex="0">Rs. {{ session('nirdharan_dhanrashi') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table style="width: 100%;margin-top: 30px;background: #f3f3f3;">
                            <tbody>
                                <tr>
                                    <td colspan="2" tabindex="0">Note:</td>
                                </tr>
                                <tr>
                                    <th tabindex="0">Fixed unit</th>
                                    <td tabindex="0">L*F*D*H</td>
                                </tr>
                                <tr>
                                    <th tabindex="0">Fixed load</th>
                                    <td tabindex="0">Connected load as per checking report in KW</td>
                                </tr>
                                <tr>
                                    <th tabindex="0">Actual Power Supply (in hours)</th>
                                    <td tabindex="0">The actual number of hours when the supply is made available on the feeder.</td>
                                </tr>
                                <tr>
                                    <th tabindex="0">Duration in months</th>
                                    <td tabindex="0">The period during which such unauthorized use of electricity is made and if the period during which such unauthorized use of electricity is made cannot be ascertained, such period shall be the period of 12 months (365 days) immediately preceding the date of inspection. will be limited to</td>
                                </tr>
                                <tr>
                                    <th tabindex="0">Load factor : (F) The lead factor for outright theft would be 1</th>
                                    <td>
                                    <p tabindex="0">In case of unauthorized use of electricity, loaders connected to different types of supply, as given below:-</p>
                                    <ul>
                                        <li tabindex="0">(A) For L&F and domestic energy consumers (F = 0.30)</li>
                                        <li tabindex="0">(B) For non-domestic L&F and energy consumers (F = 0.50)</li>
                                        <li tabindex="0">(C) For small and medium energy consumers (F = 0.50)</li>
                                        <li tabindex="0">(D) For large and heavy energy consumers (F = 0.75)</li>
                                        <li tabindex="0">(E) For agriculture (F = 0.30)</li>
                                        <li tabindex="0">(F) Cadre not covered above (F= 0.50)</li>
                                    </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th tabindex="0">Nature of combination:-</th>
                                    <td tabindex="0">Commercial and Domestic (Price can be selected in the form of drop down)</td>
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

        $("th,td,h6,h4,h5,p,label,#submit").css({
            'color' : 'yellow'
        });
    }
    </script>
  <!-- end main-content -->
@endsection
