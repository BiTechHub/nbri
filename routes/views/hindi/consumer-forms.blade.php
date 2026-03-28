@extends('hindi.layouts.main')
@section('content')
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
                  <span><a href="{{url('/hi')}}" rel="home" style="color: white;">मुख्यपृष्ठ</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span><a href="#" style="color: white;">उपभोक्ता सेवा</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">उपभोक्ता प्रपत्र</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">उपभोक्ता प्रपत्र</h3>
              <hr>
            </div>
              
            <div class="col-md-12">
              <h4 ><strong>नया कनेक्शन</strong></h4>
              <ul>
              <li><a href="{{url('/')}}/uploads/new%20Conn_hindi.pdf" class="mtli_attachment mtli_pdf"  target="_blank" rel="noopener" title="नए कनेक्शन आवेदन के लिए प्रक्रिया">नए कनेक्शन आवेदन के लिए प्रक्रिया</a> – <span >(भाषा – हिंदी)</span></li>
              <li><a href="{{url('/')}}/uploads/Re_Conn_hindi.pdf" class="mtli_attachment mtli_pdf"  target="_blank" rel="noopener" title="पुन: संयोजन आवेदन के लिए प्रक्रिया">पुन: संयोजन आवेदन के लिए प्रक्रिया</a> – <span >(भाषा – हिंदी)</span></li>
              <li><a href="{{url('/hi')}}/uploads/change%20of%20category_hindi.pdf" class="mtli_attachment mtli_pdf"  target="_blank" rel="noopener" title="श्रेणी के परिवर्तन की प्रक्रिया">श्रेणी के परिवर्तन की प्रक्रिया</a> – <span >(भाषा – हिंदी)</span></li>
              <li><a href="{{url('/')}}/uploads/Shifting%20of%20connection_hindi.pdf" class="mtli_attachment mtli_pdf"  target="_blank" rel="noopener" title="कनेक्शन के स्थानांतरण की प्रक्रिया">कनेक्शन के स्थानांतरण की प्रक्रिया</a> – <span >(भाषा – हिंदी)</span></li>
              <li><a href="{{url('/')}}/uploads/Transfer%20of%20connection_hindi.pdf" class="mtli_attachment mtli_pdf"  target="_blank" rel="noopener" title="कनेक्शन के हस्तांतरण की प्रक्रिया / नाम का उत्परिवर्तन">कनेक्शन के हस्तांतरण की प्रक्रिया / नाम का उत्परिवर्तन</a> – <span >(भाषा – हिंदी)</span></li>
              <li><a href="{{url('/')}}/uploads/Meter%20change%20Hindi.pdf" class="mtli_attachment mtli_pdf" target="_blank" rel="noopener" title="मीटर बदलने की प्रक्रिया">मीटर बदलने की प्रक्रिया</a> – <span >(भाषा – हिंदी)</span></li>
              <li>बिल पढ़ने में कठिनाई (हाथ में बिल, आईबीएम बिल)</li>
              </ul>
            </div>
          
            <div class="col-md-12">
                <h4 ><strong>नए विद्युत कनेक्शन के लिए शुल्क</strong></h4>
                <ul style="list-style: decimal; color: #000;">
                <li>प्रोसेसिंग शुल्क</li>
                <li>प्रतिभूति राशि</li>
                <li>लाइन प्रभार</li>
                <li>मीटर की लागत और उसके उपकरण की लागत</li>
                <li>18% जीएसटी (सुरक्षा जमा को छोड़कर)</li>
                </ul>
                <p style="color: #000;">लागत डेटा बुक-2019 के अनुसार नए कनेक्शन शुल्क</p>
            </div>
              
                <div class="col-md-12">
			<h4 >प्रोसेसिंग शुल्क</h4>
<table class="table table-fixed inner-table" width="100%">
<tbody>
<tr>
<th style="width: 20px;" >क्रमांक</th>
<th >विवरण</th>
<th >दर</th>
</tr>
<tr>
<td>1</td>
<td>बीपीएल तथा 1 किलोवाट तक विधुत भार</td>
<td>रु. 10/-</td>
</tr>
<tr>
<td>2</td>
<td>1 किलोवाट तक लोड (बीपीएल के अलावा)</td>
<td>रु. 50/-</td>
</tr>
<tr>
<td>3</td>
<td>1 किलोवाट से ऊपर 24.9 किलोवाट तक लोड</td>
<td>रु. 100/-</td>
</tr>
<tr>
<td>4</td>
<td>24.9 किलोवाट से ऊपर 50 किलोवाट/56 KVA तक लोड</td>
<td>रु. 1000/-</td>
</tr>
<tr>
<td>5</td>
<td>56 केवीए से ऊपर 500 केवीए तक लोड</td>
<td>रु. 5000/-</td>
</tr>
<tr>
<td>6</td>
<td>500 केवीए से ऊपर 3000 केवीए तक लोड</td>
<td>रु. 10000/-</td>
</tr>
<tr>
<td>7</td>
<td>3000 KVA से अधिक लोड 10000 KVA तक</td>
<td>रु. 15000/-</td>
</tr>
<tr>
<td>8</td>
<td>10000 केवीए से ऊपर लोड</td>
<td>रु. 25000/-</td>
</tr>
</tbody>
</table>

		</div>
              
                <div class="col-md-12">
			<h4 >प्रतिभू राशि</h4>
<table class="table table-fixed inner-table" width="100%">
<tbody>
<tr>
<th style="width: 20px;" >क्रमांक</th>
<th >टैरिफ</th>
<th >विवरण</th>
<th >दर</th>
<th >प्रति यूनिट</th>
</tr>
<tr>
<td>1.</td>
<td>LMV1</td>
<td>1 किलोवाट (बीपीएल) तक</td>
<td>रु. 0/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>2.</td>
<td>LMV1</td>
<td>2 किलोवाट तक के ग्रामीण उपभोक्ता</td>
<td>रु. 100/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>3.</td>
<td>LMV1</td>
<td>2 किलोवाट तक के शहरी उपभोक्ता</td>
<td>रु. 300/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>4.</td>
<td>LMV1</td>
<td>2 किलोवाट से ऊपर लोड करें</td>
<td>रु. 400/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>5.</td>
<td>LMV2</td>
<td>गैर घरेलू उपभोक्ता</td>
<td>रु. 1000/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>6.</td>
<td>LMV2</td>
<td>साइन बोर्ड, साइन पोस्ट, फ्लेक्स, ग्लो एडवरटाइजिंग</td>
<td>रु. 6000/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>7.</td>
<td>LMV3</td>
<td>ग्राम पंचायत</td>
<td>रु. 3400/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>8.</td>
<td>LMV3</td>
<td>नगर पालिका &amp; नगर पंचायत</td>
<td>रु. 4000/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>9.</td>
<td>LMV3</td>
<td>नगर निगम</td>
<td>रु. 5000/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>10.</td>
<td>LMV4</td>
<td>सरकारी/निजी संस्थान</td>
<td>रु. 4000/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>11.</td>
<td>LMV5</td>
<td>निजी ट्यूबवेल (PTW)</td>
<td>रु. 300/-</td>
<td>बीएचपी</td>
</tr>
<tr>
<td>12.</td>
<td>LMV6</td>
<td>लघु उद्योग और पावर</td>
<td>रु. 1350/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>13.</td>
<td>LMV7</td>
<td>सार्वजनिक जल कार्य</td>
<td>रु. 4000/-</td>
<td>केवीए</td>
</tr>
<tr>
<td>14.</td>
<td>LMV8</td>
<td>राज्य ट्यूबवेल STW</td>
<td>रु. 2000/-</td>
<td>किलोवाट</td>
</tr>
<tr>
<td>15.</td>
<td>HV1</td>
<td>HT उपभोक्ता</td>
<td>रु. 4500/-</td>
<td>केवीए</td>
</tr>
<tr>
<td>16.</td>
<td>HV2</td>
<td>HT औद्योगिक उपभोक्ता</td>
<td>रु. 2200/-</td>
<td>केवीए</td>
</tr>
<tr>
<td>17.</td>
<td>HV3</td>
<td>रेलवे कर्षण</td>
<td>रु. 4500/-</td>
<td>केवीए</td>
</tr>
<tr>
<td>18.</td>
<td>HV3</td>
<td>मेट्रो रेल</td>
<td>रु. 3000/-</td>
<td>केवीए</td>
</tr>
<tr>
<td>19.</td>
<td>HV4</td>
<td>लिफ्ट सिंचाई कार्य</td>
<td>रु. 3500/-</td>
<td>केवीए</td>
</tr>
<tr>
<td>20.</td>
<td>–</td>
<td>इलेक्ट्रिकल वाहन चार्जिंग HT/LT</td>
<td>रु. 400/-</td>
<td>किलोवाट</td>
</tr>
</tbody>
</table>

		</div>
              
                <div class="col-md-12">
			<h4 ><strong>सर्विस लाइन शुल्क</strong></h4>
<p>इसमें लाइन निर्माण की लागत भी शामिल है। केवल पर्यवेक्षण और श्रम शुल्क निम्नलिखित हैं। इसमें केबल की लागत शामिल नहीं है। यह केवल 40 मीटर से कम के केबल कनेक्शन के लिए लागू है। केबल कनेक्शन के अलावा अन्य के लिए एक अलग अनुमान आवश्यक है। उपभोक्ता को विशिष्टताओं के साथ केबल खरीदने की आवश्यकता है:</p>
<ul>
<li>2 किलोवाट – तक लोड 2×4 वर्ग मिमी पीवीसी बख़्तरबंद केबल कैटेनरी व्यवस्था के साथ के लिए (रु. 38/मी)</li>
<li>5 किलोवाट – तक लोड 2×6 वर्ग मिमी पीवीसी बख़्तरबंद केबल कैटेनरी व्यवस्था के साथ के लिए (रु. 45/मी)</li>
<li>5 किलोवाट तक लोड भूमिगत – 2सी x 10 वर्ग मिमी पीवीसी बख़्तरबंद केबल। (रु. 56/मी)</li>
<li>5 किलोवाट से 25 किलोवाट तक लोड – 4×25 वर्ग मिमी बख़्तरबंद केबल कैटेनरी व्यवस्था के साथ (रु. 213/मी)</li>
<li>5 किलोवाट से 25 किलोवाट तक भूमिगत – 3.5 C x 35 वर्ग मिमी XLPE आर्मर्ड केबल (रु. 220/मी)</li>
<li>26 किलोवाट से 50 किलोवाट तक लोड – 3.5×70 वर्ग मिमी बख्तरबंद केबल कैटेनरी व्यवस्था के साथ (रु. 248/मी)</li>
<li>लोड 26 किलोवाट से 50 किलोवाट भूमिगत- 70 वर्ग मिमी एक्सएलपीई केबल (रु. 248/मी)</li>
</ul>
<table class="table table-fixed inner-table" width="100%">
<tbody>
<tr>
<th style="width: 20px;" >क्रमांक</th>
<th >लोड</th>
<th >विवरण</th>
<th >दर</th>
</tr>
<tr>
<td>1.</td>
<td>2 किलोवाट तक</td>
<td>ग्रामीण (केवल LMV1 और LMV2)</td>
<td>रु.150/-</td>
</tr>
<tr>
<td>2.</td>
<td>5 किलोवाट तक</td>
<td>ओवरहेड अर्बन</td>
<td>रु 398/-</td>
</tr>
<tr>
<td>3.</td>
<td>5 किलोवाट तक</td>
<td>भूमिगत</td>
<td>रु 687/-</td>
</tr>
<tr>
<td>4.</td>
<td>5 किलोवाट तक</td>
<td>भूमिगत सड़क क्रॉसिंग</td>
<td>रु 2187/-</td>
</tr>
<tr>
<td>5.</td>
<td>5 किलोवाट से 24 किलोवाट</td>
<td>ओवरहेड</td>
<td>रु. 2036/-</td>
</tr>
<tr>
<td>6.</td>
<td>5 किलोवाट से 24 किलोवाट</td>
<td>भूमिगत</td>
<td>रु 3082/-</td>
</tr>
<tr>
<td>7</td>
<td>5 किलोवाट से 24 किलोवाट</td>
<td>भूमिगत सड़क क्रॉसिंग</td>
<td>रु 5282/-</td>
</tr>
<tr>
<td>8.</td>
<td>25 किलोवाट से 50 किलोवाट</td>
<td>ओवरहेड</td>
<td>रु 3132/-</td>
</tr>
<tr>
<td>9.</td>
<td>25 किलोवाट से 50 किलोवाट</td>
<td>भूमिगत</td>
<td>रु 3477/-</td>
</tr>
<tr>
<td>10.</td>
<td>25 किलोवाट से 50 किलोवाट</td>
<td>भूमिगत सड़क क्रॉसिंग</td>
<td>रु 6477/-</td>
</tr>
<tr>
<td>11.</td>
<td>पीटीडब्ल्यू (7 बीएचपी तक)</td>
<td>ओवरहेड (सिंगल फेज मीटर)</td>
<td>रु 468/-</td>
</tr>
<tr>
<td>12.</td>
<td>पीटीडब्ल्यू (7 बीएचपी तक)</td>
<td>ओवरहेड (थ्री फेज मीटर)</td>
<td>रु.993/-</td>
</tr>
<tr>
<td>13.</td>
<td>पीटीडब्ल्यू (7 बीएचपी से अधिक)</td>
<td>ओवरहेड</td>
<td>रु. 2036/-</td>
</tr>
</tbody>
</table>

		</div>
              
                <div class="col-md-12">
			<h4 ><strong>मीटर और एएमपी; इसके उपकरण</strong></h4>
<p>मीटर और एएमपी; इसका उपकरण शुल्क सर्विस लाइन शुल्क के साथ लिया जा सकता है। स्टोर पर मीटर उपलब्ध न होने पर उपभोक्ता स्वयं कार्य कर सकता है। लेकिन, इसे विभागीय प्रयोगशाला में जांच करना होगा और विनिर्देशों को विभाग द्वारा निर्दिष्ट किया जाना चाहिए।</p>
<table class="table table-fixed inner-table" width="100%">
<tbody>
<tr>
<th style="width: 20px;" >क्रमांक</th>
<th >मीटर प्रकार</th>
<th >दर</th>
</tr>
<tr>
<td>1.</td>
<td>सिंगल फेज स्टेटिक मीटर</td>
<td>रु. 872/-</td>
</tr>
<tr>
<td>2.</td>
<td>थ्री फेज स्टेटिक मीटर</td>
<td>रु. 2921/-</td>
</tr>
<tr>
<td>3.</td>
<td>3 Ph 4 वायर LT TVM क्यूबिकल के साथ</td>
<td>रु. 8483/-</td>
</tr>
<tr>
<td>4.</td>
<td>3 Ph 4 वायर स्टेटिक TVM 11 KV</td>
<td>रु. 3768/-</td>
</tr>
<tr>
<td>5.</td>
<td>11 केवी क्यूबिकल वाला मीटर (रु. 44709/-)</td>
<td>रु. 48477/-</td>
</tr>
<tr>
<td>6.</td>
<td>33 केवी क्यूबिकल वाला मीटर (रु. 123176/-)</td>
<td>रु. 126944/-</td>
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
