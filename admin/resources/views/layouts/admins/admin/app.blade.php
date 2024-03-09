@php
    $configSystem = AdminHelper::getConfigSystem();
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--favicon-->
    <link rel="icon"
        href="{{ !empty($configSystem['website_favicon']) ? $configSystem['website_favicon'] : asset('images/favicon-32x32.png') }} "
        type="image/png" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--plugins-->
    <link href="{{ asset('libraries/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('libraries/admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('libraries/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('libraries/admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('libraries/admin/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('libraries/admin/js/pace.min.js') }}"></script>
    <!-- Alertify css -->
    <link href="{{ asset('/libraries/admin/plugins/alertify/css/alertify.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('libraries/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libraries/admin/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('libraries/admin/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libraries/admin/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libraries/admin/css/flatpickr.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('libraries/admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('libraries/admin/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('libraries/admin/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('libraries/admin/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('libraries/admin/css/header-colors.css') }}" />

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" href="{{ asset('libraries/admin/css/slick/slick.css') }}" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" href="{{ asset('libraries/admin/css/slick/slick-theme.css') }}" />

    {{--    Custom --}}
    <link href="{{ asset('css/admin.css') }}?token={{ time() }}" rel="stylesheet">

    <title>{{ !empty($configSystem['website_title']) ? $configSystem['website_title'] : 'Cloudzone Dev' }}</title>
    @yield('style')

    {{-- Thêm SEO ở đây --}}


</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- @if (session()->has('success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Thành công!',
                html: "{!! session()->get('success') !!}",
                icon: 'success',
                showConfirmButton: false, // Hide the "OK" button
                timer: 3000, // Time in milliseconds before the alert automatically closes
                willClose: () => { // Custom function when the alert is about to close
                    Swal.getPopup().classList.add('animate__animated',
                        'animate__fadeOut'); // Add fadeout animation
                }
            });
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Lỗi!',
                html: "{!! session()->get('error') !!}",
                icon: 'error',
                showConfirmButton: false, // Hide the "OK" button
                timer: 3000, // Time in milliseconds before the alert automatically closes
                willClose: () => { // Custom function when the alert is about to close
                    Swal.getPopup().classList.add('animate__animated',
                        'animate__fadeOut'); // Add fadeout animation
                }
            });
        });
    </script>
@endif --}}

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('layouts/admins/admin/includes/sidebar', compact('configSystem'))
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            @include('layouts/admins/admin/includes/header', compact('configSystem'))
        </header>
        <!--end header -->
        <div class="page-wrapper">
            <div class="page-content">
                {{-- breadcrumb --}}
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">
                        @yield('title')
                    </div>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                @yield('breadcrumb')
                            </ol>
                        </nav>
                    </div>
                </div>

                {{-- content --}}
                <section>
                    <div class="alert-container">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    @yield('content')
                </section>
            </div>
        </div>

    </div>
    <!--end wrapper-->

    <input type="hidden" id="uploadFile" value="0">
    <input type="hidden" id="typeChoosseImage" value="0">
    <input type="hidden" id="libraryImage" value="0">
    {{-- MODAL --}}
    <div class="modal fade" id="modal-library" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="notication-popup"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn-confirm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ./MODAL --}}

    {{-- SCRIPT --}}
    <!-- Bootstrap JS -->
    <script src="{{ asset('libraries/admin/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('libraries/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('libraries/admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('libraries/admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libraries/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('libraries/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('libraries/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Alertify js -->
    <script src="{{ asset('/libraries/admin/plugins/alertify/js/alertify.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('libraries/admin/js/flatpickr.js') }}"></script>
    <script src="{{ asset('libraries/admin/js/app.js') }}"></script>
    <script src="{{ asset('js/library/libraries.js') }}?token={{ time() }}"></script>
    <script src="{{ asset('js/library/pagination.js') }}?token={{ time() }}"></script>
    <script src="{{ asset('js/admin/global.js') }}?token={{ time() }}"></script>

    <!-- Styles -->
    <script src="{{ asset('libraries/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('libraries/admin/js/slick.min.js') }}"></script>

    {{--  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>  --}}
    @yield('scripts')
    {{-- ./SCRIPT --}}
    <script>
        $("document").ready(function(){
            setTimeout(function(){
                $("div.alert").remove();
            }, 5000 ); // 5 secs
        });
    </script>
</body>

</html>
