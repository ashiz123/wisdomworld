<html>
<head>
    @show
    <title> @yield('title')</title>

    {{--css start--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset( 'bower_components/bootstrap/dist/css/bootstrap.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'bower_components/font-awesome/css/font-awesome.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'bower_components/Ionicons/css/ionicons.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'dist/css/AdminLTE.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'css/custom.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'toastr/build/toastr.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'dist/css/skins/_all-skins.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'bower_components/morris.js/morris.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'bower_components/jvectormap/jquery-jvectormap.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'bower_components/bootstrap-daterangepicker/daterangepicker.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ) }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .body-container
        {
            background: white;
            z-index: 800;
            height: 700px;
        }


         .invalid-feedback
         {
             color:red !important;
         }

      </style>


    @stack('head')
    {{--css end--}}

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @yield('navigation')
    @yield('sidebar')
    <div class="content-wrapper container-padding" style="background-color: white">

            @yield('content')

    </div>
    @yield('footer')
</div>




     {{--js start--}}
    {{--<script src="{{ asset( 'static/vendor/jquery2/jquery.js' ) }}"></script>--}}

    <script src=" {{ asset( 'bower_components/jquery/dist/jquery.min.js' ) }} "></script>
    <script src="{{ asset( 'bower_components/jquery-ui/jquery-ui.min.js' ) }}"></script>
    <script src="{{ asset( 'js/jquery-form/dist/jquery.form.min.js' ) }}"></script>
    <script src="{{ asset( 'js/popper.js/dist/popper.js' ) }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset( 'bower_components/bootstrap/dist/js/bootstrap.min.js' ) }}"></script>

    <!-- Morris.js charts -->
    <script src="{{ asset( 'bower_components/raphael/raphael.min.js' ) }}"></script>
    <script src="{{ asset( 'bower_components/morris.js/morris.min.js' ) }}"></script>


    <!-- Sparkline -->
    <script src="{{ asset( 'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js' ) }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset( 'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ) }}"></script>
    <script src="{{ asset( 'plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ) }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset( 'bower_components/jquery-knob/dist/jquery.knob.min.js' ) }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset( 'bower_components/moment/min/moment.min.js' ) }}"></script>
    <script src="{{ asset( 'bower_components/bootstrap-daterangepicker/daterangepicker.js' ) }}"></script>
    <!-- datepicker -->
    <script src="{{ asset( 'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ) }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset( 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ) }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset( 'bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ) }}"></script>
    <script src=" {{asset('js/bootstrap-confirmation2/dist/bootstrap-confirmation.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset( 'bower_components/fastclick/lib/fastclick.js' ) }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset( 'dist/js/adminlte.min.js' ) }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset( 'dist/js/pages/dashboard.js' ) }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset( 'dist/js/demo.js' ) }}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset( 'vendor/unisharp/laravel-ckeditor/ckeditor.js' )}}"></script>
    <script src="{{ asset( 'toastr/build/toastr.min.js' ) }}"></script>



    {{--js end--}}
@stack('foot')
</body>
</html>