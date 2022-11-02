<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- plugins:css -->
    <link href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}" rel="stylesheet">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <!-- endinject -->
    <link href="{{ asset('admin/images/favicon.png') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('admin/js/trix.js') }}"></script>
    @livewireStyles
</head>
<body>
    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ url('admin/js/jquery-3.6.0.min.js') }}"></script>
    <!-- plugins:js -->
    <script src="{{ url('admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ url('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ url('admin/js/off-canvas.js') }}"></script>
    <script src="{{ url('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('admin/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ url('admin/js/dashboard.js') }}"></script>
    <script src="{{ url('admin/js/data-table.js') }}"></script>
    <script src="{{ url('admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ url('admin/js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page-->
    
    <script src="{{ url('admin/js/jquery.cookie.js') }}" type="text/javascript"></script>
    @yield('script')
    @livewireScripts
    @stack('script')
</body>
</html>
