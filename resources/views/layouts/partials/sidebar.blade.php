<nav class="sidebar">
    <!--begin::Sidebar header-->
    <div class="sidebar-header">
        <!--begin::Logo-->
        <a href="#" class="sidebar-brand">
            <img src="{{ Vite::asset('resources/images/logos/rumah-drone.png') }}" style="width: 90%">
        </a>
        <!--end::Logo-->
        <!--begin::Sidebar toggle-->
        <div class="sidebar-toggler not-active" style="width: 80px !important;">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Sidebar header-->
    <!--begin::Sidebar body-->
    <div class="sidebar-body">
        <ul class="nav">
            @can('main')
                <!--begin:Menu item-->
                <li class="nav-item nav-category">Main</li>
                <!--end:Menu item-->
            @endcan
            @can('dashboard')
                <!--begin:Menu item-->
                <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Beranda</span>
                    </a>
                </li>
                <!--end:Menu item-->
            @endcan
            @can('master')
                <!--begin:Menu item-->
                <li class="nav-item nav-category">Master</li>
                <!--end:Menu item-->
            @endcan
            @can('inventory.management')
                <!--begin:Menu item-->
                <li class="nav-item {{ Request::segment(1) === 'items' ? 'active' : '' }}">
                    <a href="{{ route('items.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="codesandbox"></i>
                        <span class="link-title">Inventaris</span>
                    </a>
                </li>
                <!--end:Menu item-->
            @endcan
            @can('transaction')
                <!--begin:Menu item-->
                <li class="nav-item nav-category">Transaksional</li>
                <!--end:Menu item-->
            @endcan
            @can('shipment.management')
                <!--begin:Menu item-->
                <li class="nav-item {{ Request::segment(1) === 'shipments' ? 'active' : '' }}">
                    <a href="{{ route('shipments.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="truck"></i>
                        <span class="link-title">Pengiriman Barang</span>
                    </a>
                </li>
                <!--end:Menu item-->
            @endcan
            @can('stock.management')
                <!--begin:Menu item-->
                <li class="nav-item {{ Request::segment(1) === 'stocks' ? 'active' : '' }}">
                    <a href="{{ route('stock-management.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Manajemen Stok</span>
                    </a>
                </li>
                <!--end:Menu item-->
            @endcan
            @can('report')
                <!--begin:Menu item-->
                <li class="nav-item nav-category">Laporan</li>
                <!--end:Menu item-->
            @endcan
            @can('report.management')
                <!--begin:Menu item-->
                <li class="nav-item {{ Request::segment(1) === 'inventory_export' ? 'active' : '' }}">
                    <a href="{{ route('inventory-export.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Laporan Inventaris</span>
                    </a>
                </li>
                <!--end:Menu item-->
            @endcan
        </ul>
    </div>
    <!--end::Sidebar body-->
</nav>
