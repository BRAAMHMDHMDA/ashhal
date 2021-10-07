<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                    <span class="brand-logo" >
                       <img src="{{ asset('media/dashboard/logo1.ico') }}" alt="logo" height="30px" width="30"/>
                    </span>
                    <h2 class="brand-text">
                        Ashal App
                    </h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ Route::is('home')?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('home') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Home</span>
                </a>
            </li>

            <li class=" nav-item  {{ Route::is('users.*')?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                    <i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Users">Users</span>
                </a>
            </li>

        </ul>
    </div>
</div>
