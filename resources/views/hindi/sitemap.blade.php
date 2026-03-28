@extends('hindi.layouts.main')
@section('content')
  <div class="body_contaner">
 <!--about body section start here-->
<div class="inner_header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                 <!-- <h3 class="inner_title"></h3> -->
                  <div class="region region-breadcrumb">
    <div id="block-stqc-breadcrumbs" class="block block-system block-system-breadcrumb-block">
  
    
        <nav class="breadcrumb" role="navigation" aria-labelledby="system-breadcrumb">
    <h2 id="system-breadcrumb" class="visually-hidden">Breadcrumb</h2>
    <ol class="breadcrumb" style="font-size: 1.5rem; font-weight:bold; color:orange !important;">
         
         
          <li class="breadcrumb-item">
                  वेबसाइट साइटमैप
              </li>
    
        </ol>
  </nav>

  </div>

  </div>

            </div>
        </div>
    </div>	

</div>

<div class="inner_section" id="mainsection">
<div class="container">
<div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12"><!-- <span class="heading_title"> -->  <div class="region region-page-title">
    <div id="block-stqc-page-title" class="block block-core block-page-title-block">
  
    
      
  <!--<h1 class="page-title"></h1>-->


  </div>

  </div>
<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
<div id="block-stqc-content" class="block block-system block-system-main-block">
  
    
      
<article data-history-node-id="923" class="node node--type-about-stqc node--view-mode-full">

  
    

  
  <div class="node__content">
           <div class="container my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">वेबसाइट साइटमैप</h2>
        <p class="text-muted">वेबसाइट के सभी पृष्ठों को संरचित लेआउट में ब्राउज़ करें</p>
    </div>

    <div class="table-responsive shadow rounded">
    <table class="table table-bordered align-middle table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>मुख्य मेन्यू</th>
                <th>उप मेनू</th>
                <th>बाल मेनू</th>
            </tr>
        </thead>

        <tbody>

        @foreach($menu as $mn)

            @php
                $subItems = $submenu->where('cat_name', $mn->id);
                $rowspan = max($subItems->count(), 1);   // avoid 0
                $firstSub = true;
            @endphp

            {{-- FIRST ROW --}}
            <tr>

                {{-- MAIN MENU COLUMN --}}
                <td rowspan="{{ $rowspan }}" class="fw-bold bg-light">

                    @if($mn->menu_type == 'External')
                        <a href="{{ $mn->link }}" target="_blank" class="text-primary">{{ $mn->menu_hi }}</a>
                    @else
                        <a href="{{ url('/en/'.$mn->id.'/'.$mn->menu_name) }}" class="text-primary">{{ $mn->menu_hi }}</a>
                    @endif

                </td>

                {{-- If there are no submenus --}}
                @if($subItems->count() == 0)
                    <td class="text-muted">No Submenus</td>
                    <td class="text-muted">-</td>
                @endif

                @foreach($subItems as $smn)

                    {{-- Print the first submenu in the SAME ROW as main menu --}}
                    @if($firstSub)

                        @php
                            $url = '#';

                            if(in_array($smn->sub_name, ['Scientists','Administration','Technical and Support Staff'])){
                                $url = url('/en/Department-Staff-List/'.$smn->id.'/'.$smn->sub_name);
                            } elseif($smn->sub_name == 'Director') {
                                $url = url('/en/ViewProfile/2/'.$smn->sub_name);
                            } elseif($smn->sub_name == 'CSIR') {
                                $url = 'https://www.csir.res.in';
                            } else {
                                $url = url('/en/'.$mn->id.'/'.$smn->id.'/'.trim(preg_replace('/[^A-Za-z0-9\-]+/', '-', $smn->sub_name), '-'));
                            }
                        @endphp

                        {{-- SUBMENU in first row --}}
                        <td>
                            <a href="{{ $url }}" @if($smn->sub_name=='CSIR') target="_blank" @endif>
                                {{ $smn->submenu_hi }}
                            </a>
                        </td>

                        {{-- CHILD LINKS --}}
                        <td>
                            @php 
                                $childItems = $childmenu->where('submenu', $smn->id); 
                            @endphp

                            @if($childItems->count())
                                <ul class="mb-0" style="padding-left:15px;">
                                    @foreach($childItems as $cmn)

                                        @php
                                            if($cmn->child_menu == 'Guest House Booking'){
                                                $childUrl = '/en/Guest-House-Booking';
                                            } else {
                                                $childUrl = url('/en/'.$mn->id.'/'.$smn->id.'/'.$cmn->id.'/'.$cmn->child_menu);
                                            }
                                        @endphp

                                        <li><a href="{{ $childUrl }}">{{ $cmn->childmenu_hi }}</a></li>

                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">No Child Items</span>
                            @endif
                        </td>

                        @php $firstSub = false; @endphp

                    @else
                        {{-- Remaining submenus start new rows --}}
                        </tr><tr>

                        {{-- Submenu URL --}}
                        @php
                            $url = '#';
                            if(in_array($smn->sub_name, ['Scientists','Administration','Technical and Support Staff'])){
                                $url = url('/en/Department-Staff-List/'.$smn->id.'/'.$smn->sub_name);
                            } elseif($smn->sub_name == 'Director'){
                                $url = url('/en/ViewProfile/2/'.$smn->sub_name);
                            } elseif($smn->sub_name == 'CSIR'){
                                $url = 'https://www.csir.res.in';
                            } else {
                                $url = url('/en/'.$mn->id.'/'.$smn->id.'/'.trim(preg_replace('/[^A-Za-z0-9\-]+/', '-', $smn->sub_name), '-'));
                            }
                        @endphp

                        <td>
                            <a href="{{ $url }}" @if($smn->sub_name=='CSIR') target="_blank" @endif>
                                {{ $smn->submenu_hi }}
                            </a>
                        </td>

                        {{-- Child menu --}}
                        <td>
                            @php 
                                $childItems = $childmenu->where('submenu', $smn->id); 
                            @endphp

                            @if($childItems->count())
                                <ul class="mb-0" style="padding-left:15px;">
                                    @foreach($childItems as $cmn)

                                        @php
                                            if($cmn->child_menu == 'Guest House Booking'){
                                                $childUrl = '/en/Guest-House-Booking';
                                            } else {
                                                $childUrl = url('/en/'.$mn->id.'/'.$smn->id.'/'.$cmn->id.'/'.$cmn->child_menu);
                                            }
                                        @endphp

                                        <li><a href="{{ $childUrl }}">{{ $cmn->childmenu_hi }}</a></li>

                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">No Child Items</span>
                            @endif
                        </td>

                    @endif

                @endforeach

            </tr>

        @endforeach

        </tbody>
    </table>
</div>

</div>

    
  </div>

</article>

  </div>

  </div>

  </div>


  </div>
</div>

<!--about body section end here-->

<!--body section end here-->
<!--Footer section starts here-->
</div>


 <!--footer section start here-->
 <!-- Gray Bg Bottom Slider Section Start -->
  
</div>
@endsection
