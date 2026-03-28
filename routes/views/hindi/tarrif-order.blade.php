@extends('hindi.layouts.main') 
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
                <span><a href="{{url('/')}}" rel="home" style="color: white;">मुख्यपृष्ठ</a></span>
                <span><i class="fa fa-angle-right"></i></span>
                <span><a href="#"></a>  नियामक सूचना</span>
                <span><i class="fa fa-angle-right"></i></span>
                <span class="active">टैरिफ आदेश
</span>
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
            <h3 style="text-align: center;" class="font-weight-bold">टैरिफ आदेश</h3>
            <hr>
          </div>


          <div class="col-md-12">
			<p  ><strong >वित्त वर्ष 2021-22 के लिए टैरिफ का परीक्षण, वित्त वर्ष 2022-23 के लिए एपीआर और वित्त वर्ष 2023-24 के लिए एआरआर और टैरिफ का अनुमोदन</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Public-Notice-Hindi_FY2023-24.pdf" class="" data-mtli="mtli_filesize38826kB" target="_blank" rel="noopener" title="सार्वजनिक नोटिस">सार्वजनिक नोटिस</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff-Order-FY-2023-24.pdf" class="" data-mtli="mtli_filesize992MB" target="_blank" rel="noopener" title="वित्त वर्ष 2023-24 के लिए टैरिफ आदेश">वित्त वर्ष 2023-24 के लिए टैरिफ आदेश</a></li>
</ul>
<p  ><strong >जन सुनवाई: वित्त वर्ष 2021-22 के लिए ट्रू-अप, वित्त वर्ष 2022-23 के लिए एपीआर, और वित्त वर्ष 2023-24 के लिए एआरआर याचिका</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_FY2023-24_Hindi.pdf" class="" data-mtli="mtli_filesize47912kB" target="_blank" rel="noopener" title="पीवीवीएनएल जन सुनवाई">पीवीवीएनएल जन सुनवाई</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p  >2. एआरआर याचिका वित्तीय वर्ष 2023-24</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/1.-Covering-letter-PVVNL.pdf.pdf" class="" data-mtli="mtli_filesize650MB" target="_blank" rel="noopener" title="शपथ पत्र_पीवीवीएनएल के साथ कवरिंग पत्र">शपथ पत्र_पीवीवीएनएल के साथ कवरिंग पत्र</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/2.ARR-Petition-for-FY2023-24_PVVNL_Final_DSC.pdf.pdf" class="" data-mtli="mtli_filesize351MB" target="_blank" rel="noopener" title="एआरआर याचिका वित्तीय वर्ष 2023-24 पीवीवीएनएल-डिजिटली हस्ताक्षरित">एआरआर याचिका वित्तीय वर्ष 2023-24 पीवीवीएनएल-डिजिटली हस्ताक्षरित</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/4.-MYT-Formats-for-FY23-PVVNL_DSC.pdf.pdf" class="" data-mtli="mtli_filesize910MB" title="वित्तीय वर्ष 2023-24 पीवीवीएनएल के लिए एमवाईटी प्रारूप">वित्तीय वर्ष 2023-24 पीवीवीएनएल के लिए एमवाईटी प्रारूप</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/5.-Additional-Format_DSC.pdf.pdf" class="" data-mtli="mtli_filesize357MB" title="पीवीवीएनएल अतिरिक्त एमवाईटी प्रारूप">पीवीवीएनएल अतिरिक्त एमवाईटी प्रारूप</a></li>
</ul>
<p  >3. डेटागैप-1</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Annexures-_1st-datagap-PDF.zip" class="" data-mtli="mtli_filesize4029MB" title="अनुबंध">अनुबंध</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/response-to-1st-data-gap-with-covering-letter.pdf" class="" data-mtli="mtli_filesize120MB" target="_blank" rel="noopener" title="कवर लेटर_882_1st डेटागैप">कवर लेटर_882_1st डेटागैप</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Appendix_1st-datagap-pdf.zip" class="" data-mtli="mtli_filesize17727MB" target="_blank" rel="noopener" title="1st डेटा गैप-पीवीवीएनएल के लिए परिशिष्ट">1st डेटा गैप-पीवीवीएनएल के लिए परिशिष्ट</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/8821-14-02-2023signed-2.pdf" class="" data-mtli="mtli_filesize1976MB" target="_blank" rel="noopener" title="1st डेटा अंतराल का जवाब-पीवीवीएनएल_अद्यतन_8821">1st डेटा अंतराल का जवाब-पीवीवीएनएल_अद्यतन_8821</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p  >4. डेटागैप-2</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/2.-Annexure-I-F31_Long-term-loan_dates-PVVNLsigned.pdf" class="" data-mtli="mtli_filesize850MB" title="अनुबंध-i">अनुबंध-i</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/3.-Annexure-IIsigned.pdf" class="" data-mtli="mtli_filesize2421MB" title="अनुबंध-ii">अनुबंध-ii</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/4.-Annexure-IIIsigned.pdf" class="" data-mtli="mtli_filesize340MB" title="अनुबंध-iii">अनुबंध-iii</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/1.-cover-letter-with-responsesigned.pdf" class="" data-mtli="mtli_filesize905MB" target="_blank" rel="noopener" title="कवर लेटर_9206_2nd डेटागैप">कवर लेटर_9206_2nd डेटागैप</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/2nd-data-gap-response-with-covering-letter.pdf" class="" data-mtli="mtli_filesize63917kB" target="_blank" rel="noopener" title="2nd डेटा अंतराल का जवाब-पीवीवीएनएल_अद्यतन_9206">2nd डेटा अंतराल का जवाब-पीवीवीएनएल_अद्यतन_9206</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p  >टीवीएस एमओएम</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/TVS_MOM.pdf" class="" data-mtli="mtli_filesize8713MB" target="_blank" rel="noopener" title="टीवीएस एमओएम दिनांक 27.02.2023 कवरिंग लेटर और उत्तर">टीवीएस एमओएम दिनांक 27.02.2023 कवरिंग लेटर और उत्तर</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p  >डेटागैप-3</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/3rd_Datagape.pdf" class="" data-mtli="mtli_filesize12928MB" target="_blank" rel="noopener" title="तीसरी सूचना आवश्यकता / विसंगतियां / डेटा अंतराल">तीसरी सूचना आवश्यकता / विसंगतियां / डेटा अंतराल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p  >डेटागैप-4</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/4th_Datagape.pdf" class="" data-mtli="mtli_filesize204MB" target="_blank" rel="noopener" title="चौथी सूचना आवश्यकता / विसंगतियां / डेटा अंतराल">चौथी सूचना आवश्यकता / विसंगतियां / डेटा अंतराल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p  ><strong >वित्त वर्ष 2020-21 के लिए ट्रू-अप याचिका, वित्त वर्ष 2021-22 के लिए एपीआर याचिका, और वित्त वर्ष 2022-23 के लिए एआरआर और टैरिफ याचिका</strong></p>
<p  >1. एआरआर याचिका वित्तीय वर्ष 2022-23</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/1.-Covering-Letter-with-Affidavit_PVVNL.pdf.pdf" class="" data-mtli="mtli_filesize143MB" target="_blank" rel="noopener" title="शपथ पत्र_पीवीवीएनएल के साथ कवरिंग पत्र">शपथ पत्र_पीवीवीएनएल के साथ कवरिंग पत्र</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/2.-ARR-Petition-for-FY-2022-23_PVVNL-Digitally-Signed.pdf.pdf" class="" data-mtli="mtli_filesize372MB" target="_blank" rel="noopener" title="एआरआर याचिका वित्तीय वर्ष 2022-23 पीवीवीएनएल-डिजिटली हस्ताक्षरित">एआरआर याचिका वित्तीय वर्ष 2022-23 पीवीवीएनएल-डिजिटली हस्ताक्षरित</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/3.-ARR-supporting-Annexures_PVVNL.pdf.pdf" class="" data-mtli="mtli_filesize8793MB" target="_blank" rel="noopener" title="एआरआर सहायक अनुलग्नक_पीवीवीएनएल">एआरआर सहायक अनुलग्नक_पीवीवीएनएल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/4.-MYT-formats-for-FY23-PVVNL.xlsx" class="mtli_attachment mtli_xlsx" data-mtli="mtli_filesize407MB" title="वित्तीय वर्ष 2022-23 पीवीवीएनएल के लिए एमवाईटी प्रारूप">वित्तीय वर्ष 2022-23 पीवीवीएनएल के लिए एमवाईटी प्रारूप</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/5.-PVVNL_Additional-MYT-Formats.xlsx" class="mtli_attachment mtli_xlsx" data-mtli="mtli_filesize12061kB" title="पीवीवीएनएल अतिरिक्त एमवाईटी प्रारूप">पीवीवीएनएल अतिरिक्त एमवाईटी प्रारूप</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/6.-Audited-Balance-Sheet-FY2020-21_PVVNL.pdf.pdf" class="" data-mtli="mtli_filesize1283MB" target="_blank" rel="noopener" title="लेखापरीक्षित बैलेंस शीट वित्तीय वर्ष 2020-21_पीवीवीएनएल">लेखापरीक्षित बैलेंस शीट वित्तीय वर्ष 2020-21_पीवीवीएनएल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >2. डेटागैप-1</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Annexures.zip" class="" data-mtli="mtli_filesize17012MB" title="अनुबंध">अनुबंध</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Cover-letter_182_1st-datagap08.04.2022.pdf" class="" data-mtli="mtli_filesize48831kB" target="_blank" rel="noopener" title="कवर लेटर_182_1st डेटागैप">कवर लेटर_182_1st डेटागैप</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/List-of-Annexures-for-1st-Data-Gap-PVVNL.pdf" class="" data-mtli="mtli_filesize60747kB" target="_blank" rel="noopener" title="1st डेटा गैप-पीवीवीएनएल के लिए अनुलग्नकों की सूची">1st डेटा गैप-पीवीवीएनएल के लिए अनुलग्नकों की सूची</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Reply-to-1st-Data-Gaps-PVVNL_UPDATED_8422signed.pdf" class="" data-mtli="mtli_filesize93014kB" target="_blank" rel="noopener" title="1st डेटा अंतराल का जवाब-पीवीवीएनएल_अद्यतन_8422">1st डेटा अंतराल का जवाब-पीवीवीएनएल_अद्यतन_8422</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >3. डेटागैप-2</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/3.-Datagap-2-Dated-22.04.2022.pdf" class="" data-mtli="mtli_filesize618MB" target="_blank" rel="noopener" title="दूसरी सूचना आवश्यकता / विसंगतियां / डेटा अंतराल">दूसरी सूचना आवश्यकता / विसंगतियां / डेटा अंतराल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/4.-TVS-MOM-Dated-18.04.2022.pdf" class="" data-mtli="mtli_filesize37238kB" target="_blank" rel="noopener" title="टीवीएस एमओएम">टीवीएस एमओएम</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/5.-Admittance-Order-Dated-21.04.2022.pdf" class="" data-mtli="mtli_filesize249MB" target="_blank" rel="noopener" title="प्रवेश आदेश">प्रवेश आदेश</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/6.-Public-Notie-ARR-FY-2023-English-Dated-24.04.2022.pdf" class="" data-mtli="mtli_filesize56327kB" target="_blank" rel="noopener" title="सार्वजनिक सूचना-एआरआर वित्तीय वर्ष-2023 (अंग्रेज़ी)">सार्वजनिक सूचना-एआरआर वित्तीय वर्ष-2023 (अंग्रेज़ी)</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/7.-Public-Notie-ARR-FY-2023-Hindi-Dated-24.04.2022.pdf" class="" data-mtli="mtli_filesize17472kB" target="_blank" rel="noopener" title="सार्वजनिक सूचना- एआरआर वित्तीय वर्ष- 2023 (हिंदी)">सार्वजनिक सूचना- एआरआर वित्तीय वर्ष- 2023 (हिंदी)</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p  >टीवीएस एमओएम और उत्तर और अनुलग्नक</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/873-TVS-MOM-Dated-18.04.2022-Covering-Letter-Reply.pdf" class="" data-mtli="mtli_filesize604MB" target="_blank" rel="noopener" title="टीवीएस एमओएम दिनांक 18.04.2022 कवरिंग लेटर और उत्तर">टीवीएस एमओएम दिनांक 18.04.2022 कवरिंग लेटर और उत्तर</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/TVS_MOM_Annexures.zip" class="" data-mtli="mtli_filesize3234MB" title="टीवीएस एमओएम अनुबंध">टीवीएस एमओएम अनुबंध</a></li>
</ul>
<p  >डेटागैप-4</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Response-to-4th-Data-Gaps-UP-Discoms-15.05.2022_PVVNL-with-Covering-Letter.pdf" class="" data-mtli="mtli_filesize542MB" target="_blank" rel="noopener" title="चौथे डेटा अंतराल पर उत्तर प्रदेश डिस्कॉम्स (15.05.2022)_PVVNL को कवरिंग लेटर के साथ प्रत्युत्तर">चौथे डेटा अंतराल पर उत्तर प्रदेश डिस्कॉम्स (15.05.2022)_PVVNL को कवरिंग लेटर के साथ प्रत्युत्तर</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Annexures-4.zip" class="" data-mtli="mtli_filesize1918MB" title="अनुबंध">अनुबंध</a></li>
</ul>
<p  >डेटागैप-5</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/5th_Datagape.pdf" class="" data-mtli="mtli_filesize274MB" target="_blank" rel="noopener" title="5वीं सूचना आवश्यकता / विसंगतियां / डेटा अंतराल">5वीं सूचना आवश्यकता / विसंगतियां / डेटा अंतराल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >डेटागैप-6</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/6th_Datagap.pdf" class="" data-mtli="mtli_filesize186MB" target="_blank" rel="noopener" title="छठी सूचना आवश्यकता / विसंगतियां / डेटा अंतराल">छठी सूचना आवश्यकता / विसंगतियां / डेटा अंतराल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  ><a  href="{{url('/')}}/uploads/tarifforder/2140-ARR.pdf" class="" data-mtli="mtli_filesize720MB" target="_blank" rel="noopener" title="विभिन्न हितधारकों द्वारा उठाए गए प्रश्न का उत्तर">विभिन्न हितधारकों द्वारा उठाए गए प्रश्न का उत्तर</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></p>
<p  >डेटागैप-7</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/7th-Information-Requirement-Discrepancies-Data-Gaps-in-the-Petition-no-1833-2022-Dated-06-June-2022.pdf" class="" data-mtli="mtli_filesize712MB" target="_blank" rel="noopener" title="7वीं सूचना आवश्यकता / विसंगतियों / डेटा अंतराल">7वीं सूचना आवश्यकता / विसंगतियों / डेटा अंतराल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >डेटागैप-8</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/8th_Datagap.pdf" class="" data-mtli="mtli_filesize218MB" target="_blank" rel="noopener" title="8वीं सूचना आवश्यकता / विसंगतियों / डेटा अंतराल">8वीं सूचना आवश्यकता / विसंगतियों / डेटा अंतराल</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >वित्तीय वर्ष 2022-23 के लिए एआरआर/टैरिफ याचिका पर विभिन्न हितधारकों की आपत्तियों/टिप्पणियों का जवाब</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/3003-UPERC.pdf" class="" data-mtli="mtli_filesize831MB" target="_blank" rel="noopener" title="1.UPERC-3003">1.UPERC-3003</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/3083-UPERC.pdf" class="" data-mtli="mtli_filesize354MB" target="_blank" rel="noopener" title="2.UPERC-3083">2.UPERC-3083</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >पीवीवीएनएल याचिका संख्या 1833/2022 के लिए वित्त वर्ष 2020-21 के लिए टैरिफ का परीक्षण, वित्त वर्ष 2021-22 के लिए एपीआर और वित्त वर्ष 2022-23 के लिए एआरआर और टैरिफ का अनुमोदन</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/RATE_SCHEDULE_FOR_FY-2022-23.pdf" class="" data-mtli="mtli_filesize158MB" target="_blank" rel="noopener" title="दर अनुसूची वित्तीय वर्ष 2022-23">दर अनुसूची वित्तीय वर्ष 2022-23</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/TARIFF_ORDER_-FOR-_TRUE_UP_FY_2020-21APR_FY-2021-22ARR_FY_2022-23.pdf" class="" data-mtli="mtli_filesize1016MB" target="_blank" rel="noopener" title="ट्रू अप वित्त वर्ष 2020-21 एपीआर 2021-22 एआरआर 2022-23 के लिए टैरिफ ऑर्डर">ट्रू अप वित्त वर्ष 2020-21 एपीआर 2021-22 एआरआर 2022-23 के लिए टैरिफ ऑर्डर</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >2021 की याचिका संख्या 1687 टैरिफ आदेश में यूपीईआरसी द्वारा अनुमोदित नियामक संपत्तियों की गणना में संशोधन के संबंध में</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Petition_No_1687_of_2021.pdf" class="" data-mtli="mtli_filesize264MB" target="_blank" rel="noopener" title="डाउनलोड">डाउनलोड</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >उत्तर प्रदेश सरकार का पत्र संख्या 445/24-1-21/731 बजट/2020 दिनांक 5.3.2021</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/GoUP_Letter_No_445.pdf" class="" data-mtli="mtli_filesize276MB" target="_blank" rel="noopener" title="डाउनलोड">डाउनलोड</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p ><strong >पीवीवीएनएल याचिका सही वित्त वर्ष 2019-20 अप्रैल 2020-21 निर्धारण वर्ष 2021-22</strong></p>
<p  >प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Public_Notice_English.pdf" class="" data-mtli="mtli_filesize11250kB" target="_blank" rel="noopener" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Petition_True_up_FY_2019-20_APR_2020-21_ARR_2021-22.rar" class="mtli_attachment mtli_rar" data-mtli="mtli_filesize5276MB" rel="noopener" title="ट्रू अप वित्त वर्ष 2019-20 एपीआर 2020-21 एआरआर 2021-22">ट्रू अप वित्त वर्ष 2019-20 एपीआर 2020-21 एआरआर 2021-22</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/replytodatagaps.zip" class="" data-mtli="mtli_filesize37194kB" rel="noopener" title="उत्तर डेटा गैप">उत्तर डेटा गैप</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Reply_to_UPERC.rar" class="mtli_attachment mtli_rar" data-mtli="mtli_filesize7860MB" rel="noopener" title="पीवीवीएन एल यूपीईआरसी मॉम को जवाब दें">पीवीवीएन एल यूपीईआरसी मॉम को जवाब दें</a></li>
</ul>
<p ><strong >टैरिफ आदेश वित्त वर्ष 2020-21</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Press_English_FY_2020-21.pdf" class="" data-mtli="mtli_filesize12532kB" target="_blank" rel="noopener" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_FY_2020-21.pdf" class="" data-mtli="mtli_filesize662MB" target="_blank" rel="noopener" title="वित्त वर्ष 2020-21 के लिए टैरिफ आदेश">वित्त वर्ष 2020-21 के लिए टैरिफ आदेश</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >जन सुनवाई: वित्त वर्ष 2020-21 के एआरआर/टैरिफ, वित्त वर्ष 2019-20 के लिए एपीआर और वित्त वर्ष 2018-19 के लिए ट्रू यूपी</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Public_Hearing_PPT.pdf" class="" data-mtli="mtli_filesize311MB" target="_blank" rel="noopener" title="पीवीवीएनएल जन सुनवाई प्रस्तुति: वित्त वर्ष 2018-19 के लिए ट्रू यूपी, वित्त वर्ष 2019-20 के लिए एपीआर और वित्त वर्ष 2020-21 के लिए एआरआर">पीवीवीएनएल जन सुनवाई प्रस्तुति: वित्त वर्ष 2018-19 के लिए ट्रू यूपी, वित्त वर्ष 2019-20 के लिए एपीआर और वित्त वर्ष 2020-21 के लिए एआरआर</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >टैरिफ आदेश वित्त वर्ष 2020-21</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Public_Notice_English.pdf" class="" data-mtli="mtli_filesize6845kB" target="_blank" rel="noopener" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >पीवीवीएनएल याचिका सही वित्त वर्ष 2018-19 अप्रैल 2019-20 एआरआर 2020-21</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Public_Notice_English.pdf" class="" data-mtli="mtli_filesize67061kB" target="_blank" rel="noopener" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Petition_True_up_FY_2018-19_APR_2019-20_ARR_2020-21.pdf" class="" data-mtli="mtli_filesize15305MB" target="_blank" rel="noopener" title="ट्रू अप वित्त वर्ष 2018-19 एपीआर 2019-20 एआरआर 2020-21">ट्रू अप वित्त वर्ष 2018-19 एपीआर 2019-20 एआरआर 2020-21</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Petition_True%20up%20FY_2020-21_Reply_Data_Gap.pdf" class="" data-mtli="mtli_filesize4089MB" target="_blank" rel="noopener" title="उत्तर डेटा गैप">उत्तर डेटा गैप</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Reply_data_Gap_2.pdf" class="" data-mtli="mtli_filesize542MB" target="_blank" rel="noopener" title="उत्तर डेटा गैप 2">उत्तर डेटा गैप 2</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Audited_Accounts_for_FY_2018-19_Ver_28.06.2020.pdf" class="" data-mtli="mtli_filesize773MB" target="_blank" rel="noopener" title="पीवीवीएनएल वित्तीय वर्ष 2018-19 के लिए लेखा परीक्षित खाते">पीवीवीएनएल वित्तीय वर्ष 2018-19 के लिए लेखा परीक्षित खाते</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >वित्तीय वर्ष 2019–20 के लिये मा० उ०प्र० विद्वुत नियामक आयोग द्वारा अनुमोदित टैरिफ आदेश</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Public_Notice_English.pdf" class="" data-mtli="mtli_filesize388MB" target="_blank" rel="noopener" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Tariff_Order_FY_2019-20.pdf" class="" data-mtli="mtli_filesize3169MB" target="_blank" rel="noopener" title="वित्त वर्ष 2019-20 के एआरआर और एएमपी टैरिफ की स्वीकृति, वित्त वर्ष 2018-19 की एपीआर और वित्तीय वर्ष 2017-18 की सही स्थिति">वित्त वर्ष 2019-20 के एआरआर और एएमपी टैरिफ की स्वीकृति, वित्त वर्ष 2018-19 की एपीआर और वित्तीय वर्ष 2017-18 की सही स्थिति</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/OrderPetition04-09-2019.pdf" class="" data-mtli="mtli_filesize241MB" target="_blank" rel="noopener" title="दर अनुसूची वित्तीय वर्ष 2019-20">दर अनुसूची वित्तीय वर्ष 2019-20</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >ट्रू-अप वित्त वर्ष 2017-18, अप्रैल वित्त वर्ष 2018-19 और एआरआर और एएमपी दर अनुसूची वित्त वर्ष 2019-20 याचिका</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/1.True%20up,APR%20&amp;%20ARR%20Petition_PVVNL.PDF" target="_blank" rel="noopener" data-mtli="mtli_filesize1127kB" title="ट्रू अप, एआरआर और एएमपी एआरआर याचिका">ट्रू अप, एआरआर और एएमपी एआरआर याचिका</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/2.Proposed_Rate%20Schedule%20FY2019-20.pdf" class="" data-mtli="mtli_filesize1752MB" target="_blank" rel="noopener" title="प्रस्तावित दर अनुसूची FY2019-20">प्रस्तावित दर अनुसूची FY2019-20</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/3.Revised_Format_PVVNL.pdf" class="" data-mtli="mtli_filesize3126MB" target="_blank" rel="noopener" title="टैरिफ प्रारूप">टैरिफ प्रारूप</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/4.DBST.pdf" class="" data-mtli="mtli_filesize163MB" target="_blank" rel="noopener" title="डीबीएसटी">डीबीएसटी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >मा० उ०प्र० विद्&zwj;युत नियामक आयोग द्वारा निर्गत इलेक्ट्रिक वाहन चार्जिंग हेतु अनुमोदित टैरिफ</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/electric_vehicle_charging_236.pdf" class="" data-mtli="mtli_filesize243MB" target="_blank" rel="noopener" title="डाउनलोड">डाउनलोड</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >वित्त वर्ष 2015-16 के लिए टैरिफ का सही निर्धारण, वित्तीय वर्ष 2016-17 और 2017-18 के लिए वार्षिक प्रदर्शन समीक्षा (एपीआर) और वित्त वर्ष 2018-19 के लिए टैरिफ</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/201901241637116091executive-summary_240119.pdf" class="" data-mtli="mtli_filesize93325kB" target="_blank" rel="noopener" title="टैरिफ ऑर्डर वित्त वर्ष 2018-19">टैरिफ ऑर्डर वित्त वर्ष 2018-19</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Final-Tariff-Order_240119.pdf" class="" data-mtli="mtli_filesize10094MB" target="_blank" rel="noopener" title="अंतिम टैरिफ आदेश-राज्य डिस्कॉम">अंतिम टैरिफ आदेश-राज्य डिस्कॉम</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >वित्त वर्ष 2015-16, वित्त वर्ष 2016-17, वित्त वर्ष 2017-18 के लिए अप्रैल और वित्त वर्ष 2018-19 के लिए संशोधित अप्रैल का ट्रू-अप</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_151118.pdf" class="" data-mtli="mtli_filesize8194MB" target="_blank" rel="noopener" title="2015-16, 2016-17 के लिए ट्रू-अप">2015-16, 2016-17 के लिए ट्रू-अप</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_151118.pdf" class="" data-mtli="mtli_filesize8194MB" target="_blank" rel="noopener" title="अप्रैल वित्तीय वर्ष 2017-18">अप्रैल वित्तीय वर्ष 2017-18 </a><span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_151118.pdf" class="" data-mtli="mtli_filesize8194MB" target="_blank" rel="noopener" title="अप्रैल वित्तीय वर्ष 2017-18">अप्रैल वित्तीय वर्ष 2017-18</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Reply_data%20Gap_171118.pdf" class="" data-mtli="mtli_filesize7886MB" target="_blank" rel="noopener" title="उत्तर डेटा गैप 1">उत्तर डेटा गैप 1</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Reply_data%20Gap%202.pdf" class="" data-mtli="mtli_filesize611MB" target="_blank" rel="noopener" title="उत्तर डेटा गैप 2">उत्तर डेटा गैप 2</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >बहुवर्षीय टैरिफ आदेश वित्तीय वर्ष 2017-18 से वित्तीय वर्ष 2019-20</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Annexure_021217.pdf" class="" data-mtli="mtli_filesize37169kB" target="_blank" rel="noopener" title="अनुलग्नक 12.7 – बेंचमार्किंग अध्ययन_कार्यकारी सारांश_अंतिम">अनुलग्नक 12.7 – बेंचमार्किंग अध्ययन_कार्यकारी सारांश_अंतिम</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/English_021217.pdf" class="" data-mtli="mtli_filesize16631kB" target="_blank" rel="noopener" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff-Order_021217.pdf" class="" data-mtli="mtli_filesize814MB" target="_blank" rel="noopener" title="एमवायटी टैरिफ आदेश 30.11.2017[अंतिम]">एमवायटी टैरिफ आदेश 30.11.2017[अंतिम]</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >याचिका संख्या 1025 एवं amp में आदेश दिनांक 29 अप्रैल, 2016 की समीक्षा के लिए आदेश दिनांक 18/01/17 सभी मौजूदा स्टेशनों के लिए वित्तीय वर्ष 2011-12, वित्तीय वर्ष 2012-13 और वित्तीय वर्ष 2013-14 के लिए अंतिम ट्रूइंग अप के मामले में 2015 का 1026, वित्तीय वर्ष 2014-15 से वित्तीय वर्ष 2018-19 के लिए वार्षिक राजस्व आवश्यकता का अनुमोदन और टैरिफ का निर्धारण मौजूदा थर्मल पावर स्टेशनों के संबंध में और याचिका संख्या 1117/2016 और 1126/2016 में अनापारा डी के लिए अनंतिम टैरिफ के निर्धारण के लिए याचिका</p>
<p ><strong >व्यापार योजना &amp; एमवाईटी याचिका वित्त वर्ष 2017-18 से वित्त वर्ष 2019-20</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL-MYT-Petition.pdf" class="" data-mtli="mtli_filesize3581MB" target="_blank" rel="noopener" title="मल्टी ईयर टैरिफ पेटिशन">मल्टी ईयर टैरिफ पेटिशन</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Benchmarking-Study-Report.pdf" class="" data-mtli="mtli_filesize255MB" target="_blank" rel="noopener" title="बेंचमार्किंग अध्ययन रिपोर्ट">बेंचमार्किंग अध्ययन रिपोर्ट</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Business-Plan.pdf" class="" data-mtli="mtli_filesize1872MB" target="_blank" rel="noopener" title="वित्तीय वर्ष 2017-18 से 2019-20 के लिए व्यापार योजना">वित्तीय वर्ष 2017-18 से 2019-20 के लिए व्यापार योजना</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deficiency_1.pdf" class="" data-mtli="mtli_filesize8113MB" target="_blank" rel="noopener" title="कमी 1">कमी 1</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deficiency_2.pdf" class="" data-mtli="mtli_filesize1932MB" target="_blank" rel="noopener" title="कमी 2">कमी 2</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deficiency_3.pdf" class="" data-mtli="mtli_filesize705MB" target="_blank" rel="noopener" title="कमी 3">कमी 3</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deficiency_4.pdf" class="" data-mtli="mtli_filesize1050MB" target="_blank" rel="noopener" title="कमी 4">कमी 4</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Press-Note-ENGLISH_DisCom-FY%202017-18_Revised.pdf" class="" data-mtli="mtli_filesize35362kB" target="_blank" rel="noopener" title="प्रेस नोट डिस्कॉम वित्तीय वर्ष 2017-18 संशोधित">प्रेस नोट डिस्कॉम वित्तीय वर्ष 2017-18 संशोधित</a> – (भाषा – हिंदी और अंग्रेजी )</li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Proposed-Rate-Schedule-For-FY-2017-18.pdf" class="" data-mtli="mtli_filesize1499MB" target="_blank" rel="noopener" title="वित्तीय वर्ष 2017-18 के लिए प्रस्तावित दर अनुसूची">वित्तीय वर्ष 2017-18 के लिए प्रस्तावित दर अनुसूची</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/201709161354023837TOD%20Tariff%20%20LMV-6%20HV-2.pdf" class="" data-mtli="mtli_filesize53335kB" target="_blank" rel="noopener" title="अतिरिक्त सूचना-I">अतिरिक्त सूचना-I</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/201709161324324101Additional%20Information-tariff-details.pdf" class="" data-mtli="mtli_filesize908MB" target="_blank" rel="noopener" title="अतिरिक्त सूचना-II">अतिरिक्त सूचना-II</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >1 अगस्त 2016 को वित्तीय वर्ष 2016-17 के लिए टैरिफ आदेश</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_2016-17/pvvnl_060816.pdf" class="" data-mtli="mtli_filesize280MB" target="_blank" rel="noopener" title="टैरिफ आदेश 2016-17">टैरिफ आदेश 2016-17</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_2016-17/english_060816.pdf" class="" data-mtli="mtli_filesize33931kB" target="_blank" rel="noopener" title="मौजूदा बनाम स्वीकृत वित्तीय वर्ष 2016-17 अंग्रेजी">मौजूदा बनाम स्वीकृत वित्तीय वर्ष 2016-17 अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_2016-17/hindi_060816.pdf" class="" data-mtli="mtli_filesize28818kB" target="_blank" rel="noopener" title="मौजूदा बनाम स्वीकृत वित्तीय वर्ष 2016-17 हिन्दी">मौजूदा बनाम स्वीकृत वित्तीय वर्ष 2016-17 हिन्दी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p ><strong >एआरआर और एएमपी टैरिफ याचिका वित्तीय वर्ष 2016-17</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_TARIFF_PETITION_FY_2016-17/ARR_FY_2016-17.pdf" class="" data-mtli="mtli_filesize3302MB" target="_blank" rel="noopener" title="एआरआर वित्तीय वर्ष 2016-17">एआरआर वित्तीय वर्ष 2016-17</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_TARIFF_PETITION_FY_2016-17/DATA_GAP-1.pdf" class="" data-mtli="mtli_filesize5718MB" target="_blank" rel="noopener" title="डेटा गैप-I">डेटा गैप-I</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_TARIFF_PETITION_FY_2016-17/DATA_GAP-2.pdf" class="" data-mtli="mtli_filesize1626MB" target="_blank" rel="noopener" title="डेटा गैप-II">डेटा गैप-II</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/ARR_TARIFF_PETITION_FY_2016-17/TARIFF_PROPOSAL_FY_2016-17.pdf" class="" data-mtli="mtli_filesize347MB" target="_blank" rel="noopener" title="Tariff Proposal">Tariff Proposal</a><a  href="{{url('/')}}/uploads/tarifforder/ARR_TARIFF_PETITION_FY_2016-17/TARIFF_PROPOSAL_FY_2016-17.pdf" class="" data-mtli="mtli_filesize347MB" target="_blank" rel="noopener" title="वित्तीय वर्ष 2016-17 के लिए/a> – (भाषा – अंग्रेजी)">&nbsp;वित्तीय वर्ष 2016-17 के लिए/a&gt; <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></a></li>
</ul>
<p  >एलएमवी-1 (घरेलू प्रकाश, पंखा और एएमपी पावर), एलएमवी-5 (पीटीडब्ल्यू के लिए छोटी बिजली/सिंचाई के लिए पंपिंग) और amp; वित्तीय वर्ष 2016-17 के लिए एचवी-2 (बड़ी और भारी शक्ति) उपभोक्ताओं की श्रेणियां।</p>
<p ><strong >याचिका संख्या 989/2014 में वित्तीय वर्ष 2015-16 के लिए एआरआर और टैरिफ के लिए पीवीवीएनएल आदेश दिनांक 18/06/15</strong></p>
<p  >1. प्रेस नोट II</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/PN_ENG.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize143MB" title="अंग्रेजी II">अंग्रेजी II</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/PVVNLTariffOrderFY2015-16_18thJune,2015-pdf618201583003PM.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize143MB" title="एआरआर और एएमपी टैरिफ ऑर्डर डाउनलोड करें">एआरआर और एएमपी टैरिफ ऑर्डर डाउनलोड करें</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >वर्ष 2015-16 के लिए एआरआर और एएमपी टैरिफ</strong></p>
<p  >प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/pressnote_eng_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize143MB" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/trueup2012-13&amp;tariffpetition2015-16_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize143MB" title="Pवित्त वर्ष 2012-13 के लिए पीवीवीएनएल ट्रू अप याचिका और वित्त वर्ष 2015-16 के लिए एएमपी टैरिफ याचिका">Pवित्त वर्ष 2012-13 के लिए पीवीवीएनएल ट्रू अप याचिका और वित्त वर्ष 2015-16 के लिए एएमपी टैरिफ याचिका</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/datagap-ii_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize143MB" title="पीवीवीएनएल डेटा गैप-II">पीवीवीएनएल डेटा गैप-II</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/datagap-i_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize143MB" title="पीवीवीएनएल स्कैन डेटा गैप-I">पीवीवीएनएल स्कैन डेटा गैप-I</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/rateschedule_FY_2015-16_25032015.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize143MB" title="दर अनुसूची वित्तीय वर्ष 2015-16">दर अनुसूची वित्तीय वर्ष 2015-16</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – हिंदी)</span></li>
</ul>
<p ><a class=" mtli_attachment mtli_rar"  href="{{url('/')}}/uploads/tarifforder/tariff_21012015_b.rar" rel="noopener" data-mtli="mtli_filesize143MB" title="अंतिम अपील पश्चिमांचल टैरिफ आदेश 2014-15">अंतिम अपील पश्चिमांचल टैरिफ आदेश 2014-15</a></p>
<p ><strong >वर्ष 2014-15 के लिए टैरिफ</strong></p>
<p  >प्रेस नोट I</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PN_ENG-I.pdf" class="" data-mtli="mtli_filesize5249kB" target="_blank" rel="noopener" title="अंग्रेजी I">अंग्रेजी I</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >2. प्रेस नोट II</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PN_ENG-II.pdf" class="" data-mtli="mtli_filesize13746kB" target="_blank" rel="noopener" title="अंग्रेजी II">अंग्रेजी II</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Tariff_Order_FY_2014-15.docx" class="mtli_attachment mtli_docx" data-mtli="mtli_filesize121MB" rel="noopener" title="टैरिफ ऑर्डर डाउनलोड करें">टैरिफ ऑर्डर डाउनलोड करें</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Tariff_Order_FY_2014-15.docx" class="mtli_attachment mtli_docx" data-mtli="mtli_filesize121MB" rel="noopener" title="आपूर्ति संहिता संशोधन की मुख्य विशेषताएं">आपूर्ति संहिता संशोधन की मुख्य विशेषताएं</a></li>
</ul>
<p ><strong >एआरआर/याचिका वित्तीय वर्ष 2014-15</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a class=" "  href="{{url('/')}}/uploads/tarifforder/ENGLISH_Press%20Note_DisCom%20FY%202014-15-.pdf" target="_blank" rel="noopener" data-mtli="mtli_filesize143MB" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20ARR%20Petition%20FY%202014-15_29.11.2014-.pdf" class="" target="_blank" rel="noopener" title="एआरआर याचिका वित्त वर्ष 2014-15">एआरआर याचिका वित्त वर्ष 2014-15</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_True%20up%20FY2008-09%20to%20FY2010-11-.pdf" class="" target="_blank" rel="noopener" title="ट्रू अप पिटीशन ((2008-09 से 2010-11)">ट्रू अप पिटीशन ((2008-09 से 2010-11)</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Rate%20Schedule-.pdf" class="" target="_blank" rel="noopener" title="दर अनुसूची">दर अनुसूची</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deff_Note_1_14.03.2014-.pdf" class="" target="_blank" rel="noopener" title="याचिका में प्रारंभिक सूचना आवश्यकता/विसंगतियों पर उत्तर दें">याचिका में प्रारंभिक सूचना आवश्यकता/विसंगतियों पर उत्तर दें</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL_Deff_Note_2_22.05.2014-.pdf" class="" target="_blank" rel="noopener" title="याचिकाओं में लंबित/अतिरिक्त सूचना आवश्यकता/विसंगतियों पर उत्तर">याचिकाओं में लंबित/अतिरिक्त सूचना आवश्यकता/विसंगतियों पर उत्तर</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >टैरिफ वित्तीय वर्ष 2013-14 (स्पष्टीकरण)</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/tariff_clarification1_290613.pdf" class="" data-mtli="mtli_filesize48899kB" target="_blank" rel="noopener" title="Tटैरिफ वित्तीय वर्ष 2013-14 (स्पष्टीकरण संख्या)">Tटैरिफ वित्तीय वर्ष 2013-14 (स्पष्टीकरण संख्या)</a><a  href="{{url('/')}}/uploads/tarifforder/tariff_clarification1_290613.pdf" class="" data-mtli="mtli_filesize48899kB" target="_blank" rel="noopener" title="o.1)">o.1)</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/tariff_clarification2_290613.pdf" class="" data-mtli="mtli_filesize35060kB" target="_blank" rel="noopener" title="टैरिफ वित्तीय वर्ष 2013-14 (स्पष्टीकरण संख्या 2)">टैरिफ वित्तीय वर्ष 2013-14 (स्पष्टीकरण संख्या 2)</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >अधिसूचित टैरिफ वित्तीय वर्ष 2013-14 (टैरिफ आदेश)</strong><br>
<strong >एआरआर और टैरिफ निर्धारण वित्तीय वर्ष 2013-14</strong></p>
<p  >1. सार्वजनिक सूचना</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/PN%20ENG.zip" class="" data-mtli="mtli_filesize3272kB" rel="noopener" title="अंग्रेजी">अंग्रेजी</a></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20Suo-motu%20ARR%202013-14_31052013.pdf" class="" data-mtli="mtli_filesize304MB" target="_blank" rel="noopener" title="वित्तीय वर्ष 2013-14 के लिए एआरआर और टैरिफ का यू-मोटू निर्धारण">वित्तीय वर्ष 2013-14 के लिए एआरआर और टैरिफ का यू-मोटू निर्धारण</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >ट्रू अप ऑर्डर FY 2001 से 2007-08</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/True_Up_Order_PetNo809of2012_Issued_21052013-docx522201344418PM.pdf" class="" data-mtli="mtli_filesize452MB" target="_blank" rel="noopener" title="ट्रू अप ऑर्डर 21-05-2013 को जारी किया गया">ट्रू अप ऑर्डर 21-05-2013 को जारी किया गया</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >एआरआर टैरिफ वित्तीय वर्ष 2013-14</strong></p>
<p  >1. प्रेस नोट</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/Press%20Note%20ENGLISH_DisCom.pdf" class="" data-mtli="mtli_filesize39204kB" target="_blank" rel="noopener" title="अंग्रेजी">अंग्रेजी</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20ARR%202013-14%20Data%20Gap%20Reply.pdf" class="" data-mtli="mtli_filesize1442MB" target="_blank" rel="noopener" title="एआरआर याचिका में डेटा अंतराल/कमियां">एआरआर याचिका में डेटा अंतराल/कमियां</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20ARR%202013-14%20Petition.pdf" class="" data-mtli="mtli_filesize1566MB" target="_blank" rel="noopener" title="एआरआर याचिका वित्त वर्ष 2013-14">एआरआर याचिका वित्त वर्ष 2013-14</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20Audited%20Balance%20Sheet%202008-09.pdf" class="" data-mtli="mtli_filesize765MB" target="_blank" rel="noopener" title="बैलेंस शीट 2008-09">बैलेंस शीट 2008-09</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20Audited%20Balance%20Sheet%202009-10.pdf" class="" data-mtli="mtli_filesize494MB" target="_blank" rel="noopener" title="बैलेंस शीट 2009-10">बैलेंस शीट 2009-10</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/PVVNL%20Audited%20Balance%20Sheet%202010-11.pdf" class="" data-mtli="mtli_filesize297MB" target="_blank" rel="noopener" title="बैलेंस शीट 2010-11">बैलेंस शीट 2010-11</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Rate%20schedule.pdf" class="" data-mtli="mtli_filesize315MB" target="_blank" rel="noopener" title="दर अनुसूची">दर अनुसूची</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >ट्रू अप पिटीशन</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/True-up%20Pet%20for%20Website.zip" class="" data-mtli="mtli_filesize13354MB" rel="noopener" title="ट्रू अप पिटीशन (साइज 133MB)">ट्रू अप पिटीशन (साइज 133MB)</a></li>
</ul>
<p ><strong >शुद्धिपत्र</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/corrigendum1835_05nov12.pdf" class="" data-mtli="mtli_filesize44541kB" target="_blank" rel="noopener" title="शुद्धिपत्र I">शुद्धिपत्र I</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >वर्ष 2012-13 के लिए टैरिफ (वर्तमान: 01-10-2012 से प्रभावी)</strong></p>
<p  >प्रेस नोट I</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/eng_1_25oct12.pdf" class="" data-mtli="mtli_filesize1127kB" target="_blank" rel="noopener" title="अंग्रेजी I">अंग्रेजी I</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p  >2. प्रेस नोट II</p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/eng_2_25oct12.pdf" class="" data-mtli="mtli_filesize3115kB" target="_blank" rel="noopener" title="अंग्रेजी II">अंग्रेजी II</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_2012-13.pdf" class="" data-mtli="mtli_filesize473MB" target="_blank" rel="noopener" title="टैरिफ ऑर्डर डाउनलोड करें">टैरिफ ऑर्डर डाउनलोड करें</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Rate_Schedule_2012-13.pdf" class="" data-mtli="mtli_filesize69771kB" target="_blank" rel="noopener" title="दर अनुसूची">दर अनुसूची</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >वर्ष 2009-10 के लिए टैरिफ</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/corrigendum_12apr10.pdf" class="" data-mtli="mtli_filesize2518kB" target="_blank" rel="noopener" title="शुद्धिपत्र">शुद्धिपत्र</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/press_note_english_partI_2009_10.pdf" class="" data-mtli="mtli_filesize1229kB" target="_blank" rel="noopener" title="डाउनलोड प्रेस नोट I">डाउनलोड प्रेस नोट I</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/press_note_english_partII_2009_10.pdf" class="" data-mtli="mtli_filesize3361kB" target="_blank" rel="noopener" title="प्रेस नोट II डाउनलोड करें">प्रेस नोट II डाउनलोड करें</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/TARRIF_2009-10.pdf" class="" data-mtli="mtli_filesize165MB" target="_blank" rel="noopener" title="टैरिफ ऑर्डर डाउनलोड करें">टैरिफ ऑर्डर डाउनलोड करें</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/RATE_SCHEDULE_2009-10.pdf" class="" data-mtli="mtli_filesize32568kB" target="_blank" rel="noopener" title="दर अनुसूची">दर अनुसूची</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
</ul>
<p ><strong >वर्ष 2008-09 के लिए टैरिफ</strong></p>
<ul style="list-style: disc;margin-left: 30px;">
<li ><a  href="{{url('/')}}/uploads/tarifforder/press_note_1_Tariff_08-09.pdf" class="" data-mtli="mtli_filesize1244kB" target="_blank" rel="noopener" title="प्रेस नोट डाउनलोड करें I">प्रेस नोट डाउनलोड करें I</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/press_note_2_Tariff_08-09.pdf" class="" data-mtli="mtli_filesize2384kB" target="_blank" rel="noopener" title="प्रेस नोट डाउनलोड करें II">प्रेस नोट डाउनलोड करें II</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
<li ><a  href="{{url('/')}}/uploads/tarifforder/Tariff_Order_2008-09.pdf" class="" data-mtli="mtli_filesize315MB" target="_blank" rel="noopener" title="टैरिफ ऑर्डर डाउनलोड करें">टैरिफ ऑर्डर डाउनलोड करें</a> <span style="background-image:url('{{url('/')}}/img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span> – <span >(भाषा – अंग्रेजी)</span></li>
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
