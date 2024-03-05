<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <title>Pelaporan Inventaris Gudang</title>

    <meta charset="utf-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">

    <!--begin::Stylesheets(used for this page only)-->
    <style type="text/css">
        /* Font Definitions */
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        table {
            font-family: 'Open Sans', sans-serif;
        }

        /* Responsive Image */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #727cf5;
            color: white;
        }
    </style>
    <!--end::Stylesheets-->
</head>
<!--end::Head-->

<!--begin::Body-->
<body>
<!--begin::Header-->
<div class="text-center">
    <h2>Laporan Inventaris Gudang ({{ \Carbon\Carbon::now()->format('d/m/Y') }})</h2>
</div>
<hr
    style="border-top:solid 1px #000000; border-bottom:solid 1px #000000; line-height:normal; color:#FFFFFF; margin-top:2px;">
<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="jurusan_table">
    <thead>
    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
        <th>#</th>
        <th>Nama Barang</th>
        <th>Kode Barang</th>
        <th>Total Barang</th>
        <th>Barang Masuk</th>
        <th>Barang Keluar</th>
        <th>Minimum Stok</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
    @forelse($data as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->code }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->total_barang_masuk ?? 0 }}</td>
            <td>{{ $item->total_barang_keluar ?? 0 }}</td>
            <td>{{ $item->minimum_stock }}</td>
            <td>
                @if($item->quantity <= $item->minimum_stock)
                    Stok Menipis
                @elseif($item->quantity === 0)
                    Stok Habis
                @else
                    Tersedia
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" style="align-content: center">Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>
<!--end::Table-->
</body>
<!--end::Body-->
</html>
