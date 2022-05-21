<!doctype html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VIP Order Tracking System</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
     <meta name="msapplication-tap-highlight" content="no">
     <!-- Styles -->
     @include('partials._body_style')

     <!-- Scripts -->
</head>
<body>
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    @include('sweetalert::alert')
    @include('partials._app_header')
        <div class="wrapper">
            @yield('content')
        </div>
         <!-- Footer -->
         <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © 2022 Zoogler by Mannatthemes.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    @include('partials._body_scripts')

</body>

</html>
