@extends('frontend.layouts.main')
@section('content')
<style> th { background: #003630 !important; } </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    nav > .nav.nav-tabs{

  border: none;
    color:#fff;
    background:#272e38;
    border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
  border: none;
    padding: 18px 25px;
    color:#fff;
    background:#272e38;
    border-radius:0;
}
nav > div a.nav-item.nav-link.active
{
  border: none;
    padding: 18px 25px;
    color:#fff;
    background:#ee9926;
    border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
 {
  content: "";
  position: relative;
  bottom: -60px;
  left: -10%;
  border: 15px solid transparent;
  border-top-color: #ee9926 ;
}
.tab-content{
  background: #fdfdfd;
    line-height: 25px;
    border: 1px solid #ddd;
    border-top:5px solid #ee9926;
    border-bottom:5px solid #ee9926;
    padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
  border: none;
    background: #ee9926;
    color:#fff;
    border-radius:0;
    transition:background 0.20s linear;
}
.tab-pane ul li{
    padding-left:5px;
    padding-right:2px;
    padding-bottom:1px;
}

.vijay ul li{
    list-style:one;
}
div[data-toggle="collapse"]{
   border-bottom:1px solid #BBDEFB;
   width:100%;
   cursor:pointer;
   padding:1%;
   font-weight: bold;
}
.collapse{
    background:#F5F5F5;
}
.swarna ul li img{
    width:100%;
    height:100px !important;
   
}
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css');
.bg-dark {
    background-color: #343a40!important;
}
</style>

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
                  <span><a href="{{url('/')}}" rel="home" style="color: white;">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Cyber Security</span>
                </div>
              </nav>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- Section: About -->
    <section id="skipCont">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 mt-4">
              <h3 style="text-align: center;" class="font-weight-bold">Cyber Security Corner</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<div class="col-md-7">
   

<nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="border-top-left-radius: 25px;border-top-right-radius: 25px;">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="border-top-left-radius: 25px;">Do's For Cyber Security</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="border-top-right-radius: 25px;">Dont's For Cyber Security</a>
                     
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent" style="font-size:14px;">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <ul style="list-style:inside;">
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Use Strong, Unique Passwords:</b> Create
complex passwords (12+ characters, mix of letters,
numbers, and special characters).</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Enable Multi-Factor Authentication (MFA):</b>
Add an extra layer of security to your accounts.
</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Keep Your Software and Systems Updated:</b>
Install regular updates to fix security
vulnerabilities.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Use Antivirus and Anti-Malware Software:</b>
Regularly update antivirus software to detect and
block malware.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Report Suspicious Activity:</b> Immediately report
any unusual activities to IT or cybersecurity teams.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Use a VPN (Virtual Private Network) When on
Public Wi-Fi:</b> Encrypt your connection when on
public networks.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Encrypt Sensitive Data:</b> Use encryption for
sensitive data storage and transmission.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Lock Your Device:</b> Use a password, PIN, or
biometric authentication to lock devices.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Regularly Back Up Important Data:</b> Backup
data to secure, encrypted locations to prevent
loss.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Do</span> Be Cautious with External Devices (USBs,
External Hard Drives, etc.):</b> Scan external devices
for malware before use.</li>
                      </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <ul style="list-style:inside;">
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Click on Suspicious Links or Attachments:
</b>Avoid clicking links or opening attachments in
unsolicited emails.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Reuse Passwords:</b> Don’t reuse passwords
across different accounts.
</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Share Sensitive Information via Email or
Text Message:</b> Never send passwords or sensitive
information without encryption.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Ignore Software Updates:</b> Delaying updates
can leave you exposed to new security threats.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Use Weak Passwords:</b> Avoid easily
guessable passwords (e.g., “password123” or your
birthdate).</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Trust Pop-up Alerts:</b> Don’t click on
suspicious pop-ups that ask for personal or
financial info.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Leave Devices Unattended:</b> Always
lock your devices when not in use to prevent
unauthorized access.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Access Work Systems from Untrusted
Devices:</b> Never use public or untrusted devices to
access work systems.
</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Open Unknown or Unsolicited Emails:</b> Don’t
open emails from unknown senders or unfamiliar
subjects.</li>
                          <li><b><span style="color: #ee9926;font-size: 17px;">Don’t</span> Over-share on Social Media:</b> Be cautious of
personal information shared online that could be
exploited.</li>
                      </ul>
                    </div>
                    
                  </div>



  </div>
  <div class="col-md-5">
      <iframe 
        width="100%" 
        height="315" 
        src="https://www.youtube.com/embed/videoseries?list=PLGqF2Eq4iV78du4-Kyr2KONwYmtJmD7aZ" 
        title="YouTube playlist" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
    </iframe>
    <div class="col-md-6" style="margin-top:40px;">
        <object data="{{url('/')}}/General-Cyber-Security.pdf" type="application/pdf" width="100%" height="250px">
          
        </object>
        <p><b>General Cyber Security <span style="color: #ee9926;font-size: 17px;">Don’t</span></b> <a href="{{url('/')}}/General-Cyber-Security.pdf">View/Download</a></p>
    </div>
    <div class="col-md-6" style="margin-top:40px;">
        <object data="{{url('/')}}/best-practices-pvvnl.pdf" type="application/pdf" width="100%" height="250px">
          
        </object>
        <p><b>Best Practices <span style="color: #ee9926;font-size: 17px;">Do</span></b> <a href="{{url('/')}}/best-practices-pvvnl.pdf">View/Download</a></p>
    </div>
  </div>

		    </div>
		    <div class="col-md-12" style="margin-top:30px;">
              
              <div class="container">
	<div class="row card my-4 mb-3 pd-l-2" style="background:#ee9926">
		<h3 style="padding:9px;color:white">
		    <span class="fa fa-question-circle text-white"></span>
		    Frequently Asked Questions (User - Department)
		</h3>
	</div>
	
	<div class="row vijay">
	   <!-- <p class="col-sm-6 col-md-12">
	    Below, we answer some the most Frequently Asked Questions on our platform
	    </p>-->
  
	    <ul id="accordion" class="col-sm-6 col-md-12">
	        <!-- Question one -->
	        <li>
	            <div id="choose" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
	                What is phishing and how can I recognize it ?
	                <span class="fa fa-chevron-up fa-1x text-info pull-right"></span>
	            </div>
	            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    Phishing is a type of cyberattack where attackers impersonate legitimate
organizations or individuals to trick you into providing sensitive information (e.g.,
passwords, bank details). Be cautious of unsolicited emails or messages that contain
suspicious links, attachments, or urgent requests. Always verify the sender's email
address and do not click on links or open attachments from unknown sources.
                  </div>
                </div>
	        </li>
	        
	        <!-- Question two -->
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	                How should I create a secure password ?
	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    A secure password should be at least 12 characters long and include a
combination of upper and lowercase letters, numbers, and special characters. Avoid using
easily guessable information such as names, birthdays, or common words. It's
recommended to use a password manager to keep track of your passwords securely.
                  </div>
                </div>
	        </li>
	        
	        <!-- Question three -->
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	                Why is it important to keep software and systems updated ?

	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                     Software updates often contain security patches that fix vulnerabilities and
protect against cyber threats. Failing to update your systems regularly can expose them to
attacks, especially in critical infrastructure like power utilities, where vulnerabilities
could lead to severe consequences.
                  </div>
                </div>
	        </li>
	        
	        <!-- Question Four -->
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
	                What is multi-factor authentication (MFA), and why should I use it ?

	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                  <div class="card-body">
                    MFA adds an extra layer of security by requiring more than just a password to
access your accounts or systems. Typically, this involves something you know
(password), something you have (a mobile device or token), or something you are
(fingerprint). Enabling MFA makes it much harder for attackers to gain unauthorized
access.

                  </div>
                </div>
	        </li>
	        
	        <!-- Questiion Five -->
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
	                How should I handle sensitive or confidential information ?

	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                  <div class="card-body">
                    Always store sensitive or confidential information in secure, encrypted
locations. Avoid sharing such information over unsecured methods like email or
unsecured messaging platforms. Be cautious about who you share sensitive information
with and ensure that it’s only disclosed to authorized individuals.
                  </div>
                </div>
	        </li>
	        
	        <!-- Question Six-->
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
	                What should I do if I suspect my system has been compromised ?
	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    If you suspect a security breach, immediately report it to your IT or
cybersecurity team. Disconnect your device from the network to prevent further damage,
and do not attempt to fix the issue on your own. Your IT team will guide you through the
appropriate steps, such as running malware scans and securing accounts.
                  </div>
                </div>
	        </li>
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
	                Why is network segmentation important for power utilities ?
	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Network segmentation involves dividing the network into smaller, isolated
segments to limit the potential spread of cyberattacks. In a power utility, it’s especially
critical to prevent unauthorized access to sensitive control systems and infrastructure by
isolating them from less critical networks.
                  </div>
                </div>
	        </li>
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
	                What are the risks of using public Wi-Fi for work purposes ?

	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseEight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Public Wi-Fi networks are less secure, making it easier for attackers to intercept
your data or launch attacks. Avoid accessing sensitive or work-related information while
connected to public Wi-Fi. If necessary, use a Virtual Private Network (VPN) to encrypt
your internet connection.

                  </div>
                </div>
	        </li>
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
	                How can I identify and report suspicious emails or activities ?
	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Be cautious of emails from unknown senders or those that ask for sensitive
information. Look for signs such as misspellings, unexpected attachments, or requests
that seem urgent or out of the ordinary. If you suspect an email is phishing, report it to
your IT department and avoid clicking any links or opening attachments.
                  </div>
                </div>
	        </li>
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
	                What are the consequences of a cyberattack on a power utility ?
	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseTen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    A cyberattack on a power utility can lead to disruptions in services, safety
hazards, financial losses, and reputational damage. In critical infrastructure, such attacks
can also result in significant risks to public safety. That’s why it's important for all
employees to be vigilant and follow cybersecurity best practices.
                  </div>
                </div>
	        </li>
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
	                Why should I be cautious with external devices like USB drives ?

	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseEleven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    External devices such as USB drives can carry malware or other harmful
software that could infect your computer or the utility’s network. Always ensure that
external devices are scanned for malware before use and avoid plugging in untrusted
devices to any work systems.
                  </div>
                </div>
	        </li>
	        <li>
	            <div class="collapsed" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
	                What should I do if I receive a suspicious phone call or message ?
	                <span class="fa fa-chevron-down fa-1x text-info pull-right"></span>
	            </div>
                <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    If you receive a suspicious phone call or message, particularly one requesting
sensitive information or financial details, hang up and verify the caller's identity by
contacting the organization directly using a trusted phone number. Do not provide
personal or work-related information to unsolicited callers.
                  </div>
                </div>
	        </li>
	    </ul>
	</div>
</div>
              
            </div>
          {{--  <div class="col-md-12" style="margin-top:30px;">
              
              <div class="container">
        <div class="row card my-4 mb-3 pd-l-2" style="background:#ee9926">
		<h3 style="padding:9px;color:white">
		    <span class="fa fa-question-circle text-white"></span>
		    Important Websites
		</h3>
	</div>
       
        <div id="carouselLogo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <ul class="list-inline row  mx-auto" style="display:inline-flex">
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.cert-in.org.in/" target="_blank"><img class="d-block" src="{{url('/')}}/imp_web/certin.jpg" style="width:100%;height:120px;" alt="First slide"></a></li>
                        
                        
                        
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.csk.gov.in/" target="_blank"><img class="d-block" src="{{url('/')}}/imp_web/cyber-swachhta.jpg" style="width:100%;height:120px;" alt="First slide"></a></li>
                        
                        
                        
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.digitalindia.gov.in/" target="_blank"><img class="d-block" src="{{url('/')}}/imp_web/digital.png" style="width:100%;height:120px;" alt="First slide"></a></li>
                        
                       
                    </ul>
                </div>
                <div class="carousel-item">
                    <ul class="list-inline row  mx-auto" style="display:inline-flex">
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.dsci.in/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/dsci.jpeg" style="width:100%;height:120px;" alt="First slide"></a></li>
                        
                        
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://i4c.mha.gov.in/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/ind-crime.jpeg" style="width:100%;height:120px;" alt="First slide"></a></li>
                        
                        
                        
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.meity.gov.in/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/meit.png" style="width:100%;height:120px;" alt="First slide"></a></li>
                    
                    </ul>
                </div>
                <div class="carousel-item">
                    <ul class="list-inline row  mx-auto" style="display:inline-flex">
                         <li class="col-md-4" style="margin-right:0px;"><a href="https://nixi.in/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/nixi.jpeg" style="width:100%;height:120px;" alt="First slide"></a></li>
                         
                         
                         
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.nciipc.gov.in/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/nciip.jpg" style="width:100%;height:120px;" alt="First slide"></a></li>
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.ncsc.gov.ph/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/ncsc.jpg" style="width:100%;height:120px;" alt="First slide"></a></li>
                    </ul>
                </div>
                <div class="carousel-item">
                    <ul class="list-inline row  mx-auto" style="display:inline-flex">
                       
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.rbi.org.in/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/rbi.jpeg" style="width:100%;height:120px;" alt="First slide"></a></li>
                        
                        
                        
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://www.sebi.gov.in/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/sebi.jpeg" style="width:100%;height:120px;" alt="First slide"></a></li>
                        <li class="col-md-4" style="margin-right:0px;"><a href="https://nludelhi.ac.in/" target="_blank"><img class="d-block img-fluid" src="{{url('/')}}/imp_web/nudelhi.jpeg" style="width:100%;height:120px;" alt="First slide"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
              
            </div>
            
       		<div class="col-md-12">
              <div class="a" style="height: 170px"><span class="a"></span></div>
            </div>--}}
          </div>
        </div>
      </div>
    </section>
<style>
.card-img-overlay {
top: 200px !important;
}

.shani1:hover {

padding-bottom: 20px;

}

.shani1:hover .shani2{

padding-bottom: 20px !important
background: red !important;
}


@media only screen and (max-width: 768px) {
.carousel-wrapper {
margin-top: 1150px; 
}

}
.flip-container {
    width: 100%;
    height: 259px;
    float: left;
    border-radius: 10px;
}
.flip-container {
    perspective: 1000px;
    transform-style: preserve-3d;
}
.flipper {
    transition: 0.6s;
    transform-style: preserve-3d;
    position: relative;
}
.front {
   
    color: #fff;
    text-align: center;
    border: 5px solid #fff;
}
.front {
    z-index: 2;
    transform: rotateY(0deg);
}
.front, .back {
    backface-visibility: hidden;
    transition: 0.6s;
    transform-style: preserve-3d;
    position: absolute;
    top: 0;
    left: 0;
}
.brand-items {
	list-style: none;
	border-radius: 10px;
	padding: 8px 20px 5px 20px;
	overflow: hidden;

	width: 100%;
	box-shadow: -7px 1px 40px rgb(0 0 0/18%);
	margin: 0;
}


.slides a:hover img {
    filter: grayscale(100%); /* Makes the image black and white */
    transition: filter 0.3s ease; /* Smooth transition effect */
    margin-top: -10px;
}

.slides img {
    transition: filter 0.3s ease; /* Smooth transition for normal state */
}


</style>
<div class="container" style="padding-bottom:50px;">
<div class="row card my-4 mb-3 pd-l-2" style="background:#ee9926">
		<h3 style="padding:9px;color:white">
		    <span class="fa fa-question-circle text-white"></span>
		    Important Websites
		</h3>
	</div>

<section class="wrapper carousel-wrapper home-btm-slider">

<div class="container-fluid brand-items common-container four_content carousel-container">
<div id="flexCarousel" class="flexslider carousel">
    
    
    
<ul class="slides">
    
    
<li><a target="_blank" href="https://www.cert-in.org.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/certin.jpg" alt=""></a>
</li>



<li><a target="_blank" href="https://www.csk.gov.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/cyber-swachhta.jpg" alt=""></a>
</li>



<li><a target="_blank" href="https://www.dsci.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/dsci.jpeg" alt=""></a>
</li>


<li><a target="_blank" href="https://i4c.mha.gov.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/ind-crime.jpeg" alt=""></a>
</li>

<li><a target="_blank" href="https://www.meity.gov.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/meit.png" alt=""></a>
</li>


<li><a target="_blank" href="https://nixi.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/nixi.jpeg" alt=""></a>
</li>



<li><a target="_blank" href="https://www.ncsc.gov.ph/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/ncsc.jpg" alt=""></a>
</li>


<li><a target="_blank" href="https://www.rbi.org.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/rbi.jpeg" alt=""></a>
</li>


<li><a target="_blank" href="https://www.sebi.gov.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/sebi.jpeg" alt=""></a>
</li>


<li><a target="_blank" href="https://nludelhi.ac.in/" title="" class="my-4 mx-3">
  <img src="{{url('/')}}/imp_web/nudelhi.jpeg" alt=""></a>
</li>
</ul>
</div>
</div>
</section>
</div>




  </div>
@endsection
@section('script')
<script src="{{url('/')}}/theme/js/custom.js"></script>


  <style>
        .custom-alert {
            position: fixed;
            z-index: 1001; /* Ensure it is above the overlay */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border: 3px solid #ff7c1b;
            border-radius: 5px;
            padding: 20px;
            box-shadow: -3px 14px 20px 20px rgb(0 0 0 / 52%);
            max-width: 700px;
        }

        .custom-alert-content {
            text-align: center;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: -48px;
            right: -25px;
            font-size: 45px;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #f00;
        }

        .custom-alert img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            cursor: pointer; /* Indicate that the image is clickable */
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .no-scroll {
            overflow: hidden;
        }
    </style>
     @php
    $img = DB::table('alert_image')->where('id', 1)->first();
    @endphp
    
@endsection