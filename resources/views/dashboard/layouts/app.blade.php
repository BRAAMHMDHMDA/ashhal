<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@include('dashboard.layouts._head')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include('dashboard.layouts._header')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('dashboard.layouts._aside')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
@yield('content')
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('dashboard.layouts._footer')
<!-- END: Footer-->

</body>
<!-- END: Body-->

</html>
