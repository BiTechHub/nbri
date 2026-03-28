

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

<script>
document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.getElementById("superfish-main-menu-toggle");
  const menu = document.getElementById("superfish-main-accordion");

  toggle.addEventListener("click", function (e) {
    e.preventDefault();
    this.classList.toggle("sf-expanded");
    menu.classList.toggle("sf-expanded");

    if (menu.style.display === "block") {
      menu.style.display = "none";
    } else {
      menu.style.display = "block";
    }
  });
});

</script>

@php
$foot = DB::table('maincontent')->where('id', 3)->first();
$footerHtml = str_replace('{englishVisitorCount}', $englishVisitorCount, $foot->code);
@endphp

{!! $footerHtml !!}

