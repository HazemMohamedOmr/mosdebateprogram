<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('admin.dashboard') }} ">
            <img src="{{ asset('images/public.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">دورى المناظرات</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons-round opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text me-1">لوحة القيادة</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin-visitors-show' ? 'active' : '' }}" href="{{ route('admin.visitors') }}">
                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons-round opacity-10">person</i>
                    </div>
                    <span class="nav-link-text me-1">الزائرين</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin-register-show' ? 'active' : '' }}" href="{{ route('admin.register') }}">
                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons-round opacity-10">groups</i>
                    </div>
                    <span class="nav-link-text me-1">المجموعات</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
