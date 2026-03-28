<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{url('/')}}/img/favicon.png">

    <title>CSIR - National Botanical Research Institute Admin</title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="{{url('/')}}/admin/css/bootstrap-extend.css">


	<!-- theme style -->
	<link rel="stylesheet" href="{{url('/')}}/admin/css/master_style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.css" rel="stylesheet" />
	<!-- UltimatePro Admin skins -->
	<link rel="stylesheet" href="{{url('/')}}/admin/css/skins/_all-skins.css">

    <!-- c3 CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendor_components/c3/c3.min.css">

	<!-- daterange picker -->
	<link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

	<!-- fullCalendar -->
	<link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/fullcalendar/fullcalendar.print.min.css" media="print">

	<!-- Bootstrap switch-->
	<link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/bootstrap-switch/switch.css">

	<!-- Morris charts -->
  
	<link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/morris.js/morris.css">
<link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
  </head>

<body class="hold-transition skin-success light-sidebar sidebar-mini light">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}/admin-panel/dashboard" class="logo" style="background: var(--Primary-gradient, linear-gradient(90deg, #DB5E00 0%, #3b711c 100%));">
      <!-- mini logo -->
	  <div class="logo-mini">
		  <span class="light-logo"><img src="{{url('/')}}/admin/assets/img/nbri_logo.jpg" alt="logo"></span>
		 
	  </div>
      <!-- logo-->
      <div class="logo-lg">
		  <span class="light-logo"><img src="{{url('/')}}/admin/assets/img/nbri_logo.jpg" alt="logo" style="height:60px;"></span>
	  </div>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div>
		  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<i class="ti-align-left"></i>
		  </a>
		  

	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- Messages -->

		  <!-- Notifications -->


		  <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('/')}}/img/logo.jpg" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu animated flipInX">
              <!-- User image -->
              <li class="user-header bg-img" style="background-image: url(../img/logo-admin.png)" data-overlay="3">
				  <div class="flexbox align-self-center">
				  	<img src="{{url('/')}}/img/logo.jpg" class="float-left rounded-circle" alt="User Image">
					<h4 class="user-name align-self-center">
					  <span>{{ $LoggeduserInfo['username'] }}</span>
					  <small>{{ $LoggeduserInfo['email'] }}</small>
					</h4>
				  </div>
              </li>
              <!-- Menu Body -->
              <li class="user-body">

					<a class="dropdown-item" href="{{ route('admin-panel.logout') }}"><i class="ion-log-out"></i> Logout</a>
					<div class="dropdown-divider"></div>
              </li>
            </ul>
          </li>


          <!-- Control Sidebar Toggle Button -->


        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

        
        @foreach($menu as $value)
          @if($value['menu_type']=='Main')
		<li class="active">
          <a href="{{url('/')}}/admin-panel/{{$value['url']}}">
            <i class="ti-dashboard"></i>
            <span>{{$value['menu_name']}}</span>
            <span class="pull-right-container">
              
            </span>
          </a>

        </li>
          @endif
        @if($value['menu_type']=='Sub')
         <li class="treeview">
          <a href="#">
            <i class="ti-files"></i>
            <span>{{$value['menu_name']}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach($value['sub_menu'] as $subvalue)
            <li><a href="{{url('/')}}/admin-panel/{{$subvalue->url_name}}"><i class="ti-more"></i>{{$subvalue->sub_menu}}</a></li>
            @endforeach
          </ul>
        </li>
        @endif
        @endforeach
         

      </ul>
    </section>
  </aside>
