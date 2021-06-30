{{-- @extends('supplier.layout.auth') --}}

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="25FoLJqIzTvTVK89GxR6qnMogMhrGQ7Ng6VFAj5e">
    <title>Hotels Venues</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="http://hotelsvenues.com/supplier_assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6"
        rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="http://hotelsvenues.com/supplier_assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet"
        type="text/css" />
    <link href="http://hotelsvenues.com/supplier_assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6"
        rel="stylesheet" type="text/css" />
    <link href="http://hotelsvenues.com/supplier_assets/css/style.bundle.css?v=7.0.6" rel="stylesheet"
        type="text/css" />
    <link href="http://hotelsvenues.com/supplier_assets/css/custom.css?" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="http://hotelsvenues.com/supplier_assets/media/logos/favicon.ico" />
    <!-- Scripts -->
    <script>
    window.Laravel = {
        "csrfToken": "25FoLJqIzTvTVK89GxR6qnMogMhrGQ7Ng6VFAj5e"
    }
    </script>
</head>
<!--begin::Body-->

<body id="kt_body" style="background-image: url(assets/media/bg/bg-10.jpg)"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
            id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside d-flex flex-column flex-row-auto col-md-6" style="background-color: #F2C98A;">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column">
                    <!--begin::Aside header-->
                    <a href="#" class="text-center mb-10"> <img src="assets/media/logos/logo-letter-1.png"
                            class="max-h-70px" alt=""> </a>
                    <!--end::Aside header-->
                    <!--begin::Aside title-->
                    <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">
                        Customer Registration
                    </h3>
                    <!--end::Aside title-->
                </div>
                <!--end::Aside Top-->
                <!--begin::Aside Bottom-->
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center">
                    <img class="h-300px h-lg-550px" src="{{asset('image/login.png')}}">
                </div>
                <!--end::Aside Bottom-->
            </div>
            <!--begin::Aside-->


            <!--begin::Signup-->
            <div class="login-form login-signup m-auto">


                    <!--begin::Title-->
                    <div class="pb-4 pt-lg-0 pt-5">
                        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg" style="margin-top: 17px;">
                            Sign Up</h3>
                        <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account
                        </p>
                    </div>
                    <!--end::Title-->


                <form class="form" id="company_form" novalidate="novalidate" role="form" method="POST" action="{{ route('insert-user') }}" enctype="multipart/form-data">
                    @csrf
                    <label class="frm_primary_label">Sign up as:<span class="frm_required">*</span> </label>
                    <br>
                    <input type="radio" name="user_type" value="Indiviual" id="individual" onclick="onCheck(value)" checked>
                    <label for="individual">Indiviual</label>&nbsp;&nbsp;
                    <input type="radio" name="user_type" value="Company" id="company" onclick="onCheck(value)">
                    <label for="company">Corporate</label><br>
                    <span class="text-danger">{{ $error }}</span>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                            type="text" id="full_name" placeholder="Full Name" name="fullname" value="" autocomplete="off"><br>
                        <span style="color:red;">@error('fullname'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                            type="email" id="email_id" placeholder="Email" name="email" autocomplete="off" value=""><br>
                        <span style="color:red;">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                            type="Password" id="pass" placeholder="Password" name="password" autocomplete="off" value=""><br>
                        <span style="color:red;">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                            type="number" id="mobile_no" placeholder="Mobile No" name="mobileno" autocomplete="off" value="" onkeypress="return MobileNumber(event);"><br>
                        <span style="color:red;">@error('mobileno'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                            type="text" id="companyname" placeholder="Company Name" name="company_name" autocomplete="off" value="" style="display:none;">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                            type="email" id="companyemail" placeholder="Company Email" name="company_email" autocomplete="off" value="" style="display:none;">
                    </div>
                    <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                        <button type="submit" id="kt_login_signup_submit"
                            class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4 submitButton">Sign Up</button>
                        <!-- <button id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4 ">Submit</button> -->
                        <a href="http://hotelsvenues.com/merchant/login" id="kt_login_signup_cancel"
                            class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 ">Cancel</a>
                    </div>
                    <!--end::Form group-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signup-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->

    <script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="http://hotelsvenues.com/supplier_assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
    <script src="http://hotelsvenues.com/supplier_assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
    <script src="http://hotelsvenues.com/supplier_assets/js/scripts.bundle.js?v=7.0.6"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="http://hotelsvenues.com/supplier_assets/js/pages/custom/login/login-general.js?v=7.0.6"></script>
    <script>
    $(document).ready(function(){
        $('#individual').click(function(){
            if($(this).is(":checked")){
                $('#company_form').css({"display":"inherit"});
                $('#companyname').css({"display":"none"});
                $('#companyemail').css({"display":"none"});
            }
        });
        $('#company').click(function(){
            if($(this).is(":checked")){
                $('#company_form').css({"display":"inherit"});
                $('#companyname').css({"display":"inherit"});
                $('#companyemail').css({"display":"inherit"});
            }
        });
     });
   </script>
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


    <!--end::Page Scripts-->

    <!--end::Body-->


</body>


</html>
