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
                <li class="breadcrumb-item active" aria-current="page">Ubah Pengiriman Barang</li>
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
                        <form class="forms-sample" action="{{ route('shipments.update', $shipment->id) }}"
                              method="POST">
                            @csrf
                            @method('PUT')
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="order_number">
                                    Nomor Pesanan <span class="text-danger">*</span>
                                    <span style="font-size: 12px; color: #6c757d;">(max. 10 karakter)</span>
                                </label>
                                <input type="text"
                                       class="form-control @error('order_number') is-invalid @enderror"
                                       id="order_number" name="order_number" autocomplete="off"
                                       placeholder="Nomor pesanan"
                                       value="{{ $shipment->order_number }}">
                                @error('order_number')
                                <label id="order_number-error" class="error mt-2 text-danger" for="order_number">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="customer">Nama Customer <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('customer') is-invalid @enderror"
                                       id="customer" name="customer" autocomplete="off" placeholder="Nama customer"
                                       value="{{ $shipment->customer }}">
                                @error('customer')
                                <label id="customer-error" class="error mt-2 text-danger" for="customer">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="address">Alamat Customer <span class="text-danger">*</span> </label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                          id="address" name="address" autocomplete="off"
                                          placeholder="Alamat customer" rows="3">{{ $shipment->address }}</textarea>
                                @error('address')
                                <label id="address-error" class="error mt-2 text-danger" for="address">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="order_date">Tanggal Pemesanan</label>
                                <input type="date" class="form-control @error('order_date') is-invalid @enderror"
                                       id="order_date" name="order_date" value="{{ $shipment->order_date }}">
                                @error('order_date')
                                <label id="order_date-error" class="error mt-2 text-danger" for="order_date">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="shipment_date">Tanggal Pengiriman</label>
                                <input type="date" class="form-control @error('shipment_date') is-invalid @enderror"
                                       id="shipment_date" name="shipment_date"
                                       value="{{ $shipment->shipment_date }}" {{ $shipment->status == 'pending' ? 'disabled' : '' }}>
                                @error('shipment_date')
                                <label id="shipment_date-error" class="error mt-2 text-danger" for="shipment_date">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="delivery_date">Tanggal Terkirim</label>
                                <input type="date" class="form-control @error('delivery_date') is-invalid @enderror"
                                       id="delivery_date" name="delivery_date"
                                       value="{{ $shipment->delivery_date }}" {{ $shipment->status != 'delivered' ? 'disabled' : '' }}>
                                @error('delivery_date')
                                <label id="delivery_date-error" class="error mt-2 text-danger" for="delivery_date">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="status">
                                    Status <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="js-example-basic-single w-100 @error('status') is-invalid @enderror"
                                    data-width="100%" id="status" name="status">
                                    <option value="pending" {{ $shipment->status == 'pending' ? 'selected' : '' }}>
                                        Menunggu Pengiriman
                                    </option>
                                    <option
                                        value="in transit" {{ $shipment->status == 'in transit' ? 'selected' : '' }}>
                                        Dalam Perjalanan
                                    </option>
                                    <option value="delivered" {{ $shipment->status == 'delivered' ? 'selected' : '' }}>
                                        Terkirim
                                    </option>
                                </select>
                                @error('item_id')
                                <label id="item_id-error" class="error mt-2 text-danger"
                                       for="item_id">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Column-->
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="form-group">
                                        <label for="item_id">
                                            Nama Barang <span class="text-danger">*</span>
                                        </label>
                                        <select
                                            class="js-example-basic-single w-100 @error('item_id') is-invalid @enderror"
                                            data-width="100%" id="item_id" name="item_id">
                                            <option value="" disabled>Pilih barang</option>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $shipment->item_id == $item->id ? 'selected' : '' }}>
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
                                <!--end::Column-->
                                <!--begin::Column-->
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="form-group">
                                        <label for="quantity">
                                            Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <input type="number"
                                               class="form-control @error('quantity') is-invalid @enderror"
                                               id="quantity" name="quantity" autocomplete="off"
                                               placeholder="Jumlah barang"
                                               value="{{ $shipment->quantity }}">
                                        @error('quantity')
                                        <label id="quantity-error" class="error mt-2 text-danger"
                                               for="quantity">
                                            {{ $message }}
                                        </label>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Column-->
                            </div>
                            <!--end::Row-->
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
    <script>
        $(document).ready(function () {
            $('#status').on('change', fn => {
                const status = fn.target.value;
                const shipmentDate = $('#shipment_date');
                const deliveryDate = $('#delivery_date');
                // get date today
                const today = new Date();
                const year = today.getFullYear();
                const month = ('0' + (today.getMonth() + 1)).slice(-2);
                const day = ('0' + today.getDate()).slice(-2);
                const formattedDate = year + '-' + month + '-' + day;

                if (status === 'pending') {
                    shipmentDate.prop('disabled', true);
                    shipmentDate.val(null);
                    deliveryDate.prop('disabled', true);
                    deliveryDate.val(null);
                } else if (status === 'in transit') {
                    shipmentDate.prop('disabled', false);
                    shipmentDate.val(formattedDate)
                    deliveryDate.prop('disabled', true);
                    deliveryDate.val(null);
                } else {
                    shipmentDate.prop('disabled', false);
                    shipmentDate.val(formattedDate)
                    deliveryDate.prop('disabled', false);
                    deliveryDate.val(formattedDate)
                }
            });
        });
    </script>
@endpush
