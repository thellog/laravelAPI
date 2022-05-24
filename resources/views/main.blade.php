<!--
=========================================================
* Soft UI Dashboard - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header')
</head>

<body class="g-sidenav-show  bg-gray-100">

    <!-- Sidebar -->
    @include('components.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('components.navbar')
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <!-- The other content will display here -->
            @yield('content')

            <!-- Footer -->
            @include('components.footer')
        </div>
    </main>
    
    <!-- All the js's link file here -->
    @include('components.scripts')

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./dashboard/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
</body>

</html>
