<?php
$currentUrl = url()->current();
$newUrl = str_replace(url('/'), url('/hi'), $currentUrl);
?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

  <head>
    <meta charset="utf-8" />
    
    <meta name="MobileOptimized" content="width" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{url('/')}}/img/favicon.png" type="image/png" />
    <title>एनबीआरआई | सीएसआईआर-राष्ट्रीय वनस्पति अनुसंधान संस्थान</title>
     <link rel="stylesheet" media="all" href="{{url('/')}}/libraries/drupal-superfish/css/superfish.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/ajax-progress.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/align.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/autocomplete-loading.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/fieldgroup.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/container-inline.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/clearfix.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/details.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/hidden.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/item-list.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/js.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/nowrap.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/position-container.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/progress.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/reset-appearance.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/resize.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/sticky-header.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/system-status-counter.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/system-status-report-counters.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/system-status-report-general-info.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/tabledrag.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/tablesort.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/system/css/components/tree-child.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/core/modules/views/css/views.module.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/modules/better_exposed_filters/css/better_exposed_filters.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/themes/nbri/css/bootstrap.min.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/themes/nbri/css/font-awesome.min.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/themes/nbri/css/owl.carousel.min.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/themes/nbri/css/owl.theme.default.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/themes/nbri/css/animate.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/themes/nbri/css/font-awesome4.min.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/themes/nbri/css/style.css" />
    <link rel="stylesheet" media="all" href="{{url('/')}}/themes/nbri/css/print.css" />

    <style>
      #gov_bottom_slider2 img{
       width:100px !important;
       height:100px !important;
        }
      .button {
        background-color: #e74c3c;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-family: Arial;
        font-size: 20px;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        -webkit-animation: glowing 1500ms infinite;
        -moz-animation: glowing 1500ms infinite;
        -o-animation: glowing 1500ms infinite;
        animation: glowing 1500ms infinite;
      }
      @-webkit-keyframes glowing {
        0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
        50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
        100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
      }

      @-moz-keyframes glowing {
        0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
        50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
        100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
      }

      @-o-keyframes glowing {
        0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
        50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
        100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
      }

      @keyframes glowing {
        0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
        50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
        100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
      }
      ul.sf-menu ul{
        background: var(--Primary-gradient, linear-gradient(90deg, #DB5E00 0%, #3b711c 100%)) !important;
          }

      nav > .nav.nav-tabs{

        border: none;
        color:#fff;
        background:#272e38;
        border-radius:0;

      }
      nav > div a.nav-item.nav-link.active
      {
        border: none;
        padding: 10px 25px;
        color:#fff;
        background:#DB5E00;
        border-radius:0;
      }
      nav > div a.nav-item.nav-link
      {
        border: none;
        padding: 18px 25px;
        color:#fff;
        background:#272e38;
        border-radius:0;
      }

      nav > div a.nav-item.nav-link.active:after
      {
        content: "";
        position: relative;
        bottom: -52px;
        left: -10%;
        border: 15px solid transparent;
        border-top-color: #DB5E00;
      }
      .tab-content{
        background: #fdfdfd;
        line-height: 25px;
        border: 1px solid #ddd;
        border-top:5px solid #DB5E00;
        border-bottom:5px solid #DB5E00;
        padding:30px 25px;
      }

      nav > div a.nav-item.nav-link:hover,
      nav > div a.nav-item.nav-link:focus
      {
        border: none;
        background: #DB5E00;
        color:#fff;
        border-radius:0;
        transition:background 0.20s linear;
      }
      .leader{
        border-radius: 50%;
        max-height: 150px;
        display: block;
        margin: 0px auto;
      }


      .quick-link li a:hover {
        color: white !important;
        background: #DB5E00 !important;
      }
      .quick-link li a{
        font-weight: bold;
      }

      @media only screen and (min-width: 320px) and (max-width: 767px) {


        .image_shani{
          width: 70px !important;

        }

        #pp2{
          font-size: 13px !important;
        }
        #pp2 span{
          font-size: 10px !important;
        }

        #pp3{
          font-size: 10px !important;
        }
        
        #ss1 , #ss2{
          width: 100% !important;
        }


      }

      #superfish-main-menu .mainme {
        padding-right: .5rem !important;
        
        padding-left: .5rem !important;
        
      }
   
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 9999;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.sticky + .content {
  padding-top: 100px; /* Adjust this if your nav height differs */
}

    </style>
  </head>

  <body class="path-frontpage">
    

    <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>

      <div class="top-header" style="box-shadow: 0 1px 2px 0 rgb(0 0 0 / 45%), 0 1px 6px 0 rgb(0 0 0 / 12%) !important;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 left-sec">
              <ul style="height: 20px;">
                 <li>
                   <div class="time" style="font-size: 13px !important;color: #000;background:transparent; margin-top: -4px;font-weight: bold;">
                        <i class="fa fa-clock-o"></i>
                        <noscript>
                          Javascript Required
            
                        </noscript>
                        <script type="text/javascript" type="text/javascript">// <![CDATA[
                          var d = new Date()
                          var weekday = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")
                          var monthname = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec")
                          document.write(weekday[d.getDay()] + ", ")
                          document.write(d.getDate() + " ")
                          document.write(monthname[d.getMonth()] + ", ")
                          document.write(d.getFullYear())
                          // ]]></script>
                        <span id="clockDisplay">
                          <script type="text/javascript" type="text/javascript">// <![CDATA[
                            function renderTime() {
                              var currentTime = new Date();
                              var diem = "AM";
                              var h = currentTime.getHours();
                              var m = currentTime.getMinutes();
                              var s = currentTime.getSeconds();
                              setTimeout('renderTime()', 1000);
                              if (h == 0) {
                                h = 12;
                              } else if (h > 12) {
                                h = h - 12;
                                diem = "PM";
                              }
                              if (h < 10) {
                                h = "0" + h;
                              }
                              if (m < 10) {
                                m = "0" + m;
                              }
                              if (s < 10) {
                                s = "0" + s;
                              }
                              var myClock = document.getElementById('clockDisplay');
                              myClock.textContent = h + ":" + m + ":" + s + " " + diem;
                              myClock.innerText = h + ":" + m + ":" + s + " " + diem;
                            }
                            renderTime();
                            // ]]></script>
                        </span>
                      </div>
                </li>
              </ul>

            </div>
            <style>
              body.gray {
                background: gray;
                color: white;


              }

              body.gray .brand-text h4 {
                color: #ffffff;
              }

              body.gray img {
                filter: grayscale(100%);
                transition: filter 0.3s ease;
              }

              body.gray .navsection {
                background: var(--Primary-gradient, linear-gradient(90deg, #4a4a4a 0%, #35352f 100%)) !important;
                  }
              body.gray .service_section {
                background: var(--Primary-gradient, linear-gradient(90deg, #4a4a4a 0%, #35352f 100%)) !important;
                  }

              body.white {
                background: white;
                color: black;
              }
              body.blue {
                background: blue;
                color: white;
              }
              body.blue .brand-text h4 {
                color: #ffffff;
              }
              body.yellow {
                background: yellow;
                color: black;
              }
              #grayButton {
                background: gray;
              }
              #whiteButton {
                background: white;
              }
              #blueButton {
                background: blue;
              }
              #yellowButton {
                background: yellow;
              }
              .shani_shadow {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              }
            </style>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">

              <ul style="height: 20px;">
                <!-- <li class="hide"><a href="/faqs" class="skiptomain">FAQs</a></li> -->
                <li class="hide"><a href="#mainsection" class="skiptomain">मुख्‍य सामग्री पर जाएं</a></li>
                <li class="text-size" id="switcher">
                  <a title="Normal" id="whiteButton" class="blue com-color">A</a>
                  <a title="Black" id="grayButton" class="black com-color">A</a>

                  <!--  <a title="" id="blueButton" class="black com-color">A</a>
<a title="" id="yellowButton" class="black com-color">A</a>-->
                </li>
               <!-- <li class="dropdown"><a href="#">T<sup>T</sup></a>
                  <div class="dropdown-menu drop-w">
                    <a class="dropdown-item" href="#" title="Increase" onclick="fontIncrease();">T+</a>
                    <a class="dropdown-item" href="#" title="Normal" onclick="fontNormal();">T </a>
                    <a class="dropdown-item" href="#" title="Decrease" onclick="fontDecrease();">T -</a>

                  </div>
                </li>-->


                <li class="dropdown">
                  <a class="topfb_icon" href="#"><img alt="topfb_icon" src="{{url('/')}}/themes/nbri/images/social_img.png"></a>
                  <div class="dropdown-menu drop-w">
                    <a class="dropdown-item" onclick="return ConfirmLeaveSite(this.href)" href="https://www.facebook.com/share/1dXqfz9oDM/" title="Increase"><img alt="h_fb" src="{{url('/')}}/themes/nbri/images/h_fb.png"></a>
                    <a class="dropdown-item" onclick="return ConfirmLeaveSite(this.href)" href="https://x.com/csirnbrilko/highlights?lang=hi" title="Normal"><img alt="Goi NBRI" src="{{url('/')}}/themes/nbri/images/h_tw.png"></a>
                    <a class="dropdown-item" onclick="return ConfirmLeaveSite(this.href)" href="https://youtube.com/@csirnbriofficial?si=FzFxx65HWnEkB2TT" title="Decrease"><img alt="Youtube" src="{{url('/')}}/themes/nbri/images/h_utube.png"></a>

                  </div>
                </li>
                <li>
                  <a class="topfb_icon" href="{{url('/')}}/hi/sitemap"><img alt="sitemap" class="s_map" src="{{url('/')}}/themes/nbri/images/sitemap.png"></a>

                </li>


                <li class="nobdr lang">
                  <div class="region region-language-block">
                    <div class="language-switcher-language-url block block-language block-language-blocklanguage-interface" id="block-stqc-languageswitcher" role="navigation">


                      <ul class="links">
                        <li class="links"><select title="Select Language" class="blue com-color" id="languageDropdown" style="padding:0px;margin-top:12px;font-size:9px;margin-bottom:0px;height:25px;">
                         <option value="#" data-url="{{url('/')}}/en">English</option>
                         <option value="#" selected data-url="{{url('/')}}/hi">हिन्दी</option>
                        </select></li>
                      </ul>
                    </div>

                  </div>

                </li>
                <li class="search-btn"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                <!-- Button trigger modal -->
              </ul>
            </div>
          </div>
        </div>
        <div class="searchSection">
          <div class="region region-search-section">
            <div class="search-block-form block block-search container-inline" data-drupal-selector="search-block-form" id="block-stqc-searchform" role="search">


              <form action="#" method="get" id="search-block-form" accept-charset="UTF-8">
                <div class="js-form-item form-item js-form-type-search form-type-search js-form-item-keys form-item-keys form-no-label">
                  <label for="edit-keys" class="visually-hidden">खोजें</label>
                  <input title="Enter the terms you wish to search for." data-drupal-selector="edit-keys" type="search" id="edit-keys--4_lm7UPhEWE" name="keys" value="" size="15" maxlength="128" class="form-search" />

                </div>
                <div data-drupal-selector="edit-actions" class="form-actions js-form-wrapper form-wrapper" id="edit-actions--DZyTve3_01A">
                  <input data-drupal-selector="search-form-submit" type="submit" id="search-form--submit" value="Search" class="button js-form-submit form-submit" />
                </div>

              </form>

            </div>

          </div>
        </div>
      </div>
      <!--top header section end here-->
      <!--header section start here-->
      <header>
        <div class="topheader2" style="background: url({{url('/')}}/85226.jpg);background-repeat: repeat;background-size: contain;">
          <div class="container">
            <div class="row">


              <div class="col-2 logo-sec">
                <a class="logo-align" href="{{url('/')}}/">
                  <img class="image_shani" src="{{url('/')}}/img/logo.png" alt="CSIR NBRI" style="width: 170px;">
                </a>
              </div>



              <div class="col-8 logo-sec">
                <a class="logo-align" href="{{url('/')}}" style="text-align: center;">
                  <!-- <img class="image_shani" src="{{url('/')}}/img/logo.png" alt="Standardisation Testing and Quality Certification Directorate" style="width: 150px;">-->





                  <div class="brand-text" id="pp1">
                    <h3 style="font-weight:bold;color:#000;margin-top:10px;font-size: xx-large;" id="pp2">वै.औ.अ.प. - राष्ट्रीय वनस्पति अनुसंधान संस्थान<br>
                      <span>CSIR - National Botanical Research Institute</span></h3>
                    <h5 style="font-weight:bold;color:#000;" id="pp3">Rana Pratap Marg, Lucknow, India</h5>
                    <h5 style="font-weight:bold;color:#000;" id="pp3">राणा प्रताप मार्ग, लखनऊ, भारत</h5>
                    <p style="font-size: 13px;font-weight:bold;">
                      वैज्ञानिक एवं औद्योगिक अनुसंधान परिषद (सीएसआईआर), वैज्ञानिक और औद्योगिक अनुसंधान विभाग, विज्ञान एवं प्रौद्योगिकी मंत्रालय, भारत सरकार के अंतर्गत एक राष्ट्रीय महत्व का संस्थान
                    </p>
                  </div>
                </a>
              </div>
              <div class="col-2 moblie_bg">


                <!--nav section start here-->
                <div class="nav-wraper">
                  <div class="container-fluid">
                    <img class="image_shani" src="{{url('/')}}/img/logo.jpg" alt="एनबीआरआई | सीएसआईआर-राष्ट्रीय वनस्पति अनुसंधान संस्थान" style="border-radius: 50%;width:125px;">

                    <!--<div class="row">
<div class="col-12 col-sm-12 col-md-7 col-lg-2">

</div>
<div class="col-12 col-sm-12 col-md-5 col-lg-10">
<img class="image_shani" src="{{url('/')}}/img/logo.jpg" alt="" style="border-radius: 50%;width:125px;">
</div>

</div>

</div>-->


                  </div>
                  <!--nav section end here-->
                </div>
              </div>
            </div>
          </div>
          <!--menu section start here-->
          <div class="navsection" id="sticky-menu" style="background: var(--Primary-gradient, linear-gradient(90deg, #DB5E00 0%, #3b711c 100%));">
            <div class="container" style="">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-light custom-menu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <div class="region region-primary-menu">
                        <div id="block-stqc-mainmenu" class="block block-superfish block-superfishmain-menu">



                          <ul id="superfish-main-menu" class="menu sf-menu sf-main-menu sf-horizontal sf-style-none">

                            <li class="sf-depth-1 sf-no-children ss_new">
                              <a href="{{ url('/') }}/hi" title="Home page of NBRI Website" class="is-active sf-depth-1">
                                <i class="fa fa-home"></i>
                              </a>
                            </li>

                             @foreach($menu as $mn)
                            @if($mn->havesub == 'Yes')
                            <li id="main-menu-menu-link-content39b91e3c-2431-4b4c-aa47-ab680715f9cd" class="sf-depth-1 menuparent mainme"><a href="#" title="{{$mn->menu_hi}}" class="sf-depth-1 menuparent">{{ $mn->menu_hi }}</a>
                              <ul>
                                @foreach($submenu as $smn)
                                @if($mn->id == $smn->cat_name)
                                @if($smn->havechild == 'Yes')
                                <li id="main-menu-menu-link-contentcf1c57ed-b6d7-4d47-b38f-3c703775f59b" class="sf-depth-2 sf-no-children"><a href="#" class="sf-depth-2">{{ $smn->submenu_hi }}</a>
                                  <ul>
                                    @foreach($childmenu as $cmn)
                                    @if($smn->id == $cmn->submenu)
                                     @if($cmn->child_menu == 'Guest House Booking')
                                    <li class="sf-depth-3 sf-no-children"><a href="/hi/Guest-House-Booking">{{$cmn->childmenu_hi}}</a></li>
                                     @else
                                    <li id="main-menu-menu-link-contentfaab8150-7a28-4bc0-b373-60e24467eaa0" class="sf-depth-3 sf-no-children"><a href="{{url('/')}}/hi/{{ $mn->id }}/{{ $smn->id }}/{{ $cmn->id }}/{{ $cmn->child_menu }}" title="{{$cmn->childmenu_hi}}" class="sf-depth-3">{{ $cmn->childmenu_hi }}</a></li>
                                    @endif
                                    @endif
                                    @endforeach
                                  </ul>
                                </li>
                                @else
                                @php $url = '#'; @endphp

                                          @if(in_array($smn->sub_name, ['Scientists', 'Administration', 'Technical and Support Staff']))
                                            @php $url = url('/hi/Department-Staff-List/'.$smn->id.'/'.$smn->sub_name); @endphp
                                          @elseif($smn->sub_name == 'Director')
                                            @php $url = url('/hi/ViewProfile/2/'.$smn->sub_name); @endphp
                                          @elseif($smn->sub_name == 'CSIR')
                                            @php $url = 'https://www.csir.res.in'; @endphp
                                          @else
                                            @php $url = url('/hi/'.$mn->id.'/'.$smn->id.'/'.trim(preg_replace('/[^A-Za-z0-9\-]+/', '-', $smn->sub_name), '-')); @endphp
                                          @endif

                                          <li class="sf-depth-2 sf-no-children">
                                            <a href="{{ $url }}" @if($url == 'https://www.csir.res.in') onclick="return ConfirmLeaveSite(this.href)" @endif class="sf-depth-2" {{ $smn->sub_name == 'CSIR' ? 'target=_blank' : '' }}>{{ $smn->submenu_hi }}</a>
                                          </li>
                                @endif
                                @endif
                                @endforeach
                              </ul>
                            </li>
                            @else
                            <li id="main-menu-menu-link-content39b91e3c-2431-4b4c-aa47-ab680715f9cd" class="sf-depth-1 menuparent mainme"><a href="{{url('/')}}/hi/{{ $mn->id }}/{{ $mn->menu_name }}" title="{{$mn->menu_hi}}" class="sf-depth-1 menuparent">{{ $mn->menu_hi }}</a>
                              
                            </li>
                            @endif
                            @endforeach 

                          </ul>

                        </div>

                      </div>

                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--menu section end here-->
      </header>

<script type="text/javascript">
        function confirmLanguageChange() {
            return confirm("Do you want to change website language in English?");
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("languageDropdown").addEventListener("change", function () {
                var selectedOption = this.options[this.selectedIndex];
                var url = selectedOption.getAttribute("data-url");

                if (url) {
                    // Show confirmation dialog
                    if (confirmLanguageChange()) {
                        window.location.href = url;
                    } else {
                        // Reset dropdown to default option if canceled
                        this.selectedIndex = 0;
                       window.location.reload();
                    }
                }
            });
        });
</script>
      
<script>
  window.addEventListener('scroll', function () {
    var menu = document.getElementById("sticky-menu");
    var sticky = menu.offsetTop;

    if (window.pageYOffset > sticky) {
      menu.classList.add("sticky");
    } else {
      menu.classList.remove("sticky");
    }
  });
</script>
