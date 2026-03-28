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

p {
margin-bottom: 0px !important;
}


.common-wrapper .container.common-container.four_content {
    max-width: 1300px !important;
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
            <span><a href="#"></a> Regulatory Information</span>
            <span><i class="fa fa-angle-right"></i></span>
            <span class="active">Tariff Order</span>
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
        <h3 style="text-align: center;" class="font-weight-bold">Tariff Order</h3>
        <hr>
      </div>


      <div class="col-md-12">
          
          
          <p style="text-align: left;" tabindex="0" data-swp-font-size="14px"><strong tabindex="0">TRUING UP OF TARIFF FOR FY 2022-23, APR FOR FY 2023-24 AND ARR FOR FY 2024-25</strong></p>
<p tabindex="0" data-swp-font-size="14px">1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li data-swp-font-size="14px"><a tabindex="0" href="{{url('/')}}/uploads/tarifforder/PVVNL_FY2024-25_English.pdf" class="mtli_attachment mtli_pdf" target="_blank" rel="noopener" title="Public-Notice">Public-Notice</a> – <span tabindex="0">(Language – English)</span></li>
<li data-swp-font-size="14px"><a tabindex="0" href="{{url('/')}}/uploads/tarifforder/PVVNL_FY2024-25_Hindi.pdf" class="mtli_attachment mtli_pdf" target="_blank" rel="noopener" title="Public-Notice">Public-Notice</a> – <span tabindex="0">(Language – Hindi)</span></li>
</ul>
<p tabindex="0" data-swp-font-size="14px">2. ARR Petition for FY 2024-25</p>
<ul style="list-style: disc;margin-left: 30px;">
<li data-swp-font-size="14px"><a tabindex="0" href="{{url('/')}}/uploads/tarifforder/2_ARR_Petition_for_FY2024-25_PVVNL.pdf" class="mtli_attachment mtli_pdf" target="_blank" rel="noopener" title="ARR Petition for FY 2024-25">ARR Petition for FY 2024-25</a></li>
</ul>
<p tabindex="0" data-swp-font-size="14px">3. Datagap-1</p>
<ul style="list-style: disc;margin-left: 30px;">
<li data-swp-font-size="14px"><a tabindex="0" href="{{url('/')}}/uploads/tarifforder/PVVNL_Reply_to_1st_Information_Requirement_Clean.pdf" class="mtli_attachment mtli_pdf" target="_blank" rel="noopener" title="Reply to 1st Data Gaps-PVVNL">Reply to 1st Data Gaps-PVVNL</a></li>
<li data-swp-font-size="14px"><a tabindex="0" href="{{url('/')}}/uploads/tarifforder/Annexure_PVVNL_1st_data_gap_ARR_2024-25.pdf" class="mtli_attachment mtli_pdf" target="_blank" rel="noopener" title="Annexures for 1st Data Gap-PVVNL">Annexures for 1st Data Gap-PVVNL</a></li>
</ul>
<p tabindex="0" data-swp-font-size="14px">4. Datagap-2</p>
<ul style="list-style: disc;margin-left: 30px;">
<li data-swp-font-size="14px"><a tabindex="0" href="{{url('/')}}/uploads/tarifforder/PVVNL_Response_2nd_Deficiency_Final_Response.pdf" class="mtli_attachment mtli_pdf" target="_blank" rel="noopener" title="Reply to 2nd Data Gaps-PVVNL">Reply to 2nd Data Gaps-PVVNL</a></li>
<li data-swp-font-size="14px"><a tabindex="0" href="{{url('/')}}/uploads/tarifforder/Annexures-2_24_25.pdf" class="mtli_attachment mtli_pdf" target="_blank" rel="noopener" title="Annexures for 2nd Data Gap-PVVNL">Annexures for 2nd Data Gap-PVVNL</a></li>
</ul>
          
          
          
          
		<p style="text-align: left;"  ><strong >TRUING UP OF TARIFF FOR FY 2021-22, APR FOR FY 2022-23 AND APPROVAL OF ARR AND TARIFF FOR FY 2023-24</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Public-Notice-English_FY2023-24.pdf" class="" data-mtli="mtli_filesize41349kB" target="_blank" rel="noopener" title="Public-Notice">Public-Notice</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff-Order-FY-2023-24.pdf" class="" data-mtli="mtli_filesize992MB" target="_blank" rel="noopener" title="Tariff Order for FY 2023-24">Tariff Order for FY 2023-24 <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
</ul>
<p style="text-align: left;"  ><strong >Public Hearing: True-up for FY 2021-22, APR for FY 2022-23, and ARR Petition for FY 2023-24</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_FY2023-24_English.pdf" class="" data-mtli="mtli_filesize53425kB" target="_blank" rel="noopener" title="PVVNL Public Information">PVVNL Public Information</a>  <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >2. ARR Petition for FY 2023-24</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/1.-Covering-letter-PVVNL.pdf.pdf" class="" data-mtli="mtli_filesize650MB" target="_blank" rel="noopener" title="Covering Letter with Affidavit_PVVNL">Covering Letter with Affidavit_PVVNL</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/2023/03/2.ARR-Petition-for-FY2023-24_PVVNL_Final_DSC.pdf.pdf" class="" data-mtli="mtli_filesize351MB" target="_blank" rel="noopener" title="ARR Petition for FY 2023-24_PVVNL-Digitally Signed">ARR Petition for FY 2023-24_PVVNL-Digitally Signed</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/4.-MYT-Formats-for-FY23-PVVNL_DSC.pdf.pdf" class="" data-mtli="mtli_filesize910MB" title="MYT formats for FY23-PVVNL">MYT formats for FY23-PVVNL</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/5.-Additional-Format_DSC.pdf.pdf" class="" data-mtli="mtli_filesize357MB" title="PVVNL_Additional MYT Formats">PVVNL_Additional MYT Formats</a></li>
</ul>
<p  >3. Datagap-1</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Annexures-_1st-datagap-PDF.zip" class="mtli_attachment mtli_zip" data-mtli="mtli_filesize4029MB" target="_blank" rel="noopener" title="Annexures">Annexures</a> <span style="background-image:url('img/zip-icon-16x16.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/response-to-1st-data-gap-with-covering-letter.pdf" class="" data-mtli="mtli_filesize120MB" target="_blank" rel="noopener" title="Cover letter_882_1st datagap">Cover letter_882_1st datagap</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Appendix_1st-datagap-pdf.zip" class="mtli_attachment mtli_zip" data-mtli="mtli_filesize17727MB" target="_blank" rel="noopener" title="Appendix for 1st Data Gap-PVVNL">Appendix for 1st Data Gap-PVVNL</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/8821-14-02-2023signed-2.pdf" class="" data-mtli="mtli_filesize1976MB" target="_blank" rel="noopener" title="Reply to 1st Data Gaps-PVVNL_UPDATED_8821">Reply to 1st Data Gaps-PVVNL_UPDATED_8821</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >4. Datagap-2</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/2.-Annexure-I-F31_Long-term-loan_dates-PVVNLsigned.pdf" class="" data-mtli="mtli_filesize850MB" title="Annexures I">Annexures I</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/3.-Annexure-IIsigned.pdf" class="" data-mtli="mtli_filesize2421MB" title="Annexures II">Annexures II</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/4.-Annexure-IIIsigned.pdf" class="" data-mtli="mtli_filesize340MB" title="Annexures III">Annexures III</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/1.-cover-letter-with-responsesigned.pdf" class="" data-mtli="mtli_filesize905MB" target="_blank" rel="noopener" title="Cover letter_9206_2nd datagap">Cover letter_9206_2nd datagap</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/2nd-data-gap-response-with-covering-letter.pdf" class="" data-mtli="mtli_filesize63917kB" target="_blank" rel="noopener" title="Reply to 2nd Data Gaps-PVVNL_UPDATED_9206">Reply to 2nd Data Gaps-PVVNL_UPDATED_9206</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >TVS MOM</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/TVS_MOM.pdf" class="" data-mtli="mtli_filesize8713MB" target="_blank" rel="noopener" title="TVS MOM Dated 27.02.2023 Covering Letter &amp; Reply">TVS MOM Dated 27.02.2023 Covering Letter &amp; Reply</a><span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >Datagap-3</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/3rd_Datagape.pdf" class="" data-mtli="mtli_filesize12928MB" target="_blank" rel="noopener" title="3rd Information Requirement / Discrepancies/ Data Gaps">3rd Information Requirement / Discrepancies/ Data Gaps</a><span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >Datagap-4</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/4th_Datagape.pdf" class="" data-mtli="mtli_filesize204MB" target="_blank" rel="noopener" title="4th Information Requirement / Discrepancies/ Data Gaps">4th Information Requirement / Discrepancies/ Data Gaps</a><span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p style="text-align: left;"  ><strong >True-up Petition for FY 2020-21, APR Petition for FY 2021-22, and ARR &amp; Tariff Petition for FY 2022-23</strong></p>
<p  >1. ARR Petition for FY 2022-23</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/1.-Covering-Letter-with-Affidavit_PVVNL.pdf.pdf" class="" data-mtli="mtli_filesize143MB" target="_blank" rel="noopener" title="Covering Letter with Affidavit_PVVNL">Covering Letter with Affidavit_PVVNL</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/2.-ARR-Petition-for-FY-2022-23_PVVNL-Digitally-Signed.pdf.pdf" class="" data-mtli="mtli_filesize372MB" target="_blank" rel="noopener" title="ARR Petition for FY 2022-23_PVVNL-Digitally Signed">ARR Petition for FY 2022-23_PVVNL-Digitally Signed</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/3.-ARR-supporting-Annexures_PVVNL.pdf.pdf" class="" data-mtli="mtli_filesize8793MB" target="_blank" rel="noopener" title="ARR supporting Annexures_PVVNL">ARR supporting Annexures_PVVNL</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/4.-MYT-formats-for-FY23-PVVNL.xlsx" class="mtli_attachment mtli_xlsx" data-mtli="mtli_filesize407MB" title="MYT formats for FY23-PVVNL">MYT formats for FY23-PVVNL</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/5.-PVVNL_Additional-MYT-Formats.xlsx" class="mtli_attachment mtli_xlsx" data-mtli="mtli_filesize12061kB" title="PVVNL_Additional MYT Formats">PVVNL_Additional MYT Formats</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/6.-Audited-Balance-Sheet-FY2020-21_PVVNL.pdf.pdf" class="" data-mtli="mtli_filesize1283MB" target="_blank" rel="noopener" title="Audited Balance Sheet FY2020-21_PVVNL">Audited Balance Sheet FY2020-21_PVVNL</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >2. Datagap-1</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Annexures.zip" class="mtli_attachment mtli_zip" data-mtli="mtli_filesize17012MB" title="Annexures">Annexures</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Cover-letter_182_1st-datagap08.04.2022.pdf" class="" data-mtli="mtli_filesize48831kB" target="_blank" rel="noopener" title="Cover letter_182_1st datagap">Cover letter_182_1st datagap</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/List-of-Annexures-for-1st-Data-Gap-PVVNL.pdf" class="" data-mtli="mtli_filesize60747kB" target="_blank" rel="noopener" title="List of Annexures for 1st Data Gap-PVVNL">List of Annexures for 1st Data Gap-PVVNL</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Reply-to-1st-Data-Gaps-PVVNL_UPDATED_8422signed.pdf" class="" data-mtli="mtli_filesize93014kB" target="_blank" rel="noopener" title="Reply to 1st Data Gaps-PVVNL_UPDATED_8422">Reply to 1st Data Gaps-PVVNL_UPDATED_8422</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >3. Datagap-2</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/3.-Datagap-2-Dated-22.04.2022.pdf" class="" data-mtli="mtli_filesize618MB" target="_blank" rel="noopener" title="2nd Information Requirement / Discrepancies/ Data Gaps">2nd Information Requirement / Discrepancies/ Data Gaps</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>


<li ><a style="font-size: .935411em !important;"  href="{{url('/')}}/uploads/tarifforder/4.-TVS-MOM-Dated-18.04.2022.pdf" class="" data-mtli="mtli_filesize37238kB" target="_blank" rel="noopener" title="TVS MOM">TVS MOM</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a style="font-size: .935411em !important;"  href="{{url('/')}}/uploads/tarifforder/5.-Admittance-Order-Dated-21.04.2022.pdf" class="" data-mtli="mtli_filesize249MB" target="_blank" rel="noopener" title="Admittance Order">Admittance Order</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a style="font-size: .935411em !important;"  href="{{url('/')}}/uploads/tarifforder/6.-Public-Notie-ARR-FY-2023-English-Dated-24.04.2022.pdf" class="" data-mtli="mtli_filesize56327kB" target="_blank" rel="noopener" title="Public Notice- ARR FY- 2023 (English)">Public Notice- ARR FY- 2023 (English)</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a style="font-size: .935411em !important;"  href="{{url('/')}}/uploads/tarifforder/7.-Public-Notie-ARR-FY-2023-Hindi-Dated-24.04.2022.pdf" class="" data-mtli="mtli_filesize17472kB" target="_blank" rel="noopener" title="Public Notice- ARR FY- 2023 (Hindi)">Public Notice- ARR FY- 2023 (Hindi)</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – Hindi)</span></li>
</ul>
<p  >TVS MOM and Reply &amp; Annexures</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/873-TVS-MOM-Dated-18.04.2022-Covering-Letter-Reply.pdf" class="" data-mtli="mtli_filesize604MB" target="_blank" rel="noopener" title="TVS MOM Dated 18.04.2022 Covering Letter &amp; Reply">TVS MOM Dated 18.04.2022 Covering Letter &amp; Reply</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/TVS_MOM_Annexures.zip" class="mtli_attachment mtli_zip" data-mtli="mtli_filesize3234MB" title="TVS_MOM_Annexures">TVS_MOM_Annexures</a></li>
</ul>
<p  >Datagap-4</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Response-to-4th-Data-Gaps-UP-Discoms-15.05.2022_PVVNL-with-Covering-Letter.pdf" class="" data-mtli="mtli_filesize542MB" target="_blank" rel="noopener" title="Response to 4th Data Gaps UP Discoms (15.05.2022)_PVVNL with Covering Letter">Response to 4th Data Gaps UP Discoms (15.05.2022)_PVVNL with Covering Letter</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Annexures-4.zip" class="mtli_attachment mtli_zip" data-mtli="mtli_filesize1918MB" title="Annexures">Annexures</a></li>
</ul>
        
<p  >Datagap-5</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/5th_Datagape.pdf" class="" data-mtli="mtli_filesize274MB" target="_blank" rel="noopener" title="5th Information Requirement / Discrepancies/ Data Gaps">5th Information Requirement / Discrepancies/ Data Gaps</a><span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >Datagap-6</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/6th_Datagap.pdf" class="" data-mtli="mtli_filesize186MB" target="_blank" rel="noopener" title="6th Information Requirement / Discrepancies/ Data Gaps">6th Information Requirement / Discrepancies/ Data Gaps</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  ><a  href="{{url('/')}}/uploads/tarifforder/2140-ARR.pdf" class="" data-mtli="mtli_filesize720MB" target="_blank" rel="noopener" title="Response to the query raised by various stakeholders">Response to the query raised by various stakeholders</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></p>
<p  >Datagap-7</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/7th-Information-Requirement-Discrepancies-Data-Gaps-in-the-Petition-no-1833-2022-Dated-06-June-2022.pdf" class="" data-mtli="mtli_filesize712MB" target="_blank" rel="noopener" title="Reply to 7th Information Requirement / Discrepancies/ Data Gaps">Reply to 7th Information Requirement / Discrepancies/ Data Gaps</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >Datagap-8</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/8th_Datagap.pdf" class="" data-mtli="mtli_filesize218MB" target="_blank" rel="noopener" title="Reply to 8th Information Requirement / Discrepancies/ Data Gaps">Reply to 8th Information Requirement / Discrepancies/ Data Gaps</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >Response to objections/comments of various stakeholders on ARR/Tariff Petition for FY 2022-23</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/3003-UPERC.pdf" class="" data-mtli="mtli_filesize831MB" target="_blank" rel="noopener" title="1. UPERC-3003">1. UPERC-3003</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/3083-UPERC.pdf" class="" data-mtli="mtli_filesize354MB" target="_blank" rel="noopener" title="2. UPERC-3083">2. UPERC-3083</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

</ul>
<p  >TRUING UP OF TARIFF FOR FY 2020-21, APR FOR FY 2021-22 AND APPROVAL OF ARR AND TARIFF FOR FY 2022-23 FOR PVVNL PETITION No. 1833 / 2022</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/RATE_SCHEDULE_FOR_FY-2022-23.pdf" class="" data-mtli="mtli_filesize158MB" target="_blank" rel="noopener" title="Rate Schedule for FY 2022-23">Rate Schedule for FY 2022-23</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/TARIFF_ORDER_-FOR-_TRUE_UP_FY_2020-21APR_FY-2021-22ARR_FY_2022-23.pdf" class="" data-mtli="mtli_filesize1016MB" target="_blank" rel="noopener" title="TARIFF ORDER FOR TRUE UP FY 2020-21, APR FY 2021-22, ARR FY 2022-23">TARIFF ORDER FOR TRUE UP FY 2020-21, APR FY 2021-22, ARR FY 2022-23</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  ><a  href="{{url('/')}}/uploads/tarifforder/Public-Hearing-and-Instructions-2022.pdf" class="" data-mtli="mtli_filesize217MB" target="_blank" rel="noopener" title="Schedule and instruction for public hearing Petition Number 1833 -PVVNL – Petition for Truing Up for FY 2020-21, APR for FY 2021-22 and Approval of ARR for FY 2022-23">Schedule and instruction for public hearing Petition Number 1833 -PVVNL – Petition for Truing Up for FY 2020-21, APR for FY 2021-22 and Approval of ARR for FY 2022-23</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></p>
<p ><strong >Petition Number 1687 of 2021 Regarding revision in the computation of regulatory assets approved by UPERC in Tariff Order</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Petition_No_1687_of_2021.pdf" class="" data-mtli="mtli_filesize264MB" target="_blank" rel="noopener" title="Download">Download</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >GoUP Letter No. 445/24-1-21/731 Budget/2020 dated 5.3.2021</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/GoUP_Letter_No_445.pdf" class="" data-mtli="mtli_filesize276MB" target="_blank" rel="noopener" title="Download">Download</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – Hindi)</span></li>
</ul>
<p ><strong >PVVNL_Petition_True up FY 2019-20 APR 2020-21 ARR 2021-22</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_FY_2021-22/Public_Notice_English.pdf" class="" data-mtli="mtli_filesize11250kB" target="_blank" rel="noopener" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_FY_2021-22/PVVNL_Petition_True_up_FY_2019-20_APR_2020-21_ARR_2021-22.rar" class="mtli_attachment mtli_rar" data-mtli="mtli_filesize5276MB" rel="noopener" title="True up FY 2019-20 APR 2020-21 ARR 2021-22">True up FY 2019-20 APR 2020-21 ARR 2021-22</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_FY_2021-22/replytodatagaps.zip" class="mtli_attachment mtli_zip" data-mtli="mtli_filesize37194kB" rel="noopener" title="Reply Data Gap">Reply Data Gap</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Reply_to_UPERC.rar" class="mtli_attachment mtli_rar" data-mtli="mtli_filesize7860MB" rel="noopener" title="PVVNL Reply to UPERC MOM">PVVNL Reply to UPERC MOM</a></li>
</ul>
<p ><strong >Tariff Order FY 2020-21</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Press_English_FY_2020-21.pdf" class="" data-mtli="mtli_filesize12532kB" target="_blank" rel="noopener" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_FY_2020-21.pdf" class="" data-mtli="mtli_filesize662MB" target="_blank" rel="noopener" title="Tariff Order for FY 2020-21">Tariff Order for FY 2020-21</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Public Hearing: ARR/Tariff of FY 2020-21, APR for FY 2019-20 and True UP for FY 2018-19</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Public_Hearing_PPT.pdf" class="" data-mtli="mtli_filesize311MB" target="_blank" rel="noopener" title="PVVNL Public Hearing Presentation: True UP for FY 2018-19, APR for FY 2019-20 and ARR for FY 2020-21">PVVNL Public Hearing Presentation: True UP for FY 2018-19, APR for FY 2019-20 and ARR for FY 2020-21</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Tariff Order FY 2020-21</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/TARIFF/FY_2020-21/Public_Notice_English.pdf" class="" data-mtli="mtli_filesize6845kB" target="_blank" rel="noopener" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >PVVNL_Petition_True up FY 2018-19 APR 2019-20 ARR 2020-21</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_FY_2020-21/Public_Notice_English.pdf" class="" data-mtli="mtli_filesize67061kB" target="_blank" rel="noopener" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_FY_2020-21/PVVNL_Petition_True_up_FY_2018-19_APR_2019-20_ARR_2020-21.pdf" class="" data-mtli="mtli_filesize15305MB" target="_blank" rel="noopener" title="True up FY 2018-19 APR 2019-20 ARR 2020-21">True up FY 2018-19 APR 2019-20 ARR 2020-21</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Petition_True%20up%20FY_2020-21_Reply_Data_Gap.pdf" class="" data-mtli="mtli_filesize4089MB" target="_blank" rel="noopener" title="Reply Data Gap">Reply Data Gap</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/RTI/TARIFF/ARR_FY_2020-21/Reply_data_Gap_2.pdf" class="" data-mtli="mtli_filesize542MB" target="_blank" rel="noopener" title="Reply Data Gap 2">Reply Data Gap 2</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_FY_2020-21/PVVNL_Audited_Accounts_for_FY_2018-19_Ver_28.06.2020.pdf" class="" data-mtli="mtli_filesize773MB" target="_blank" rel="noopener" title="PVVNL_Audited_Accounts_for_FY_2018-19">PVVNL_Audited_Accounts_for_FY_2018-19</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Tariff order approved by the Uttar Pradesh Electricity Regulatory Commission for the financial year 2019-20</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Public_Notice_English.pdf" class="" data-mtli="mtli_filesize388MB" target="_blank" rel="noopener" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Tariff_Order_FY_2019-20.pdf" class="" data-mtli="mtli_filesize3169MB" target="_blank" rel="noopener" title="Approval of ARR &amp; Tariff of FY 2019-20, APR of FY 2018-19 and True Up of FY 2017-18">Approval of ARR &amp; Tariff of FY 2019-20, APR of FY 2018-19 and True Up of FY 2017-18</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/OrderPetition04-09-2019.pdf" class="" data-mtli="mtli_filesize241MB" target="_blank" rel="noopener" title="Rate Schedule FY 2019-20">Rate Schedule FY 2019-20</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >True-Up FY 2017-18, APR FY 2018-19 and ARR &amp; Rate Schedule FY 2019-20 Petition</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/1.True%20up,APR%20&amp;%20ARR%20Petition_PVVNL.PDF" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="True up,APR &amp; ARR Petition">True up,APR &amp; ARR Petition</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/2.Proposed_Rate%20Schedule%20FY2019-20.pdf" class="" data-mtli="mtli_filesize1752MB" target="_blank" rel="noopener" title="Proposed Rate Schedule FY2019-20">Proposed Rate Schedule FY2019-20</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_FY2019-20/3.Revised_Format_PVVNL.pdf" class="" data-mtli="mtli_filesize3126MB" target="_blank" rel="noopener" title="Tariff Formats">Tariff Formats</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/4.DBST.pdf" class="" data-mtli="mtli_filesize163MB" target="_blank" rel="noopener" title="DBST">DBST</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Approved Tariff for Electric Vehicle Charging issued by the Uttar Pradesh Electricity Regulatory Commission</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/electric_vehicle_charging_236.pdf" class="" data-mtli="mtli_filesize243MB" target="_blank" rel="noopener" title="Download">Download</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Truing up of Tariff for FY 2015-16, Annual Performance Review (APR) for FY 2016-17 and 2017-18 and Tariff for FY 2018-19</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/201901241637116091executive-summary_240119.pdf" class="" data-mtli="mtli_filesize93325kB" target="_blank" rel="noopener" title="Tariff&nbsp; order FY 2018-19">Tariff&nbsp; order FY 2018-19</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Final-Tariff-Order_240119.pdf" class="" data-mtli="mtli_filesize10094MB" target="_blank" rel="noopener" title="Final Tariff Order-State Discom">Final Tariff Order-State Discom</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

</ul>
<p ><strong >TRUE-UP OF FY 2015-16, FY 2016-17, APR FOR FY 2017-18 AND REVISED APR FOR FY 2018-19</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_151118.pdf" class="" data-mtli="mtli_filesize8194MB" target="_blank" rel="noopener" title="True-up for 2015-16, 2016-17">True-up for 2015-16, 2016-17</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforderPVVNL_151118.pdf" class="" data-mtli="mtli_filesize8194MB" target="_blank" rel="noopener" title="APR FY 2017-18">APR FY 2017-18</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_2017-18/PVVNL_151118.pdf" class="" data-mtli="mtli_filesize8194MB" target="_blank" rel="noopener" title="Revised ARR FY 2018-19">Revised ARR FY 2018-19</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Reply_data%20Gap_171118.pdf" class="" data-mtli="mtli_filesize7886MB" target="_blank" rel="noopener" title="Reply Data Gap 1">Reply Data Gap 1</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Reply_data%20Gap%202.pdf" class="" data-mtli="mtli_filesize611MB" target="_blank" rel="noopener" title="Reply Data Gap 2">Reply Data Gap 2</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Multi Year Tariff Order FY2017-18 To FY 2019-20</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Annexure_021217.pdf" class="" data-mtli="mtli_filesize37169kB" target="_blank" rel="noopener" title="Annexure 12.7 – Benchmarking Studies_Executive Summary_Final">Annexure 12.7 – Benchmarking Studies_Executive Summary_Final</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/English_021217.pdf" class="" data-mtli="mtli_filesize16631kB" target="_blank" rel="noopener" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Tarrif_order_2017/Tariff-Order_021217.pdf" class="" data-mtli="mtli_filesize814MB" target="_blank" rel="noopener" title="MYT Tariff Order 30.11.2017[Final]">MYT Tariff Order 30.11.2017[Final]</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
        
<p  >Order dated 18/01/17 for Review of the Order dated 29th April, 2016 in Petition No 1025 &amp; 1026 of 2015 in the matter of Final Truing Up for FY 2011-12, FY 2012-13 and FY 2013-14 for all existing stations, Approval of Annual Revenue Requirement and determination of Tariff for FY 2014-15 to FY 2018-19 in respect of existing thermal power stations and Petition for determination of provisional tariff for Anapara D in Petition no 1117/2016 and 1126/2016</p>
<p ><strong >Business Plan &amp; MYT Pettion FY 2017-18 to FY 2019-20</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/BP-MYT_Pettion_FY_2017-18_to_FY_2019-20/PVVNL-MYT-Petition.pdf" class="" data-mtli="mtli_filesize3581MB" target="_blank" rel="noopener" title="Multi year tariff pettion">Multi year tariff pettion</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Benchmarking-Study-Report.pdf" class="" data-mtli="mtli_filesize255MB" target="_blank" rel="noopener" title="Benchmarking Study Report">Benchmarking Study Report</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Business-Plan.pdf" class="" data-mtli="mtli_filesize1872MB" target="_blank" rel="noopener" title="Business plan for FY 2017-18 to 2019-20">Business plan for FY 2017-18 to 2019-20</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deficiency_1.pdf" class="" data-mtli="mtli_filesize8113MB" target="_blank" rel="noopener" title="Deficiency 1">Deficiency 1</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deficiency_2.pdf" class="" data-mtli="mtli_filesize1932MB" target="_blank" rel="noopener" title="Deficiency 2">Deficiency 2</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deficiency_3.pdf" class="" data-mtli="mtli_filesize705MB" target="_blank" rel="noopener" title="Deficiency 3">Deficiency 3</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deficiency_4.pdf" class="" data-mtli="mtli_filesize1050MB" target="_blank" rel="noopener" title="Deficiency 4">Deficiency 4</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Press-Note-ENGLISH_DisCom-FY%202017-18_Revised.pdf" class="" data-mtli="mtli_filesize35362kB" target="_blank" rel="noopener" title="Press Note Discom FY 2017-18 Revised">Press Note Discom FY 2017-18 Revised</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English &amp; Hindi)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Proposed-Rate-Schedule-For-FY-2017-18.pdf" class="" data-mtli="mtli_filesize1499MB" target="_blank" rel="noopener" title="Proposed Rate Schedule for FY 2017-18">Proposed Rate Schedule for FY 2017-18</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/201709161354023837TOD%20Tariff%20%20LMV-6%20HV-2.pdf" class="" data-mtli="mtli_filesize53335kB" target="_blank" rel="noopener" title="Additional Information-I">Additional Information-I</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/201709161324324101Additional%20Information-tariff-details.pdf" class="" data-mtli="mtli_filesize908MB" target="_blank" rel="noopener" title="Additional Information-II">Additional Information-II</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

</ul>
<p ><strong >Tariff Order for FY 2016-17 on 1 August 2016</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/pvvnl_060816.pdf" class="" data-mtli="mtli_filesize280MB" target="_blank" rel="noopener" title="Tarrif Order">Tarrif Order</a>&nbsp;2016-17 <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/english_060816.pdf" class="" data-mtli="mtli_filesize33931kB" target="_blank" rel="noopener" title="Existing Vs Approved FY 2016-17 English">Existing Vs Approved FY 2016-17 English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/hindi_060816.pdf" class="" data-mtli="mtli_filesize28818kB" target="_blank" rel="noopener" title="Existing Vs Approved FY 2016-17 Hindi">Existing Vs Approved FY 2016-17 Hindi</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – Hindi)</span></li>

</ul>
<p ><strong >ARR &amp; Tariff Petition Financial year 2016-17</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_FY_2016-17.pdf" class="" data-mtli="mtli_filesize3302MB" target="_blank" rel="noopener" title="ARR FY 2016-17">ARR FY 2016-17</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/DATA_GAP-1.pdf" class="" data-mtli="mtli_filesize5718MB" target="_blank" rel="noopener" title="Data Gap-I">Data Gap-I</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_TARIFF_PETITION_FY_2016-17/DATA_GAP-2.pdf" class="" data-mtli="mtli_filesize1626MB" target="_blank" rel="noopener" title="Data Gap-II">Data Gap-II</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>


<li ><a  href="{{url('/')}}/uploads/tarifforder/TARIFF_PROPOSAL_FY_2016-17.pdf" class="" data-mtli="mtli_filesize347MB" target="_blank" rel="noopener" title="Tariff Proposal">Tariff Proposal</a><a  href="{{url('/')}}/uploads/tarifforder/TARIFF_PROPOSAL_FY_2016-17.pdf" class="" data-mtli="mtli_filesize347MB" target="_blank" rel="noopener" title="For FY 2016-17">&nbsp;For FY 2016-17</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >No Tariff hike has been proposed for LMV-1 (Domestic Light, Fan &amp; Power), LMV-5 (Small power for&nbsp;&nbsp;&nbsp; PTW / Pumping for irrigation purpose) &amp; HV-2 (Large &amp; Heavy Power) Categories of consumers For Financial Year 2016-17.</p>
<p ><strong >PVVNL Order dated 18/06/15 for ARR and Tariff for FY 2015-16 in Petition no 989/2014</strong></p>
<p  >1. Press Note II</p>
<ul style="list-style: disc;margin-left: 30px;">

<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/PN_ENG.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="English II">English II</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/PVVNLTariffOrderFY2015-16_18thJune,2015-pdf618201583003PM.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="Download ARR &amp; Tariff Order">Download ARR &amp; Tariff Order</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >ARR &amp; Tariff for the year 2015-16</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/pressnote_eng_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/trueup2012-13&amp;tariffpetition2015-16_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="PVVNL True Up Petition for FY 2012-13 &amp; Tariff Petition for FY 2015-16">PVVNL True Up Petition for FY 2012-13 &amp; Tariff Petition for FY 2015-16</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/ARR&amp;TARIFF_2015-16/datagap-ii_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="PVVNL Data Gap-II">PVVNL Data Gap-II</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/datagap-i_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="PVVNL Scan Data Gap-I">PVVNL Scan Data Gap-I</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/rateschedule_FY_2015-16_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="Rate Schedule FY 2015-16">Rate Schedule FY 2015-16</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – Hindi)</span></li>

</ul>
<p ><a class=" mtli_attachment mtli_rar"  href="{{url('/')}}/uploads/tarifforder/tariff_21012015_b.rar" rel="noopener" data-mtli="mtli_filesize1127kB" title="Final Appeal Pashchimanchal Tariff Order 2014-15">Final Appeal Pashchimanchal Tariff Order 2014-15</a><br>
<strong >Tariff for the year 2014-15</strong></p>
<p  >1. Press Note I</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PN_ENG-I.pdf" class="" data-mtli="mtli_filesize5249kB" target="_blank" rel="noopener" title="English I">English I</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >2. Press Note II</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PN_ENG-II.pdf" class="" data-mtli="mtli_filesize13746kB" target="_blank" rel="noopener" title="English II">English II</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Tariff_Order_FY_2014-15.docx" class="mtli_attachment mtli_docx" data-mtli="mtli_filesize121MB" rel="noopener" title="Download Tariff Order">Download Tariff Order</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Tariff_Order_FY_2014-15.docx" class="mtli_attachment mtli_docx" data-mtli="mtli_filesize121MB" rel="noopener" title="Highlights of Supply Code Amendment">Highlights of Supply Code Amendment</a></li>
</ul>
        
<p ><strong >ARR / Petition Financial Year 2014-15</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/ENGLISH_Press%20Note_DisCom%20FY%202014-15-.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20ARR%20Petition%20FY%202014-15_29.11.2014-.pdf" class="" target="_blank" rel="noopener" title="ARR&nbsp;Petition FY 2014-15">ARR&nbsp;Petition FY 2014-15</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_True%20up%20FY2008-09%20to%20FY2010-11-.pdf" class="" target="_blank" rel="noopener" title="True Up Petition((2008-09 to 2010-11)">True Up Petition((2008-09 to 2010-11)</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Rate%20Schedule-.pdf" class="" target="_blank" rel="noopener" title="Rate Schedule">Rate Schedule</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deff_Note_1_14.03.2014-.pdf" class="" target="_blank" rel="noopener" title="Reply on Pr">Reply on Pr</a><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deff_Note_1_14.03.2014-.pdf" class="" target="_blank" rel="noopener" title="eliminary Information Requirement/Discrepancies in the Petition">eliminary Information Requirement/Discrepancies in the Petition</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deff_Note_2_22.05.2014-.pdf" class="" target="_blank" rel="noopener" title="Reply on Pending/Additional Information Requirement/Discrepancies in the Petitions">Reply on Pending/Additional Information Requirement/Discrepancies in the Petitions</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Tariff financial year 2013-14 (Clarification)</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/tariff_clarification1_290613.pdf" class="" data-mtli="mtli_filesize48899kB" target="_blank" rel="noopener" title="Tariff financial year 2013-14 (Clarification N">Tariff financial year 2013-14 (Clarification N</a><a  href="{{url('/')}}/uploads/tarifforder/tariff_clarification1_290613.pdf" class="" data-mtli="mtli_filesize48899kB" target="_blank" rel="noopener" title="o.1)">o.1)</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/tariff_clarification2_290613.pdf" class="" data-mtli="mtli_filesize35060kB" target="_blank" rel="noopener" title="Tariff financial year 2013-14 (Clarification No.2)">Tariff financial year 2013-14 (Clarification No.2)</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Notified Tariff FY 2013-14 (Tariff Order)</strong><br>
<strong >ARR and Tariff determination financial year 2013-14</strong></p>
<p >1. Public Notice</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PN%20ENG.zip" class="mtli_attachment mtli_zip" data-mtli="mtli_filesize3272kB" rel="noopener" title="English">English</a></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20Suo-motu%20ARR%202013-14_31052013.pdf" class="" data-mtli="mtli_filesize304MB" target="_blank" rel="noopener" title="Sou-Motu Determination of ARR and Tariff for FY 2013-14">Sou-Motu Determination of ARR and Tariff for FY 2013-14</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >True up Order FY 2001 to 2007-08</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/True_Up_Order_PetNo809of2012_Issued_21052013-docx522201344418PM.pdf" class="" data-mtli="mtli_filesize452MB" target="_blank" rel="noopener" title="True up Order Issued on 21-05-2013">True up Order Issued on 21-05-2013</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >ARR Tariff Financial Year 2013-14</strong></p>
<p  >1. Press Note</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Press%20Note%20ENGLISH_DisCom.pdf" class="" data-mtli="mtli_filesize39204kB" target="_blank" rel="noopener" title="English">English</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20ARR%202013-14%20Data%20Gap%20Reply.pdf" class="" data-mtli="mtli_filesize1442MB" target="_blank" rel="noopener" title="Data Gaps/Deficiencies&nbsp;in ARR Petition">Data Gaps/Deficiencies&nbsp;in ARR Petition</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20ARR%202013-14%20Petition.pdf" class="" data-mtli="mtli_filesize1566MB" target="_blank" rel="noopener" title="ARR&nbsp;Petition FY 2013-14">ARR&nbsp;Petition FY 2013-14</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20Audited%20Balance%20Sheet%202008-09.pdf" class="" data-mtli="mtli_filesize765MB" target="_blank" rel="noopener" title="Balance Sheet 2008-09">Balance Sheet 2008-09</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20Audited%20Balance%20Sheet%202009-10.pdf" class="" data-mtli="mtli_filesize494MB" target="_blank" rel="noopener" title="Balance Sheet 2009-10">Balance Sheet 2009-10</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20Audited%20Balance%20Sheet%202010-11.pdf" class="" data-mtli="mtli_filesize297MB" target="_blank" rel="noopener" title="Balance Sheet 2010-11">Balance Sheet 2010-11</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Rate%20schedule.pdf" class="" data-mtli="mtli_filesize315MB" target="_blank" rel="noopener" title="Rate Schedule">Rate Schedule</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >True Up Petition</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/True-up%20Pet%20for%20Website.zip" class="mtli_attachment mtli_zip" data-mtli="mtli_filesize13354MB" rel="noopener" title="True Up Petition (Size 133MB)">True Up Petition (Size 133MB)</a></li>
</ul>
<p ><strong >Corrigendum</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/corrigendum1835_05nov12.pdf" class="" data-mtli="mtli_filesize44541kB" target="_blank" rel="noopener" title="Corrigendum No. I">Corrigendum No. I</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Tariff for the year 2012-13 (Current: Effective from 01-10-2012)</strong></p>
<p  >1. Press Note I</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/eng_1_25oct12.pdf" class="" data-mtli="mtli_filesize1127kB" target="_blank" rel="noopener" title="English I">English I</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p  >2. Press Note II</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/eng_2_25oct12.pdf" class="" data-mtli="mtli_filesize3115kB" target="_blank" rel="noopener" title="English II">English II</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>

<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_2012-13.pdf" class="" data-mtli="mtli_filesize473MB" target="_blank" rel="noopener" title="Download Tariff Order">Download Tariff Order</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Rate_Schedule_2012-13.pdf" class="" data-mtli="mtli_filesize69771kB" target="_blank" rel="noopener" title="Rate Schedule">Rate Schedule</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Tariff for the year 2009-10</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/corrigendum_12apr10.pdf" class="" data-mtli="mtli_filesize2518kB" target="_blank" rel="noopener" title="Corrigendum">Corrigendum</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/press_note_english_partI_2009_10.pdf" class="" data-mtli="mtli_filesize1229kB" target="_blank" rel="noopener" title="Download Press Note I">Download Press Note I</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/press_note_english_partII_2009_10.pdf" class="" data-mtli="mtli_filesize3361kB" target="_blank" rel="noopener" title="Download Press Note II">Download Press Note II</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/TARRIF_2009-10.pdf" class="" data-mtli="mtli_filesize165MB" target="_blank" rel="noopener" title="Download Tariff Order">Download Tariff Order</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/RATE_SCHEDULE_2009-10.pdf" class="" data-mtli="mtli_filesize32568kB" target="_blank" rel="noopener" title="Rate Schedule">Rate Schedule</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
<p ><strong >Tariff for the year 2008-09</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/press_note_1_Tariff_08-09.pdf" class="" data-mtli="mtli_filesize1244kB" target="_blank" rel="noopener" title="Download Press Note I">Download Press Note I</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/press_note_2_Tariff_08-09.pdf" class="" data-mtli="mtli_filesize2384kB" target="_blank" rel="noopener" title="Download Press Note II">Download Press Note II</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_2008-09.pdf" class="" data-mtli="mtli_filesize315MB" target="_blank" rel="noopener" title="Download Tariff Order">Download Tariff Order</a> <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(Language – English)</span></li>
</ul>
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

  $("#input_div").html('<div class="row"> <div class="col-md-12"><p style="font-weight: 700;margin-bottom: 0px; margin-top:15px;" >Duration</p></div> <div class="col-md-6"> <label >From :</label> <input type="date"  class="form-control" name="from_date" id="from_date" required="required" autocomplete="off" title="" max="{{ now()->format('Y-m-d') }}"> </div> <div class="col-md-6"> <label >To :</label> <input type="date"  class="form-control" name="to_date" id="to_date" required="required" autocomplete="off" title="" max="{{ now()->format('Y-m-d') }}" > </div> </div> <div class="row"> <div class="col-md-12"> <label >Load (in KW)"</label> <input type="text"  class="form-control" name="load" id="load" required="required" title=""> </div> </div> <div class="row"> <div class="col-md-6"> <label >Current Month Reading</label> <input type="text"  class="form-control" name="current_month_reading" id="current_month_reading" required="required" title=""> </div> <div class="col-md-6"> <label >Previous Month Reading</label> <input type="text"  class="form-control" name="previous_month_reading" id="previous_month_reading" required="required" title=""> </div> </div> <div class="row"> <div style="text-align: center;" class="col-md-12"> <input style="width: auto;" type="submit" class="btn btn-primary" value="submit"> </div> </div>');
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
