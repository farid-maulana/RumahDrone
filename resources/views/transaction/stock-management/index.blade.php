@extends('layouts.master')

@section('content')
    <div class="page-content">
        <!--begin::Page heading-->
        <nav class="page-breadcrumb">
            <!--begin::Title-->
            <h4 class="mb-1">Manajemen Stok</h4>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manajemen Stok</li>
            </ol>
            <!--end::Breadcrumb-->
        </nav>
        <!--end::Page heading-->

        <!--begin::Page content-->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <caption></caption>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th class="text-center">Jumlah Stok</th>
                                    <th class="text-center">Barang Masuk</th>
                                    <th class="text-center">Barang Keluar</th>
                                    <th class="text-center">Minimum Stok</th>
                                    <th class="text-right">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($items as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-center">{{ $item->total_barang_masuk ?? 0 }}</td>
                                        <td class="text-center">{{ $item->total_barang_keluar ?? 0 }}</td>
                                        <td class="text-center">{{ $item->minimum_stock }}</td>
                                        <td class="text-right">
                                            @if($item->quantity <= $item->minimum_stock)
                                                <div class="badge badge-pill badge-warning">Stok Menipis</div>
                                            @elseif($item->quantity === 0)
                                                <div class="badge badge-pill badge-primary">Stok Habis</div>
                                            @else
                                                <div class="badge badge-pill badge-success">Tersedia</div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Page content-->
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ Vite::asset('resources/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/vendors/sweetalert2/sweetalert2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ Vite::asset('resources/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ Vite::asset('resources/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ Vite::asset('resources/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/delete-confirmation.js') }}"></script>
@endpush
