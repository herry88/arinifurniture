<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.style')
</head>

<body class="common-here res layout-3">
    <div id="wrapper" class="wrapper-fluid banner-effect-3">
        @include('frontend.layouts.header')

        <!-- Main Container -->
        @yield('content')
        <!-- //Main Container -->

        @include('frontend.layouts.footer')
    </div>

    @include('frontend.layouts.scripts')
</body>

</html>
