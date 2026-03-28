@extends('frontend.layouts.main')
@section('content')
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
                  <span class="active">{{$menu2}}</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">{{$menu2}}</h3>
              <hr>
            </div>
            <style> th { background: #003630 !important; } </style>
            @if ($sitecontents && count($sitecontents) > 0)


            @if ($sitecontents && $sitecontents->first() && $sitecontents->first()->con_type == 'Pdf')
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Contents</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach ($sitecontents as $itam)
                  @if ($itam->con_type == 'Pdf')  
                  <tr>
                    <td>{{$i++}}</td>
                    <td><a href="{{url('/')}}/uploads/{{$itam->image}}" target="_blank">{{$itam->heading}} <span><img src="/img/pdf.png" alt=""></span></a></td>
                    <td>{{$itam->created_at}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif


            @if ($sitecontents && count($sitecontents) > 0)
                  @foreach ($sitecontents as $itam)
                  @if ($itam->con_type == 'Text')  
                  <div class="col-md-4 mt-4">
              <div class="card" >
                @if ($itam->image)
                <img class="card-img-top" src="{{url('/')}}/uploads/{{$itam->image}}" alt="Card image cap">

                @endif
                <div class="card-body">
                  <h5 class="card-title">{{$itam->heading}}</h5>
                  <p class="card-text">{!!$itam->content!!}</p>
                </div>
              </div>
            </div>
              @endif
              @endforeach
              @endif
    
            @else
            <td colspan="5" class="text-center">At present there is no content available for this page, once content will be available would be updated.</td>
            @endif
            <div class="col-md-12">
              <div class="a" style="height: 170px"><span class="a"></span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function () {
        $('.btn-data').on('click', function () {
            var dataValue = $(this).data('id'); 
            // alert(dataValue);
            $.ajax
					({
						url:"{{url('/')}}/read_data/"+dataValue,
						dataType:'json',
						success:function(data)
						{
              var j=1;
							var msg='';
							for(var i=0;i<data.length;i++)
							{
                msg=msg+'<tr>';
                  msg=msg+'<td>'+j++ +'</td>';
                  msg=msg+'<td>'+data[i].name+'</td>';
                  msg=msg+'<td>'+data[i].designation+'</td>';
                  msg=msg+'<td>'+data[i].area+'</td>';
                  msg=msg+'<td>'+data[i].twitter+'</td>';
                  msg=msg+'<td>'+data[i].email+'</td>';
                  msg=msg+'<td>'+data[i].contact+'</td>';
                  msg=msg+'</tr>';
							}

							$("#director").html(msg);
						}
					});
        });
    });

</script>

@endsection
