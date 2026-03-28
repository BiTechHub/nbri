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
                  <span class="active">Help</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Help</h3>
              <hr>
            </div>
              
                <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px"><strong>Viewing different file formats</strong></p>
<table class="inner-table" width="100%">
<thead>
<tr>
<th tabindex="0">Document Type</th>
<th tabindex="0">Download</th>
</tr>
</thead>
<tbody>
<tr>
<td tabindex="0" data-swp-font-size="14px">Portable Document Format (P.D.F) Content</td>
<td data-swp-font-size="14px"><a tabindex="0" href="http://www.adobe.com/products/acrobat/readstep2.html" target="_blank" rel="noopener" title="Adobe Acrobat Reader">Adobe Acrobat Reader</a></td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">Word files</td>
<td data-swp-font-size="14px"><a tabindex="0" href="http://www.microsoft.com/downloads/details.aspx?familyid=941b3470-3ae9-4aee-8f43-c6bb74cd1466&amp;displaylang=en" target="_blank" rel="noopener" title="Word Viewer Microsoft Office Compatibility Pack for Word (for 2007 version)">Word Viewer Microsoft Office Compatibility Pack for Word (for 2007 version)</a></td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">Excel files</td>
<td data-swp-font-size="14px"><a tabindex="0" href="http://www.microsoft.com/downloads/details.aspx?familyid=941b3470-3ae9-4aee-8f43-c6bb74cd1466&amp;displaylang=en" target="_blank" rel="noopener" title="Excel Viewer Microsoft Office Compatibility Pack for Excel (for 2007 version)">Excel Viewer Microsoft Office Compatibility Pack for Excel (for 2007 version)</a></td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">PowerPoint presentations</td>
<td data-swp-font-size="14px"><a tabindex="0" href="http://www.microsoft.com/downloads/details.aspx?familyid=941b3470-3ae9-4aee-8f43-c6bb74cd1466&amp;displaylang=en" target="_blank" rel="noopener" title="PowerPoint Viewer Microsoft Office Compatibility Pack for PowerPoint (for 2007 version)">PowerPoint Viewer Microsoft Office Compatibility Pack for PowerPoint (for 2007 version)</a></td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">Flash content</td>
<td data-swp-font-size="14px"><a tabindex="0" href="http://get.adobe.com/flashplayer/" target="_blank" rel="noopener" title="Adobe Flash Player">Adobe Flash Player</a></td>
</tr>
<tr>
<td tabindex="0" data-swp-font-size="14px">Audio Files</td>
<td data-swp-font-size="14px"><a tabindex="0" href="http://windows.microsoft.com/en-IN/windows/download-windows-media-player" target="_blank" rel="noopener" title="Windows Media Player">Windows Media Player</a></td>
</tr>
</tbody>
</table>

		</div>
          <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px"><strong>Accessibility Help</strong></p>
<p tabindex="0" data-swp-font-size="14px">Use the accessibility options provided by this Website to control the screen display. These options allow increasing the text size and changing the contrast scheme for clear visibility and better readability.</p>
<p tabindex="0" data-swp-font-size="14px"><strong>Text Size Icons</strong></p>
<p tabindex="0" data-swp-font-size="14px">Following different options are provided in the form of icons which are available on the top of each page:</p>
<ul>
<li tabindex="0" data-swp-font-size="14px">A+ Increase text size: Allows to increase the text size up to two levels</li>
<li tabindex="0" data-swp-font-size="14px">A- Decrease text size: Allows to decrease the text size up to two levels</li>
<li tabindex="0" data-swp-font-size="14px">A Normal text size: Allows to set default text size</li>
</ul>
<p tabindex="0" data-swp-font-size="14px"><strong>Changing the Colour Scheme</strong></p>
<p tabindex="0" data-swp-font-size="14px">Changing the color scheme refers to applying a suitable background and text color that ensures clear readability. There are two options provided to change the color scheme. These are:</p>
<ul>
<li tabindex="0" data-swp-font-size="14px"><span id="help_content" style="background-color: white; padding: 3px 7px; margin-bottom: 3px; color: black; border: 1px solid #d1d1d1;">A</span> Default Contrast Theme</li>
<li tabindex="0" data-swp-font-size="14px"><span style="background-color: black; padding: 3px 7px; color: white; border: 1px solid #d1d1d1;">A</span> Yellow Text on Black Background</li>
</ul>
<p tabindex="0" data-swp-font-size="14px"><strong>Note:</strong> Changing the color scheme does not affect the images on the screen.</p>

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
