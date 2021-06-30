@extends('front.layout.header')
@section('content')
<style>
.card {
    transition: 0.3s;
    border-radius: 5px;
    background-color: darkgoldenrod;
    color: white;
    width: 100%;
    -moz-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.1), inset 1px 1px 16px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0px 0px 0px 0px rgb(0 0 0 / 10%), inset 1px 1px 16px rgb(0 0 0 / 20%);
    box-shadow: 0px 0px 0px 0px rgb(0 0 0 / 10%), inset 1px 1px 16px rgb(0 0 0 / 20%);
    margin-bottom: 25px;
}
h5,p,i 
{
    text-align: center;
}
.btn.btn-danger 
{
    margin-bottom: 10px;
    color: #fff;
}
.col-md-12 
{   
margin-top: 20px;
}
form
{ 
margin-left: 20px;
}
</style>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="true">Customer profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="favorites-tab" data-toggle="tab" href="#favorites" role="tab" aria-controls="favorites"
            aria-selected="false" value="favorite" onclick="onCheck(value)">favorites</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="booking-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="booking"
            aria-selected="false">Bookings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment"
            aria-selected="false">payment history</a>
    </li>
</ul>

<div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div
        class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
        <div class="d-flex flex-column-fluid flex-center">
            <div class="row">
                <div class="login-form login-signin col-md-6">
                    <div>
                        <form method="POST" id="form1" action="{{ route('update-profile') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input class="form-control" type="text" id="name" name="full_name" autocomplete="off"
                                    value="{{ $User->name }}">
                                @if ($errors->has('full_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('full_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email_id" autocomplete="off"
                                    value="{{ $User->email }}">
                                @if ($errors->has('email_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mobile_no">Mobile No</label>
                                <input class="form-control" type="number" id="mobile_no" name="mobile"
                                    autocomplete="off" value="{{ $User->mobile }}">
                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                            @if($User->company_name)
                            <div class="form-group">
                                <label for="companyname">Company Name</label>
                                <input class="form-control" type="text" id="companyname" name="company_name"
                                    autocomplete="off" value="{{ $User->company_name }}"
                                    @if($errors->has('company_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            @endif
                            @if($User->company_email)
                            <div class="form-group">
                                <label for="companyemail">Company Email</label>
                                <input class="form-control" type="email" id="companyemail" name="company_email"
                                    autocomplete="off" value="{{ $User->company_email }}"
                                    @if($errors->has('company_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            @endif
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="kt_login_signin_submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Update</button><br><br>
                            </div>
                        </form>
                        <form method="POST" id="form2" action="{{ route('change-password') }}">
                            {{ csrf_field() }}
                            <h3>Change Password</h3>
                            <div class="form-group">
                                <label for="oldpassword">Old Password</label>
                                <input class="form-control" type="password" id="oldpassword" name="old_password"
                                    autocomplete="off" value="">
                                @if($errors->has('old_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="newpassword">New Password</label>
                                <input class="form-control" type="password" id="newpassword" name="new_password"
                                    autocomplete="off" value="">
                                @if($errors->has('new_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword">Confirm Password</label>
                                <input class="form-control" type="password" id="confirmpassword" name="confirm_password"
                                    autocomplete="off" value="">
                                @if($errors->has('confirm_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('confirm_password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="kt_login_signin_submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Change
                                    Password</button><br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="tab-pane fade" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
    <div
        class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
        <div class="d-flex flex-column-fluid flex-center">
            <div class="row">
                <div class="login-form login-signin col-md-12">
                    @foreach($hotelSearch as $hld)
                    <div class="col-md-3 mb-5">
                        <div class="card" id="card">
                            <div> <img src="{{ asset('uploads/hotels_featured_images/'.$hld->feature_image) }}"
                                    width=100% alt="img"> </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $hld->title }}</h5>
                                <p>{{ $hld->sub_title }}</p>
                                <p class="card-text"><i class="fa fa-map-marker marker"></i>&nbsp;{{ $hld->city_name }}
                                </p>
                                <p class="card-text"><i class="fa fa-star star-rating"></i><i
                                        class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i><i
                                        class="fa fa-star star-rating"></i></p>
                                <p class="card-text" style="text-decoration:line-through;"> {{ $hld->cost }} </p>
                                <p class="card-text">AED {{ $hld->offeringPrice }}</p>
                                <center>
                                    <span>
                                        <a href="{{ url('/favoriteRemove/'.$hld->id)}}" class="btn btn-danger">Remove
                                            Favorites</a>
                                    </span>
                                </center>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<div class="tab-pane fade" id="booking" role="tabpanel" aria-labelledby="booking-tab"></div>
<div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab"></div>






<script src="http://hotelsvenues.com/supplier_assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
<script src="http://hotelsvenues.com/supplier_assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
<script src="http://hotelsvenues.com/supplier_assets/js/scripts.bundle.js?v=7.0.6"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="http://hotelsvenues.com/supplier_assets/js/pages/custom/login/login-general.js?v=7.0.6"></script>
<script>
$(document).ready(function(){
    $('#profile-tab').click(function(){
            $('#form1').css({"display":"inherit"});
            $('#form2').css({"display":"inherit"});
            $('#card').css({"display":"none"});
    });
    $('#favorites-tab').click(function(){
        $('#card').css({"display":"inherit"});
            $('#form1').css({"display":"none"});
            $('#form2').css({"display":"none"});
    });
 });
</script>

@endsection