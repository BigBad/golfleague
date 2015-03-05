<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Four Loko Golf League</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href=<?php echo asset('LTE/bootstrap/css/bootstrap.min.css')?> rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href=<?php echo asset('LTE/dist/css/font-awesome.min.css')?> rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href=<?php echo asset('LTE/dist/css/ionicons.min.css')?> rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href=<?php echo asset('LTE/dist/css/AdminLTE.min.css')?> rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href=<?php echo asset('LTE/dist/css/skins/skin-green.min.css')?> rel="stylesheet" type="text/css" />
    @yield('first-css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-green">
<!-- Site wrapper -->
<div class="wrapper">
    @include('template.header')

   <div class="wrapper row-offcanvas row-offcanvas-left">
        @include('template.sidebar')

        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>@yield('page-header')</h1>
                <ol class="breadcrumb">@yield('breadcrumb')</ol>
            </section>

            <!-- Main content -->
            <section class="content">@yield('content')</section>
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->


</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src=<?php echo asset('LTE/plugins/jQuery/jQuery-2.1.3.min.js')?>></script>
<!-- Bootstrap 3.3.2 JS -->
<script src=<?php echo asset('LTE/bootstrap/js/bootstrap.min.js')?> type="text/javascript"></script>
<!-- SlimScroll -->
<script src=<?php echo asset('LTE/plugins/slimScroll/jquery.slimscroll.min.js')?> type="text/javascript"></script>
<!-- FastClick -->
<script src=<?php echo asset('LTE/plugins/fastclick/fastclick.min.js')?>></script>
<!-- AdminLTE App -->
<script src=<?php echo asset('LTE/dist/js/app.min.js')?> type="text/javascript"></script>
@yield('include-js', '')

@yield('page-js', '')

@yield('onload', '')
</body>
</html>