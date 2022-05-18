<!DOCTYPE html>
    <html lang="en">
        @include('admin.head')

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                @include('admin.header')
                @include('admin.sidebar')
                @yield('content')
                @include('admin.footer')
            </div>
            <script src="{{ URL::asset(FRONTENDURL . ADMIN . '/jquery/jquery.min.js') }}"></script>

            <script src="{{ URL::asset(FRONTENDURL . ADMIN . '/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <script src="{{ URL::asset(FRONTENDURL . ADMINJS . '/adminlte2167.js?v=3.2.0') }}"></script>

            <script src="{{ URL::asset(FRONTENDURL . ADMINJS . '/Chart.min.js') }}"></script>

            <script src="{{ URL::asset(FRONTENDURL . ADMINJS . '/demo.js') }}"></script>

            <script src="{{ URL::asset(FRONTENDURL . ADMINJS . '/dashboard3.js') }}"></script>
        </body>

    </html>
