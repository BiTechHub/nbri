@extends('frontend.layouts.main')
@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<style>
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px;
    padding: 6px 20px;
}
.input-group-btn .btn-group {
    display: flex !important;
}
.btn-group .btn {
    border-radius: 0;
    margin-left: -1px;
}
.btn-group .btn:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}
.form-group .form-control:last-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

@media screen and (min-width: 768px) {
    #adv-search {
        width: 500px;
        margin: 0 auto;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 500px;
    }
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
                 Download Admit Cards
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
  
    
      
  <h1 class="page-title" style="margin-top:15px;">
{{ $exam->test_name ?? 'Test' }} - Admit Cards
</h1>




  </div>

  </div>
      
  <!--<h1 class="page-title"></h1>-->


  </div>

  </div>
<!-- </span> -->
      <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>
<div id="block-stqc-content" class="block block-system block-system-main-block">
  
    
      
<article data-history-node-id="923" class="node node--type-about-stqc node--view-mode-full">

  
    

  
  <div class="node__content">
            
            <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item" style="justify-items: center;">
    <div class="col-md-5" style="border: solid 1px #DB5E00;padding: 35px;border-radius: 20px;background: bisque;">

        <form class="form-horizontal" role="form" method="post">
            @csrf
            <div class="form-group" style="position: relative;">
    <label for="reg_no">Candidate Name / Registration No.</label>
    <input class="form-control" type="text" name="reg_no" required id="reg_no" autocomplete="off" onkeyup="searchCandidate(this.value)" />

    <!-- Suggestion Box -->
    <div id="suggestions" 
         style="position:absolute; top:100%; left:0; right:0; background:#fff; border:1px solid #ccc; z-index:999; display:none;">
    </div>
</div>

            <div class="form-group">
                <label for="contain">Date Of Birth</label>
                <input class="form-control" required type="date" name="dob" id="dob" />
            </div>
            <div class="form-group" style="display:inline-flex">
        {{-- <div class="g-recaptcha" data-sitekey="6LemSQ8sAAAAAM1xCi13xabkPfVO0SD2wQjDG8yw"></div> --}}
            <button type="button" class="btn btn-primary" onclick="get_admit_card();">Search</button>
    </div>
            
        </form>

        <!-- Contact Details Section -->
        <div style="margin-top: 25px; text-align: center; font-size: 15px; color: #333;">
            <strong>Contact Us</strong><br>
            📞 Phone: <a href="tel:05222297890">0522-2297890</a><br>
            📧 Email: <a href="mailto:sorectt.nbri@csir.res.in">sorectt[dot]nbri[at]csir[dot]res[dot]in</a>
        </div>

    </div>
</div>

        
  </div>

</article>

  </div>

  </div>
<div class="col-md-12">
  <div class="row gy-4">
                    <div class="col-md-12 text-center" id="withoutData" style="display:none;margin-top:20px;">
						<div class="panel-body">
							<h2>No data found</h2>
						</div>
					</div>
					<div class="panel col-md-12" id="withData" style="display:none;">

						<div class="panel-body">
							<span style="color:red;" id="totalData"></span>
							
						  <div class="table-responsive">
							<table class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
                                        <th>Candidate Name</th>
                                        <th>Roll No.</th>
                                        <th>Download</th>
                                        
                                    </tr> 
								</thead>
								<tbody id="searchData">
								</tbody>
							</table>
							</div>

						</div>
					</div>
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
<script>
function searchCandidate(query) {
    if (query.length < 2) {
        document.getElementById("suggestions").style.display = "none";
        return;
    }

    fetch("/search-candidate-new?query=" + query)
        .then(response => response.json())
        .then(data => {
            let html = "";
            data.forEach(item => {
                html += `<div style="padding:8px; cursor:pointer;" onclick="selectCandidate('${item.application_no}')">
                            ${item.candidate_name} - ${item.application_no}
                         </div>`;
            });

            let box = document.getElementById("suggestions");
            box.innerHTML = html;
            box.style.display = "block";
        });
}

function selectCandidate(regNo) {
    document.getElementById("reg_no").value = regNo;
    document.getElementById("suggestions").style.display = "none";
}
</script>

<script>
				
				

				function get_admit_card()
				{
                    // let captcha = grecaptcha.getResponse();

                    // if (captcha.length == 0) {
                    //     alert("Please verify the captcha");
                    //     return false;
                    // }
					//alert();
					$("#withoutData").hide();
					$("#withData").hide();
					$("#portData").hide();
					var reg=$('#reg_no').val();
				    var dob=$('#dob').val();
					var DataUri="reg="+reg+"&dob="+dob;
					if(reg=="" || reg==null || reg=='')
					{
						alert('Please type registration number.');
						return false;
					}
					//alert(DataUri);
					//return false;
					$("#searchData").html("");
					$.ajax
					({
						url:"{{url('/')}}/Search-Admit-Card?"+DataUri,
						type:'get',
						dataType:'json',
						success:function(data)
						{
							console.log(data);
							if(data.length==0 || data=='no')
							{
								$("#withoutData").slideDown(1000);
								$("#withData").slideUp(1000);
							}
							else
							{
								for(var i=0;i<data.length;i++)
								{
									$("#searchData").append('<tr>'+
									'<td>'+data[i].candidate_name+'</td>'+
									'<td>'+data[i].roll_no+'</td>'+
									'<td><a href="/uploads/Admit_Card_Data_NW/' + data[i].application_no + '" target="_blank">Download Admit Card</a></td>'+
									
									'</tr>');
								}
								$("#withoutData").slideUp(1000);
								$("#withData").slideDown(1000);
								$("#totalData").html("Total "+data.length+" records found...");
								if(data.length == 75){
								  $("#portData").show();  
								}
							}
						}
					});
				}
            </script>
@endsection
