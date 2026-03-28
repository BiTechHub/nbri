@extends('layouts.main')
@section('content')

  <!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Contact</h2>
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
                  <span><a href="#" rel="home">Home</a></span>
                
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Contact Us</span>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Contact Form -->
    <section  id="contact" class="bg-white-f4">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-lg-6">
              <h5 class="mb-0 text-gray">Happy to help!</h5>
              <h4 class="mb-30">If you need someone to talk to, we listen. We won’t judge or tell you what to do.</h4>
              <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-50">
                <div class="icon-box-wrapper">
                  <div class="icon-wrapper">
                    <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-044-call-1"></i> </a>
                  </div>
                  <div class="icon-text">
                    <h5 class="icon-box-title mt-0">Phone</h5>
                    <div class="content"><a href="tel:+91-9833132100">+91-9833132100,+91-9833132200,+91-9833132300<br>+91-9833132400,+91-9833132500</a></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-50">
                <div class="icon-box-wrapper">
                  <div class="icon-wrapper">
                    <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-043-email-1"></i> </a>
                  </div>
                  <div class="icon-text">
                    <h5 class="icon-box-title mt-0">Email</h5>
                    <div class="content"><a href="mailto:info@actolegal.in">info@actolegal.in</a></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-50">
                <div class="icon-box-wrapper">
                  <div class="icon-wrapper">
                    <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-025-world"></i> </a>
                  </div>
                  <div class="icon-text">
                    <h5 class="icon-box-title mt-0">Address</h5>
                    <div class="content">A005 Boomerang Chandivali,<br> Mumbai-400072</div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <ul class="styled-icons icon-dark icon-sm icon-circled mt-30">
                <li><a href="#" data-tm-bg-color="#3B5998"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#" data-tm-bg-color="#02B0E8"><i class="fab fa-twitter"></i></a></li>
          
                <li><a href="#" data-tm-bg-color="#D9CCB9"><i class="fab fa-instagram"></i></a></li>
               
                <li><a href="#" data-tm-bg-color="#A4CA39"><i class="fab fa-android"></i></a></li>
                
              </ul>
            </div>
            <div class="col-lg-6">
              
              <p class="font-size-20 mb-0">Message Us!</p>
              <h4 class="mb-30">Interested in discussing?</h4>
              <!-- Contact Form -->
              <form id="contact_form" name="contact_form" class="contact-form-transparent" action="submitContactmessage" method="post">
                @csrf
                @if(session('status'))
                <div class="alert alert-success">
                {{session('status')}}
                </div>
                @endif
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Name <small>*</small></label>
                      <input name="name" class="form-control" type="text" placeholder="Enter Name" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email <small>*</small></label>
                      <input name="email" class="form-control required email" type="email" required placeholder="Enter Email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Subject <small>*</small></label>
                      <input name="subject" class="form-control required" type="text" required placeholder="Enter Subject">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Phone</label>
                      <input name="mobile" class="form-control" type="text" required placeholder="Enter Phone">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Message</label>
                  <textarea name="msg" class="form-control required" required rows="5" placeholder="Enter Message"></textarea>
                </div>
                <br>
                <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="" />
                  <button type="submit" class="btn btn-dark btn-theme-colored btn-flat btn-block" data-loading-text="Please wait...">Send your message</button>
                </div>
              </form>

              <!-- Contact Form Validation-->
             
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Divider -->

    <!-- Section: Contact -->
    <section>
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-md-12">
            
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->





  @endsection
