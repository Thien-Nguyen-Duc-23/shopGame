<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset("images/favicon-32x32.png") }} " type="image/png"/>
    <!--plugins-->
    <link href="{{ asset("libraries/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css") }}" rel="stylesheet"/>
    <link href="{{ asset("libraries/admin/plugins/simplebar/css/simplebar.css") }}" rel="stylesheet" />
    <link href="{{ asset("libraries/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css") }}" rel="stylesheet" />
    <link href="{{ asset("libraries/admin/plugins/metismenu/css/metisMenu.min.css") }}" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{ asset("libraries/admin/css/pace.min.css") }}" rel="stylesheet"/>
    <script src="{{ asset("libraries/admin/js/pace.min.js") }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset("libraries/admin/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("libraries/admin/css/bootstrap-extended.css") }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset("libraries/admin/css/app.css") }}" rel="stylesheet">
    <link href="{{ asset("libraries/admin/css/icons.css") }}" rel="stylesheet">

    <title>Cloudzone Manager</title>
    @yield('style')

</head>

<body class="bg-login">
<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            {{-- CONTEN --}}
            @yield('content')
            {{-- END CONTEN --}}
        </div>
    </div>
</div>
<!--end wrapper-->
{{-- SCRIPT --}}
<!-- Bootstrap JS -->
<script src="{{ asset("libraries/admin/js/bootstrap.bundle.min.js") }}"></script>
<!--plugins-->
<script src="{{ asset("libraries/admin/js/jquery.min.js") }}"></script>
<script src="{{ asset("libraries/admin/plugins/simplebar/js/simplebar.min.js") }}"></script>
<script src="{{ asset("libraries/admin/plugins/metismenu/js/metisMenu.min.js") }}"></script>
<script src="{{ asset("libraries/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js") }}"></script>
<!--app JS-->
<script src="{{ asset("libraries/admin/js/app.js") }}"></script>

@yield('scripts')
{{-- ./SCRIPT --}}

</body>
</html>
