

<script src="{{url('/')}}/core/assets/vendor/jquery/jquery.min.js"></script>

<script src="{{url('/')}}/core/assets/vendor/once/once.min.js"></script>
<script src="{{url('/')}}/core/misc/drupalSettingsLoader7bcc.js"></script>
<script src="{{url('/')}}/core/misc/drupal7bcc.js"></script>
<script src="{{url('/')}}/core/misc/drupal.init7bcc.js"></script>
<script src="{{url('/')}}/core/assets/vendor/tabbable/index.umd.min.js"></script>
<script src="{{url('/')}}/themes/nbri/js/jquery-3.3.1.min0387.js"></script>
<script src="{{url('/')}}/themes/nbri/js/bootstrap-4.2.10387.js"></script>
<script src="{{url('/')}}/themes/nbri/js/jquery.easy-ticker.min0387.js"></script>
<script src="{{url('/')}}/themes/nbri/js/owl.carousel0387.js"></script>
<script src="{{url('/')}}/themes/nbri/js/jquery.counterup.min0387.js"></script>
<script src="{{url('/')}}/themes/nbri/js/wow.min0387.js"></script>
<script src="{{url('/')}}/themes/nbri/js/bootstrap.bundle.min0387.js"></script>
<script src="{{url('/')}}/themes/nbri/js/custom0387.js"></script>
<script src="{{url('/')}}/modules/password_encrypt/js/password_encrypt7bcc.js"></script>
<script src="{{url('/')}}/libraries/CryptoJS/aes7bcc.js"></script>
<script src="{{url('/')}}/modules/better_exposed_filters/js/better_exposed_filtersc5d3.js"></script>
<script src="{{url('/')}}/core/misc/debounce7bcc.js"></script>
<script src="{{url('/')}}/modules/better_exposed_filters/js/auto_submitc5d3.js"></script>
<script src="{{url('/')}}/libraries/drupal-superfish/superfish0387.js"></script>
<script src="{{url('/')}}/libraries/drupal-superfish/jquery.hoverIntent.minified0387.js"></script>
<script src="{{url('/')}}/libraries/drupal-superfish/sfsmallscreen0387.js"></script>
<script src="{{url('/')}}/libraries/drupal-superfish/supposition0387.js"></script>
<script src="{{url('/')}}/libraries/drupal-superfish/supersubs0387.js"></script>
<script src="{{url('/')}}/modules/superfish/js/superfish3661.js"></script>
<script>
function ConfirmLeaveSite(url){
return confirm("You are about to leave our site and visit to external site. Do you want to continue?")
}
</script>

<script>
$('#grayButton').click(switchGray);
$('#whiteButton').click(switchWhite);
$('#blueButton').click(switchBlue);
$('#yellowButton').click(switchYellow);

function switchGray() {
  $('body').attr('class', 'gray');
}

function switchWhite() {
  $('body').attr('class', 'white');
}

function switchBlue() {
  $('body').attr('class', 'blue');
}

function switchYellow() {
  $('body').attr('class', 'yellow');
}
</script>
<!--Footer section starts here-->
<style>
  ul {
    margin: 0px;
    padding: 0px;
  }
  .footer-section {
    background: #151414;
    position: relative;
  }
  .footer-cta {
    border-bottom: 1px solid #373636;
  }
  .single-cta i {
    color: #ff5e14;
    font-size: 30px;
    float: left;
    margin-top: 8px;
  }
  .cta-text {
    padding-left: 15px;
    display: inline-block;
  }
  .cta-text h4 {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 2px;
  }
  .cta-text span {
    color: #757575;
    font-size: 15px;
  }
  .footer-content {
    position: relative;
    z-index: 2;
  }
  .footer-pattern img {
    position: absolute;
    top: 0;
    left: 0;
    height: 330px;
    background-size: cover;
    background-position: 100% 100%;
  }
  .footer-logo {
    margin-bottom: 30px;
  }
  .footer-logo img {
    max-width: 84px;
  }
  .footer-text p {
    margin-bottom: 14px;
    font-size: 14px;
    color: #7e7e7e;
    line-height: 28px;
  }
  .footer-social-icon span {
    color: #fff;
    display: block;
    font-size: 20px;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 20px;
  }
  .footer-social-icon a {
    color: #fff;
    font-size: 16px;
    margin-right: 15px;
  }
  .footer-social-icon i {
    height: 40px;
    width: 40px;
    text-align: center;
    line-height: 38px;
    border-radius: 50%;
  }
  .facebook-bg{
    background: #3B5998;
  }
  .twitter-bg{
    background: #55ACEE;
  }
  .google-bg{
    background: #DD4B39;
  }
  .footer-widget-heading h3 {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 40px;
    position: relative;
  }
  .footer-widget-heading h3::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: -15px;
    height: 2px;
    width: 50px;
    background: #ff5e14;
  }
  .footer-widget ul li {
    display: inline-block;
    float: left;
    width: 50%;
    margin-bottom: 12px;
  }
  .footer-widget ul li a:hover{
    color: #ff5e14;
  }
  .footer-widget ul li a {
    color: #878787;
    text-transform: capitalize;
  }
  .subscribe-form {
    position: relative;
    overflow: hidden;
  }
  .subscribe-form input {
    width: 100%;
    padding: 14px 28px;
    background: #2E2E2E;
    border: 1px solid #2E2E2E;
    color: #fff;
  }
  .subscribe-form button {
    position: absolute;
    right: 0;
    background: #ff5e14;
    padding: 13px 20px;
    border: 1px solid #ff5e14;
    top: 0;
  }
  .subscribe-form button i {
    color: #fff;
    font-size: 22px;
    transform: rotate(-6deg);
  }
  .copyright-area{
    background: #202020;
    padding: 25px 0;
  }
  .copyright-text p {
    margin: 0;
    font-size: 14px;
    color: #878787;
  }
  .copyright-text p a{
    color: #ff5e14;
  }
  .footer-menu li {
    display: inline-block;
    margin-left: 20px;
  }
  .footer-menu li:hover a{
    color: #ff5e14;
  }
  .footer-menu li a {
    font-size: 14px;
    color: #878787;
  }

  #body div.body {
    padding: 23px 0px 0 !important;
  }
</style>


<footer class="footer-section">
  <div class="container">
    <div class="footer-cta pt-5 pb-5">
      <div class="row">
        <div class="col-xl-5 col-md-5 mb-30">
          <div class="single-cta">
            <i class="fas fa-map-marker-alt"></i>
            <div class="cta-text">
              <h4>Address</h4>
              <span>436, Pratap Marg, Lucknow - 226001, Uttar Pradesh, India</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-30">
          <div class="single-cta">
            <i class="fas fa-phone"></i>
            <div class="cta-text">
              <h4>Call us</h4>
              <span>+91-522-2297890</span>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-30">
          <div class="single-cta">
            <i class="far fa-envelope-open"></i>
            <div class="cta-text">
              <h4>Mail us</h4>
              <span>sorectt[dot]nbri[at]csir[dot]res[dot]in</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-content pt-5 pb-5">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
          <div class="footer-widget">
            <div class="footer-widget-heading">
              <h3>Google Map</h3>
            </div>
            <div class="footer-text mb-25">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.519351546076!2d80.95051781453172!3d26.855235883152414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd0c78e2bd0d%3A0x1b0b35488c8b71e1!2sNBRI!5e0!3m2!1sen!2sin!4v1568961464894!5m2!1sen!2sin" width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <!-- <div class="subscribe-form">
<form action="#">
<input type="text" placeholder="Email Address">
<button><i class="fab fa-telegram-plane"></i></button>
</form>
</div> -->
          </div>
        </div>

        <div class="col-xl-5 col-lg-5 col-md-6 mb-30">
          <div class="footer-widget">
            <div class="footer-widget-heading">
              <h3>Useful Links</h3>
            </div>
            <ul>
              <li><a href="/en/32/80/Our-Alumni">NBRI-Alumni</a></li>
              <li><a href="/en/page/institutional-repository">Institutional Repository</a></li>
              <li><a href="/en/page/annual-reports2">Annual Reports</a></li>
              <li><a href="/en/page/gst-certificates">GST Certificates</a></li>
              <li><a href="#">Intranet</a></li>
              <li><a href="#">Purchase Notices</a></li>
<li><a href="/en/page/handling-of-complaints-of-sexual-harassment">Handling of complaints of sexual harassment</a></li>
           
              <li><a href="en/36/92/Publications">Institutional Publications</a></li>
             
             
            
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 mb-50">
          <div class="footer-widget">

            <div class="footer-social-icon">
              <span>Follow us</span>
              <a href="https://www.facebook.com/share/1dXqfz9oDM/"><i class="fab fa-facebook facebook-bg"></i></a>
              <a href="https://x.com/csirnbrilko?t=8YMRm7NbCSjAqK9N_kEVcA&amp;s=08"><img alt="X.com" src="/themes/nbri/images/tw.png"></a>
              <a href="https://www.instagram.com/csirnbriofficial?igsh=MTVhOWszanptcmRnMQ=="><i class="fab fa-instagram "></i></a>
              <a href="https://youtube.com/@csirnbriofficial?si=FzFxx65HWnEkB2TT"><i class="fab fa-youtube youtube-bg"></i></a>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>
  <div class="copyright-area">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 text-center text-lg-left">
          <div class="copyright-text">
            <p>Copyright © 2025 NBRI | Last Updated On : 25-02-2025 12:05:55 | English Site Visitors : {englishVisitorCount}</p>
            <p style="display:none"> | Developed By : <a href="https://businessinnovations.in">Business Innovations</a></p>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
          <div class="footer-menu">
            <ul>
              
              <li><a href="/en/page/terms">Terms &amp; Condition</a></li>
              <li><a href="/en/page/privacy-policy">Privacy Policy</a></li>
              
              <li><a href="/en/page/pricing">Pricing</a></li>
              <li><a href="/en/page/services-offered">Products / Services</a></li>
              <li><a href="/en/page/grievance-redressal-mechanism">Grievance Policy</a></li>
              <li><a href="/en/page/refund-cancellation-policy">Refund / Cancellation Policy</a></li>
              <li><a href="/en/page/contact-us">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- <footer>
<div class="footer-top-sec">
<div class="footer-bottom-sec">
<div class="container">
<div class="row">
<div class="col-12 col-sm-12 col-md-9 col-lg-9 copyright-sec">
<div class="footer-copy-sec">
<div class="region region-footer-menu">
<nav role="navigation" aria-labelledby="block-stqc-footerlinks-menu" id="block-stqc-footerlinks" class="block block-menu navigation menu--footer-links">

<h2 class="visually-hidden" id="block-stqc-footerlinks-menu">Footer Links</h2>



<ul class="menu">
<li class="menu-item">
<a href="#" title="Terms & Conditions" data-drupal-link-system-path="node/110">Terms & Conditions</a>
</li>
<li class="menu-item">
<a href="#" title="Web Policies" data-drupal-link-system-path="node/107">Web Policies</a>
</li>
<li class="menu-item">
<a href="#" title="Copyright Policy" data-drupal-link-system-path="node/109">Copyright Policy</a>
</li>
<li class="menu-item">
<a href="#" title="Accessibility Statement" data-drupal-link-system-path="node/128">Accessibility Statement</a>
</li>
<li class="menu-item">
<a href="s#" title="Site map" data-drupal-link-system-path="sitemap">Site map</a>
</li>
<li class="menu-item">
<a href="#" title="Help" data-drupal-link-system-path="node/397">Help</a>
</li>
<li class="menu-item">
<a href="#" title="Downloads" data-drupal-link-system-path="node/134">Downloads</a>
</li>
<li class="menu-item">
<a href="#" title="Screen Reader" data-drupal-link-system-path="node/112">Screen Reader</a>
</li>
<li class="menu-item">
<a href="#" title="Contact Us" data-drupal-link-system-path="node/496">Contact Us</a>
</li>
<li class="menu-item">
<a href="#" data-drupal-link-system-path="node/965">Disclaimer</a>
</li>
<li class="menu-item">
<a href="#" data-drupal-link-system-path="node/170">Important Links</a>
</li>
<li class="menu-item">
<a href="#" data-drupal-link-system-path="whats-new">News</a>
</li>
</ul>



</nav>

</div>

<p>Copyright © 2025 NBRI | Last Updated On : 25-03-2025 10:55:22</p>
<p> | Developed By : Business Innovations</p>
</div>
</div>
<div class="col-12 col-sm-12 col-md-3 col-lg-3 newsletter-sec">

<div class="foot_social"><a target="_blank" href="#"><img
alt="facebook stqc" src="themes/nbri/images/f_fn.png"></a>
<a target="_blank" href="#"><img
alt="twitter" src="themes/nbri/images/tw.png"></a>
<a target="_blank" href="#">  <img alt="f youtube"
src="themes/nbri/images/f_ut.png"> </a>
</div> English Portal Visitors : 90865
<p>Last updated on : 20/12/2024</p>
</div>
</div>
</div>
</div>
</div>
</footer> -->
            <script src="https://cdn.ux4g.gov.in/tools/accessibility-widget.js" async=""></script>
@php

$footerHtml = str_replace('{englishVisitorCount}', $englishVisitorCount);
@endphp


