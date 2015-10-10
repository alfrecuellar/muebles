<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Muebles y Diseño</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('vendor/admin-lte/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/admin-lte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('vendor/admin-lte/dist/css/skins/_all-skins.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon" />

    @yield('head')
  </head>
  <body class="hold-transition skin-blue sidebar-mini layout-boxed">
    <!-- Site wrapper -->
    <div class="wrapper">

      @include('layout.header')

      @include('layout.sidebar')


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          @yield('title')
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="alert alert-dismissable collapse" id="alert-msg">
            <button type="button" class="close" data-toggle="collapse" data-target="#alert-msg" aria-hidden="true">&times;</button>
            <h4><i class="icon fa" id="alert-msg-icon"></i><span id="alert-msg-title"> Warning!</span></h4>
            <div id="alert-msg-content"></div>
          </div>

          <div class="content-main">
            @yield('content')
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      @include('layout.footer')

    </div><!-- ./wrapper -->


    <div class="modal" id="wrapper-modal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary hide">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="{{ asset('vendor/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script type="text/javascript" src="{{ asset('vendor/admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script type="text/javascript" src="{{ asset('vendor/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script type="text/javascript" src="{{ asset('vendor/admin-lte/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="{{ asset('vendor/admin-lte/dist/js/app.min.js') }}"></script>
    <!-- scrollTo -->
    <script type="text/javascript" src="{{ asset('vendor/jquery.scrollTo/jquery.scrollTo.min.js') }}"></script>
    <!-- Handlebars  -->
    <script type="text/javascript" src="{{ asset('vendor/handlebars/handlebars.min.js') }}"></script>
    <!-- Paging -->
    <script type="text/javascript" src="{{ asset('vendor/paging/jquery.paging.js') }}"></script>
    <!-- serializeObject -->
    <script type="text/javascript" src="{{ asset('vendor/jQuery.serializeObject/dist/jquery.serializeObject.min.js') }}"></script>

    <!-- AC Scripts -->
    <script type="text/javascript" src="{{ asset('js/ac.prototype.js') }}"></script>
    <script type="text/javascript">
      if (!ac) var ac = {};
      ac.config = {
        url : '{{ url() }}/',
        _token : '{{ csrf_token() }}'
      };
    </script>
    <script type="text/javascript" src="{{ asset('js/ac.jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ac.tools.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ac.crud.base.js') }}"></script>

    @yield('foot')

  </body>
</html>
