@extends('frontend.layouts.main')
@section('content')

@php
$data = getAllMenu();
@endphp
<style> th { background: #003630 !important; } 


ul {
    list-style: revert-layer !important;
}
  
</style>
<!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg" style="background-image: url({{url('/')}}/img/about-1.jpg);background-size: cover;background-attachment: fixed;padding: 50px 0 33px 0;position: relative;">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center text-white">
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
                  <span><a href="{{url('/')}}" rel="home">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Sitemap</span>
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
              <h3 style="text-align: center;" class="font-weight-bold">Sitemap</h3>
              <hr>
            </div>
            <div class="col-md-12">
			<p tabindex="0" data-swp-font-size="14px"></p>
              
              <ul class="">
                     <li class=""> <a href="{{url('/')}}" class="home">Home</a> </li>
                   
                     @foreach ($data as $menu)
                     <li class=""> <a href="{{url('/')}}/menu/{{$menu->menu_name}}" >{{$menu->menu_name}}</a>
                        <div class="ml-5">
                        <ul class="" >
                           @php
                              $submenu = getSubmenuById($menu->menu_name);
                            @endphp
                            @foreach ($submenu as $submenus)
                            @if($submenus->sub_name == "Organisation Structure")
                           <li><a href="{{url('/')}}/Organisation-Structure">{{$submenus->sub_name}}</a></li>
					   
							@elseif($submenus->sub_name == "UPPCL Intranet")
							<li><a target="_blank" href="https://uppcl.org/uppcl/en/article/intranet">{{$submenus->sub_name}}</a></li>
							
							@elseif($submenus->sub_name == "News & Notifications")
							<li><a href="{{url('/news/3')}}">{{$submenus->sub_name}}</a></li>
                          
							@elseif($submenus->sub_name == "Electrical Accident")
							<li><a href="{{url('/electrical-accident')}}">{{$submenus->sub_name}}</a></li>
                          
                          	@elseif($submenus->sub_name == "Consumer Forms")
							<li><a href="{{url('/consumer-forms')}}">{{$submenus->sub_name}}</a></li>
                          
                          	@elseif($submenus->sub_name == "Bill Calculator")
							<li><a href="{{url('/bill-calculator')}}">{{$submenus->sub_name}}</a></li>
                          
                          	@elseif($submenus->sub_name == "Tenders & Notice")
							<li><a href="{{url('/Tenders-Notice')}}">{{$submenus->sub_name}}</a></li>
                          
                          	@elseif($submenus->sub_name == "Theft Assessment Calculator")
								<li><a href="{{url('/theft-assessment-calculator')}}">{{$submenus->sub_name}}</a></li>
                          
                         	@elseif($submenus->sub_name == "Estimate Calculator")
								<li><a href="{{url('/estimate-calculator')}}">{{$submenus->sub_name}}</a></li>		
                          
                          	@elseif($submenus->sub_name == "Integrated Software")
								<li><a target="_blank" href="https://pvvnl.org/integrated_software/">{{$submenus->sub_name}}</a></li>
                          
							@elseif($submenus->sub_name == "Consumption Calculator")
							<li><a target="_blank" href="https://www.uppclonline.com/dispatch/Portal/appmanager/uppcl/wss?_nfpb=true&_pageLabel=uppcl_consumption_consumptionCalculator&pageID=1011">{{$submenus->sub_name}}</a></li>
                          
                           @else
                           <li><a href="{{url('/')}}/menu/{{$menu->menu_name}}/{{$submenus->sub_name}}">{{$submenus->sub_name}}</a></li>
                           @endif
                           @endforeach
                        </ul>            
                        </div>
                     </li>
                     @endforeach
                  </ul>
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
