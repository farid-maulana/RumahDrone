@extends('layouts.master')

@section('content')
    <div class="page-content">
        <!--begin::Page heading-->
        <nav class="page-breadcrumb">
            <!--begin::Title-->
            <h4 class="mb-1">Inventaris</h4>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Inventaris</li>
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
                            <a href="{{ route('items.create') }}" class="btn btn-primary">
                                <i class="link-icon" data-feather="plus"></i>
                                Tambah Inventaris
                            </a>
                        </div>
                        <!--end::Create new button-->
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <caption></caption>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Minimum Stok</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($items as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->minimum_stock }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                <i data-feather="edit" class="text-white"
                                                   style="width: 14px; height: 14px;"></i>
                                            </a>
                                            <form id="deleteItemForm{{ $item->id }}"
                                                  action="{{ route('items.destroy', $item->id) }}" method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                        onclick="confirmDelete('deleteItemForm{{ $item->id }}')"
                                                        class="btn btn-danger btn-sm">
                                                    <i data-feather="trash" class="text-white"
                                                       style="width: 14px; height: 14px;"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
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
