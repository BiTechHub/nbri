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
                  <a href="{{ url('/') }}/">होम</a>
              </li>
         
          <li class="breadcrumb-item">
                 गेस्ट हाउस बुकिंग
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
    <div id="block-stqc-page-title" class="block block-core block-page-title-block" style="margin-top:10px;">
  
    
      
  <h1 class="page-title">गेस्ट हाउस बुकिंग</h1>


  </div>
  <div id="block-stqc-page-title" class="block block-core block-page-title-block text-right">
  
 <a href="{{url('/')}}/hi/page/tariff" target="_blank">टैरिफ़</a> | <a href="{{url('/')}}/hi/page/accommodation" target="_blank">अकोमोडेशन</a> | <a href="#" onclick="openBookingModal()">बुकिंग स्थिति जांचें</a>


  </div>
  </div>
      
  <!--<h1 class="page-title"></h1>-->


  </div>

  </div>
<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
<div id="block-stqc-content" class="block block-system block-system-main-block">
<p class="innerheading">बेसिक डिटेल्स</p>
  
 <!-- Flash Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Flash Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('SaveGuestHouseBookingHi')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- First Column -->
                <div class="col-md-6">
                    <!-- Application Name -->
                    <div class="mb-3">
                        <label for="application_name" class="form-label">
                            आवेदन का नाम<span class="text-danger">*</span>
                        </label>
                        <input type="text" id="application_name" name="application_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">संगठन</label><br>
                        <input type="radio" id="csir_radio" name="organization_type" value="CSIR">सीएसआईआर
                        <input type="radio" id="non_csir_radio" name="organization_type" value="Non-CSIR"> गैर-सीएसआईआर
                    </div>
                    
                    <!-- Organization Dropdown (Visible when CSIR is selected) -->
           <!-- CSIR Organization Dropdown -->
<div class="mb-3" id="organization_div" style="display: none;">
    <select id="organization" name="organization" class="form-control">
        <option value="">संगठन चुनें</option>
        @foreach($org as $organization)
            <option value="{{ $organization->id }}">{{ $organization->organization }}</option>
        @endforeach
    </select>
</div>

                    
                    <!-- Manual Organization Input (Visible when Non-CSIR is selected) -->
                    <div class="mb-3" id="manual_organization_div" style="display: none;">
                        <input type="text" id="manual_organization" name="manual_organization" class="form-control" placeholder="Enter Organization Name">
                    </div>
                    <!-- Designation -->
                    <div class="mb-3">
                        <label for="designation" class="form-label">पदनाम<span class="text-danger">*</span></label>
                        <input type="text" id="designation" name="designation" class="form-control" required>
                    </div>
                    {{-- employee id --}}
                    <div class="mb-3">
                        <label for="employee" class="form-label">कर्मचारी आईडी<span class="text-danger">*</span></label>
                        <input type="text" id="employee_id" name="employee_id" class="form-control" required>
                    </div>

                    <!-- Contact Number -->
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">संपर्क/मोबाइल नंबर <span class="text-danger">*</span></label>
                        <input type="text" id="contact_no" name="contact_no" class="form-control" required>
                    </div>

                    <!-- Official Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">आधिकारिक ईमेल पता<span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>

                <!-- Vertical Divider -->
                <div class="col-md-1 divider"></div>

                <!-- Second Column -->
                <div class="col-md-5">
                    <!-- Scanned Office ID -->
                    <div class="mb-3">
                        <label for="image" class="form-label">कार्यालय आईडी की स्कैन की गई प्रति<span class="text-danger">*</span></label>
                        <h5 class="text-muted" style="font-size: 0.875rem; font-weight: lighter;">
                            <u>CSIR कर्मचारी - कृपया केवल CSIR आईडी अपलोड करें |</u> - अपने कार्यालय पहचान पत्र की स्कैन की गई प्रति अपलोड करें (jpg/gif/png)।
                        </h5>
                        <input type="file" name="image" id="image" accept="image/*" multiple required class="form-control">
                        @error('image')
                            <div style="color: red; font-size: 0.875em;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Purpose of Visit -->
                    <div class="mb-3">
                        <label for="purpose" class="form-label">यात्रा का उद्देश्य<span class="text-danger">*</span></label>
                        <select id="purpose" name="purpose" class="form-control" required>
                            <option selected disabled value="">यात्रा का उद्देश्य चुनें</option>
                            <option value="LTC">एल.टी.सी.</option>
                            <option value="Official">आफीशियल कार्य</option>
                            <option value="Personal">व्यक्तिगत</option>
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <!-- Date of Arrival -->
                        <div class="col-md-6">
                            <label for="date_of_arrival" class="form-label">आगमन की तिथि <span class="text-danger">*</span></label>
                            <input type="date" id="date_of_arrival" name="date_of_arrival" class="form-control" required>
                        </div>
                    
                        <!-- Time of Arrival -->
                        <div class="col-md-6">
                            <label for="time_of_arrival" class="form-label">आगमन का समय <span class="text-danger">*</span></label>
                            <input type="time" id="arrival_time" name="arrival_time" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <!-- Date of Departure -->
                        <div class="col-md-6">
                            <label for="date_of_departure" class="form-label">प्रस्थान की तिथि <span class="text-danger">*</span></label>
                            <input type="date" id="date_of_departure" name="date_of_departure" class="form-control" required>
                        </div>
                    
                        <!-- Time of Departure -->
                        <div class="col-md-6">
                            <label for="time_of_departure" class="form-label">प्रस्थान का समय <span class="text-danger">*</span></label>
                            <input type="time" id="departure_time" name="departure_time" class="form-control" required>
                        </div>
                    </div>

                    <!-- Number of Rooms -->
                    <div class="mb-3">
                        <label for="room" class="form-label">आवश्यक कमरों की संख्या<span class="text-danger">*</span></label>
                        <input type="number" id="room" name="room" class="form-control" required>
                    </div>

                    <!-- Payment to be Borne By -->
                    <div class="mb-3">
                        <label for="payment" class="form-label">भुगतान वहन करने वाला<span class="text-danger">*</span></label>
                        <select id="payment" name="payment" class="form-control" required>
                            <option selected disabled value="">भुगतान विकल्प चुनें</option>
                            <option value="Personal">आवेदक</option>
                            <option value="Guest">गेस्ट</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table for Guest Information -->
            <div class="mt-4">
                <p class="innerheading">अतिथि विवरण</p>
                <div class="mb-3">
                    <input type="checkbox" id="is_guest" name="is_guest">
                    <label for="is_guest" class="form-label">क्या आप अतिथियों में से एक हैं?</label>
                </div>
                
                <table class="table table-striped table-bordered" id="guestTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>क्रम संख्या</th>
                            <th>अतिथि का नाम</th>
                            <th>संगठन</th>
                            <th>आयु</th>
                            <th>लिंग</th>
                            <th>संपर्क</th>
                            <th>श्रेणी</th>
                            <th>फोटो आईडी प्रमाण संख्या</th>
                            <th>क्रिया</th>
                            
                        </tr>
                    </thead>
                      <tbody>
    @php
        $guest_names = old('guest_name', []);
        $organizations = old('organizations', []);
        $ages = old('age', []);
        $genders = old('gender', []);
        $contacts = old('contact', []);
        $categories = old('category', []);
        $photo_ids = old('photo_id_proof', []);
        $rowCount = max(count($guest_names), 1); // Always show at least one row
    @endphp

    @for ($i = 0; $i < $rowCount; $i++)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td><input type="text" name="guest_name[]" id="guest_name" class="form-control" required value="{{ $guest_names[$i] ?? '' }}"></td>
            <td><input type="text" name="organizations[]" id="organizations" class="form-control" required value="{{ $organizations[$i] ?? '' }}"></td>
            <td><input type="number" name="age[]" class="form-control" required value="{{ $ages[$i] ?? '' }}"></td>
            <td>
                <select name="gender[]" class="form-control" required>
                    <option value="Male" {{ ($genders[$i] ?? '') === 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ ($genders[$i] ?? '') === 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ ($genders[$i] ?? '') === 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </td>
            <td><input type="text" name="contact[]" id="mobile" class="form-control" required value="{{ $contacts[$i] ?? '' }}"></td>
            <td>
                <select name="category[]" class="form-control" required>
                    <option value="">Please Select</option>
                    @foreach($guest_cat as $gs)
                        <option value="{{ $gs->id }}" {{ ($categories[$i] ?? '') == $gs->id ? 'selected' : '' }}>
                            {{ $gs->name }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" name="photo_id_proof[]" class="form-control" required value="{{ $photo_ids[$i] ?? '' }}"></td>
            <td><button type="button" class="btn btn-danger btn-sm deleteRow">Delete</button></td>
        </tr>
    @endfor
</tbody>
                </table>
            </div>
        
            
            <!-- Button to Add Row -->
            <button type="button" id="addRow" class="btn btn-success mb-3">+ पंक्ति जोड़ें</button>
             

            <div class="">
                <label for="File1"> टिप्पणी  
                    <br>
                    <span style="font-size:10px;">
                        कृपया कक्ष आवंटन वरीयता/अतिरिक्त जानकारी प्रदान करें (यदि कोई हो)<br>
                        उदाहरण: अतिथि 1 - कक्ष 1; अतिथि 2 - कक्ष 1; अतिथि 3 - कक्ष 2; आदि।
                    </span> 
                </label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="" value=" " style="width:50%;">
            </div>
            
            <div class="form-group">
                <span style="font-size:14px;font-weight:bold;">
                    <input id="agree_terms_condition" type="checkbox" name="agree_terms_condition" value="1"><label for="ContentPlaceHolder1_chkIsGuest"> &nbspमैं नियम और  <a href="#">शर्तों से सहमत हैं</a> </label></span>
            </div>
    
            <b><span id="erragree_terms_condition" style="color: red;"></span></b></br>
            <input type="hidden" id="task" name="task" value="not_save_booking">
            <div class="form-group">
               <span id="captcha" style="background: green;color: white;padding: 6px;font-size: 21px;font-weight: bold;"></span> <br><br>
            <input id="textBox" type="text" name="captcha" style="width:25%;" class="form-control" placeholder="Enter Captcha">
            <span id="output"></span>
            <span class="text-danger">@error('captcha') {{ $message }} @enderror</span>  
                            </div>
            <!-- Submit Button -->
            <button type="submit" class="btnsubmit">सबमिट करें</button>
        </form>   
      


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
           @foreach($fslider as $fsl)
           <a href="{{$fsl->title}}"><img alt="my gov" src="{{url('/')}}/uploads/footerslider/{{$fsl->image}}"></a>
           @endforeach
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Booking Status Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">बुकिंग स्थिति जांचें</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal">बंद करें</button>
      </div>

      <div class="modal-body">
        
        <label>बुकिंग संदर्भ संख्या दर्ज करें:</label>
        <input type="text" id="bookingRef" class="form-control" placeholder="Enter reference number">
        <div class="mt-3">
            <div class="g-recaptcha" data-sitekey="6LemSQ8sAAAAAM1xCi13xabkPfVO0SD2wQjDG8yw"></div>
        </div>
        <button class="btn btn-primary mt-3" onclick="checkStatus()">स्थिति जाँचिए</button>

        <div id="statusResult" class="mt-3"></div>

      </div>

    </div>
  </div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
function openBookingModal() {
    var myModal = new bootstrap.Modal(document.getElementById('bookingModal'));
    myModal.show();
}

function checkStatus() {

    let ref  = document.getElementById('bookingRef').value;
    let resultBox = document.getElementById('statusResult');

    // Get Google Captcha response
    let captchaResponse = grecaptcha.getResponse();

    if (ref === "") {
        resultBox.innerHTML = `<div class="text-danger">Enter booking reference number.</div>`;
        return;
    }

    if (captchaResponse.length === 0) {
        resultBox.innerHTML = `<div class="text-danger">Please verify captcha.</div>`;
        return;
    }

    resultBox.innerHTML = "Checking...";

    fetch("{{ url('/check-booking-status-ajax') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            reference: ref,
            captcha_token: captchaResponse
        })
    })
    .then(res => res.json())
    .then(data => {

        if (data.status === "success") {

            resultBox.innerHTML = `
                <div class="alert alert-success">
                    Booking Status: <strong>${data.booking_status}</strong>
                </div>
            `;

        } else if (data.status === "pending") {
            resultBox.innerHTML = `
                <div class="alert alert-warning">Booking Status: <strong>${data.booking_status}</strong></div>
            `;
        } else {
            resultBox.innerHTML = `
                <div class="alert alert-danger">Booking Status: <strong>${data.booking_status}</strong></div>
            `;
        }

        // Reset Google Captcha box
        grecaptcha.reset();
    });
}
</script>

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
        let captchaText = document.querySelector('#captcha');
        let userText = document.querySelector('#textBox');
        let submitButton = document.querySelector('#submit');
        let output = document.querySelector('#output');
        let refreshButton = document.querySelector('#refresh');
        let captchaValid = document.querySelector('#captchaValid');
        let form = document.querySelector('#captchaForm');

        let alphaNums = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'.split('');

        function generateCaptcha() {
            let captchaArr = [];
            for (let i = 0; i < 5; i++) {
                captchaArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
            }
            return captchaArr.join('');
        }

        function refreshCaptcha() {
            captchaText.innerHTML = generateCaptcha();
            userText.value = "";
            output.innerHTML = "";
            output.classList.remove("greenText", "redText");
            captchaValid.value = "false";
        }

        captchaText.innerHTML = generateCaptcha();

        userText.addEventListener('keyup', function(e) {
            if (e.keyCode === 13) {
                validateCaptcha(e);
            }
        });

        submitButton.addEventListener('click', function(e) {
            validateCaptcha(e);
        });

        refreshButton.addEventListener('click', function() {
            refreshCaptcha();
        });

        function validateCaptcha(e) {
            if (userText.value === captchaText.innerHTML) {
                output.classList.add("greenText");
               output.innerHTML = "<span style='color:green'>Correct!</span>";
                captchaValid.value = "true";
                form.submit();
            } else {
                e.preventDefault();
                output.classList.add("redText");
                output.innerHTML = "Incorrect, please try again";
                captchaValid.value = "false";
            }
        }
    </script>
    <script>
document.getElementById('is_guest').addEventListener('change', function () {
    const isChecked = this.checked;

    // Common values
    const sourceInput = document.getElementById('application_name').value;
    const sourceSelect = document.getElementById('contact_no').value;
    let organizationValue = '';

    // Check which radio is selected
    if (document.getElementById('csir_radio').checked) {
        const orgSelect = document.getElementById('organization');
        organizationValue = orgSelect.options[orgSelect.selectedIndex].text;
    } else if (document.getElementById('non_csir_radio').checked) {
        organizationValue = document.getElementById('manual_organization').value;
    }

    if (isChecked) {
        // Fill guest fields
        document.getElementById('guest_name').value = sourceInput;
        document.getElementById('mobile').value = sourceSelect;
        document.getElementById('organizations').value = organizationValue;
    } else {
        // Clear guest fields
        document.getElementById('guest_name').value = '';
        document.getElementById('mobile').value = '';
        document.getElementById('organizations').value = '';
    }
});
</script>
@endsection
