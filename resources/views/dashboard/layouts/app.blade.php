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

@include('dashboard.layouts._session')


<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">@yield('content_title')</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    @yield('breadcrumb-right')
                </div>
            </div>
        </div>
        <div class="content-body">
            {{--            <div class="row">--}}
            {{--                <div class="col-12">--}}
            @yield('content')
            {{--                </div>--}}
            {{--            </div>--}}

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('dashboard.layouts._footer')
<!-- END: Footer-->

</body>
<!-- END: Body-->

</html>
