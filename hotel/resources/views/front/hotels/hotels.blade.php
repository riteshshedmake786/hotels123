@include('front.layout.header')

	<main>
		<!-- Breadcrumb section -->
		<section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
			style="background-image: url({{asset('front_end/img/bg/breadcrumb-01.jpg')}});">
			
			
			<div class="container">
				<div class="breadcrumb-content text-center">
					<h1>Our Room</h1>
					<ul class="list-inline">
						<li><a href="index.html">Home</a></li>
						<li><i class="far fa-angle-double-right"></i></li>
						<li>Room Gird</li>
					</ul>
				</div>
			</div>
			<h1 class="big-text">
				Room
			</h1>
		</section>
		<!-- Breadcrumb section End-->
		<!-- Latest Room Section -->
		<section class="rooms-warp gird-view section-bg section-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="filter-view">
							<ul>
								<li class="active-f-view">Default Sorting</li>
								<li>Low To High</li>
								<li>High To Low</li>
								<li>View A to Z</li>
								<li>View Z to A</li>
								<li>Popular</li>
							</ul>
						</div>
					</div>
					
					
					
									
					
					<div class="col-lg-4">
						<div class="sidebar-wrap">
							<div class="widget fillter-widget">
								<h4 class="widget-title">Your Reservation</h4>
								<form>
									<div class="input-wrap">
										<input type="text" placeholder="Location" id="location">
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
										<select name="rooms" id="rooms">
											<option value="" disabled selected>Rooms</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div>
									<div class="input-wrap">
										<select name="adults" id="adults">
											<option value="" disabled selected>Adults</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div>
									<div class="input-wrap">
										<select name="child" id="child">
											<option value="" disabled selected>Children</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div>
									<div class="input-wrap">
										<div class="price-range-wrap">
											<div class="slider-range">
												<div id="slider-range"></div>
											</div>
											<div class="price-ammount">
												<input type="text" id="amount" name="price"
													placeholder="Add Your Price" />
											</div>
										</div>
									</div>
									<div class="input-wrap">
										<div class="checkboxes">
											<p>
												<input type="checkbox" value="guest-room" id="guest-room">
												<label for="guest-room">Guest Room</label>
											</p>
											<p>
												<input type="checkbox" value="meeting-room" id="meeting-room">
												<label for="meeting-room">Meeting Room </label>
											</p>
											<p>
												<input type="checkbox" value="wifi" id="wifi">
												<label for="wifi">Free Wifi</label>
											</p>
											<p>
												<input type="checkbox" value="pet" id="pet">
												<label for="pet">Pet Friendly</label>
											</p>
											<p>
												<input type="checkbox" value="parking" id="parking">
												<label for="parking">Parking</label>
											</p>
											<p>
												<input type="checkbox" value="pureair" id="pureair">
												<label for="pureair">Pure Air</label>
											</p>
											<p>
												<input type="checkbox" value="airc" id="airc">
												<label for="airc">Air Conditioner</label>
											</p>
											<p>
												<input type="checkbox" value="nosmoke" id="nosmoke">
												<label for="nosmoke">No Smoking</label>
											</p>
										</div>
									</div>
									<div class="input-wrap">
										<button type="submit" class="btn filled-btn btn-block">
											Filter Results <i class="far fa-long-arrow-right"></i>
										</button>
									</div>
								</form>
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
					
					
					
					
					<div class="col-lg-8">
						<div class="row">
						
						
						
						 @foreach($hotelList as $image=>$fi)
						 
						 
						 
						 <?php
			
				$description=strip_tags($fi->description);
				$description=substr($description,0,50);
				
				
				
				?>
				
							<div class="col-md-6">
								<!-- Single Room -->
								<div class="single-room">
									<div class="room-thumb">
									<a href="{{ url('/hoteldetails/'.$fi->id) }}">
                  			 <img  src="{{ asset('uploads/hotels_featured_images/'.$fi->featured_image)}}" alt="{{ $fi->name }}" width="100%" style="height:250px">
											 
									 </a>
									 
									</div>
									<div class="room-desc">
										<div class="room-cat">
											<p>
											<a href="hotel-details.html">
											{{ $fi->city_name }}
											</a>
											</p>
										</div>
										<h4><a href="{{ url('/hoteldetails/'.$fi->id) }}">{{ $fi->name }}</a></h4>
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
						

					    @endforeach
						
						
						</div>
					</div>
					
					
	
					

					<div class="col-12">
						<div class="pagination-wrap">
							<ul class="list-inline">
								<li><a href="#"><i class="far fa-angle-left"></i></a></li>
								<li class="active"><a href="#">01</a></li>
								<li><a href="#">02</a></li>
								<li><a href="#">03</a></li>
								<li><a href="#"><i class="far fa-angle-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Latest Room Section Ends -->
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