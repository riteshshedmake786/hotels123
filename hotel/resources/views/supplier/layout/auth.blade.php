<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="{{asset('supplier_assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="{{asset('supplier_assets/plugins/global/plugins.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('supplier_assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('supplier_assets/css/style.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
	<!-- custom css -->
	<link href="{{asset('supplier_assets/css/custom.css?')}}" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="{{asset('supplier_assets/media/logos/favicon.ico')}}" />
	<!-- Scripts -->
	<script>
	window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
	</script>
</head>
<!--begin::Body-->

<body id="kt_body" style="background-image: url(assets/media/bg/bg-10.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
			<!--begin::Aside-->
			<div class="login-aside d-flex flex-column flex-row-auto col-md-6">
				<!--begin::Aside Top-->
{{--				<div class="d-flex flex-column-auto flex-column">--}}
{{--					<!--begin::Aside header-->--}}
{{--					<a href="#" class="text-center mb-10"> <img src="assets/media/logos/logo-letter-1.png" class="max-h-70px" alt="" /> </a>--}}
{{--					<!--end::Aside header-->--}}
{{--					<!--begin::Aside title-->--}}
{{--					<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">--}}
{{--                        Hotels Venue Supplier--}}
{{--                    </h3>--}}
{{--					<!--end::Aside title-->--}}
{{--				</div>--}}
				<!--end::Aside Top-->
				<!--begin::Aside Bottom-->
				<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center">
					<!-- <img class="h-100 m-auto w-100 w-lg-auto" src="{{asset('image/blank.gif')}}"> -->
				</div>
				<!--end::Aside Bottom-->
			</div>
			<!--begin::Aside-->
			@yield('content')
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
	<script src="{{asset('supplier_assets/plugins/global/plugins.bundle.js?v=7.0.6')}}"></script>
	<script src="{{asset('supplier_assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6')}}"></script>
	<script src="{{asset('supplier_assets/js/scripts.bundle.js?v=7.0.6')}}"></script>
	<!--end::Global Theme Bundle-->
	<!--begin::Page Scripts(used by this page)-->
	<script src="{{asset('supplier_assets/js/pages/custom/login/login-general.js?v=7.0.6')}}"></script>
	<!--end::Page Scripts-->
	<script type="text/javascript">
    function MobileNumber(event) {
      var regex = new RegExp("^[0-9+]");
       var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
           supplier.preventDefault();
          return false;
        }
    }

</script>

</body>
<!--end::Body-->

</html>
