<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{url('/')}}/img/favicon.png">

    <title>Pashchimanchal Vidyut Vitran Nigam Limited</title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('/')}}/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="{{url('/')}}/admin/css/bootstrap-extend.css">

	<!-- theme style -->
	<link rel="stylesheet" href="{{url('/')}}/admin/css/master_style.css">

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

  </head>

<body class="hold-transition skin-success light-sidebar sidebar-mini light">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}/admin-panel/dashboard" class="logo" style="    background: #fff;">
      <!-- mini logo -->
	  <div class="logo-mini">
		  <span class="light-logo"><img src="{{url('/')}}/assets/images/PVVNL-Logo.png" alt="logo"></span>
		 
	  </div>
      <!-- logo-->
      <div class="logo-lg">
		  <span class="light-logo"><img src="{{url('/')}}/assets/images/PVVNL-Logo.png" alt="logo"></span>
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
              <img src="{{url('/')}}/admin/assets/imgs/dummy.png" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu animated flipInX">
              <!-- User image -->
              <li class="user-header bg-img" style="background-image: url(../img/logo-admin.png)" data-overlay="3">
				  <div class="flexbox align-self-center">
				  	<img src="{{url('/')}}/admin/assets/imgs/dummy.png" class="float-left rounded-circle" alt="User Image">
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

        

		<li class="active">
          <a href="{{url('/')}}/admin-panel/dashboard">
            <i class="ti-dashboard"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">
              
            </span>
          </a>

        </li>

        <li class="">
          <a href="{{url('/')}}/admin-panel/slider">
            <i class="ti-files"></i>
            <span>Manage Slider</span>
            <span class="pull-right-container">
              
            </span>
          </a>

        </li>
        <li class="">
          <a href="{{url('/')}}/admin-panel/officers">
            <i class="ti-files"></i>
            <span>Manage Officers Photo</span>
            <span class="pull-right-container">

            </span>
          </a>

        </li>

        <li class="treeview">
            <a href="#">
              <i class="ti-files"></i>
              <span>Manage Gallery</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('/')}}/admin-panel/category"><i class="ti-more"></i>Add Category</a></li>
              <li><a href="{{url('/')}}/admin-panel/gallery"><i class="ti-more"></i>Add Photos</a></li>
              <li><a href="{{url('/')}}/admin-panel/videos"><i class="ti-more"></i>Add Videos</a></li>

            </ul>
          </li>
          <li class="">
            <a href="{{url('/')}}/admin-panel/office_orders_list">
              <i class="ti-direction-alt"></i>
              <span>Office Orders</span>
              <span class="pull-right-container">
                
              </span>
            </a>
          </li>
        <li class="">
            <a href="{{url('/')}}/admin-panel/phone-directory">
              <i class="ti-direction-alt"></i>
              <span>Phone Directory</span>
              <span class="pull-right-container">
                
              </span>
            </a>
          </li>
          <li class="">
            <a href="{{url('/')}}/admin-panel/topcontent">
              <i class="ti-direction-alt"></i>
              <span>Top Content</span>
              <span class="pull-right-container">
                
              </span>
            </a>
          </li>
          <li class="">
            <a href="{{url('/')}}/admin-panel/news_list">
              <i class="fa fa-newspaper-o" aria-hidden="true"></i>
              <span> News</span>
              <span class="pull-right-container">
                
              </span>
            </a>
          </li>
        {{-- <li class="">
          <a href="{{url('/')}}/admin-panel/softwares">
            <i class="ti-direction-alt"></i>
            <span>Add Software </span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li> --}}
        <li class="treeview">
            <a href="#">
              <i class="ti-files"></i>
              <span>Tenders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('/')}}/admin-panel/addTender"><i class="ti-more"></i>Add New Tender</a></li>
              <li><a href="{{url('/')}}/admin-panel/currentTenders"><i class="ti-more"></i>Current Tenders</a></li>
              <li><a href="{{url('/')}}/admin-panel/archiveTenders"><i class="ti-more"></i>Archive Tenders</a></li>
            </ul>
          </li>
        <li class="treeview">
            <a href="#">
              <i class="ti-files"></i>
              <span>Manage Menus</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('/')}}/admin-panel/addmenu"><i class="ti-more"></i>Add Menu</a></li>
              <li><a href="{{url('/')}}/admin-panel/addsubmenu"><i class="ti-more"></i>Add Submenus</a></li>
              
             <!-- <li><a href="{{url('/')}}/admin-panel/addchildmenu"><i class="ti-more"></i>Add Childmenus</a></li>-->
            </ul>
          </li>
         <li class="treeview">
          <a href="#">
            <i class="ti-files"></i>
            <span>Manage Site Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{url('/')}}/admin-panel/addcontent"><i class="ti-more"></i>Add Site Content</a></li>
            
            <li><a href="{{url('/')}}/admin-panel/managesitecontent"><i class="ti-more"></i>Site Content List</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{url('/')}}/admin-panel/contact">
            <i class="ti-direction-alt"></i>
            <span>Check Feedback </span>
            <span class="pull-right-container">
              
            </span>
          </a>

        </li>

	    	<li>
          <a href="{{ route('admin-panel.logout') }}">
            <i class="ti-power-off"></i>
			     <span>Log Out</span>
          </a>
        </li>

      </ul>
    </section>
  </aside>
