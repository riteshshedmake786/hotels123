@include('front.layout.header')

<style>
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
			
			<h3>  </h3>

<div class="container" style="margin-top:30px">

  <ul class="nav nav-tabs" style="margin-top:30px">
    <li ><a data-toggle="tab"  class="active" href="#user">Customer profile</a></li>
    <li><a data-toggle="tab" href="#hotel">Favorites</a></li>
    <li><a data-toggle="tab" href="#supplier">Bookings</a></li>
	
	 <li><a data-toggle="tab" href="#supplier">Payment history</a></li>
    
  </ul>

  <div class="tab-content" >
    <div id="user" class="tab-pane fade in active"  style="margin-top:30px">
      <h3>Customer Profile </h3>
	  

    </div>
    <div id="hotel" class="tab-pane fade"  style="margin-top:30px">
      <h3>Favorites</h3>
	
	  
	  
									
									
									
      
    </div>
    <div id="supplier" class="tab-pane fade" style="margin-top:30px">
      <h3>Bookings</h3>
	  
   
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