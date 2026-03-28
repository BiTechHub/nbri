@extends('frontend.layouts.main')
@section('content')
<style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-img-container {
           
            height: 320px;
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: bold;
        }

        .accordion-button {
            background-color: var(--secondary-color);
            color: white;
        }

        .accordion-button:hover {
            background-color: var(--primary-color);
        }
    </style>
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
                 Profile
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
   <div class="container py-5">
    <div class="card profile-card">
        <!-- Profile Header -->
        <div class="row d-flex align-items-center gap-2">
            <div class="col-md-3 text-center">
                <div class="profile-img-container ">
                    <img src="{{url('/')}}/uploads/staffPics/{{$staffcontent1->image}}" class="profile-img" alt="{{$staffcontent1->name}}">
                </div>
            </div>
            <div class="col-md-9">
                <table class="table table-borderless">
                    <tbody>
                        <tr>

                            
                        </tr>
                        <tr>
                            <td class="form-label">Full Name:</td>
                            <td class="form-label">{{$staffcontent1->name}}</td>
                        </tr>
                        <tr>
                            <td class="form-label">Designation:</td>
                            <td class="form-label">{{$staffcontent1->deg}}</td>
                        </tr>
                        <tr>
                            <td class="form-label">Address:</td>
                            <td class="form-label">{{$staffcontent1->address}}</td>
                        </tr>
                        <tr>
                            <td class="form-label">Email Address:</td>
                            <td class="form-label">{{ str_replace(['@', '.'], ['[at]', '[dot]'], $staffcontent1->email) }}</td>
                        </tr>
                        <tr>
                            <td class="form-label">Contact Number:</td>
                            <td class="form-label">{{$staffcontent1->contact}}</td>
                        </tr>
                     
                    </tbody>
                </table>
                <div class="text-end" style="float: inline-end;">
                    <a href="{{url('/')}}/uploads/staffResume/{{$staffcontent1->resume}}" class="btn btn-danger" onclick="downloadPDF()">
                        <i class="fas fa-file-pdf me-2"></i>Download Resume
                    </a>
                </div>
            </div>
          <div class="col-md-12" style="margin-top:20px;">
            @foreach($staffcontent as $staffcont)
                @if($staffcont->pro_cat == 1)
                   {!! $staffcont->content !!}
                @endif
            @endforeach
          </div>
        </div>
        @if($staffcontent1->deg != 'Director')
        <!-- Profile Details Accordion -->
        @foreach($staffcat as $stc)
      @if($stc->name != 'Home')
    <div class="card mb-3">
        <div class="card-header expand-btn" data-bs-toggle="collapse" data-bs-target="#DirectorTable{{$stc->id}}">
            <span>{{$stc->name}}</span>
            <span><i class="bi bi-chevron-down toggle-icon"></i></span>
        </div>
        @foreach($staffcontent as $staffcont)
          @if($staffcont->pro_cat == $stc->id)
        <div class="collapse table-container" id="DirectorTable{{$staffcont->pro_cat}}">
          
            {!! $staffcont->content !!}
           
        </div>
         @endif
       @endforeach
    </div>
     @endif
    @endforeach
        @endif

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
           @foreach($fslider as $fsl)
           <a href="{{$fsl->title}}"><img alt="my gov" src="{{url('/')}}/uploads/footerslider/{{$fsl->image}}"></a>
           @endforeach
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
