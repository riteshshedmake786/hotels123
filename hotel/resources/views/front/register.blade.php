@include('front.layout.header')

<style>
.help-block strong
{
	color:red;
}
</style>
	<main>




            <section class="contact-form">
			
			@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


            <div class="container ">
                <div class="contact-form-wrap section-bg">
                    <h2 class="form-title">Customer Registration</h2>
                    <form method="POST"  oninput='verify_password.setCustomValidity(verify_password.value != password.value ? "Passwords do not match." : "")'  action="{{ route('insert-user') }}" enctype="multipart/form-data">
                     @csrf
                        <div class="row">
                            <div class="col-md-12 col-12">
							
                                <div class="row" style="margin-bottom:20px"
								>
							<div class="col-md-4 col-12">
								 
								
		                        Register as 
		                    
		   <input class="form-check-input" type="radio" name="user_type"  onclick="user_types(value)" checked style="height:40px" 
		  value="Indiviual">
		   <label>Personal </label>
		             </div>
					 <div class="col-md-4 col-12">

			  <input class="form-check-input" type="radio" name="user_type"  onclick="user_types(value)"  style="height:40px"  
			  value="Company">
			   <label>Company </label>
			        </div>
					
			   

                                </div>
                            </div>
							<div class="col-md-12 col-12">
							 <div class="pb-13 pt-lg-0 pt-5">
                                            <p class="text-muted font-weight-bold font-size-h4">Enter your details to
                                                create your account</p>
                                        </div>
							 </div>
							 
							 
							   <div class="col-md-6 col-12">
                                <div class="input-wrap">
                                    
									<input type="text" placeholder="Your Full Name"   required oninvalid="this.setCustomValidity('Please Enter Full Name')"  oninput="setCustomValidity('')"  name="fullname" value="{{ old('fullname') }}" >

                                    <i class="fab fa-wordpress"></i>
									
								 </div>
								 
								 @if ($errors->has('fullname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('fullname') }}</strong>
                                                </span>
                                            @endif
                            </div>

							
							
                            <div class="col-md-6 col-12">
                                <div class="input-wrap">
                                    <input  name="email" type="email" placeholder="Your Email"  required="" oninvalid="this.setCustomValidity('Please Enter Valid Email')"   oninput="setCustomValidity('')" id="email" value="{{ old('email') }}" >
                                    <i class="far fa-envelope"></i>
                                </div>
								@if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                            </div>
                          
						  
						    <div class="col-md-6 col-12">
                                <div class="input-wrap">
                                    <input type="password" placeholder="Password"  name="password" required="" oninvalid="this.setCustomValidity('Please Enter Password')"  oninput="setCustomValidity('')"  id="password" value="{{ old('password') }}" >
                                   <i class="fas fa-key"></i>
                                </div>
								  @if ($errors->has('password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                            </div>
							
							
							
							 <div class="col-md-6 col-12">
                                <div class="input-wrap">
                                    <input type="password" placeholder="Confirm Password"  name="verify_password" id="verify_password"  required oninvalid="this.setCustomValidity('Please Enter Verify Password')"  oninput="setCustomValidity('')" value="{{ old('verify_password') }}"  >
                                    
									<i class="fas fa-key"></i>
                                </div>
                            </div>
							
							 
                                           <div class="col-md-6 col-12">
										   <div class="input-wrap">
                                                <input
                                                     type="text" 
                                                    disabled type="location" placeholder="UAE" name="country" id="country"
                                                    autocomplete="off" value="UAE"/>
                                                @if ($errors->has('location'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('location') }}</strong>
                                                </span>
                                                @endif
												
												<span class="error country_error"> </span>
												</div>
												
												
												
                                            </div>
                                            <div class="col-md-6 col-12">
											<div class="input-wrap">
                                                <select name="city"  id="city"  value="{{ old('city') }}"  >
                                                    <option value="">City</option>
                                                    @foreach($city as $i=>$value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
												<span class="error city_error"> </span>
												</div>
                                            </div>
                             
							 

                             <div class="col-md-12 col-12">
                                <div class="input-wrap">
                                    <input type="text" placeholder="Area"  name="area" id="area" required oninvalid="this.setCustomValidity('Please Enter Area')"  oninput="setCustomValidity('')" value="{{ old('area') }}" >
                                    
									<i class="fas fa-address-card"></i>
                                </div>
								
								  @if ($errors->has('area'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('area') }}</strong>
                                                </span>
                                                @endif
                            </div>
							
							<div class="col-md-2 col-12"  >
							  <div class="input-wrap">
                                          
												
												<input
                                                     type="text" 
                                                    disabled type="location" placeholder="+971 " name="country" id="country"
                                                  style="background: #ccc;" autocomplete="off" value="+971"/>
                                               
												
							  </div>
                            </div>			
                            <div class="col-md-2 col-12" >
							  <div class="input-wrap" >							
                                            	<input
                                                     type="text" 
                                                    disabled type="location" placeholder="5" name="country" id="country"
													style="background: #ccc;"
                                                    autocomplete="off" value="5"/>
                               </div>
                            </div>

                            <div class="col-md-8 col-12">
							  <div class="input-wrap">							
												<input
                                                    class=""
                                                    name="mobile" id="mobile_no" style="width: 100%;" 
                                                    type="number" placeholder="Mobile No"  required oninvalid="this.setCustomValidity('Please Enter Mobile')"  oninput="setCustomValidity('')" value="{{ old('mobile') }}" >
                                         </div>

			@if ($errors->has('mobile'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                                @endif										 
                                 </div> 
                               								 
												   
												   
                                            </div>
											
											
											
							<div class="row">

                                <div class="col-md-6 col-12" id="company_name">
                                <div class="input-wrap">
                                    
									<input type="text" placeholder="Company  Name"   name="company_name" value="{{ old('company_name') }}" >

                                    <i class="fab fa-wordpress"></i>
									
								 </div>
								 
							
                            </div>
							
							
							  <div class="col-md-6 col-12" id="company_email">
                                <div class="input-wrap">
                                    
									<input type="text" placeholder="Company  Email"   name="company_email" value="{{ old('company_email') }}" >

                                    <i class="fab fa-wordpress"></i>
									
								 </div>
								 
							
                            </div>

                        </div>							
										


                           <div class="row" style="margin-bottom:20px"
								>
										
							 <div class="col-md-1 col-12">
										   <div class="input-wrap">	
							    <input type="checkbox" id="terms-checkbox" required  name="agree" value="true"
                                                    style="height:40px; margin-right: 10px; margin-left: 0;"/>
							  </div>
							  
							  </div>
							  
							   <div class="col-md-11 col-12">
										   <div class="input-wrap">	
							  
                                                {{--                                                <a href="{{ asset('/front_assets/HOTEL_VENUES_PLATFORM.pdf') }}" target="_blank" preview="">&nbsp;  &nbsp;</a>--}}
                                                I Accept the <a data-toggle="modal" data-tab="true"
                                                                data-target="#tandc-modal"
                                                                class="font-color-darkgoldenrod"> terms and
                                                    conditions </a> and zero-tolerance policy on spam.
							  </div>
							  
							   @if ($errors->has('agree'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('agree') }}</strong>
                                                </span>
                                            @endif
							  
							  </div>
							  
							  </div>
							  
							  
							  
							 
							  
							  
				
                            <div class="col-12 text-center">
                                <button type="submit" class="btn filled-btn">Submit <i
                                        class="far fa-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
 




















	</main>
	<!-- Main Wrap end -->
	<!-- Footer Start -->

  <script>
  function user_types(value)
  {
	  if(value =='Indiviual')
	  {
		  $('#company_name').hide();
		  $('#company_email').hide();
		 
	  }
	  else
	  {
		   $('#company_name').show();
		  $('#company_email').show();
	  }
	  
	  
  }
  
  </script>
  <style>
  #company_name , #company_email
  {
	  display:none;
  }
  </style>
  
@include('front.layout.footer')