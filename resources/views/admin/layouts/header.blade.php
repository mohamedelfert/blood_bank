<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ !empty($title) ? $title : trans('main.brand') }}</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('/design/admin/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ url('/design/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ url('/design/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ url('/design/admin/plugins/jqvmap/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ url('/design/admin/plugins/datatables/jquery.dataTables.min.js') }}">
        <!-- Theme style -->
        @if(appDirection() == 'ltr')
            <link rel="stylesheet" href="{{ url('/design/admin/dist/css/adminlte.min.css') }}">
        @else
            <link rel="stylesheet" href="{{ url('/design/admin/dist/css/rtl/adminlte.min.css') }}">
            <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="{{ url('/design/admin/dist/css/rtl/custom.css') }}">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600&display=swap" rel="stylesheet">
            <style>
                html,body{
                    font-family: 'Cairo', sans-serif;
                }
            </style>
        @endif
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ url('/design/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ url('/design/admin/plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ url('/design/admin/plugins/summernote/summernote-bs4.min.css') }}">

        <!-- site icon -->
        <link rel="icon" href="">
        <!-- site icon -->

        <!-- myFunctions js -->
        <script src="{{ url('/design/admin/dist/js/myFunctions.js') }}"></script>
        <!-- Toastr -->
        @toastr_css
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
