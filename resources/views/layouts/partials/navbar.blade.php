<nav class="navbar">
    <!--begin::Sidebar mobile toggle-->
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <!--end::Sidebar mobile toggle-->
    <div class="navbar-content">
        <!--begin::Search-->
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i data-feather="search"></i>
                    </div>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Cari di sini...">
            </div>
        </form>
        <!--end::Search-->
        <ul class="navbar-nav">
            <!--begin::Notifications-->
            <li class="nav-item dropdown nav-notifications">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                    <div class="indicator">
                        <div class="circle"></div>
                    </div>
                </a>
                <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">6 Notifikasi</p>
                        <a href="javascript:;" class="text-muted">Bersihkan</a>
                    </div>
                    <div class="dropdown-body">
                        <a href="javascript:;" class="dropdown-item">
                            <div class="icon">
                                <i data-feather="user-plus"></i>
                            </div>
                            <div class="content">
                                <p>New customer registered</p>
                                <p class="sub-text text-muted">2 sec ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="icon">
                                <i data-feather="gift"></i>
                            </div>
                            <div class="content">
                                <p>New Order Recieved</p>
                                <p class="sub-text text-muted">30 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="icon">
                                <i data-feather="alert-circle"></i>
                            </div>
                            <div class="content">
                                <p>Server Limit Reached!</p>
                                <p class="sub-text text-muted">1 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="icon">
                                <i data-feather="layers"></i>
                            </div>
                            <div class="content">
                                <p>Apps are ready for update</p>
                                <p class="sub-text text-muted">5 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="icon">
                                <i data-feather="download"></i>
                            </div>
                            <div class="content">
                                <p>Download completed</p>
                                <p class="sub-text text-muted">6 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <!--begin::View more-->
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="#">Lihat semua</a>
                    </div>
                    <!--end::View more-->
                </div>
            </li>
            <!--end::Notifications-->
            <!--begin::User menu-->
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Vite::asset('resources/images/avatars/blank.png') }}" alt="profile">
                </a>
                <!--begin::User account menu-->
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <!--begin::Avatar-->
                        <div class="figure mb-3">
                            <img src="{{ Vite::asset('resources/images/avatars/blank.png') }}" alt="">
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                            <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                        </div>
                        <!--end::Username-->
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <!--begin::Menu item-->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i data-feather="user"></i>
                                    <span>Profil</span>
                                </a>
                            </li>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i data-feather="edit"></i>
                                    <span>Pengaturan Profil</span>
                                </a>
                            </li>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <li class="nav-item">
                                <a href="{{ route('auth.logout') }}" class="nav-link"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i>
                                    <span>Keluar</span>
                                </a>
                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <!--end::Menu item-->
                        </ul>
                    </div>
                </div>
                <!--begin::User account menu-->
            </li>
            <!--end::User menu-->
        </ul>
    </div>
</nav>
