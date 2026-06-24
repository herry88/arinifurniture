<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Arini Building</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="Admin arini furniture" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="Arini furniture web admin" />
    <meta name="keywords" content="" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('admin/css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Style-->
    @include('adminpage.partial.style')
    <!--end::Style-->

    <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        @include('adminpage.partial.navbar')
        <!--end::Header-->
        <!--begin::Sidebar-->
        @include('adminpage.partial.aside')
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            @yield('content')
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        @include('adminpage.partial.footer')
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    @include('adminpage.partial.script')
</body>
<!--end::Body-->

</html>
