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
                <li class="breadcrumb-item"><a href="{{ route('shipments.index') }}">Data Pengiriman Barang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pengiriman Barang</li>
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
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                                <img src="{{ Vite::asset('resources/images/logos/rumah-drone.png') }}" alt="logo"
                                     class="img-fluid noble-ui-logo d-block mt-3 mb-3">
                                <p>PT Odo Multi Aero<br> Jl. Kwoka Q2-6 Perumahan Tidar Permai, <br>Sukun Kota Malang
                                </p>
                                <h5 class="mt-5 mb-2 text-muted">Pengiriman ke:</h5>
                                <p>{{ $shipment->customer }}<br> {{ $shipment->address }}</p>
                            </div>
                            <div class="col-lg-3 pr-0">
                                <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">invoice</h4>
                                <h6 class="text-right mb-5 pb-5"># {{ $shipment->order_number }}</h6>
                                <h6 class="mb-0 mt-5 pt-4 text-right font-weight-normal mb-2">
                                    <span class="text-muted">Tanggal Pemesanan:</span>
                                    {{ \Carbon\Carbon::parse($shipment->order_date)->format(config('app.date_format')) }}
                                </h6>
                                @if($shipment->status == 'in transit' || $shipment->status == 'delivered')
                                    <h6 class="mb-0 text-right font-weight-normal mb-2">
                                        <span class="text-muted">Tanggal Pengiriman:</span>
                                        {{ \Carbon\Carbon::parse($shipment->order_date)->format(config('app.date_format')) }}
                                    </h6>
                                @endif
                                @if($shipment->status == 'delivered')
                                    <h6 class="mb-0 text-right font-weight-normal mb-2">
                                        <span class="text-muted">Tanggal Terkirim:</span>
                                        {{ \Carbon\Carbon::parse($shipment->order_date)->format(config('app.date_format')) }}
                                    </h6>
                                @endif
                                <h6 class="mb-0 text-right font-weight-normal mb-2">
                                    <span class="text-muted">Status:</span>
                                    @if($shipment->status == 'pending')
                                        <div class="badge badge-pill badge-warning">Menunggu Pengiriman</div>
                                    @elseif($shipment->status == 'in transit')
                                        <div class="badge badge-pill badge-primary">Dalam Perjalanan</div>
                                    @else
                                        <div class="badge badge-pill badge-success">Terkirim</div>
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <!--begin::Table-->
                                <table class="table table-bordered">
                                    <caption></caption>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th class="text-right">Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-right">
                                        <td class="text-left">1</td>
                                        <td class="text-left">{{ $shipment->item->code }}</td>
                                        <td class="text-left">{{ $shipment->item->name }}</td>
                                        <td>{{ $shipment->quantity }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <div class="container-fluid w-100">
                            <a href="{{ route('shipments.index') }}" class="btn btn-outline-secondary float-right mt-4">
                                <i data-feather="arrow-left" class="mr-1 icon-md"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Page content-->
    </div>
@endsection
