<style>
.footer-top-wrapper ul li a {
padding: 0px 4px !important;
}
.menuto ul li{
padding: 0px 4px !important;
margin: 5px 0;
}
.menuto ul li a{
padding: 0px 4px !important;
color: #fff;
margin: 5px 0;
}
.menuto ul li:hover a{
padding: 0px 4px !important;
color: #ffc107;
margin-left: 10px;
}
</style>
<div style="background-color: #234a66;padding: 30px;padding-bottom: 15px;font-size: 14px;font-weight: 400;color: white; ">
<div class="container">
<div class="row">
  <div class="footer-sidebar footer-1 col-xs-12 col-sm-6 col-md-4">
    <div class="menuto">
      <h4 class="widget-title" tabindex="0">OTHER MENU</h4>
      <div class="menu-other-menu-container">
        <ul>
          <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i> 
            <a href="{{url('/en')}}/19/42/Apply-For-New-Connection" title="Apply For New Connection">Apply For New Connection</a></li>
          <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i>
            <a href="{{url('/en')}}/19/44/Disconnection" title="Disconnection">Disconnection</a></li>
          <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i>
            <a href="{{url('/')}}/consumer-forms" title="Consumer Forms">Consumer Forms</a></li>
          <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i>
            <a href="{{url('/en')}}/19/46/Consumer-Grievance-Redressal-Forum" title="Consumer Grievance Redressal Forum">Consumer Grievance Redressal Forum</a></li>
            
            
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-sidebar footer-2 col-xs-12 col-sm-6 col-md-4">
    <div class="menuto"><h4 class="widget-title" tabindex="0">IMPORTANT MENU</h4>
      <div class="menu-important-links-container">
        <ul >
          <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i>
            <a href="{{url('/en')}}/20/51/Distribution-Licensee" title="Distribution Licensee">Distribution Licensee</a></li>
          <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i>
            <a href="{{url('/en')}}/20/52/Electricity-Act" title="Electricity Act">Electricity Act</a></li>
          <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i>
            <a href="{{url('/Tenders-Notice')}}" title="Tenders &amp; Notice">Tenders &amp; Notice</a></li>
          <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i>
            <a href="{{url('/en')}}/24/64/Locate-Us" title="Locate Us">Locate Us</a></li>
            
            <li>
            <i class="fa fa-chevron-right text-warning" aria-hidden="true"></i>
            <a href="{{url('/')}}/about-us" title="About Us">About Us</a></li>
            
            
        </ul>
      </div>
    </div>
    <div id="block-4" class="widget widget_block widget_text">
      <p data-swp-font-size="14px"></p>
    </div><div id="block-10" class="widget widget_block widget_text">
    <p data-swp-font-size="14px"></p>
    </div>                    
  </div>
  
  <div class="footer-sidebar footer-3 col-xs-12 col-sm-6 col-md-4">
    <div id="text-2" class="widget widget_text">			
      <div class="textwidget"><p data-swp-font-size="14px"><iframe loading="lazy" style="border: 0;margin-bottom: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d446742.69916298636!2d77.15322197343748!3d28.98211560000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390c64c36aaaaaab%3A0x1c8c61e8eeb15c3b!2sPaschimanchal%20Vidyut%20Vitran%20Nigam%20Limited!5e0!3m2!1sen!2sus!4v1704264290898!5m2!1sen!2sus" width="100%" height="208px" allowfullscreen=""></iframe></p>
      </div>
    </div>
    <div id="block-14" class="widget widget_block"><p tabindex="0" data-swp-font-size="14px"><span id="last_modified_text">Last Updated Date : </span>
      @php
      $latestLog = DB::table('action_logs')->orderBy('created_at', 'desc')->first();
      @endphp

      @if ($latestLog)
      {{ $latestLog->created_at }}
      @else
      No Update.
      @endif
      </p></div><div id="srs_shc_widget-6" class="widget widget_srs_shc_widget"><span class="visitors" tabindex="0">Site Visitors : 2953938</span></div>                    </div>

</div>


</div>
</div>
<footer class="wrapper footer-wrapper" style="background: #000;color: white;">
<div class="footer-top-wrapper">
<div class="container common-container four_content footer-top-container">
  <ul style="margin-bottom: 0 !important;">
    <li><a href="{{url('/copyright-policy')}}">Copyright Policy</a></li>
    <li><a href="{{url('/hyperlink-policy')}}">Hyperlink Policy</a></li>
    <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
    <li><a href="{{url('/terms-condition')}}">Terms & Conditions</a></li>
    <li><a href="{{url('/security-policy')}}">Security Policy</a></li>
    <li><a href="{{url('/accessibility-statement')}}">Accessibility Statement</a></li>
    <li><a href="{{url('/disclaimer')}}">Disclaimer</a></li>
    <li><a href="{{url('/help')}}">Help</a></li>
    <li><a href="{{url('/feedback')}}">Feedback</a></li>
    <li><a href="{{url('/screen-reader-access')}}">Screen Reader Access</a></li>
  </ul>
</div>
</div>
<div class="container common-container four_content footer-top-container" style="background: #000;color: white;">
<div class="row pt-3" style="background: #000;color: white;">
<div class="col-md-10">
  <p tabindex="0" style="margin-bottom:8px !important;" data-swp-font-size="14px">Copyright © 2024 - All Rights Reserved - Official Website of Pashchimanchal Vidyut Vitran Nigam Limited, Government of Uttar Pradesh</p>
  <p tabindex="0" style="margin-bottom:8px !important;" data-swp-font-size="14px">Content on this website is published and managed by Pashchimanchal Vidyut Vitran Nigam Limited</p>
  <p tabindex="0" style="margin-bottom:8px !important;" data-swp-font-size="14px">For any query regarding this website, please contact the web information manager – </p>
  <p tabindex="0" style="margin-bottom:8px !important;" data-swp-font-size="14px">Name : Shri Ravi Kumar (Executive Engineer (Information Technology))</p>
  <p tabindex="0" style="margin-bottom:8px !important;" data-swp-font-size="14px">Email ID : ravik1[at]pvvnl[dot]org</p>
  <p tabindex="0" style="margin-bottom:8px !important;" data-swp-font-size="14px">Phone No : +91-9412749213</p>

</div>
<div class="col-md-2">
  <a href="https://itqcr.com/compliance-registered-details?field_registration_number_value=ITQCR%2FGIGW%2F2022%2F03%2FWT%2F411%2FWQC&amp;submit_form=get_compliance_number" target="_blank"><img class="lazy loaded" src="{{url('/')}}/img/ITQCR-Logo-1.png" ></a></div>

<div class="col-md-12">
  <p style="float: right; color: rgb(255, 255, 255); font-weight: 400;" tabindex="0" data-swp-font-size="14px">Developed By : <a class="Business Innovations mr-5" target="_blank" href="https://www.businessinnovations.in/" style="color: #ff9600;" title="Business Innovations">Business Innovations</a></p>
</div>
</div>
</div>

</footer>
<!--/.footer-wrapper-->
<!--<script src="{{url('/')}}/assets/jquery.min.js"></script>-->
<script src="{{url('/')}}/assets/js/jquery-2.1.1.min.js"></script>
<script src="{{url('/')}}/assets/js/jquery-accessibleMegaMenu.js"></script>
<script src="{{url('/')}}/assets/js/framework.js"></script> 
<script src="{{url('/')}}/assets/js/jquery.flexslider.js"></script>
<script src="{{url('/')}}/assets/js/font-size.js"></script>
<script src="{{url('/')}}/assets/js/swithcer.js"></script>
<script src="{{url('/')}}/theme/js/ma5gallery.js"></script>
<script src="{{url('/')}}/assets/js/megamenu.js"></script>
<script src="{{url('/')}}/theme/js/easyResponsiveTabs.js"></script>
<!-- <script src="{{url('/')}}/theme/js/custom.js"></script> -->
</body>

</html>