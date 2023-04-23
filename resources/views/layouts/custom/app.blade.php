
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>@yield('title-page', 'Aplikasi Sarpras')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PDMTI" name="author" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        {{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="{{ asset('assets/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        
        {{-- CSS PLUGIN --}}
        <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugin/select2/select2-bootstrap-5-theme.min.css') }}" />
        
        {{-- CUSTOM CSS --}}
        <link href="{{ asset('assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        
        <script src="{{ asset('assets/plugin/jquery/jquery.min.js') }}"></script>

        @yield('head')

    </head>

    <body data-sidebar="dark">
        {{-- <body data-layout="horizontal" data-topbar="dark"> --}}
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('layouts.custom.header')
            @include('layouts.custom.navigation')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container">

                       @yield('content')
                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Universitas Merdeka Pasuruan.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Dibuat dengan <i class="mdi mdi-heart text-danger"></i> by <b>PDMTI</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- JAVASCRIPT -->
        <script src="{{ asset('js/app.js') }}"></script>
        {{-- <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script src="{{ asset('assets/plugin/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>

        <link href="{{ asset('assets/plugin/select2/select2.min.css')}}" rel="stylesheet" />
        <script src="{{ asset('assets/plugin/select2/select2.min.js')}}"></script>

        <script src="{{ asset('assets/plugin/sweetalert2/sweetalert2@11.js') }}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        
        @yield('scripts')
        
    </body>
</html>
