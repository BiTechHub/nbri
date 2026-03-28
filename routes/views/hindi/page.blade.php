@extends('hindi.layouts.main')
@section('content')
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
                <span><a href="{{url('/hi')}}" rel="मुख्यपृष्ठ" style="color: white;">मुख्यपृष्ठ</a></span>
                <span><i class="fa fa-angle-right"></i></span>
                <span>
                  @if($menus_h->menu_hi == 'हमारे बारे में')
                    <a href="{{url('/hi')}}/about-us" style="color: white;">{{$menus_h->menu_hi}}</a>
                  @else
                    <a href="#" style="color: white;">{{$menus_h->menu_hi}}</a>
                   @endif
                  
                  
                
                </span>
                <span><i class="fa fa-angle-right"></i></span>
                <span class="active">{{$sub_menus->submenu_hi}}</span>
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
            <h3 style="text-align: center;" class="font-weight-bold">{{$sub_menus->submenu_hi}}</h3>
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
                  <th scope="col">Date</th>
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
                  <td><a href="{{url('/')}}/uploads/{{$itam->image}}" target="_blank">{{$itam->heading}} <span><img src="/img/pdf.png" alt=""> -- (भाषा – हिंदी)</span></a></td>
                  <td>{{ \Carbon\Carbon::parse($itam->created_at)->format('d-m-Y') }}</td>

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
            <h5>{{$itam->heading}}</h5>
            <p>{!!$itam->content!!}</p>
          </div>
          @endif
          @endforeach
          @endif

          @if ($submenu == 'Who’s Who')
          <div class="col-md-12 mt-4">
          <!--   <h3>अधिकारी फोन निर्देशिका</h3> -->
          </div>
          <div class="col-md-12">
            @foreach($category as $cate)
           <!--  <button class="btn btn-info mb-4 btn-data" data-id="{{$cate->id}}" title="{{ $cate->name }}">{{ $cate->name }}</button>-->
            
            <button class="btn btn-info mb-4 btn-data btn-lg" data-name="{{$cate->name}}" data-id="{{$cate->id}}" title="{{ $cate->name }}">{{ $cate->name }}</button>
            
            @endforeach
          </div>
          <div class="col-md-12">
            <h4 class="text-center" id="directori_name">फोन निर्देशिका</h4>
            <div class="table-responsive">
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th scope="col">क्रमांक</th>
                  <th scope="col">अधिकारी का नाम</th>
                  <th scope="col">पदनाम</th>
                  <th scope="col">क्षेत्र</th>
                  <th scope="col">ट्विटर</th>
                  <th scope="col">ईमेल आईडी</th>
                  <th scope="col">संपर्क नंबर</th>
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
                  <a href="http://jtp.uppcl.org/online/frmLogin.aspx" style="color: #ff7c1b;font-weight: 600;" >नए घरेलू कनेक्शन और वाणिज्यिक / औद्योगिक कनेक्शन की छवि (20 किलोवाट तक) (झाटपत कनेक्शन)</a></p>
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
                <a href="http://niveshmitra.up.nic.in/" style="color: #ff7c1b;font-weight: 600;" >वाणिज्यिक, औद्योगिक और संस्थागत उपयोगकर्ता नए बिजली कनेक्शन के लिए आवेदन करें (20 किलोवाट से अधिक) (निवेश मित्र)</a></p>
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
              <a href="http://ptw.uppcl.org/online/account/login" style="color: #ff7c1b;font-weight: 600;" >निजी नलकूप के लिए नए बिजली कनेक्शन के लिए आवेदन करें</a></p>
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
            <a href="https://jtp.uppcl.org/online/frmLogin.aspx" style="color: #ff7c1b;font-weight: 600;" >सिंगल पॉइंट टू मल्टी पॉइंट कनेक्शन के लिए आवेदन करें</a></p>
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
                <div class="vc-hoverbox-block vc-hoverbox-front lazy" style="background-image: url(&quot;{{url('/')}}/img/pvvnl-office.jpg&quot;);" data-bg="url({{url('/')}}/img/pvvnl-office.jpg)" data-was-processed="true">
                  <div class="vc-hoverbox-block-inner vc-hoverbox-front-inner">
                    <h2 style="text-align:center" tabindex="0" data-swp-font-size="20px">मुख्य व्यवसायिक कार्यालय</h2>
                  </div>
                </div>
                <div class="vc-hoverbox-block vc-hoverbox-back" style="background-color: #5aa1e3;">
                  <div class="vc-hoverbox-block-inner vc-hoverbox-back-inner">
                    <h2 style="text-align:center" tabindex="0" data-swp-font-size="20px">मुख्य व्यवसायिक कार्यालय</h2>
                    <p style="text-align: center;" tabindex="0" data-swp-font-size="14px">प्रबंध निदेशक का कार्यालय</p>
                    <p tabindex="0" data-swp-font-size="14px">ऊर्जा भवन</p>
                    <p tabindex="0" data-swp-font-size="14px">पश्चिमांचल विद्युत वितरण निगम लिमिटेड, विक्टोरिया पार्क, मेरठ 250001</p>
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
                <div class="vc-hoverbox-block vc-hoverbox-front lazy" style="background-image: url(&quot;{{url('/')}}/img/contact.png&quot;);" data-bg="url({{url('/')}}/img/contact.png)" data-was-processed="true">
                  <div class="vc-hoverbox-block-inner vc-hoverbox-front-inner">
                    <h2 style="text-align:center" tabindex="0" data-swp-font-size="20px">हेल्प लाइन नंबर</h2>
                  </div>
                </div>
                <div class="vc-hoverbox-block vc-hoverbox-back" style="background-color: #5aa1e3;">
                  <div class="vc-hoverbox-block-inner vc-hoverbox-back-inner">
                    <h2 style="text-align:center" tabindex="0" data-swp-font-size="20px">हेल्प लाइन नंबर</h2>
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
  <td colspan="5" class="text-center">वर्तमान में इस पृष्ठ के लिए कोई भी सामग्री उपलब्ध नहीं है, जल्द ही इस पृष्ठ के लिए सामग्री उपलब्ध होगी।
  </td>
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
        url:"{{url('/hi')}}/read_data/"+dataValue,
        dataType:'json',
        success:function(data)
        {
          var j=1;
          var msg='';
          for(var i=0;i<data.length;i++)
          {
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

          $("#director").html(msg);
          $("#directori_name").html(dataname);
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