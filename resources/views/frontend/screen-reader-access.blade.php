@extends('frontend.layouts.main')
@section('content')
<style> th { background: #003630 !important; } </style>
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
                  <span class="active">Screen Reader Access</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Screen Reader Access</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px">PVVNL website complies with World Wide Web Consortium (W3C) Web Content Accessibility Guidelines (WCAG) 2.0 level AA. This will enable people with visual impairments access the website using assistive technologies, such as screen readers. The information of the website is accessible with different screen readers.</p>
<p tabindex="0" data-swp-font-size="14px"><strong>Various Screen Readers to choose from</strong></p>
<table class="inner-table" width="100%">
<thead>
<tr>
<th tabindex="0">Screen Reader</th>
<th tabindex="0">Website</th>
<th tabindex="0">Free / Commercial</th>
</tr>
</thead>
<tbody>
<tr>
<td tabindex="0" data-swp-font-size="14px">Screen Access For All (SAFA)</td>
<td data-swp-font-size="14px"><a href="http://safa-reader.software.informer.com/download/" target="_blank" rel="noopener" title="http://safa-reader.software.informer.com/download/">http://safa-reader.software.informer.com/download/</a></td>
<td tabindex="0" data-swp-font-size="14px">Free</td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">Non Visual Desktop Access (NVDA)</td>
<td data-swp-font-size="14px"><a href="http://www.nvda-project.org/" target="_blank" rel="noopener" title="http://www.nvda-project.org/">http://www.nvda-project.org/</a></td>
<td tabindex="0" data-swp-font-size="14px">Free</td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">Hal</td>
<td data-swp-font-size="14px"><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=5" target="_blank" rel="noopener" title="http://www.yourdolphin.co.uk/productdetail.asp?id=5">http://www.yourdolphin.co.uk/productdetail.asp?id=5</a></td>
<td tabindex="0" data-swp-font-size="14px">Commercial</td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">JAWS</td>
<td data-swp-font-size="14px"><a href="http://www.freedomscientific.com/Products/Blindness/JAWS" target="_blank" rel="noopener" title="http://www.freedomscientific.com/Products/Blindness/JAWS">http://www.freedomscientific.com/Products/Blindness/JAWS</a></td>
<td tabindex="0" data-swp-font-size="14px">Commercial</td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">Supernova</td>
<td data-swp-font-size="14px"><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=1" target="_blank" rel="noopener" title="http://www.yourdolphin.co.uk/productdetail.asp?id=1">http://www.yourdolphin.co.uk/productdetail.asp?id=1</a></td>
<td tabindex="0" data-swp-font-size="14px">Commercial</td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">Window-Eyes</td>
<td data-swp-font-size="14px"><a href="http://www.gwmicro.com/Window-Eyes/" target="_blank" rel="noopener" title="http://www.gwmicro.com/Window-Eyes/">http://www.gwmicro.com/Window-Eyes/</a></td>
<td tabindex="0" data-swp-font-size="14px">Commercial</td>
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
