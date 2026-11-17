<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Volt - Free Bootstrap 5 Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets-admin/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets-admin/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets-admin/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- start css -->
    @include('layouts.admin.css')
    <!-- end css -->

    <!-- Soft Pink Theme -->
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        body, .content {
            background-color: #FFF8FA !important;
            font-family: 'Quicksand', sans-serif !important;
        }
        #sidebarMenu, .sidebar {
            background-color: #FFFFFF !important;
            border-right: 1.5px solid #FFE3EC !important;
            box-shadow: 4px 0 24px rgba(255, 166, 196, 0.12) !important;
        }
        #sidebarMenu .nav-link,
        #sidebarMenu .sidebar-text {
            color: #8C4A64 !important;
            font-weight: 600 !important;
            border-radius: 50px !important;
            margin: 4px 12px !important;
            padding: 10px 18px !important;
            transition: all 0.25s ease !important;
        }
        #sidebarMenu .sidebar-icon,
        #sidebarMenu .sidebar-icon svg {
            color: #D66892 !important;
        }
        #sidebarMenu .nav-item:not(.active) .nav-link:hover {
            background-color: #FFF0F5 !important;
            color: #D64B82 !important;
        }
        #sidebarMenu .nav-item.active > .nav-link {
            background: linear-gradient(135deg, #FF9EC0 0%, #FF7AA8 100%) !important;
            color: #FFFFFF !important;
            box-shadow: 0 6px 16px rgba(255, 122, 168, 0.35) !important;
        }
        #sidebarMenu .nav-item.active > .nav-link .sidebar-text,
        #sidebarMenu .nav-item.active > .nav-link .sidebar-icon,
        #sidebarMenu .nav-item.active > .nav-link svg {
            color: #FFFFFF !important;
        }
        #sidebarMenu .dropdown-divider {
            border-top: 1.5px solid #FFE3EC !important;
            margin: 12px 20px !important;
        }
        .navbar-top, footer.bg-white {
            background-color: #FFFFFF !important;
            border-radius: 22px !important;
            border: 1.5px solid #FFE3EC !important;
            box-shadow: 0 8px 24px rgba(255, 166, 196, 0.1) !important;
        }
        footer p, footer a {
            color: #964867 !important;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <!-- start sidebar -->
    @include('layouts.admin.sidebar')
    <!-- end sidebar -->

    <main class="content">

        <!-- start header -->
        @include('layouts.admin.header')
        <!-- end header -->

        <!-- start main content -->
        @yield('content')
        <!-- end main content -->

        <!-- start footer -->
        @include('layouts.admin.footer')
        <!-- end footer -->

    </main>

    <!-- start js -->
    @include('layouts.admin.js')
    <!-- end js -->

</body>

</html>
