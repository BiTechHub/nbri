@extends('frontend.layouts.main')
@section('content')
<style>
        /* Expandable Button Styling */
        .expand-btn {
            cursor: pointer;
            background: darkorange;
            color: white;
            padding: 10px 15px; /* Reduced height */
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1rem;
            font-weight: bold;
            transition: background 0.3s ease-in-out, transform 0.2s;
        }
        .expand-btn:hover {
            transform: scale(1.02);
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.01);
        }

        /* Table Styling */
        .table-container {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
        }

        /* Icon Transition */
        .toggle-icon {
            transition: transform 0.3s ease-in-out;
        }
        .collapsed .toggle-icon {
            transform: rotate(0deg);
        }
        .toggle-icon.rotate {
            transform: rotate(180deg);
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
                 {{$cat}}
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
  
       <div class="region region-page-title">
    <div id="block-stqc-page-title" class="block block-core block-page-title-block">
  
    
      
  <h1 class="page-title">{{$cat}}</h1>


  </div>

  </div>
      
  <!--<h1 class="page-title"></h1>-->


  </div>

  </div>
<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
    <div class="container mt-4">
    <!-- Director Section -->
    @foreach($staffcat as $stc)
      @if($stc->child_menu != 'Director')
    <div class="card mb-3">
        <div class="card-header expand-btn" data-bs-toggle="collapse" data-bs-target="#DirectorTable{{$stc->id}}">
            <span>{{$stc->child_menu}}</span>
            <span><i class="bi bi-chevron-down toggle-icon"></i></span>
        </div>
        <div class="collapse table-container" id="DirectorTable{{$stc->id}}">
            <table class="table table-hover table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Tel.no. (Code: 0522)</th>
                        <th>Email</th>
                        <th>Area</th>
                       
                    </tr>
                </thead>
                <tbody>
                  @foreach($staffcontent as $stcontent)
                    @if($stcontent->childmenu == $stc->id)
                    <tr>
                      
                        <td width="200"><img src="{{url('/')}}/uploads/staffPics/{{$stcontent->image}}" style="width:100%;height:100%;"></td>
                        @if($stc->id == 19 || $stc->id == 18 || $stc->id == 17 || $stc->id == 16 || $stc->id == 15)
                        <td width="200"><a href="{{url('/')}}/en/ViewProfile/{{$stcontent->id}}/{{$stcontent->name}}">{{$stcontent->name}}</a></td>
                        @else
                        <td width="200">{{$stcontent->name}}</td>
                        @endif
                        <td width="150">{{$stcontent->deg}}</td>
                        <td>{{$stcontent->contact}}</td>
                        <td>{{ str_replace(['@','.'], ['[at]', '[dot]'], $stcontent->email) }}</td>
                        {{-- @php
                           $ids = explode(',', $stcontent->area); // area column has "1,3,5"
                        @endphp
                        <td width="200">
                         @foreach($ids as $id)
                             @php
                                $area = $staffarea->firstWhere('id', $id);
                             @endphp
                             @if($area)
                                {{ $area->area }}@if(!$loop->last), @endif
                             @endif
                         @endforeach
                      </td> --}}

                        <td width="200">
                            {{ $stcontent->area }}
                        </td>
                        
                    </tr>
                    @endif
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
     @endif
    @endforeach
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<script type="text/javascript">
  $(document).ready(function() {
    // Check the initial radio button selection and show/hide relevant sections
    if ($('#csir_radio').prop('checked')) {
        // Show dropdown and hide manual input if CSIR is selected
        $('#organization_div').show();
        $('#manual_organization_div').hide();
    } else if ($('#non_csir_radio').prop('checked')) {
        // Show manual input and hide dropdown if Non-CSIR is selected
        $('#organization_div').hide();
        $('#manual_organization_div').show();
    }

    // Add a new row
    $('#addRow').click(function() {
        var $tableBody = $('#guestTable tbody');
        var $lastRow = $tableBody.find('tr:last');
        var $newRow = $lastRow.clone(); // Clone the last row

        // Increment serial number for the new row
        var rowCount = $tableBody.children('tr').length + 1;
        $newRow.find('td:first').text(rowCount);

        // Clear input fields in the new row
        $newRow.find('input').val('');
        $newRow.find('select').prop('selectedIndex', 0); // Reset selects to default option

        // Append the new row
        $tableBody.append($newRow);
    });

    // Delete a row
    $(document).on('click', '.deleteRow', function() {
        // Ensure there is more than one row left
        if ($('#guestTable tbody tr').length > 1) {
            $(this).closest('tr').remove(); // Remove the row
            // Reassign the serial numbers to remaining rows
            $('#guestTable tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }
    });

    // Toggle between dropdown and text input on radio button change
    $('#csir_radio').on('change', function() {
        $('#organization_div').show();
        $('#manual_organization_div').hide();
    });

    $('#non_csir_radio').on('change', function() {
        $('#organization_div').hide();
        $('#manual_organization_div').show();
    });
});

    </script>
<script>
    $(document).ready(function(){
        $(".expand-btn").click(function(){
            var icon = $(this).find(".toggle-icon");
            icon.toggleClass("rotate");
        });
    });
</script>
@endsection
