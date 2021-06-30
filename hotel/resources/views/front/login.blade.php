@include('front.layout.header')

<style>
#forgot_password{
    position: absolute;
    right: 130px;
    bottom: 195px;
} 

.help-block strong
{
	color:red;
}
.active

{
	display: block ! IMPORTANT;
    opacity: 1 ! IMPORTANT;
}
ul.nav-tabs li a
{
	    padding: 10px 20px;
  
}
ul.nav-tabs li a.active
{
	background:#fea116;
}

</style>
 
	<main>




            <section class="contact-form">
			

<div class="container" style="margin-top:30px">
  <h2>Are You  SignIn as a:</h2>
  <ul class="nav nav-tabs" style="margin-top:30px">
    <li ><a data-toggle="tab"  class="active" href="#user">User</a></li>
    <li><a data-toggle="tab" href="#hotel">Hotel</a></li>
    <li><a data-toggle="tab" href="#supplier">Supplier</a></li>
    
  </ul>

  <div class="tab-content" >
    <div id="user" class="tab-pane fade in active"  style="margin-top:30px">
      <h3>User Sign In</h3>
	  
	   <form class="form" id="frm1" role="form" method="POST" action="{{ url('/user/login-user') }}">
                                        {{ csrf_field() }}
                                          <div class="col-md-12 col-12">
                                            <div class="input-wrap">
											 <input  name="email" type="email" placeholder="Your Email"  required="" oninvalid="this.setCustomValidity('Please Enter Valid Email')"   oninput="setCustomValidity('')" id="email" value="{{ old('email') }}" >
											</div>
											
											@if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
											
											</div>
											
											
											
											<div class="col-md-12 col-12">
                                            <div class="input-wrap">
											 <input  name="password" type="password" placeholder="Your Password"  required="" oninvalid="this.setCustomValidity('Please Password')"   oninput="setCustomValidity('')" id="password" value="{{ old('password') }}" >
											</div>
											
											@if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
											
											</div>
								
                                      
                                        <div class="clearfix action">
                                            <div class="form-group ">
                                                <button type="submit" class="btn filled-btn">Sign In
                                                </button>
                                                <a href="javascript:;"id="forgot_password" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">
                                                    Forgot Password ?
                                                </a>
                                            </div>
									    </div>		
											
						 </form>
						 
   
    </div>
    <div id="hotel" class="tab-pane fade"  style="margin-top:30px">
      <h3>Hotel Sign In</h3>
	  
	   <form class="form" id="frm2" role="form" method="POST" action="{{ url('/merchant/login') }}">
                                        {{ csrf_field() }}
										
										 <div class="col-md-12 col-12">
                                            <div class="input-wrap">
											 <input  name="email" type="email" placeholder="Your Email"  required="" oninvalid="this.setCustomValidity('Please Enter Valid Email')"   oninput="setCustomValidity('')" id="email" value="{{ old('email') }}" >
											</div>
											
											@if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
											
											</div>
											
											
											
											<div class="col-md-12 col-12">
                                            <div class="input-wrap">
											 <input  name="password" type="password" placeholder="Your Password"  required="" oninvalid="this.setCustomValidity('Please Password')"   oninput="setCustomValidity('')" id="password" value="{{ old('password') }}" >
											</div>
											
											@if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
											
											</div>
								
                                      
                                        <div class="clearfix action">
                                            <div class="form-group ">
                                                <button type="submit" class="btn filled-btn">Sign In
                                                </button>
                                                <a href="javascript:;"id="forgot_password" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">
                                                    Forgot Password ?
                                                </a>
                                            </div>
									    </div>	
		</form>

		
	  
	  
									
									
									
      
    </div>
    <div id="supplier" class="tab-pane fade" style="margin-top:30px">
      <h3>Supplier Sign In</h3>
	  
	  <form class="form"id="frm3" role="form" method="POST" action="{{ url('/supplier/login') }}">
                                        {{ csrf_field() }}
										
			  <div class="col-md-12 col-12">
                                            <div class="input-wrap">
											 <input  name="email" type="email" class="required" placeholder="Your Email"  required="" oninvalid="this.setCustomValidity('Please Enter Valid Email')"   oninput="setCustomValidity('')" id="email" value="{{ old('email') }}" >
											</div>
											
											@if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
											
											</div>
											
											
											
											<div class="col-md-12 col-12">
                                            <div class="input-wrap">
											 <input  name="password" type="password" placeholder="Your Password" class="required" required="" oninvalid="this.setCustomValidity('Please Password')"   oninput="setCustomValidity('')" id="password" value="{{ old('password') }}" >
											</div>
											
											@if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
											
											</div>
								
                                      
                                        <div class="clearfix action">
                                            <div class="form-group ">
                                                <button type="submit" class="btn filled-btn">Sign In
                                                </button>
                                                <a href="javascript:;"id="forgot_password" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">
                                                    Forgot Password ?
                                                </a>
                                            </div>
									    </div>	
										
	  </form>
	  
      
    </div>
  
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