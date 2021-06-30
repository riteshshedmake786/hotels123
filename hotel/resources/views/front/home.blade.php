@include('front.layout.header')

	<main>

		<!-- Hero Section Start -->
		<section class="hero-section" id="heroSlideActive">
			<div class="single-hero-slide bg-img-center d-flex align-items-center text-center"
				style="background-image: url({{asset('front_end/img/slide/1.jpeg')}});">
				<div class="container">
					<div class="slider-text">
						<span class="small-text" data-animation="fadeInDown" data-delay=".3s"> Your Budget, Your Event, Your Way.</span>
					
					</div>
				</div>
				
			</div>
			<div class="single-hero-slide bg-img-center d-flex align-items-center text-center"
				style="background-image: url({{asset('front_end/img/slide/2.jpeg')}});">
				<div class="container">
					<div class="slider-text">
						<span class="small-text" data-animation="fadeInDown" data-delay=".3s"> Your Budget, Your Event, Your Way.</span>
					
					</div>
				</div>
				
			</div>
		</section>
		<!-- End Hero Section -->
		<!-- Book Form Start -->
		<section class="booking-section">
			<div class="container-fluid">
				<div class="booking-form-wrap bg-img-center section-bg">
					<form id="bookIng-form" method="post" action="{{ url('/hotelLists') }}">
					
					@csrf <!-- {{ csrf_field() }} -->

						<div class="row">
						
							
							
							<div class="col-lg-3 col-md-6">
								<div class="input-wrap">
								<label class="label_color">Location</label>
									<select name="city" id="city">
										 @foreach($city as $i=>$value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->name }}
                                                    </option>
                                         @endforeach
									
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="input-wrap">
								<label class="label_color">Event Type</label>
									<select name="event_type" id="event_type">
										 @foreach($event as $i=>$value)
                                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                         @endforeach
									
									</select>
								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								<div class="input-wrap">
								<label class="label_color">Guests</label>
									<select name="guests" id="guests">
										
                                                    <option class="level-1" value="100">100-200</option>
                                                    <option class="level-0" value="200">201-400</option>
                                                    <option class="level-0" value="400">401-600</option>
                                                    <option class="level-0" value="600">601-800</option>
                                                    <option class="level-0" value="800">801-1000</option>
                                                    <option class="level-0" value="1000">1000 Above</option>
									
									</select>
								</div>
							</div>
							
							<div class="col-lg-2 col-md-6">
								<div class="input-wrap">
								  <label class="label_color">Budget Per Guests</label>
									<select name="budget" id="budget">
									<option class="level-1" value="0">Below 100</option>
                                                    <option class="level-1" value="100">100-200</option>
                                                    <option class="level-0" value="200">201-400</option>
                                                    <option class="level-0" value="400">401-600</option>
                                                    <option class="level-0" value="600">601-800</option>
                                                    <option class="level-0" value="800">801-1000</option>
                                                    <option class="level-0" value="1000">1000 Above</option>
										
									</select>
								</div>
							</div>
							
							<div class="col-lg-2 col-md-6">
								<div class="input-wrap">
								 <label> </label>
									<button type="submit" class="btn filled-btn btn-block">
										Search<i class="far fa-search"></i>
									</button>
								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</section>
		<!-- Book Form End -->
		
		
		
		        <section class="latest-product section-padding">
            <div class="container-fluid">
                <!-- Section Title -->
                <div class="section-title text-center">
                    
                    <h1 class="color_darkgoldenrod">Choose Your Event Type</h1>
                </div>
				
				<div class="row">
				
				  <div class="col-lg-6 col-md-6" style="border-right: solid darkgoldenrod 1px;">
				  <h3 class="color_darkgoldenrod text-center	">Social</h3>
				  </div>
				  
				  <div class="col-lg-6 col-md-6">
				  <h3 class="color_darkgoldenrod text-center	">Corporate</h3>
				  </div>
				  
				</div>
				
				
                <div class="row" >
				
				 <div class="col-lg-6 col-md-6" style="border-right: solid darkgoldenrod 1px;">
				 <div class="row" style="margin-top:30px">
				 
				 
				  @foreach($event_social as $i=>$value)
                    <div class="col-lg-6 col-md-6 nopadding">
                        <!-- Single feature boxes -->
                        <div class="product-box text-center width_95">
						    <div class="product-head" >
							  <a class="white"  href=""> {{ $value->title }} </a>
							</div>
                            <div class="product-img">
                                <img  src="{{ asset('storage/eventTypeImg/'.$value->image)}}" alt="{{ $value->title }}">
                            </div>
                           
                        </div>
                    </div>
					
				  @endforeach

				  
			      </div>
              
             
                 </div>
				 
				 
				 <div class="col-lg-6 col-md-6" style="">
				 <div class="row" style="margin-top:30px">
				 
				  @foreach($event_corporate as $i=>$value)
                    <div class="col-lg-6 col-md-6 nopadding">
                        <!-- Single feature boxes -->
                        <div class="product-box text-center width_95">
						    <div class="product-head" >
							  <a class="white"  href=""> {{ $value->title }} </a>
							</div>
                            <div class="product-img">
                                <img  src="{{ asset('storage/eventTypeImg/'.$value->image)}}" alt="{{ $value->title }}">
                            </div>
                           
                        </div>
                    </div>
					
				  @endforeach
					</div>
              
             
                 </div>
				 
				 
                
                </div>
            </div>
        
        </section>
        <!-- Latest Product end -->
  
		
		
		<!-- Welcome section start -->
		<section class="welcome-section section-padding">
			<div class="container-fluid">
				<div class="row align-items-center no-gutters">
					<!-- Tile Gallery -->
					<div class="col-lg-4">
						<div class="tile-gallery">
							<img src="{{asset('front_end/img/tile-gallery/01.jpg')}}" alt="About Us">
							
							
							
						</div>
					</div>
					<!-- End tile Gallery -->
					<div class="col-lg-7 offset-lg-1">
						<!-- Section Title -->
						<div class="section-title">
							<span class="title-top with-border">About Us</span>
							<h1>Welcome To HotelsVenus</h1>
							<p>Throughout the years, Hotels Venues team have built connections with events managers and hotel venues to providing comprehensive platform to search and book for venues for special occasions. HotelsVenues.com is a unique platform that makes thousands of venues in UAE a click away, thus, delivering business owners and customers satisfaction in minimal time consumption, and avoids venues over booking or cancellation. Our platform permits its users to search and reserve their most suitable venue and search for related supplier at a glance according to their desired district, guest numbers and budget per guest, venue start rating, preferred schedule, and Budget. HotelsVenues.com is committed to providing venues and caterings at competitive prices, making it consumer’s No.1 platform for their occasions.</p>
						</div>
			      </div>
				</div>
			</div>
		</section>
		<!-- Welcome section End -->
		
		
		

	
		
				<section class="section-bg ">
			<div class="container-fluid">
			
			<div class="row">
			
			 <div class="col-lg-4 col-md-4">
			 
			  <h3 class="color_darkgoldenrod">Featured Hotels</h3>
			
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  
			   @foreach($hotel_featured as $i=>$value)
			    <?php
				if($i==0)
				{
					$active = 'active';
				}
				else
				{
					$active = '';
				}
				
				$description=strip_tags($value->description);
				$description=substr($description,0,50);
				
				
				
				?>
				<div class="carousel-item <?php echo $active ?>">
				     	<div class="single-room" style="background:#000000">
							<div class="room-thumb">
								
								
								
								 <img  src="{{ asset('uploads/hotels_featured_images/'.$value->featured_image)}}" alt="{{ $value->name }}" width="100%">
								 
								

							</div>
							<div class="room-desc">
								<div class="room-cat">
									<p style="color:#FFF">Popular</p>
								</div>
								<h4><a href="" style="color:#FFF" >{{ $value->name }}</a></h4>
								<p style="color:#FFF">
									<?php echo $description?>
									
								</p>
								<ul class="room-info list-inline">
									<li style="color:#FFF"><i class="far fa-bed"></i>3 Bed</li>
									<li style="color:#FFF"><i class="far fa-bath"></i>2 Baths</li>
									<li style="color:#FFF"><i class="far fa-ruler-triangle"></i>72 m</li>
								</ul>
								<div class="room-price">
									<p>$205.00</p>
								</div>
							</div>
						</div>
						
						
				</div>
				
	          @endforeach
				
				
				
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
            </div>
			
			</div>
			
			
			 <div class="col-lg-8 col-md-8">
			 
			  <h3 class="color_darkgoldenrod text-center">Hotel Lists</h3>
			  
			   <div class="row">
			   
			   
			       @foreach($hotel_featured as $i=>$value)
			    <?php
				
				$description=strip_tags($value->description);
				$description=substr($description,0,50);
			     ?>
			   
			                      <div class="col-lg-6 col-md-6">
									<div class="single-room" style="background:#FFF">
									<div class="room-thumb">
									
									
										<img src="{{ asset('uploads/hotels_featured_images/'.$value->featured_image)}}" width="100%"  style="height:210px" alt="Room">
										
										
										 
									</div>
									<div class="room-desc1">
											<div class="room-cat" style="background:#000; padding:5px">
											<p style="text-align:center;color:#FFF">{{ $value->name }}</p>
										
											<p style="text-align:center;color:#FFF">
											<a href="">View More</a></p>
										</div>
									
										
									</div>
									</div>
									</div>
						
						      
			            
						
					    @endforeach	
			  
		       </div>
			   
			  
			  
			 </div>

			 
			  
			</div>
			
			
		</div>
		</section>
	






    		
		    <section class="latest-product section-padding">
            <div class="container-fluid">
                <!-- Section Title -->
                <div class="section-title text-center">
                    
                    <h1 class="color_darkgoldenrod">Suppliers List</h1>
                </div>
				
				
				
				
                <div class="row" >
				
				 @foreach($supplierlist as $i=>$value)
                    <div class="col-lg-4 col-md-6" >
                        <!-- Single feature boxes -->
                        <div class="product-box text-center">
						    <div class="product-head" >
							 
							 <a class="white"  href="/getsupplierlist/{{ $value->title }}"> {{ $value->title }} </a>
							</div>
                            <div class="product-img">
                         
								
								<img  style="width:100%" src="{{ asset('storage/supplierTypeImg/'.$value->image)}}" alt="{{ $value->title }}">
                            </div>
                           
                        </div>
                    </div>
					
                   @endforeach

					</div>
              
             
               
				 
	          
            </div>
           
        </section>
        <!-- Latest Product end -->
	
		
		
  
	</main>
	<!-- Main Wrap end -->
	<!-- Footer Start -->

@include('front.layout.footer')