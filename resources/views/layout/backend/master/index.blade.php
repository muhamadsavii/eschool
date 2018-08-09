<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="{{ asset("/assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    </head>
    <body class="skin-blue">
    <div class="wrapper">
        @include('layout.backend.partial.header')        
        @include('layout.backend.partial.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Page Header
                    <small>Optional description</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>
            <section class="content">
                
                @include('backend.home.index')
            </section>
            </section>
        </div>
        @include('layout.backend.partial.footer')
    </div>
    <script src="{{ asset ("/assets/plugins/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset ("/assets/backend/scripts/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>
    <!--wysiwyg -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="{{ asset ("/src/js/vendor/tinymce/js/tinymce/tinymce.min.js") }}" type="text/javascript"></script>
    

    <!-- jQuery -->
    <!-- <script src="//code.jquery.com/jquery.js"></script> -->
    <!-- DataTables -->
    <script src="{{ asset ("/assets/backend/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript">"></script>
    <!-- <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> -->
    <!-- Bootstrap JavaScript -->
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
    <!-- App scripts -->
    @stack('scripts')
    @yield('scripts')
    <div id="script"></div>
    
    </body>
</html>
