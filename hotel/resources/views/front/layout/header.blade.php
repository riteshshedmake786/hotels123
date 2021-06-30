<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Hotels Venues</title>
	
	
	<!-- Font Awesome Css -->
	<link rel="stylesheet" href="{{asset('front_end/css/all.min.css') }}">
	<!-- Bootstrap version 4.4.1 -->
	<link rel="stylesheet" href="{{asset('front_end/css/bootstrap-4.4.1.min.css') }}" />
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('front_end/css/animate.css') }}">
	<!-- magnific popup versison 1.1.0 -->
	<link rel="stylesheet" href="{{asset('front_end/css/magnific-popup-1.1.0.css') }}">
	<!-- Nice Select  -->
	<link rel="stylesheet" href="{{asset('front_end/css/nice-select-1.0.css') }}">
	<!-- meanmenu version 2.0.7 -->
	<link rel="stylesheet" href="{{asset('front_end/css/meanmenu-2.0.7.min.css') }}">
	<!-- Slick Version 1.9.0 -->
	<link rel="stylesheet" href="{{asset('front_end/css/slick-1.9.0.css') }}" />
	<!-- datetimepicker -->
	<link rel="stylesheet" href="{{asset('front_end/css/bootstrap-datepicker.css') }}" />
	<!-- jQuery Ui for price range slide -->
	<link rel="stylesheet" href="{{asset('front_end/css/jquery-ui.min.css') }}">
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('front_end/css/style.css?v=1') }}" />
	<!-- Responsive Css -->
	<link rel="stylesheet" href="{{asset('front_end/css/responsive.css?v=1') }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<style>
	.slider-text
	{
	margin-top:-10%;
	}
	.label_color
	{
	color:#e6cb69;
	}
	.color_darkgoldenrod
	{
	color:darkgoldenrod ! important;
	}
	
	.product-head
 {   
   background: darkgoldenrod;
    padding: 10px 20px;
    color: #FFF;
    font-size: 19px;
    font-weight: 800;
    border-radius: 10px 10px 0px 0px;
	}
	.white
	{
	color: white;
	}
	
	.nopadding {
   padding: 0px 10px !important;
   margin: 0 !important;
}
 .width_95
 {
  width:100% ! important;
 }
 
 .nice-select .option
 {
	 color: #000 !important;
 }
 .abc{
	 color:red;
 }
	</style>
	
</head>

<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- preloader -->
	<div class="loader" id="preLoader">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<!-- Header Start -->
	<header>
		<div class="header-top-area section-bg">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-xl-4 col-lg-7 offset-xl-3 col-md-6">
						<ul class="top-contact-info list-inline">
							<li><i class="far fa-map-marker-alt"></i>Silver Tower, Business Bay, Dubai, UAE </li>
							<li><i class="far fa-phone"></i>+97144356739
</li>
						</ul>
					</div>
					<div class="col-xl-5 col-lg-5 col-md-6">
						<div class="top-right text-right">
							<ul class="top-menu list-inline d-inline">
								<li><a href="#">ABOUT US</a></li>
								
								@if(Auth::guard('merchant')->user())
											<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								       Hi, Hi, {{ Auth::guard('merchant')->user()->company_name }}
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								 <a href="#">Hotel Profile</a>
								 
								  <form action="{{ url('/merchant/logout') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link">
                                                            Logout
                                                        </button>
                                                    </form>

								</div>
							  </li>
						
								@elseif(Auth::guard('web')->user())
								
								<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								       Hi, {{ Auth::guard('web')->user()->name }}
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								 <a href="{{ url('user/profile') }}">User Profile</a>
								 
								  <form action="{{ url('/user/logout') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link">
                                                            Logout
                                                        </button>
                                                    </form>

								</div>
							  </li>
								
								@elseif(!Auth::guard('web')->user() && @guest)
								<li><a href="{{ url('/user/login') }}">SIGN IN</a></li>
							   <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  REGISTER
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								  <a class="dropdown-item" href="{{ url('/customer/register') }}">Customer</a>
								  <a class="dropdown-item" href="{{ url('/hotel/register') }}">Hotel/Merchant</a>
								  <a class="dropdown-item" href="{{ url('/supplier/register') }}">Supplier</a>
								 
								</div>
							  </li>
							  
							  @endif
								
							   <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  EN
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								  <a class="dropdown-item" href="#">EN</a>
								  <a class="dropdown-item" href="#">AR</a>
								  <a class="dropdown-item" href="#">ES</a>
								 
								</div>
							  </li>
									
									
							</ul>
							<!--<ul class="top-social-icon list-inline d-inline">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
							</ul>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-menu-area">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-xl-3 col-lg-3 col-md-4 col-7">
						<div class="logo">
							<a href="{{ url('/') }}"><img src="{{asset('front_end/img/logo.png')}}" style="width:55%" alt="Hotels Venues"></a>
						</div>
					</div>
					<div class="col-xl-9 col-lg-9 col-md-8 col-5">
						<div class="menu-right-area text-right">
							
							<nav class="main-menu">
								<ul class="list-inline">
								
								<li class="active-page"><a href="#">Home</a></li>
								
								<li ><a href="#">Supplier List</a></li>
								
								<li ><a href="#">Hotel List</a></li>
								
									<li class="have-submenu ">
										<a href="#">Social </a>
										<ul class="submenu">
											<li><a href="#">Wedding</a></li>
                                        <li><a href="#">Engagement</a></li>
                                        <li><a href="#">Birthday Party</a></li>
										</ul>
									</li>
									<li class="have-submenu">
										<a href="#">Corporate</a>
										<ul class="submenu">
											   <li><a href="#">Conference</a></li>
                                        <li><a href="#">Seminar</a></li>
                                        <li><a href="#">Fashin show</a></li>
                                        <li><a href="#">Gala Dinner</a></li>
										</ul>
									</li>
									
									
									<li class="have-submenu">
										<a href="blog.html">English</a>
										<ul class="submenu">
											<li><a href="blog-gird.html">Arabic</a></li>
											
										</ul>
									</li>
								
									 
						
								</ul>
							</nav>
						
							
							
						
							
							
						</div>
					</div>
					
					
				</div>
				<div class="mobilemenu"></div>
			</div>
		</div>
	</header>
	<!-- Header End -->
	<!-- Main Wrap start -->
	


