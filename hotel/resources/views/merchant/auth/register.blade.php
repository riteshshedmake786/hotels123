@extends('merchant.layout.auth')

@section('content')


<!--begin::Signup-->
<div class="login-form login-signup m-auto">
    <!--begin::Form-->
    <form class="form" novalidate="novalidate" role="form" method="POST" action="{{ url('/merchant/register') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
        <!--begin::Title-->
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg" style="margin-top: 17px;">Sign Up</h3>
            <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
        </div>
        <!--end::Title-->

        <!--begin::Form group-->
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="Hotel Name" name="company_name" value="{{ old('company_name') }}"  autocomplete="off"/>

            @if ($errors->has('company_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('company_name') }}</strong>
                </span>
            @endif
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" value="{{old('email')}}" />
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="location" placeholder="Location" name="location" autocomplete="off" value="{{old('location')}}" />
            @if ($errors->has('location'))
                    <span class="help-block">
                        <strong>{{ $errors->first('location') }}</strong>
                    </span>
                @endif
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="landline_no" placeholder="Landline No" name="landline_no" autocomplete="off" value="{{old('landline_no')}}" onkeypress="return MobileNumber(event);" />

                    @if ($errors->has('landline_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('landline_no') }}</strong>
                        </span>
                    @endif
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="mobile_no" placeholder="Mobile No" name="mobile_no" autocomplete="off" value="{{old('mobile_no')}}" onkeypress="return MobileNumber(event);">

                    @if ($errors->has('mobile_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile_no') }}</strong>
                        </span>
                    @endif
        </div>
        <!--end::Form group-->

         <!--begin::Form group-->
        <div class="form-group">
            Upload trade licence:
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" placeholder="Upload trade licence" type="file" name="m_img" autocomplete="off" value="{{old('m_img')}}" />
            @if ($errors->has('m_img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('m_img') }}</strong>
                    </span>
                @endif
            </div>
            <!--end::Form group-->
            <div class="form-group">
                <p>Your privacy is important to us and we will never  share your personal details</p>
                <p>details with third parties please see our strict<a href="{{ asset('/front_assets/HOTEL_VENUES_PLATFORM.pdf') }}" download="">&nbsp; privacy policy &nbsp;</a> for further information</p>
            </div>
            <!--begin::Form group-->
        <div class="form-group" style="padding-top: 10px;">
            <label class="checkbox mb-0">
                <input type="checkbox" id="checkbox" name="agree" value="true" style="margin-right: 10px;"/>
                <span></span>&nbsp;&nbsp;&nbsp;
                I Accept the <a href="{{ asset('/front_assets/HOTEL_VENUES_PLATFORM.pdf') }}" download="">&nbsp; terms and conditions &nbsp; </a> and zero-tolerance policy on spam.

            </label>
            @if ($errors->has('agree'))
                    <span class="help-block">
                        <strong>{{ $errors->first('agree') }}</strong>
                    </span>
                @endif
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
            <button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4 submitButton">Submit</button>
            <!-- <button id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4 ">Submit</button> -->
            <a href="{{ url('/merchant/login') }}" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 ">Cancel</a>
        </div>
        <!--end::Form group-->
    </form>
    <!--end::Form-->
</div>
<!--end::Signup-->
@endsection
@section('pagescript')
<!-- <script>
    $(function(){
        $("#checkbox").click(function(){
            var checkoutCheck = $(this).is(":checked");

            if ( checkoutCheck ){
                $(".submitButton").show();
                return true;
            }
            $(".submitButton").hide();
        });

    });
</script> -->
<script>
     function MobileNumber(event) {
      var regex = new RegExp("^[0-9+]");
      var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
          event.preventDefault();
          return false;
      }
    }
</script>
@endsection
