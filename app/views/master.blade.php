
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- bootstrap 3.2.0 -->
    <link href="<?php echo asset('LTE/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo asset('LTE/dist/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
     <link href="<?php echo asset('LTE/dist/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo asset('LTE/dist/css/AdminLTE.css')?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <body>
        @section('header')

        @show

        <div class="container">
            @yield('content')
        </div>
    </body>


</html>