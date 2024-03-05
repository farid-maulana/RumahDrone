@extends('layouts.master')

@section('content')
    <div class="page-content">
        <!--begin::Page heading-->
        <nav class="page-breadcrumb">
            <!--begin::Title-->
            <h4 class="mb-1">Laporan Inventaris</h4>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Inventaris</li>
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
                        <!--begin::Create new button-->
                        <div class="d-flex justify-content-start mb-4">
                            <a href="{{ route('inventory-export.download') }}" class="btn btn-primary">
                                <i class="link-icon" data-feather="download"></i>
                                Cetak Laporan Terbaru
                            </a>
                        </div>
                        <!--end::Create new button-->
                        <hr>
                        <h5 class="mb-4">Riwayat Laporan Inventaris</h5>
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <caption>Riwayat Laporan Inventaris</caption>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Laporan</th>
                                    <th>Tanggal</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($reports as $key => $report)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $report->name }}</td>
                                        <td>{{ $report->created_at->format('d F Y') }}</td>
                                        <td class="text-right">
                                            <a href="{{ $report->file }}" target="_blank" class="btn btn-link">
                                                <i class="link-icon" data-feather="download" style="width: 14px; height: 14px;"></i>
                                                Unduh
                                            </a>
                                        </td>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
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
@endpush

@push('scripts')
    <script src="{{ Vite::asset('resources/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ Vite::asset('resources/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush
