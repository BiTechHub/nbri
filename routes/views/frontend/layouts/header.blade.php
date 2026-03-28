<?php
$currentUrl = url()->current();
$newUrl = str_replace(url('/'), url('/hi'), $currentUrl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no" />
<meta name="description" content="">
<meta name="author" content="">
<link rel="apple-touch-icon" href="{{url('/')}}/assets/images/favicon/apple-touch-icon.png">
<link rel="icon" href="{{url('/')}}/img/favicon.png">
<title>Official Website of Pashchimanchal Vidyut Vitran Nigam Limited, Government of India</title>
<!-- Custom styles for this template -->
<link href="{{url('/')}}/assets/css/base.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/assets/css/base-responsive.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/assets/css/grid.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/assets/css/font.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/assets/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/assets/css/flexslider.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/assets/css/megamenu.css" rel="stylesheet" media="all" />
<link href="{{url('/')}}/assets/css/print.css" rel="stylesheet" media="print" />
<!-- Theme styles for this template -->
<link href="{{url('/')}}/assets/css/megamenu.css" rel="stylesheet" media="all" />
<link href="{{url('/')}}/theme/css/site.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/theme/css/site-responsive.css" rel="stylesheet" media="all">
<link href="{{url('/')}}/theme/css/ma5gallery.css" rel="stylesheet" type="text/css">
<link href="{{url('/')}}/theme/css/print.css" rel="stylesheet" type="text/css" media="print">
<link rel="stylesheet" href="{{url('/')}}/assets/bootstrap-4.0.0-dist/css/bootstrap.min.css">
<!-- Custom JS for this template -->
<noscript>
  <link href="{{url('/')}}/theme/css/no-js.css" type="text/css" rel="stylesheet">
</noscript>
<style>
  @media only screen and (max-width: 767px) {
    #main_menu {
      display: none;
    }
  }
  a:not([href]):not([tabindex]) {
    color: white !important;
  }
  .shani{
    padding: 8px 12px 7px !important;
    border-bottom: 2px solid #fff !important;
    background: #ff7c1b !important;
  }
.common-wrapper .container.common-container.four_content {
max-width: 1280px !important;
}

.css-9taffg{
    border-radius: 50%;
}
</style>
<script type="application/javascript">
(function(c,p,_,h){const o=[],r=[];let s,f,i;c[_]={init(...e){s=e;var t={then:n=>(r.push({t:"t",next:n}),t),catch:n=>(r.push({t:"c",next:n}),t)};return t},on(e,t){o.push([e,t])},render(...e){f=e},destroy(...e){i=e}};const g=p.getElementsByTagName("script")[0],l=p.createElement("script");l.async=!1,l.src=h,g.parentNode.insertBefore(l,g),c.__onWebMessengerHostReady__=function(e){if(delete c.__onWebMessengerHostReady__,window[_]=e,s){const t=e.init.apply(e,s);for(let n=0;n<r.length;n++){const a=r[n];a.t==="t"?t.then(a.next):t.catch(a.next)}}i&&e.destroy.call(e,i),f&&e.render.apply(e,f);for(let t=0;t<o.length;t++)e.on.apply(e,o[t])}})(window,document,"Chatlayer","https://storage.googleapis.com/static.dev.europe-west1.gcp.chatlayer.ai/widget/sdk.js");
</script>
<script type="application/javascript">Chatlayer.init({"channelId": "lqlye63p:658a73e0b1be6e6c4d53bd8a", "region": "eu-west1-gcp"})</script>
</head>
@php
$data = getAllMenu();
@endphp
<body>
<div id="fb-root"></div>
<header>
  <h1 style="display: none;">Header</h1>
  <div class="region region-header-top">
    <div id="block-cmf-content-header-region-block" class="block block-cmf-content first last odd">
      <noscript class="no_scr">"JzavaScript is a standard programming language that is included to provide interactive features, Kindly enable Javascript in your browser. For details visit help page"
      </noscript>
      <div class="wrapper common-wrapper">
        <div class="container common-container four_content top-header">
          <div class="common-left clearfix">
            <ul>
              <li class="gov-india"><span class="responsive_go_hindi" lang="hi"><a target="_blank" href="https://up.gov.in/en" title="भारत सरकार ( बाहरी वेबसाइट जो एक नई विंडो में खुलती है)" role="link">Government of Uttar Pradesh</a></span></li>
              
              <!--<li class="ministry"><span class="li_eng responsive_go_eng"><a target="_blank" href="https://up.gov.in/" title="Government of india,External Link that opens in a new window" role="link">Government of Uttar Pradesh</a></span></li>-->
              
            </ul>
          </div>
          <div class="common-right clearfix">
            <ul id="header-nav">
              <li class="ico-skip cf"><a href="#skipCont" title="">Skip to main content</a>
              </li>
              <li class="ico-skip cf"><a href="{{url('/faq')}}" title="">Frequently Asked Questions</a>
              </li>
              <li class="ico-skip cf"><a href="{{url('/download-forms')}}" title="">Download Forms</a>
              </li>
              {{-- <li class="ico-skip cf"><a href="#" title="">Right to Information</a>
              </li> 
              
              <li class="ico-accessibility cf">
                <a href="javascript:void(0);" style="width:80px;" id="toggleAccessibility" title="Accessibility Dropdown" role="link">
                  Webmail
                </a>
                <ul style="visibility: hidden;">
                  <li> <a href="https://webmail.pvvnl.org/" style="width:80px;" title="Webmail Login" role="link">Log In
                    </a> 
                  </li>
                  <li> <a href="" style="width:80px;" title="How To Use Webmail Login" role="link">How To Use
                    </a> 
                  </li>

                </ul>
              </li>--}}
              
              <li class="ico-site-search cf">
                <a href="javascript:void(0);" id="toggleSearch" title="Site Search">
                  <img class="top" src="{{url('/')}}/assets/images/ico-site-search.png" alt="Site Search" /></a>
                <div class="search-drop both-search">
                  <div class="google-find">
                    <form method="get" action="http://www.google.com/search" target="_blank">
                      <label for="search_key_g" class="notdisplay">Search</label>
                      <input type="text" name="q" value="" id="search_key_g"/> 
                      <input type="submit" value="Search" class="submit" /> 
                      <div >
                        <input type="radio" name="sitesearch" value="" id="the_web"/> 
                        <label for="the_web">The Web</label> 
                        <input type="radio" name="sitesearch" value="india.gov.in" checked id="the_domain"/> <label for="the_domain"> INDIA.GOV.IN</label>
                      </div>
                    </form>
                  </div>
                  <div class="find">
                    <form name="searchForm" action="#">
                      <label for="search_key" class="notdisplay">Search</label>
                      <input type="text" name="search_key" id="search_key" onKeyUp="autoComplete()" autocomplete="off" required />
                      <input type="submit" value="Search" class="bttn-search"/>
                    </form>
                    <div id="auto_suggesion"></div>
                  </div>
                </div>
              </li>
              <li class="ico-accessibility cf">
                <a href="javascript:void(0);" id="toggleAccessibility" title="Accessibility Dropdown" role="link">
                  <img class="top" src="{{url('/')}}/assets/images/ico-accessibility.png" alt="Accessibility Dropdown" />
                </a>
                <ul style="visibility: hidden;">
                  <li> <a onClick="set_font_size(&#39;increase&#39;)" title="Increase font size" href="javascript:void(0);" role="link">A<sup>+</sup>
                    </a> 
                  </li>
                  <li> <a onClick="set_font_size()" title="Reset font size" href="javascript:void(0);" role="link">A<sup>&nbsp;</sup></a> </li>
                  <li> <a onClick="set_font_size(&#39;decrease&#39;)" title="Decrease font size" href="javascript:void(0);" role="link">A<sup>-</sup></a> </li>
                  <li> <a href="javascript:void(0);" class="high-contrast dark" title="High Contrast" role="link">A</a> </li>
                  <li> <a href="javascript:void(0);" class="high-contrast light" title="Normal Contrast" style="display: none;" role="link">A</a> </li>
                </ul>
              </li>
              <li class="ico-social cf">
                <a href="javascript:void(0);" id="toggleSocial" title="Social Medias">
                  <img class="top" src="{{url('/')}}/assets/images/ico-social.png" alt="Social Medias" /></a>
                <ul>
                  <li>
                    <a target="_blank" title="External Link that opens in a new window" href="https://wa.me/message/3PFM4YYBKRZOE1">
                      <img alt="WhatsApp" src="{{url('/')}}/img/wa.png">
                    </a>
                  </li>
                  <li>
                    <a target="_blank" title="External Link that opens in a new window" href="https://www.facebook.com/pvvnlmrt">
                      <img alt="Facebook Page" src="{{url('/')}}/assets/images/ico-facebook.png">
                    </a>
                  </li>
                  <li>
                    <a target="_blank" title="External Link that opens in a new window" href="https://twitter.com/MdPvvnl">
                      <img alt="Twitter Page" src="{{url('/')}}/assets/images/ico-twitter.png">
                    </a>
                  </li>
                  <li>
                    <a target="_blank" title="External Link that opens in a new window" href="http://www.youtube.com/">
                      <img alt="youtube Page" src="{{url('/')}}/assets/images/ico-youtube.png">
                    </a>
                  </li>

                </ul>
              </li>
              <li class="ico-sitemap cf"><a href="{{url('/')}}/sitemap" title="Sitemap">
                <img class="top" src="{{url('/')}}/assets/images/ico-sitemap.png" alt="Sitemap" /></a>
              </li>
              <li class="hindi cmf_lan d-hide">
                <label class="de-lag">
                  <span>Language</span>
                  <select title="Select Language" id="languageDropdown">
                    <option value="#" data-url="{{url('/')}}">English</option>
                    <option value="#" data-url="{{ $newUrl }}">हिन्दी</option>
                  </select>
                </label>@php $currentUrl = url()->current(); @endphp
              </li>
              <li class="hindi cmf_lan m-hide">
                <a href="javascript:;" title="Select Language">Language</a> 
                <ul>
                  <li><a target="_blank" href="#" lang="hi" class="alink" title="Click here for हिन्दी version.">हिन्दी</a>
                  
                  </li>
                  
                </ul>
              </li>
              <li class="ico-skip cf"><a target="_blank" href="https://old.pvvnl.org" title="">Go To Old Website</a>
                 </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <p id="scroll" style="display: none;"><span></span></p>
  </div>
  <!--Top-Header Section end-->
  <section class="wrapper header-wrapper">
    <div class="container common-container four_content  header-container">
      <h2 class="logo">
        <a href="{{url('/')}}" title="Home" rel="home" class="header__logo" id="logo">
          <img class="national_emblem" src="{{url('/')}}/assets/images/PVVNL-Logo.png" alt="PVVNL" style="width:475px;" >
          <!-- <p><span>मंत्रालय / विभाग नाम</span>                       
<span> Ministry of  / Department Name</span>
</p> -->
        </a>
      </h2>
      <div class="header-right clearfix">
        <div class="right-content clearfix">

          <div class="float-element">
            <div class="col-md-3"></div>
            <a class="sw-logo1" target="_blank" title="Skill India, External link that open in a new windows">
              <img src="{{url('/')}}/img/ITQCR-Logo-1.png" alt="Skill India" style="width: 25%;">
            </a>
            <a class="sw-logo1" target="_blank"  title="Swachh Bharat, External link that open in a new windows">
              <img src="{{url('/')}}/img/toll-free-no.png" alt="Swachh Bharat" style="width: 45%;" title="Toll Free Number - 18001803002 / 1912">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/.header-wrapper-->
  <section class="wrapper megamenu-wraper">
    <div class="container common-container four_content">
      <p class="showhide"><em></em><em></em><em></em></p>
      <nav class="main-menu clearfix" id="main_menu" style="">
        <ul class="nav-menu">
          <li class="nav-item"> <a href="{{url('/')}}" class="home"><i class="fa fa-home"></i></a> </li>

          @foreach ($data as $menu)
          <li class="nav-item"> <a href="{{url('/en')}}/{{$menu->id}}/{{str_replace(' ', '-', $menu->menu_name)}}" class="{{ isset($page_id) && $menu->menu_name == $page_id ? 'shani' : '' }}
            ">{{$menu->menu_name}}</a>
            <div class="sub-nav">
              <ul class="sub-nav-group">
                @php
                $submenu = getSubmenuById($menu->id);
                @endphp
                @foreach ($submenu as $submenus)
                @if($submenus->sub_name == "Organisation Structure")
                <li><a href="{{url('/')}}/Organisation-Structure">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "UPPCL Intranet")
                <li><a target="_blank" href="https://uppcl.org/uppcl/en/article/intranet">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "News & Notifications")
                <li><a href="{{url('/news/3')}}">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "Electrical Accident")
                <li><a href="{{url('/electrical-accident')}}">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "Consumer Forms")
                <li><a href="{{url('/consumer-forms')}}">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "Bill Calculator")
                <li><a href="{{url('/bill-calculator')}}">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "Tenders & Notice")
                <li><a href="{{url('/Tenders-Notice')}}">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "Theft Assessment Calculator")
                <li><a href="{{url('/theft-assessment-calculator')}}">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "Estimate Calculator")
                <li><a href="{{url('/estimate-calculator')}}">{{$submenus->sub_name}}</a></li>
                @elseif($submenus->id == 53)
                <li><a href="{{url('/tarrif-order')}}">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "Integrated Software")
                <li><a target="_blank" href="https://pvvnl.org/integrated_software/">{{$submenus->sub_name}}</a></li>

                @elseif($submenus->sub_name == "Consumption Calculator")
                <li><a target="_blank" href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&_pageLabel=uppcl_consumption_consumptionCalculator&pageID=1011">{{$submenus->sub_name}}</a></li>

                @else
                <li><a href="{{url('/en')}}/{{$menu->id}}/{{$submenus->id}}/{{str_replace(' ', '-', $submenus->sub_name)}}">{{$submenus->sub_name}}</a></li>
                @endif
                @endforeach
              </ul>            
            </div>
          </li>
          @endforeach
        </ul>
      </nav>
      <nav class="main-menu clearfix" id="overflow_menu">
        <ul class="nav-menu clearfix">
        </ul>
      </nav>
    </div>
    <style type="text/css">
      body ~ .sub-nav {
        right: 0
      }
    </style>
  </section>
</header>
<script>
  document.getElementById("languageDropdown").addEventListener("change", function() {
    var selectedOption = this.options[this.selectedIndex];
    var url = selectedOption.getAttribute("data-url");

    if (url) {
        alert('Do you want to change website language in Hindi?');
      window.location.href = url;
    }
  });
</script>