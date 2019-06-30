<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App title -->
    <title>@yield('title') - {{ config('app.name', 'Snippets') }}</title>

    <!--Morris Chart CSS -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/switchery/switchery.min.css') }}">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/backend/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('assets/backend/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/backend/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="{{ asset('assets/backend/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/docs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/flag-icon.css') }}" rel="stylesheet">

</head>


<body class="fixed-left">

<div id="wrapper">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Mohon tunggu...</p>
        </div>
    </div>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
@include('layouts.backend.partial.topbar')
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
@include('layouts.backend.partial.sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <section class="content">
        @yield('content')
    </section>


</div>
<!-- END wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>


<script>
    var resizefunc = [];
</script>


<!-- jQuery  -->
<script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/detect.js') }}"></script>
<script src="{{ asset('assets/backend/js/fastclick.js') }}"></script>
<script src="{{ asset('assets/backend/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets/backend/js/waves.js') }}"></script>
<script src="{{ asset('assets/backend/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/backend/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/switchery/switchery.min.js') }}"></script>

<!-- Counter js  -->
<script src="{{ asset('assets/backend/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/counterup/jquery.counterup.min.js') }}"></script>

<!--Morris Chart-->
<script src="{{ asset('assets/backend/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/raphael/raphael-min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('assets/backend/pages/jquery.dashboard.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/backend/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets/backend/js/jquery.app.js') }}"></script>

<script src="{{ asset('assets/backend/js/modernizr.min.js') }}"></script>




    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/backend/plugins/bootstrap-select/js/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/backend/plugins/markitup/sets/default/set.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/backend/plugins/markitup/jquery.markitup.js') }}"></script>



    <script type="text/javascript" >
        $(document).ready(function() {
            $("#markItUp").markItUp(mySettings);
        });
    </script>
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/editor.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/backend/js/sweetalert2.all.js') }}"></script>
@stack('js')
</body>
</html>