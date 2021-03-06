<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/all.min.css')}}">
    <link href="{{ URL::asset('assets/css/material-dashboard-arabic.css')}}" rel="stylesheet"/>
@yield('css_includes')
    @yield('style')
<!-- CSS Files -->
    <!-- date rang picker -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/daterangepicker.min.css')}}">
    <!-- select2 -->
    <link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/js/plugins/nanobar.min.js')}}"></script>
    @yield('script_head')
</head>
