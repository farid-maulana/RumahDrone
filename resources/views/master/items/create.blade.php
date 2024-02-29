@extends('layouts.master')

@section('content')
    <div class="page-content">
        <!--begin::Page heading-->
        <nav class="page-breadcrumb">
            <!--begin::Title-->
            <h4 class="mb-1">Data Barang</h4>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Data Barang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
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
                        <form class="forms-sample" action="{{ route('items.store') }}" method="POST">
                            @csrf
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="code">
                                    Kode Barang <span class="text-danger">*</span>
                                    <span style="font-size: 12px; color: #6c757d;">(max. 10 karakter)</span>
                                </label>
                                <input type="text" class="required form-control @error('code') is-invalid @enderror"
                                       id="code" name="code" autocomplete="off" placeholder="Kode barang"
                                       value="{{ old('code') }}">
                                @error('code')
                                <label id="code-error" class="error mt-2 text-danger" for="code">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="name">Nama Barang <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" autocomplete="off" placeholder="Nama barang"
                                       value="{{ old('name') }}">
                                @error('name')
                                <label id="name-error" class="error mt-2 text-danger" for="name">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="description">Deskripsi Barang</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" autocomplete="off"
                                          placeholder="Deskripsi barang" rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                <label id="description-error" class="error mt-2 text-danger" for="description">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="quantity">Stok</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                       id="quantity" name="quantity" autocomplete="off"
                                       placeholder="Stok barang" value="{{ old('quantity') }}">
                                @error('quantity')
                                <label id="quantity-error" class="error mt-2 text-danger" for="quantity">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="form-group">
                                <label for="minimum_stock">
                                    Minimum Stok
                                    <span class="text-danger">*</span>
                                    <span style="font-size: 12px; color: #6c757d">(stok yang akan digunakan sebagai acuan alert stok menipis)</span>
                                </label>
                                <input type="number"
                                       class="form-control @error('minimum_stock') is-invalid @enderror"
                                       id="minimum_stock" name="minimum_stock" autocomplete="off"
                                       placeholder="Minimum Stok" value="{{ old('minimum_stock') }}">
                                @error('minimum_stock')
                                <label id="minimum_stock-error" class="error mt-2 text-danger"
                                       for="minimum_stock">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <a href="{{ route('items.index') }}" class="btn btn-light">Batal</a>
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
