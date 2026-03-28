@extends('frontend.layouts.main')
@section('content')
<style> th { background: #003630 !important; } </style>
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
                  <span><a href="#" style="color: white;">Consumer Services</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Consumer Forms</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Consumer Forms</h3>
              <hr>
            </div>
              
                <div class="col-md-12">
                  <h4 >New Connection</h4>
            <ul style="list-style: disc;margin-left: 30px;">
            <li><a  href="{{url('/')}}/uploads/new%20connection.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize26392kB" target="_blank" rel="noopener" title="Procedure for New Connection">Procedure for New Connection</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
            <li><a  href="{{url('/')}}/uploads/Reconnection.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize46882kB" target="_blank" rel="noopener" title="Procedure for Reconnection">Procedure for Reconnection</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
            <li><a  href="{{url('/')}}/uploads/change%20of%20category.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize15486kB" target="_blank" rel="noopener" title="Procedure for Change of Category">Procedure for Change of Category</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
            <li><a  href="{{url('/')}}/uploads/shifting%20of%20connection.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize98324kB" target="_blank" rel="noopener" title="Procedure for Shifting of Connection">Procedure for Shifting of Connection</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English &amp; Hindi)</span></li>
            <li><a  href="{{url('/')}}/uploads/transfer%20of%20connection.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize13227kB" target="_blank" rel="noopener" title="Procedure for transfer of connection / mutation of name">Procedure for transfer of connection / mutation of name</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
            <li><a  href="{{url('/')}}/uploads/Meter%20change.pdf" class="mtli_attachment mtli_pdf" data-mtli="mtli_filesize15881kB" target="_blank" rel="noopener" title="Procedure for Change of Meter">Procedure for Change of Meter</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
            <li >Difficulty in reading bills (Handheld bills, IBM bills)</li>
            </ul>
                </div>
              
        
                <div class="col-md-12">
                  <h4 >Charges for New Electric Connection</h4>
            <ol style="margin-left: 30px;">
            <li >Processing Fee</li>
            <li >Security Deposit</li>
            <li >Line Charges</li>
            <li >Meter cost and its equipment cost</li>
            <li >18% GST (Except Security Deposit)</li>
            </ol>
            <p ><strong>New Connection Charges as Per Cost Data Book-2019</strong></p>
            
                </div>
              
                <div class="col-md-12">
                  <h4 >Processing Fee</h4>
            <table class="table table-fixed inner-table" width="100%">
            <tbody>
            <tr>
            <th >S.No</th>
            <th >Description</th>
            <th >Rate</th>
            </tr>
            <tr>
            <td >1</td>
            <td >Load upto 1 KW &amp; BPL</td>
            <td >Rs. 10/-</td>
            </tr>
            <tr>
            <td >2</td>
            <td >Load upto 1 KW (Except BPL)</td>
            <td >Rs. 50/-</td>
            </tr>
            <tr>
            <td >3</td>
            <td >Load above 1 KW up to 24.9 KW</td>
            <td >Rs. 100/-</td>
            </tr>
            <tr>
            <td >4</td>
            <td >Load above 24.9 KW up to 50 KW/56 KVA</td>
            <td >Rs. 1000/-</td>
            </tr>
            <tr>
            <td >5</td>
            <td >Load above 56 KVA up to 500 KVA</td>
            <td >Rs. 5000/-</td>
            </tr>
            <tr>
            <td >6</td>
            <td >Load above 500 KVA up to 3000 KVA</td>
            <td >Rs. 10000/-</td>
            </tr>
            <tr>
            <td >7</td>
            <td >Load above 3000 KVA up to 10000 KVA</td>
            <td >Rs. 15000/-</td>
            </tr>
            <tr>
            <td >8</td>
            <td >Load above 10000 KVA</td>
            <td >Rs. 25000/-</td>
            </tr>
            </tbody>
            </table>
            
                </div>
              
                <div class="col-md-12">
                  <h4 >Security Deposit</h4>
            <table class="table table-fixed inner-table" width="100%">
            <tbody>
            <tr>
            <th >S.No</th>
            <th >Tariff</th>
            <th >Description</th>
            <th >Rate</th>
            <th >Per Unit</th>
            </tr>
            <tr>
            <td >1.</td>
            <td >LMV1</td>
            <td >Upto 1 KW (BPL)</td>
            <td >Rs. 0/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >2.</td>
            <td >LMV1</td>
            <td >Rural Consumer upto 2 KW</td>
            <td >Rs. 100/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >3.</td>
            <td >LMV1</td>
            <td >Urban Consumer upto 2 KW</td>
            <td >Rs. 300/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >4.</td>
            <td >LMV1</td>
            <td >Load above 2 KW</td>
            <td >Rs. 400/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >5.</td>
            <td >LMV2</td>
            <td >Non Domestic Consumers</td>
            <td >Rs. 1000/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >6.</td>
            <td >LMV2</td>
            <td >Sign Board, Sign Post, Flex, Glow Advertising</td>
            <td >Rs. 6000/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >7.</td>
            <td >LMV3</td>
            <td >Gram Panchayat</td>
            <td >Rs. 3400/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >8.</td>
            <td >LMV3</td>
            <td >Nagar Palika &amp; Nagar Panchayat</td>
            <td >Rs. 4000/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >9.</td>
            <td >LMV3</td>
            <td >Nagar Nigam</td>
            <td >Rs. 5000/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >10.</td>
            <td >LMV4</td>
            <td >Govt/Private Institutute</td>
            <td >Rs. 4000/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >11.</td>
            <td >LMV5</td>
            <td >Private Tubewell (PTW)</td>
            <td >Rs. 300/-</td>
            <td >BHP</td>
            </tr>
            <tr>
            <td >12.</td>
            <td >LMV6</td>
            <td >Small Industries and Power</td>
            <td >Rs. 1350/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >13.</td>
            <td >LMV7</td>
            <td >Public Water Works</td>
            <td >Rs. 4000/-</td>
            <td >KVA</td>
            </tr>
            <tr>
            <td >14.</td>
            <td >LMV8</td>
            <td >State Tubewell STW</td>
            <td >Rs. 2000/-</td>
            <td >KW</td>
            </tr>
            <tr>
            <td >15.</td>
            <td >HV1</td>
            <td >HT Consumers</td>
            <td >Rs. 4500/-</td>
            <td >KVA</td>
            </tr>
            <tr>
            <td >16.</td>
            <td >HV2</td>
            <td >HT Industrial Consumers</td>
            <td >Rs. 2200/-</td>
            <td >KVA</td>
            </tr>
            <tr>
            <td >17.</td>
            <td >HV3</td>
            <td >Railway Traction</td>
            <td >Rs. 4500/-</td>
            <td >KVA</td>
            </tr>
            <tr>
            <td >18.</td>
            <td >HV3</td>
            <td >Metro Rail</td>
            <td >Rs. 3000/-</td>
            <td >KVA</td>
            </tr>
            <tr>
            <td >19.</td>
            <td >HV4</td>
            <td >Lift Irrigation Work</td>
            <td >Rs. 3500/-</td>
            <td >KVA</td>
            </tr>
            <tr>
            <td >20.</td>
            <td >–</td>
            <td >Electrical Vehicle Charging HT/LT</td>
            <td >Rs. 400/-</td>
            <td >KW</td>
            </tr>
            </tbody>
            </table>
            
                </div>
              
                <div class="col-md-12">
                  <h4 >Service Line Charges</h4>
            <p >It includes the cost of line construction. Following are the only supervision and labour charges. It does not contain the cost of Cable. This is applicable for cable connection (less than 40 meters) only. A separate estimate is required for other than a cable connection. The consumer needs to purchase the cable with specifications:</p>
            <ul>
            <li >Load up to 2 KW – 2×4 sq mm PVC armored&nbsp; cable with the catenary arrangement (Rs. 38/m)</li>
            <li >Load up to 5 KW – 2×6 sq mm PVC armored&nbsp; cable with the catenary arrangement (Rs. 45/m)</li>
            <li >Load up to 5 KW&nbsp; underground – 2C x 10 sq mm PVC armored cable. (Rs. 56/m)</li>
            <li >Load from 5 KW to 25 KW – 4×25 sq mm armored&nbsp; cable with the catenary arrangement (Rs. 213/m)</li>
            <li >Load from 5 KW to 25 KW&nbsp; underground – 3.5 C x 35 sq mm XLPE armored cable&nbsp; (Rs. 220/m)</li>
            <li >Load from 26 KW to 50 KW – 3.5×70 sq mm armored&nbsp; cable with catenary arrangement (Rs. 248/m)</li>
            <li >Load from 26 KW to 50 KW underground- 70 sq mm XLPE cable (Rs. 248/m)</li>
            </ul>
            <table class="table table-fixed inner-table" width="100%">
            <tbody>
            <tr>
            <th >S.No</th>
            <th >Load</th>
            <th >Description</th>
            <th >Rate</th>
            </tr>
            <tr>
            <td >1.</td>
            <td >Upto 2 KW</td>
            <td >Rural (LMV1 &amp; LMV2 Only)</td>
            <td >Rs 150/-</td>
            </tr>
            <tr>
            <td >2.</td>
            <td >Upto 5 KW</td>
            <td >Overhead Urban</td>
            <td >Rs 398/-</td>
            </tr>
            <tr>
            <td >3.</td>
            <td >Upto 5 KW</td>
            <td >Underground</td>
            <td >Rs 687/-</td>
            </tr>
            <tr>
            <td >4.</td>
            <td >Upto 5 KW</td>
            <td >Underground road crossing</td>
            <td >Rs 2187/-</td>
            </tr>
            <tr>
            <td >5.</td>
            <td >5 KW to 24 KW</td>
            <td >Overhead</td>
            <td >Rs 2036/-</td>
            </tr>
            <tr>
            <td >6.</td>
            <td >5 KW to 24 KW</td>
            <td >Underground</td>
            <td >Rs 3082/-</td>
            </tr>
            <tr>
            <td >7.</td>
            <td >5 KW to 24 KW</td>
            <td >Underground road crossing</td>
            <td >Rs 5282/-</td>
            </tr>
            <tr>
            <td >8.</td>
            <td >25 KW to 50 KW</td>
            <td >Overhead</td>
            <td >Rs 3132/-</td>
            </tr>
            <tr>
            <td >9.</td>
            <td >25 KW to 50 KW</td>
            <td >Underground</td>
            <td >Rs 3477/-</td>
            </tr>
            <tr>
            <td >10.</td>
            <td >25 KW to 50 KW</td>
            <td >Underground road crossing</td>
            <td >Rs 6477/-</td>
            </tr>
            <tr>
            <td >11.</td>
            <td >PTW (Upto 7 BHP)</td>
            <td >Overhead (Single Ph Meter)</td>
            <td >Rs 468/-</td>
            </tr>
            <tr>
            <td >12.</td>
            <td >PTW (Upto 7 BHP)</td>
            <td >Overhead (Three Ph Meter)</td>
            <td >Rs 993/-</td>
            </tr>
            <tr>
            <td >13.</td>
            <td >PTW (above 7 BHP)</td>
            <td >Overhead</td>
            <td >Rs 2036/-</td>
            </tr>
            </tbody>
            </table>
            
                </div>
              
                <div class="col-md-12">
                  <h4 >Meter &amp; Its Equipment</h4>
            <p >Meter &amp; its equipments charge may be taken with service line charges. Consumer may purchase the meter if it is not available at store. But, it needs to check in departmental lab and specifications should be as specified by the department.</p>
            <table class="table table-fixed inner-table" width="100%">
            <tbody>
            <tr>
            <th >S.No</th>
            <th >Meter Type</th>
            <th >Rate</th>
            </tr>
            <tr>
            <td >1.</td>
            <td >Single Phase Static Meter</td>
            <td >Rs. 872/-</td>
            </tr>
            <tr>
            <td >2.</td>
            <td >Three Phase Static Meter</td>
            <td >Rs. 2921/-</td>
            </tr>
            <tr>
            <td >3.</td>
            <td >3 Ph 4 Wire LT TVM with Cubical</td>
            <td >Rs. 8483/-</td>
            </tr>
            <tr>
            <td >4.</td>
            <td >3 Ph 4 Wire Static TVM 11 KV</td>
            <td >Rs. 3768/-</td>
            </tr>
            <tr>
            <td >5.</td>
            <td >Meter With 11 KV Cubical (Rs. 44709/-)</td>
            <td >Rs. 48477/-</td>
            </tr>
            <tr>
            <td >6.</td>
            <td >Meter With 33 KV Cubical (Rs. 123176/-)</td>
            <td >Rs. 126944/-</td>
            </tr>
            </tbody>
            </table>
                </div>
       <div class="col-md-12">
              <div class="a" style="height: 170px"><span class="a"></span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
