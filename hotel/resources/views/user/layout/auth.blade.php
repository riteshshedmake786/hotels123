<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{asset('supplier_assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('supplier_assets/plugins/global/plugins.bundle.css?v=7.0.6')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('supplier_assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('supplier_assets/css/style.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('supplier_assets/css/custom.css?')}}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{asset('supplier_assets/media/logos/favicon.ico')}}"/>
    <script>
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token() ]); ?>
    </script>

    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
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
    <script src="{{asset('supplier_assets/plugins/global/plugins.bundle.js?v=7.0.6')}}"></script>
    <script src="{{asset('supplier_assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6')}}"></script>
    <script src="{{asset('supplier_assets/js/scripts.bundle.js?v=7.0.6')}}"></script>
    <script src="{{asset('supplier_assets/js/pages/custom/login/login-general.js?v=7.0.6')}}"></script>
    @yield('pagescript')
</head>
<body id="kt_body"
      class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <div class="login-aside d-flex flex-column flex-row-auto ml-0">
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center">
                    <img class="h-100 w-100 w-lg-auto" src="{{asset('image/customer_login.gif')}}">
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</body>


</html>
