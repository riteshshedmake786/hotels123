@include('front.layout.header')

	<main>
		<!-- Breadcrumb section -->
		<section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
			style="background-image: url({{ asset('uploads/hotels_featured_images/'.$hotelsDetails->banner_img)}}" alt="{{ $hotelsDetails->name }});">
			<div class="container">
				<div class="breadcrumb-content text-center">
					<h1><?php echo $hotelsDetails->name?></h1>
					<ul class="list-inline">
						<li><a href="">Home</a></li>
						<li><i class="far fa-angle-double-right"></i></li>
						<li><?php echo $hotelsDetails->name?></li>
					</ul>
				</div>
			</div>
			
		</section>
		<!-- Breadcrumb section End-->
	





	<section class="room-details-wrapper section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<!-- Room Details -->
						<div class="room-details">
							<div class="entry-header">
								<div class="post-thumb position-relative">
									<div class="post-thumb-slider">
										<div class="main-slider">
										
										   <?php
										    foreach($gallery_images as $gallery)
											{
												?>
	   
											<div class="single-img">
									<a href="{{ asset('uploads/hotels_gallery_images/'.$gallery->image)}}" class="main-img">
													<img src="{{ asset('uploads/hotels_gallery_images/'.$gallery->image)}}" alt="Image">
												</a>
											</div>
											
											<?php
											
											}
											?>
											
										</div>
										<div class="dots-slider row">
										
										    <?php
										    foreach($gallery_images as $gallery)
											{
												?>
											<div class="col-lg-3">
												<div class="single-dots">
													<img src="{{ asset('uploads/hotels_gallery_images/'.$gallery->image)}}" alt="image">
												</div>
											</div>
											
											  <?php
										    }
												?>
											
										</div>
									</div>
									
								</div>
								
								<h2 class="entry-title"><?php echo $hotelsDetails->name?></h2>
								<ul class="entry-meta list-inline">
									<li><i class="far fa-bed"></i>3 Bed</li>
									<li><i class="far fa-bath"></i>2 Baths</li>
									<li><i class="far fa-ruler-triangle"></i>72 m</li>
								</ul>
							</div>
							
							
							
							<div class="room-details-tab">
								<div class="row">
									<div class="col-sm-3">
										<ul class="nav desc-tab-item" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" href="#desc" role="tab"
													data-toggle="tab">Hotel Details</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#location" role="tab"
													data-toggle="tab">Location</a>
											</li>
											
										</ul>
									</div>
									<div class="col-sm-9">
										<div class="tab-content desc-tab-content">
											<div role="tabpanel" class="tab-pane fade in active show" id="desc">
												<h5 class="tab-title">Hotel Details </h5>
												<div class="entry-content">
													<p>
													 <?php echo $hotelsDetails->summary ?>
													</p>
													<div class="entry-gallery-img">
														<figure class="entry-media-img">
															<img src="{{ asset('uploads/hotels_featured_images/'.$hotelsDetails->featured_image)}}" alt="Image">
														</figure>
													</div>
												</div>
												
												
										</div>
											<div role="tabpanel" class="tab-pane fade" id="location">
												<h5 class="tab-title">Location</h5>
												<div id="roomMaps"></div>
												<div class="room-location">
													<div class="row">
														<div class="col-4">
															<h6>City</h6>
															<p>{{ $hotelsDetails->location}}</p>
															<p>{{ $hotelsDetails->city_name}}</p>
														</div>
														<div class="col-4">
															<h6>Phone</h6>
															<p>+901280-89121</p>
															<p>+901280-89121</p>
														</div>
														<div class="col-4">
															<h6>Email</h6>
															<p>room@avson.com</p>
														</div>
													</div>
												</div>
											</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						
						
					</div>
					<div class="col-lg-4">
						<!-- Sidebars Area -->
						<div class="sidebar-wrap">
							<div class="widget booking-widget">
								<h4 class="widget-title">$160.00 <span>Night</span></h4>
								<form>
									<div class="input-wrap">
										<input type="text" placeholder="Location" id="f-location">
										<i class="far fa-search"></i>
									</div>
									<div class="input-wrap">
										<input type="text" placeholder="Arrive Date" id="arrive-date">
										<i class="far fa-calendar-alt"></i>
									</div>
									<div class="input-wrap">
										<input type="text" placeholder="Depart Date" id="depart-date">
										<i class=""></i>
										<i class="far fa-calendar-alt"></i>
									</div>
									<div class="input-wrap">
										<select name="guests" id="guests">
											<option value="Guests">Guests</option>
											<option value="Guests">Guests</option>
											<option value="Guests">Guests</option>
										</select>
									</div>
									<div class="input-wrap">
										<button type="submit" class="btn filled-btn btn-block">
											book now <i class="far fa-long-arrow-right"></i>
										</button>
									</div>
								</form>
							</div>
							<div class="widget category-widget">
								<h4 class="widget-title">Category</h4>
								<div class="single-cat bg-img-center"
									style="background-image: url(assets/img/blog/cat-01.jpg);">
									<a href="#">Luxury Room</a>
								</div>
								<div class="single-cat bg-img-center"
									style="background-image: url(assets/img/blog/cat-02.jpg);">
									<a href="#">Couple Room</a>
								</div>
								<div class="single-cat bg-img-center"
									style="background-image: url(assets/img/blog/cat-03.jpg);">
									<a href="#">Hotel Views</a>
								</div>
							</div>
							<div class="widget banner-widget"
								style="background-image: url(assets/img/blog/sidebar-banner.jpg);">
								<h2>Booking Your Latest apartment</h2>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit sed do eiusmod tempor
									incididunt ut labore </p>
								<a href="#" class="btn filled-btn">BOOK NOW <i class="far fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		
		
		<section class="latest-food section-padding">
			<div class="container">
				<div class="section-title text-center">
					
					<h1 class="color_darkgoldenrod" >Venues List</h1>
				</div>
				<!-- Foods Wrap -->
				<div class="row">
				
				<?php
				 foreach($venus as $venu)
				 {
				?>	 
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-latest-food">
							<div class="food-img">
								<img src="{{ asset('uploads/hotels_featured_images/'.$venu->feature_image)}}" alt="{{ $venu->title }}" >
							</div>
							<div class="l-food-desc d-flex justify-content-between align-items-center">
								<h4><a class="color_darkgoldenrod" href="#"><?php echo $venu->title?></a></h4>
								
							</div>
						</div>
					</div>
					
				<?php
				 }
                ?>				 
					
					
					
				</div>
			</div>
		</section>
		
		
		<!-- Latest Room Start -->
		<section class="latest-room-d section-bg section-padding">
			<div class="container">
				<!-- Section Title -->
				<div class="section-title text-center">
					
					<h1 class="color_darkgoldenrod">Latest Hotel</h1>
				</div>
				<div class="row">
				
				   <?php
				   foreach ($hotel_featured as $hotels)
				   {
					   
					   $description=strip_tags($hotels->description);
				       $description=substr($description,0,50);
					   ?>
					<div class="col-lg-4 col-md-6">
						<!-- Single Room -->
						<div class="single-room">
							<div class="room-thumb">
									<a href="{{ url('/hoteldetails/'.$hotels->id) }}">
                  			 <img  src="{{ asset('uploads/hotels_featured_images/'.$hotels->featured_image)}}" alt="{{ $hotels->name }}" width="100%" style="height:250px">
											 
									 </a>
							</div>
							<div class="room-desc">
								
								<h4><a href="{{ url('/hoteldetails/'.$hotels->id) }}">{{ $hotels->name }}</a></h4>
								<p>
									<?php echo $description ?>
								</p>
								<ul class="room-info list-inline">
									<li><i class="far fa-bed"></i>3 Bed</li>
									<li><i class="far fa-bath"></i>2 Baths</li>
									<li><i class="far fa-ruler-triangle"></i>72 m</li>
								</ul>
								
							</div>
						</div>
					</div>
				
				  <?php
				   }
				   ?>
				  </div>
			</div>
		</section>
		<!-- Latest Room End -->
		<!-- Brands section start -->
				<section class="brands-section primary-bg">
			<div class="container">
				<div id="brandsSlideActive" class="row">
					<div class="col-lg-2">
						<div class="brand-item text-center">
							<img src="{{asset('front_end/img/brands/01.png')}}" alt="Brands">
							
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="brand-item text-center">
							<img src="{{asset('front_end/img/brands/02.png')}}" alt="Brands">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="brand-item text-center">
							<img src="{{asset('front_end/img/brands/03.png')}}" alt="Brands">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="brand-item text-center">
							<img src="{{asset('front_end/img/brands/04.png')}}" alt="Brands">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="brand-item text-center">
							<img src="{{asset('front_end/img/brands/05.png')}}" alt="Brands">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="brand-item text-center">
							<img src="{{asset('front_end/img/brands/06.png')}}" alt="Brands">
						</div>
					</div>
					
				</div>
			</div>
		</section>
	
		<!-- Brands section End -->
	</main>
	<!-- Main Wrap end -->
	
	
	
	
@include('front.layout.footer')



<script>
	
	$(function() {
	// Map for Room Details Page
	function roomMaps() {
		var mapOptions = {
			zoom: 11,
			scrollwheel: false,
			// The latitude and longitude to center the map (always required)
			center: new google.maps.LatLng(<?php echo $hotelsDetails->lat ?>, <?php echo $hotelsDetails->long ?>), // New York
			// This is where you would paste any style found on Snazzy Maps.
			styles: [
				{
					featureType: 'all',
					elementType: 'geometry.fill',
					stylers: [
						{
							weight: '2.00'
						}
					]
				},
				{
					featureType: 'all',
					elementType: 'geometry.stroke',
					stylers: [
						{
							color: '#9c9c9c'
						}
					]
				},
				{
					featureType: 'all',
					elementType: 'labels.text',
					stylers: [
						{
							visibility: 'on'
						}
					]
				},
				{
					featureType: 'landscape',
					elementType: 'all',
					stylers: [
						{
							color: '#f2f2f2'
						}
					]
				},
				{
					featureType: 'landscape',
					elementType: 'geometry.fill',
					stylers: [
						{
							color: '#ffffff'
						}
					]
				},
				{
					featureType: 'landscape.man_made',
					elementType: 'geometry.fill',
					stylers: [
						{
							color: '#ffffff'
						}
					]
				},
				{
					featureType: 'poi',
					elementType: 'all',
					stylers: [
						{
							visibility: 'off'
						}
					]
				},
				{
					featureType: 'road',
					elementType: 'all',
					stylers: [
						{
							saturation: -100
						},
						{
							lightness: 45
						}
					]
				},
				{
					featureType: 'road',
					elementType: 'geometry.fill',
					stylers: [
						{
							color: '#eeeeee'
						}
					]
				},
				{
					featureType: 'road',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#7b7b7b'
						}
					]
				},
				{
					featureType: 'road',
					elementType: 'labels.text.stroke',
					stylers: [
						{
							color: '#ffffff'
						}
					]
				},
				{
					featureType: 'road.highway',
					elementType: 'all',
					stylers: [
						{
							visibility: 'simplified'
						}
					]
				},
				{
					featureType: 'road.arterial',
					elementType: 'labels.icon',
					stylers: [
						{
							visibility: 'off'
						}
					]
				},
				{
					featureType: 'transit',
					elementType: 'all',
					stylers: [
						{
							visibility: 'off'
						}
					]
				},
				{
					featureType: 'water',
					elementType: 'all',
					stylers: [
						{
							color: '#46bcec'
						},
						{
							visibility: 'on'
						}
					]
				},
				{
					featureType: 'water',
					elementType: 'geometry.fill',
					stylers: [
						{
							color: '#c8d7d4'
						}
					]
				},
				{
					featureType: 'water',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#070707'
						}
					]
				},
				{
					featureType: 'water',
					elementType: 'labels.text.stroke',
					stylers: [
						{
							color: '#ffffff'
						}
					]
				}
			]
		};

		var mapElement = document.getElementById('roomMaps');

		// Create the Google Map using our element and options defined above
		var map = new google.maps.Map(mapElement, mapOptions);

		// Let's also add a marker while we're at it
		var iconBase = '../assets/img/mappin.png';
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(<?php echo $hotelsDetails->lat ?>, <?php echo $hotelsDetails->long ?>),
			map: map,
			icon: iconBase,
			title: 'Cryptox'
		});
	}
	if ($('#roomMaps').length != 0) {
		google.maps.event.addDomListener(window, 'load', roomMaps);
	}
	
	});
	</script>