<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>महत्वपूर्ण लिंक</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/')}}/slider/bootstrap(1).min.css">
  <!--<link rel="stylesheet" href="{{url('/')}}/slider/font-awesome(1).min.css">-->
  
  <link rel="stylesheet" href="{{url('/')}}/assets/css/font-awesome.min.css">
  <link href="{{url('/')}}/slider/css2" rel="stylesheet">
  <script src="{{url('/')}}/slider/jquery.min(1).js"></script>
  <script src="{{url('/')}}/slider/bootstrap.min.js"></script>

  <style>

    body{
      font-family: 'Rubik', sans-serif;
      font-size: 14px;

    }

    .high h2{
      color: #fff;
      margin-top: 0; 
      padding: 10px 20px; 
      font-size: 20px; 
      text-align: left; 
      margin-bottom: 0px; 
      font-weight: 600;
      position: relative;
      background: url('{{url('/')}}/img/bg1.jpg')
    }

    .scroll{
      position: absolute;
      top: 13px;
      right:5%;
    }

    .deep{
      border-bottom: 1px solid #c7c7c7;
      padding-bottom:20px; 
      padding-top:20px;           
    }

    .deep img{
      height: 22px;
    }

    .deep .my_span {
      font-size: 14px;
      color: #000;
      text-decoration: none;
      padding: 0px 10px;
    }

    .deep .my_span a
    {
      color: #000;
    }

    .deep a:hover {
      color: #23527c;
    }



    .my_button {
      padding: 5px;
      background-color: #f1f1f1;
      color: black;
    }


  </style>
  </head>
  <body>

    <div class="container important_link_container">
      <div class="row high">
        <h2 tabindex="0">महत्वपूर्ण लिंक</h2>
        <div class="scroll">
          <span class="previous_home_scroll_div">
            <a id="previous_home_scroll" class="my_button" tabindex="0" href="javascript:void(0);" title="Previous Important Link"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></span>

          <span class="common_home_scroll_div">
            <a id="pause_home_scroll" class="my_button" tabindex="0" href="javascript:void(0);" title="Pause Important Link" style=""><i class="fa fa-pause" aria-hidden="true"></i></a>
            <a id="play_home_scroll" class="my_button" tabindex="0" href="javascript:void(0);" title="Play Important Link" style=""><i class="fa fa-play" aria-hidden="true"></i></a></span>
          <span class="next_home_scroll_div">
            <a id="next_home_scroll" class="my_button" tabindex="0" href="javascript:void(0);" title="Next Important Link"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></span>
        </div>
      </div>
      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
        
        <div class="carousel-inner">
          @php $activeCount = 1; @endphp
          @foreach ($news_i as $index => $news_is)
          @if ($activeCount == 1) <div class="item @if($index == 0) active @endif"> @endif

          <div class="deep">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            <span class="my_span">
              <a href="{{ url('/') }}/uploads/{{ $news_is->file_name }}" target="_blank" tabindex="0">
                {{ $news_is->subject }}
                <span style="background-image:url('img/pdf.png'); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
              </a>
            </span>
          </div>
          @if ($activeCount == 3)</div>@endif
          @if ($activeCount == 3)
          @php $activeCount = 0; @endphp
          @endif
          @php $activeCount ++ ; @endphp
          @endforeach
        </div>
      </div>
      
      <script>
        $(".important_link_container #play_home_scroll").hide();

        $(".important_link_container #pause_home_scroll").click(function(){
          $(".important_link_container #myCarousel").carousel('pause');
          $(".important_link_container #play_home_scroll").show();
          $(this).hide();
        });

        $(".important_link_container #play_home_scroll").click(function(){
          $(".important_link_container #myCarousel").carousel('cycle');
          $(".important_link_container #pause_home_scroll").show();
          $(this).hide();
        });

        $(".important_link_container #previous_home_scroll").click(function(){
          $(".important_link_container #myCarousel").carousel('prev');
        });

        $(".important_link_container #next_home_scroll").click(function(){
          $(".important_link_container #myCarousel").carousel('next');
        });
      </script>

      <script>
        if(sessionStorage.getItem('black_theme_session')=="Yes")
        {
          $("body").css({
            'background-color' : '#191919',
            'color' : 'yellow'
          });

          $(".my_button").css({
            'background-color' : 'black'
          });

          $("h2, a, span").css({
            'color' : 'yellow'
          });

          $('head').append('<style>.high h2{background:none !important; background-color:#666666 !important;}</style>')
        }
      </script>


    </div></body></html>