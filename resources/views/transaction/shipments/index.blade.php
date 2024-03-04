@extends('layouts.master')

@section('content')
    <div class="page-content">
        <!--begin::Page heading-->
        <nav class="page-breadcrumb">
            <!--begin::Title-->
            <h4 class="mb-1">Data Pengiriman Barang</h4>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pengiriman Barang</li>
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
                        <div class="d-flex justify-content-end mb-4">
                            <a href="{{ route('shipments.create') }}" class="btn btn-primary">
                                <i class="link-icon" data-feather="plus"></i>
                                Catat Pengiriman Baru
                            </a>
                        </div>
                        <!--end::Create new button-->
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <caption class="mt-2">
                                    Catatan: <br>
                                    <i data-feather="arrow-down" class="text-success"
                                       style="width: 16px; height: 16px;"></i> Barang Masuk
                                    <i data-feather="arrow-up" class="text-danger"
                                       style="width: 16px; height: 16px;"></i> Barang Keluar
                                </caption>
                                <thead>
                                <tr>
                                    <th>No. Pesanan</th>
                                    <th>Customer/Supplier</th>
                                    <th>Tgl Pemesanan</th>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($shipments as $shipment)
                                    <tr>
                                        <td>{{ $shipment->order_number }}</td>
                                        <td>
                                            @if($shipment->type === 'in')
                                                <i data-feather="arrow-down" class="text-success"
                                                   style="width: 16px; height: 16px;"></i>
                                            @else
                                                <i data-feather="arrow-up" class="text-danger"
                                                   style="width: 16px; height: 16px;"></i>
                                            @endif
                                            {{ $shipment->entity_name }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($shipment->order_date)->format(config('app.date_format')) }}</td>
                                        <td>{{ $shipment->item->name }}</td>
                                        <td>{{ $shipment->quantity }}</td>
                                        <td>
                                            @if($shipment->status == 'pending')
                                                <div class="badge badge-pill badge-warning">Menunggu Pengiriman</div>
                                            @elseif($shipment->status == 'in transit')
                                                <div class="badge badge-pill badge-primary">Dalam Perjalanan</div>
                                            @else
                                                <div class="badge badge-pill badge-success">Terkirim</div>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('shipments.edit', $shipment->id) }}"
                                               class="btn btn-warning btn-sm">
                                                <i data-feather="edit" class="text-white"
                                                   style="width: 14px; height: 14px;"></i>
                                            </a>
                                            <form id="deleteShipmentForm{{ $shipment->id }}"
                                                  action="{{ route('shipments.destroy', $shipment->id) }}" method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                        onclick="confirmDelete('deleteShipmentForm{{ $shipment->id }}')"
                                                        class="btn btn-danger btn-sm">
                                                    <i data-feather="trash" class="text-white"
                                                       style="width: 14px; height: 14px;"></i>
                                                </button>
                                            </form>
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
