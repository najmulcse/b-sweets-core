<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bombay Sweets</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body >
<div id="app" class="container-scroller">

    @if(!Auth::guest())
        <!-- partial -->
             <!-- top navbar start-->
             @include('layouts.partials.top_navbar')
             <!-- top navbar end -->
        <div class="container-fluid page-body-wrapper">
            @include('layouts.partials.left_side_navbar')
            <!-- main-panel start -->
            <div class="main-panel ml-auto">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
            <!-- main-panel ends -->


        </div>
    @else
        <div class="content-wrapper">
            @yield('content')
        </div>
    @endif


    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
<!-- Scripts -->
{{--<script type="text/javascript" src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBcVQO3dxqUFjgjyWh51BKqD1Bj87-TgV8&amp;libraries=places'></script>--}}
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
{{--<script src="{{ asset('js/locationpicker.jquery.js') }}"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
<script>


</script>

</body>

</html>