@extends('frontend.layouts.main')
@section('content')
<style>
.custom-tabs .nav-link {
    color: #333;
    font-weight: 500;
    padding: 10px 20px;
    border-radius: 8px 8px 0 0;
    margin-right: 4px;
    transition: all 0.3s ease-in-out;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-bottom: none;
}

.custom-tabs .nav-link:hover {
    background-color: #e2e6ea;
    color: #0d6efd;
}

.custom-tabs .nav-link.active {
    background: linear-gradient(to right, #ff7c29, #43701b);
    color: #fff;
    font-weight: 600;
    border: 1px solid #ccc;
    border-bottom: none;
}

</style>
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
                  <a href="{{ url('/') }}/">Home</a>
              </li>
         
          <li class="breadcrumb-item">
                 Tenders
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
      <div class="col-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;"><!-- <span class="heading_title"> -->  <div class="region region-page-title">
    <div id="block-stqc-page-title" class="block block-core block-page-title-block">
  
    
      
  <h1 class="page-title">Tenders</h1>
  

  </div>

  </div>
<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
<div id="block-stqc-content" class="block block-system block-system-main-block">
  
    
      
<article data-history-node-id="923" class="node node--type-about-stqc node--view-mode-full">

  <div class="node__content">


<div class="container mt-4">
    <!-- Tabs -->
        <ul class="nav nav-tabs custom-tabs" id="tenderTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="current-tab" data-bs-toggle="tab" data-bs-target="#current" type="button" role="tab">Current Tenders</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="finalized-tab" data-bs-toggle="tab" data-bs-target="#finalized" type="button" role="tab">Tender Finalized</button>
        </li>
        
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="procurement-tab" data-bs-toggle="tab" data-bs-target="#procurement" type="button" role="tab">Annual Procurement Plan</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="archives-tab" data-bs-toggle="tab" data-bs-target="#archives" type="button" role="tab">Archives</button>
        </li>
    </ul>


    <!-- Tab Content -->
    <div class="tab-content border border-top-0 p-3" id="tenderTabsContent">
        <div class="tab-pane fade show active" id="current" role="tabpanel">
            <!-- Tender Table -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 50%;">Description</th>
                            <th style="width: 15%;">Category</th>
                            <th style="width: 15%;">Advt. Date</th>
                            <th style="width: 15%;">Close Date & Time</th>
                            <th style="width: 15%;">Opening Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                      $i=1;
                      @endphp
                      @foreach($tender_master as $tender_masters)
                        @php
                            $filePath = public_path('uploads/tender/' . $tender_masters->file);
                            $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                            $fileSizeKB = number_format($fileSize / 1024, 2); // Convert to KB
                        @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <strong>{{$tender_masters->tender_no}}–<br>{!! $tender_masters->name_of_material !!}</strong>
                                <a href="{{url('/')}}/uploads/tender/{{$tender_masters->file}}">{{$tender_masters->file}}</a> ({{ $fileSizeKB }} KB)<br>
                                @if($tender_masters->retender_file)
                                Retender Document : <a href="{{url('/')}}/uploads/tender/Retender/{{$tender_masters->retender_file}}">{{$tender_masters->retender_file}}</a> ({{ $fileSizeKB }} KB)<br>
                                @endif
                                 @if($tender_masters->date_extend_file)
                                Date Extened : <a href="{{url('/')}}/uploads/tender/DateExtend/{{$tender_masters->date_extend_file}}">{{$tender_masters->date_extend_file}}</a> ({{ $fileSizeKB }} KB)<br>
                                @endif
                                @if($tender_masters->amend_file)
                                Amended : <a href="{{url('/')}}/uploads/tender/Amended/{{$tender_masters->amend_file}}">{{$tender_masters->amend_file}}</a> ({{ $fileSizeKB }} KB)<br>
                                @endif
                               
                                
                                @if($tender_masters->cancelled_file)
                                Cancelled Document : <a href="{{url('/')}}/uploads/tender/Cancelled/{{$tender_masters->cancelled_file}}">{{$tender_masters->cancelled_file}}</a> ({{ $fileSizeKB }} KB)<br>
                                @endif
                                @foreach($extra_list as $extra_lists)
                                    @if($extra_lists->tender_id == $tender_masters->id)
                                    <a href="{{url('/')}}/uploads/tender/PO/{{$extra_lists->file}}">{{$extra_lists->title}}</a> ({{ $fileSizeKB }} KB)<br>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$tender_masters->cat_name}}</td>
                            <td>{{date('d/m/Y', strtotime($tender_masters->advt_date))}}</td>
                            <td>{{date('d/m/Y', strtotime($tender_masters->last_date))}}<br>{{$tender_masters->last_time}}</td>
                            <td>{{date('d/m/Y', strtotime($tender_masters->opening_date))}}<br>{{$tender_masters->opening_time}}</td>
                        </tr>
                      @php
                      $i++;
                      @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="finalized" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 50%;">Description</th>
                            <th style="width: 15%;">Category</th>
                            <th style="width: 15%;">Advt. Date</th>
                            <th style="width: 15%;">Close Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                      $i=1;
                      @endphp
                      @foreach($tender_masterf as $tender_mastersf)
                        @php
                            $filePath = public_path('uploads/tender/' . $tender_mastersf->file);
                            $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                            $fileSizeKB = number_format($fileSize / 1024, 2); // Convert to KB
                        @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <strong>{{$tender_mastersf->tender_no}}–<br>{!! $tender_mastersf->name_of_material !!}</strong>
                                <a href="{{url('/')}}/uploads/tender/{{$tender_mastersf->file}}">{{$tender_mastersf->file}}</a> ({{ $fileSizeKB }} KB)<br>
                                @foreach($extra_list as $extra_lists)
                                    @if($extra_lists->tender_id == $tender_mastersf->id)
                                    <a href="{{url('/')}}/uploads/tender/PO/{{$extra_lists->file}}">{{$extra_lists->title}}</a> ({{ $fileSizeKB }} KB)<br>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$tender_mastersf->cat_name}}</td>
                            <td>{{date('d/m/Y', strtotime($tender_mastersf->advt_date))}}</td>
                            <td>{{date('d/m/Y', strtotime($tender_mastersf->last_date))}}<br>{{$tender_mastersf->last_time}}</td>
                        </tr>
                      @php
                      $i++;
                      @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="procurement" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 80%;">Title</th>
                            <th style="width: 15%;">View / Download</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     @php
                      $i=1;
                      @endphp
                      @foreach($annplan as $annplann)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                              {{$annplann->title}}
                                
                            </td>
                            <td><a href="{{url('/')}}/uploads/AnnualProcurementPlan/{{$annplann->url}}" target="_blank" class="btn btn-primary">View/Download</a></td>
                           
                        </tr>
                     @php
                      $i++;
                      @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="archives" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 50%;">Description</th>
                            <th style="width: 15%;">Category</th>
                            <th style="width: 15%;">Advt. Date</th>
                            <th style="width: 15%;">Close Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                      $i=1;
                      @endphp
                      @foreach($tender_masterar as $tender_mastersar)
                        @php
                            $filePath = public_path('uploads/tender/' . $tender_mastersar->file);
                            $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                            $fileSizeKB = number_format($fileSize / 1024, 2); // Convert to KB
                        @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <strong>{{$tender_mastersar->tender_no}}–<br>{!! $tender_mastersar->name_of_material !!}</strong>
                                <a href="{{url('/')}}/uploads/tender/{{$tender_mastersar->file}}">{{$tender_mastersar->file}}</a> ({{ $fileSizeKB }} KB)<br>
                               @foreach($extra_list as $extra_lists)
                                    @if($extra_lists->tender_id == $tender_mastersar->id)
                                    <a href="{{url('/')}}/uploads/tender/PO/{{$extra_lists->file}}">{{$extra_lists->title}}</a> ({{ $fileSizeKB }} KB)<br>
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>{{$tender_mastersar->cat_name}}</td>
                            <td>{{$tender_mastersar->advt_date}}</td>
                            <td>{{$tender_mastersar->last_date}}<br>{{$tender_mastersar->last_time}}</td>
                        </tr>
                      @php
                      $i++;
                      @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
 <div class="gray-bg shani_shadow mt-3">
   <div class="container">
     <div class="row">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12">
         <div id="gov_bottom_slider2" class="owl-carousel owl-theme">
           <a href="https://www.mygov.in/"><img alt="my gov" src="{{url('/')}}/themes/nbri/images/f1.jpg"></a>
           <a href="https://www.india.gov.in/"><img alt="india" src="{{url('/')}}/themes/nbri/images/f2.jpg"></a>
           <a href="https://www.makeinindia.com/home"><img alt="makeinindia" src="{{url('/')}}/themes/nbri/images/f3.jpg"></a>
           <a href="https://data.gov.in/"><img alt="data gov" src="{{url('/')}}/themes/nbri/images/f4.jpg"></a>
           <a href="https://www.digitalindia.gov.in/"><img alt="digitalindia" src="{{url('/')}}/themes/nbri/images/f5.jpg"></a>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection

