<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>CSIR - National Botanical Research Institute</title>
    <style>
      body {
        font-size: 12px !important;
        color: #000 !important;
        font-family: verdana !important;
      }
      #printTable{
        background: white;
        margin: auto;
        padding:30px;
      }

      .submitt_btn
      {
        background: none repeat scroll 0 0 #CCCCCC;
        height: 30px;
        padding-bottom: 3px;
        width: 100px;
      }
      .page {
        width: 21.1cm;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        border: 0px solid #000;
      }
      .subpage {
        padding-left: 0.8cm;
        padding-right: 0.8cm;
        border: 0px solid #000;
        height: auto;
      }
      @page {
        size: A4 portrait;
        margin: 0;
      }
      @media print {
        
        #printTable2{
          margin-top: 500px;
        }
        
        .page {
          margin: 0;
          border: none;
          border-radius: 0;
          width: 100%;
          min-height: 100%;
          box-shadow: none;
          background: none;
          page-break-after: always;
        }

        header, footer {
          display: block;
        }
      }
      .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        /* margin-right: -15px; */
        margin-left: 0px;
      }
      *, *::before, *::after {
        box-sizing: border-box;
      }
      .col-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 17%;
        max-width: 25%;
      }
table {
  /* font-family: arial, sans-serif; */
  border-collapse: collapse;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 1px;
  width: 250px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
    <script>
      function printDiv(divID)
       {
        var divElements = document.getElementById(divID).innerHTML;
        var oldPage = document.body.innerHTML;
        window.print();
        document.body.innerHTML = oldPage;
      }
    </script></head>
  <body style="margin:0px;background: #eeeeee;"> 
    <section class="page" id="printTable">
      <div style="margin-top:-15px;" id="printTable2">
        <div class="row" style="width: 100%;">
          <div class="col-12" >
            <b style="font-size: 14px;text-align: center;">सी.एस.आई.आर.-राष्ट्रीय वनस्पति अनुसंधान संस्थान / CSIR- National Botanical Research Institute</b>
          </div>
          <div class="col-3" style="float: left;">
            <!-- <img src="C:/Users/Arvind/Downloads/logo1.png" style="width:40%;"> -->
            <img src="{{url('/')}}/img/logo1.png" style="width:40%;">
          </div>
          <div class="col-6" style="margin-left:-70px; width:75%;text-align: center;">
            <b style="font-size:11px;">(वैज्ञानिक तथा आद्योगिक अनुसंधान परिषद) (Council of Scientific and Industrial Research)</b><br>
            <b style="font-size:12px;">राणा प्रताप मार्ग, लखनऊ-226 001/Rana Pratap Marg, Lucknow-226001</b><br>
            <b style="font-size:12px;">प्रवेश पत्र / ADMIT CARD (Candidate Copy)</b><br>
          </div>
          <div class="col-3" style="float: left; width:10%;">
            <img src="{{url('/')}}/img/logo2.jpg" style="width:40%; margin-right: 15px;">
          </div>
          <div class="col-12">
            <b style="font-size: 12px;">विषय : विज्ञापन सं. {{ $test_cat->advt_no }} के अन्तर्गत {{$test_cat->for_post}} (सा./वि एवं ले. भ. एवं क्र.) के पद पर भर्ती हेतु लिखित परीक्षा</b><br>
            <b style="font-size: 12px;">Sub.: Written Test Examination for Recruitment to the post of {{$test_cat->for_post}} (G/F&A/S&P) as per Advt. No {{ $test_cat->advt_no }}</b><br>
          </div>
          <div class="col-8" style="width: 100%;">
            <table style="width: 75%;">
              <tr>
                <td>पद/Post</td>
                <td>{{$test_cat->for_post}}</td>
              </tr>
              <tr>
                <td>अनुक्रमांक / Roll No.</td>
                <td>{{$port_data->roll_no}}</td>
              <tr>
                <td>आवेदन पत्र सं./ Application No.</td>
                <td>{{$port_data->application_no}}</td>
              </tr>
              <tr>
                <td>अभ्यर्थी का नाम/Candidate's Name</td>
                <td>{{$port_data->candidate_name}}</td>
              </tr>
              <tr>
                <td>पिता/पति का नाम / Father's/Husband's Name</td>
                <td>{{$port_data->father_name}}</td>
              </tr>
              <tr>
                <td>जन्मतिथि/ Date of Birth</td>
                <td>{{$port_data->date_of_birth}}</td>
              </tr>
              <tr>
                <td>पत्राचार का पता/Correspondence Address</td>
                <td>{{$port_data->address}}</td>
              </tr>
              <tr>
                <td>लिंग/Gender</td>
                <td>{{$port_data->gender}}</td>
              </tr>
              <tr>
                <td>जाति श्रेणी/Caste Category</td>
                <td>{{$port_data->caste_category}}</td>
              </tr>
              <tr>
                <td>विकलांगता का प्रकार / Type of Disability</td>
                <td>{{$port_data->type_of_disability}}</td>
              </tr>
              <div class="col-3" style="float:right; width:25%;">
                <img src="{{url('/')}}/CandidatePics/{{$port_data->image_link}}" style="width:100%; margin-right:0px;height:185px;">
              </div>
            </table>
          </div>
          <div class="col-12" >
            <p style="font-size: 12px;">लिखित परीक्षा की तिथि समय एवं स्थल का विवरण /<b>Details of Written Test Date, Time & Venue:</b></p>
          </div>
          
          <table style="width:100%;">
            <tr>
              <td style="width: 30%;">लिखित परीक्षा की तिथि एवं समय /<br>Date & time of Written Test</td>
                <td style="width: 70%;">
                  @foreach($exam_paper as $ex)
                  <p style="word-spacing: 30px;margin:1px;">{{$ex->papername}} : {{$ex->paper_start_date}} {{$ex->paper_start_time}} to {{$ex->paper_end_time}} </p>
                  @endforeach
                  
                  </td>
            </tr>
            <tr>
              <td style="width: 30%;">परीक्षा केन्द्र /Examination Venue</td>
              <td style="width: 70%;">Uttar Pradesh Public Service Commission, Camp Office, Sector-D, Aliganj, Lucknow</td>
            </tr>
          </table>
       
<br><br><br>
          <table style=" width:100%;">
            <tr>
              <td>अभ्यर्थी के हस्ताक्षर (अन्तरीक्षक के समक्ष)<br>Candidate's signature (in the presence of the Invigilator)</td>
              <td>अन्तरीक्षक के हस्ताक्षर /<br> Signature of Invigilator</td>
            </tr>
          </table>
          <div class="col-6" style="float: left; width: 65%;">
            <b style="font-size: 12px;">Note: निर्देश पिछले पृष्ठ पर दिये गये हैं/ Instructions are given overleaf.</b>
          </div>
          <div class="col-6" style="float: left; width: 35%;">
            <p><span style=" display: block;margin: 20px 0px 7px 0px;">प्रशासन नियंत्रक/Controller of Administration</span></p>
          </div>
        </div>
        <h4 style="text-align: center;"> &#x2702;------------------कृपया यह भाग काट कर अन्वीक्षक को दें Please submit this portion to the Invigilator.
          -----------------</h4>
<div class="row">
  <div class="col-12" >
    <b style="font-size:14px;">सी.एस.आई.आर.-राष्ट्रीय वनस्पति अनुसंधान संस्थान / CSIR- National Botanical Research Institute</b>
  </div>
  <div class="col-3" style="float: left;">
    <img src="{{url('/')}}/img/logo1.png" style="width:40%;">
  </div>
  <div class="col-6" style="margin-left:-70px; width:75%;text-align: center;">
    <b style="font-size: 11px;">(वैज्ञानिक तथा आद्योगिक अनुसंधान परिषद) (Council of Scientific and Industrial Research)</b><br>
    <b style="font-size: 12px;">राणा प्रताप मार्ग, लखनऊ-226 001/Rana Pratap Marg, Lucknow-226001</b><br>
    <b style="font-size: 12px;">प्रवेश पत्र / ADMIT CARD (Office Copy)</b><br>
  </div>
  <div class="col-3" style="float:left; width: 10%;">
    <img src="{{url('/')}}/img/logo2.jpg" style="width:40%;margin-right: 15px;">
  </div>

  <div class="col-12">
    <b style="font-size: 12px;">विषय : विज्ञापन सं. {{$test_cat->advt_no}} के अन्तर्गत {{$test_cat->for_post}} (सा./वि एवं ले. भ. एवं क्र.) के पद पर भर्ती हेतु लिखित परीक्षा</b><br>
    <b style="font-size: 12px;">Sub.: Written Test Examination for Recruitment to the post of {{$test_cat->for_post}} (G/F&A/S&P) as per Advt. No {{$test_cat->advt_no}}</b><br>
  </div>
  

  <div class="col-8" style="width: 100%;">
    <table style="width: 75%;">
      <tr>
                <td>पद/Post</td>
                <td>{{$test_cat->for_post}}</td>
              </tr>
              <tr>
                <td>अनुक्रमांक / Roll No.</td>
                <td>{{$port_data->roll_no}}</td>
              <tr>
                <td>आवेदन पत्र सं./ Application No.</td>
                <td>{{$port_data->application_no}}</td>
              </tr>
              <tr>
                <td>अभ्यर्थी का नाम/Candidate's Name</td>
                <td>{{$port_data->candidate_name}}</td>
              </tr>
              <tr>
                <td>पिता/पति का नाम / Father's/Husband's Name</td>
                <td>{{$port_data->father_name}}</td>
              </tr>
              <tr>
                <td>जन्मतिथि/ Date of Birth</td>
                <td>{{$port_data->date_of_birth}}</td>
              </tr>
              <tr>
                <td>पत्राचार का पता/Correspondence Address</td>
                <td>{{$port_data->address}}</td>
              </tr>
              <tr>
                <td>लिंग/Gender</td>
                <td>{{$port_data->gender}}</td>
              </tr>
              <tr>
                <td>जाति श्रेणी/Caste Category</td>
                <td>{{$port_data->caste_category}}</td>
              </tr>
              <tr>
                <td>विकलांगता का प्रकार / Type of Disability</td>
                <td>{{$port_data->type_of_disability}}</td>
              </tr>
      <div class="col-3" style="float: right; width:25%;">
        <img src="{{url('/')}}/CandidatePics/{{$port_data->image_link}}" style="width:100%; margin-right: 5px;height:185px;">
      </div>
    </table><br>
  </div>
<div class="col-12" >
  <p style="font-size: 12px;">लिखित परीक्षा की तिथि समय एवं स्थल का विवरण /<b>Details of Written Test Date, Time & Venue:</b></p>
</div>

<table style="width: 100%;">
  <tr>
    <td style="width: 30%;">लिखित परीक्षा की तिथि एवं समय /<br>Date & time of Written Test</td>
      <td style="width: 70%;">
        <table style="width:100%; border-collapse: collapse;">
    @foreach($exam_paper as $ex)
    <tr>
        <td style="width:35%; border:1px solid #000; padding:4px;">
            {{ $ex->papername }}
        </td>
        <td style="width:65%; border:1px solid #000; padding:4px;">
            {{ $ex->paper_start_date }}
            {{ $ex->paper_start_time }}
            to
            {{ $ex->paper_end_time }}
        </td>
    </tr>
    @endforeach
</table>

        </td>
  </tr>
  <tr>
    <td style="width: 30%;">परीक्षा केन्द्र /Examination Venue</td>
    <td style="width: 70%;">Uttar Pradesh Public Service Commission, Camp Office, Sector-D, Aliganj, Lucknow</td>
  </tr>
</table>

<br><br><br><br>

  <table style="width:100%;">
    <tr>
      <td>अभ्यर्थी के हस्ताक्षर (अन्तरीक्षक के समक्ष)<br>Candidate's signature (in the presence of the Invigilator)</td>
      <td>अन्तरीक्षक के हस्ताक्षर /<br> Signature of Invigilator</td>
    </tr>
  </table>
  <div class="col-6" style="float: left; width: 65%;">
    <b style="font-size: 12px;">Note: निर्देश पिछले पृष्ठ पर दिये गये हैं/ Instructions are given overleaf.</b><br>
  </div> 
  <div class="col-6" style="float: left; width: 35%;">
    <p><span style=" display: block;margin: 20px 0px 7px 0px;">प्रशासन नियंत्रक/Controller of Administration</span></p>
  </div>
  <div id="example1"style=" width:100%; border:2px solid black;padding: 10px;border-radius: 25px; margin-top:20px;" >
      <h3 style="text-align: center;"><u>अभ्यर्थियों से अनुरोध </u></h3>
      <P>1. अभ्यर्थियों से अनुरोध है कि वे परीक्षा के लिए निर्धारित समय से एक घंटे पूर्व परीक्षा स्थल पर पहुंचें। प्रातः 10:30 बजे के पश्चात किसी भी परिस्थिति में परीक्षा केन्द्र में प्रवेश नहीं दिया जाएगा।</P>
      <P>2. पेपर। एवं पेपर- ।। के मध्य 30 मिनट का अंतराल होगा एवं किसी भी अभ्यर्थी को अंतराल के दौरान परीक्षा केन्द्र से बाहर जाने की अनुमति प्रदान नहीं की जायेगी।</P>
      <P>3. अभ्यर्थियों को प्रवेश पत्र पर अपने हस्ताक्षर अन्तरीक्षक की उपस्थिति में करने होंगे।</P>
      <P>4 अपने प्रवेश पत्र के साथ पहचान के प्रमाण के लिए अपनी फोटो आई.डी. जैसे ड्राइविंग लाइसेंस, मतदाता आई.डी. कार्ड, आधार कार्ड, पैन कार्ड, पासपोर्ट, राज्य/केन्द्रीय सरकार द्वारा जारी किया गया आईडी कार्ड इत्यादि की मूल तथा एक स्वप्रमाणित छायाप्रति लेकर उपस्थित हों।</P>
      <P>5. प्रवेश पत्र प्रस्तुत करने पर ही आपको परीक्षा भवन में प्रवेश करने की अनुमति दी जाएगी।</P>
      <P>6. किसी भी परिस्थिति में परीक्षा केन्द्र / परीक्षा तिथि परिवर्तित करने का अनुरोध स्वीकार्य नहीं होगा।</P>
      <P>7. लिखित परीक्षा में सम्मिलित होने के लिए अभ्यर्थी को किसी भी प्रकार के यात्रा भत्ते का भुगतान नहीं किया जाएगा।</P>
      <P>8. लिखित परीक्षा में ओ.एम.आर शीट पर उत्तर देने के लिए केवल नीले/काले वॉल प्वाइंट पेन का उपयोग करें।</P>
      <P>9. परीक्षा केंद्र पर मोबाइल फोन, स्मार्ट घड़ी, स्कैंनिंग डिवाइस अथवा अन्य कोई भी इलेक्ट्रॉनिक गैजेट्स लाना पूर्णतः प्रतिबंधित है तथा इन्हें परीक्षा केंद्र में जमा कराने की कोई व्यवस्था नहीं होगी।</P>
      <P>10. लिखित परीक्षा की समाप्ति से पूर्व किसी भी अभ्यर्थी को परीक्षा केन्द्र छोड़ने की अनुमति नहीं होगी।</P>
      <P>11. किसी भी प्रकार की सूचना के लिए ई-मेल sorectt-nbri@nbri.res.in अथवा फोन नं. 0522-2297890 पर संपर्क कर सकते हैं।</P>
      <P>12 अर्ड पी.डब्ल्यू. डी. अभ्यर्थियों के द्वारा स्क्राइब उपयोग हेतु उद्घोषणा तथा निर्देशों के लिए संस्थान की वेबसाइट पर उपलब्ध नोटिस दिनांक 11.11.2024 का अवलोकन करें।</P>
  </div><br><br>
    <div id="example1"style=" width:100%;margin-top:4px; border:2px solid black;
  padding: 10px;
  border-radius: 25px;" >
    <h3 style="text-align: center;"><u>INSTRUCTION FOR CANDIDATES </u></h3>
    <P>1. Candidates are advised to reach examination center one hour before the scheduled time. Candidates will not be permitted to enter the Examination Center in any circumstance after 10:30 AM.</P>
    <P>2. There will be an interval of 30 minutes between Paper-I and Paper-II and no candidate will be allowed to leave the examination centre during the interval.</P>
    <P>3. The Candidate has to affix his/her signature in presence of Invigilator.</P>
    <P>4. Candidate are required to bring their original as well as a self-attested photocopy of their Photo ID proof e.g. Driving License, Voter ID Card, Aadhar Card, PAN Card, Passport, State/Central Government issued ID Card etc.</P>
    <P>5. You will be allowed to enter the Examination Centre only on production of Admit Card.</P>
    <P>6. Request for change of Examination Centre/Examination Date will not be entertained under any circumstances.</P>
    <P>7. No travelling allowances will be admissible for appearing in the Written Exam.</P>
    <P>8. USE ONLY BLUE/BLACK BALL POINT PEN for making the answers on the OMR sheet during the Written Examination.</P>
    <P>9. Do not bring mobile Phone (s), smart watch, scanning devices(s) or any electronic gadgets to the Examination center. Please note that, no arrangement for depositing these items will be made at the Examination center as these items are banned inside the examination center.</P>
    <P>10. No Candidate will be allowed to leave the examination Centre before completion of the Written Exam.</P>
    <P>11. For any kind of information, you can contact at email sorectt-nbri@nbri.res.in or Phone No. 0522-2297890.</P>
    <P>12. Eligible PwBD candidates, may refer declaration and instructions for use of scribes as given in notice dated 11.11.2024 uploaded on the Institute's website</P>
    </div>
</div>
          </div>
    </section>
    <section>
      <div class="row no-print">
        <div class="col-6" style="width: 100%;text-align: center;margin: 21px 0px;">
          <button onclick="printDiv('printTable')" id="button" class="btn btn-primary pull-right mx-2" type="button" style="background-color: #0bb2d4;border-color: #0bb2d4;color: #fff;padding: 10px;"> <span><i class="fa fa-print"></i> Print Receipt</span></button>
          
          <!-- <a href="{{url('/')}}/admin-panel/demand-notice" id="backbutton" class="btn btn-primary pull-right mx-2" type="button" style="background-color: #0bb2d4;border-color: #0bb2d4;color: #fff;padding: 12px;"> <span><i class="ti-save-alt"></i> Back </span> </a> -->
        </div>
      </div>
    </section>
  </body></html>