@extends('frontend.layouts.main')
@section('content')
<style>
    .advt-header {
        background-color: #70b62c;
        color: white;
        padding: 8px 12px;
        font-weight: bold;
        border-radius: 4px 4px 0 0;
        font-size: 16px;
    }

    .advt-table td, .advt-table th {
        vertical-align: middle;
        font-size: 14px;
    }

    .new-label {
        color: red;
        font-weight: bold;
        margin-right: 5px;
    }

    .link-cell a {
        color: #e0e5eb;
        text-decoration: none;
    }

    .link-cell a:hover {
        text-decoration: underline;
    }

    .advt-box {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .nowrap {
        white-space: nowrap;
    }
  .list-unstyled li {
    width:200px;
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
                 Recruitment Portal
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
<div class="container mt-3">
  @foreach($advt_no as $advt_num)
    <div class="advt-box mb-4">
        <div class="advt-header bg-success text-white p-2 rounded-top">
            <strong>{{ $advt_num->ad_no }}</strong>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered w-100">
              <tbody>
                  @foreach($advt as $advt_detail)
                      @if($advt_detail->advt_no == $advt_num->id)
                          <tr>
                              {{-- Title Column (80%) --}}
                              <td class="align-middle" style="width:80%;">
                                  <i class="fas fa-file-alt text-primary me-2"></i>
                                  {{ $advt_detail->title_en }}
                              </td>

                              {{-- File / Link / List Column (20%) --}}
                              <td class="align-middle text-nowrap text-center" style="width:20%;">
                                  @if($advt_detail->con_type === 'pdf')
                                      <a href="{{ url('/') }}/uploads/RecruitmentFile/{{ $advt_detail->file }}" target="_blank" class="btn btn-danger btn-sm">
                                          View PDF
                                      </a>

                                  @elseif($advt_detail->con_type === 'link')
                                      <a href="{{ $advt_detail->link }}" target="_blank" class="btn btn-danger btn-sm">
                                          View Link
                                      </a>

                                  @elseif($advt_detail->con_type === 'none')
                                      <ul class="list-unstyled mb-0 text-start">
                                          @foreach($list as $list_detail)
                                              @if($list_detail->recruit_id == $advt_detail->id)
                                                  <li class="mb-1">
                                                      <i class="fas fa-file-alt text-success me-2"></i>
                                                      @if($list_detail->con_type === 'pdf')
                                                          <a href="{{ url('/') }}/uploads/RecruitmentFile/{{ $list_detail->file }}" target="_blank" class="text-danger">
                                                              {{ $list_detail->title_en }}
                                                          </a>
                                                      @else
                                                          <a href="{{ $list_detail->link }}" target="_blank" class="text-danger">
                                                              {{ $list_detail->title_en }}
                                                          </a>
                                                      @endif
                                                  </li>
                                              @endif
                                          @endforeach
                                      </ul>
                                  @endif
                              </td>
                          </tr>
                      @endif
                  @endforeach
              </tbody>
          </table>


        </div>
    </div>
@endforeach



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

