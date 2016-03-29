<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>Sign In | {{ strip_tags(Config::get('template.projectname')) }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ URL::asset('favicon.ico') }}" rel="shortcut icon" />

    <?php $version = '?v=' . Config::get('template.version'); ?>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo asset('LTE/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo asset('LTE/plugins/font-awesome-4.3.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo asset('LTE/plugins/ionicons-2.0.1/css/ionicons.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Datatables -->
    <link href="<?php echo asset('LTE/plugins/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo asset('LTE/dist/css/AdminLTE.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo asset('LTE/dist/css/skins/skin-green.min.css')?>" rel="stylesheet" type="text/css" />
    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    <!--[if lt IE 9]>
      <script src="{{ URL::asset('js/plugins/misc/html5shiv.js') }}"></script>
      <script src="{{ URL::asset('js/plugins/misc/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body class="bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-md-offset-5 hidden-xs spacer"></div>
        </div>{{-- end .row --}}
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-solid box-success">
                    <div class="header box-header">
                        <h2 class="logo-lg with-padding text-center">Four Loko Golf League</h2>
                          @if (Session::has('passwordReset'))
                            <div class="callout callout-warning">
                              <h4 class="with-padding text-center" >{{ Session::get('passwordReset') }}</h4>
                            </div>
                          @endif
                    </div>
                    <form id="login-form" action="{{ URL::to('login') }}" method="post">
                        <div class="box-body bg-gray">
                            <div class="form-group">
                                <div class="input-group" title="Username">
                                    <label class="input-group-addon" for="username"><i class="fa fa-user"></i></label>
                                    <input class="form-control" type="text" id="username" name="username" placeholder="Username" value="{{ Input::old('username') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" title="Password">
                                    <label class="input-group-addon" for="password"><i class="fa fa-lock"></i></label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Password" />
                                </div>
                            </div>
                        </div>
                        <div class="box-footer bg-gray">
                            <button type="submit" id="loginSubmit" class="btn bg-green btn-block">
                                <i class="fa fa-sign-in"></i> Sign in
                            </button>
                        </div>
                    </form>
                </div>{{-- end .box --}}
            </div>{{-- end .col-md-6 --}}
        </div>{{-- end .row --}}
@if (Session::has('login_error'))
        <div class="margin text-center">

        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-exclamation"></i>
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <b>Error:</b> {{ Session::get('login_error') }}
                </div>
            </div>
        </div>
@endif
    </div>{{-- end .container-fluid --}}

    <script type="text/javascript">
        var loginUrl = '{{ URL::to("login") }}';
    </script>
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


</body>
</html>