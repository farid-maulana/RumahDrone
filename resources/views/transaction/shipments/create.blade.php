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
                <li class="breadcrumb-item active" aria-current="page">Catat Pengiriman Barang</li>
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
                        <!--begin::Form-->
                        <form class="forms-sample" action="{{ route('shipments.store') }}" method="POST">
                            @csrf
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="order_number">
                                    Nomor Pesanan <span class="text-danger">*</span>
                                    <span style="font-size: 12px; color: #6c757d;">(max. 10 karakter)</span>
                                </label>
                                <input type="text"
                                       class="form-control @error('order_number') is-invalid @enderror"
                                       id="order_number" name="order_number" autocomplete="off" placeholder="Nomor pesanan"
                                       value="{{ old('order_number') }}">
                                @error('order_number')
                                <label id="order-number-error" class="error mt-2 text-danger" for="order_number">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="entity_name">Nama Customer/Supplier <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('entity_name') is-invalid @enderror"
                                       id="entity_name" name="entity_name" autocomplete="off" placeholder="Nama customer/supplier"
                                       value="{{ old('entity_name') }}">
                                @error('entity_name')
                                <label id="entity-name-error" class="error mt-2 text-danger" for="entity_name">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="type">
                                    Jenis Pengiriman <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="js-example-basic-single w-100 @error('type') is-invalid @enderror"
                                    data-width="100%" id="type" name="type">
                                    <option value="" selected disabled>Pilih Jenis Pengiriman</option>
                                    <option value="in">Barang Masuk</option>
                                    <option value="out">Barang Keluar</option>
                                </select>
                                @error('type')
                                <label id="type-error" class="error mt-2 text-danger"
                                       for="type">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="order_date">Tanggal Pemesanan <span style="font-size: 12px; color: #6c757d;">(default: tanggal hari ini)</span></label>
                                <input type="date" class="form-control @error('order_date') is-invalid @enderror"
                                       id="order_date" name="order_date" autocomplete="off"
                                       placeholder="Tanggal pemesanan" value="{{ old('order_date') }}">
                                @error('order_date')
                                <label id="order_date-error" class="error mt-2 text-danger" for="order_date">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="status">
                                    Status Pengiriman <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="js-example-basic-single w-100 @error('status') is-invalid @enderror"
                                    data-width="100%" id="status" name="status">
                                    <option value="" selected disabled>Pilih Status Pengiriman</option>
                                    <option value="pending">Menunggu Pengiriman</option>
                                    <option value="in transit">Dalam Perjalanan</option>
                                    <option value="delivered">Terkirim</option>
                                </select>
                                @error('status')
                                <label id="status-error" class="error mt-2 text-danger"
                                       for="status">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <div class="row">
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="form-group">
                                        <label for="item_id">
                                            Nama Barang <span class="text-danger">*</span>
                                        </label>
                                        <select
                                            class="js-example-basic-single w-100 @error('item_id') is-invalid @enderror"
                                            data-width="100%" id="item_id" name="item_id">
                                            <option value="" selected disabled>Pilih barang</option>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('item_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('item_id')
                                        <label id="item_id-error" class="error mt-2 text-danger"
                                               for="item_id">
                                            {{ $message }}
                                        </label>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="form-group">
                                        <label for="quantity">
                                            Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <input type="number"
                                               class="form-control @error('quantity') is-invalid @enderror"
                                               id="quantity" name="quantity" autocomplete="off"
                                               placeholder="Jumlah barang" value="{{ old('quantity') }}">
                                        @error('quantity')
                                        <label id="quantity-error" class="error mt-2 text-danger"
                                               for="quantity">
                                            {{ $message }}
                                        </label>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <a href="{{ route('shipments.index') }}" class="btn btn-light">Batal</a>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        </form>
                        <!--end::Form-->
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
    <link rel="stylesheet" href="{{ Vite::asset('resources/vendors/select2/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ Vite::asset('resources/vendors/select2/select2.min.js') }}"></script>
@endpush
