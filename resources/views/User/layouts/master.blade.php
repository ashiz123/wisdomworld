<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset( 'css/custom.css' ) }}"> --}}
    <link rel="stylesheet" href="{{ asset( 'bower_components/bootstrap/dist/css/bootstrap.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'bower_components/font-awesome/css/font-awesome.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'bower_components/Ionicons/css/ionicons.min.css' ) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="{{ asset( 'css/user.css' ) }}">
    
    @stack('userhead')
    <title>Document</title>
</head>
<body>
    @yield('header')
    @yield('navigation')
    @yield('content')
    @yield('footer')
    <script src=" {{ asset( 'bower_components/jquery/dist/jquery.min.js' ) }} "></script>
    <script src="{{ asset( 'bower_components/jquery-ui/jquery-ui.min.js' ) }}"></script>
    <script src="{{ asset( 'js/jquery-form/dist/jquery.form.min.js' ) }}"></script>
    <script src="{{ asset( 'bower_components/bootstrap/dist/js/bootstrap.min.js' ) }}"></script>
    <script src="{{ asset( 'js/popper.js/dist/popper.js' ) }}"></script>
    <script src="{{ asset( 'js/custom.js' ) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    
    
    @stack('userfoot')

    
</body>
</html>