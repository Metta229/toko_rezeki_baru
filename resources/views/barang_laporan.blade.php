@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>
                    <center>Laporan Barang</center>
                </h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>
                                <center>ID</center>
                            </th>
                            <th>
                                <center>Kode Barang</center>
                            </th>
                            <th>
                                <center>Nama Barang</center>
                            </th>
                            <th>
                                <center>Stok</center>
                            </th>
                            <th>
                                <center>Satuan</center>
                            </th>
                            <th>
                                <center>Kategori Barang</center>
                            </th>
                            <th>
                                <center>Tanggal</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $i)
                        <tr>
                            <td>
                                <center>{{ $loop->iteration }}</center>
                            </td>
                            <td>
                                <center>{{ $i->kode_barang }}</center>
                            </td>
                            <td>
                                <center>{{ $i->nama_barang }}</center>
                            </td>
                            <td>
                                <center>{{ $i->stok }}</center>
                            </td>
                            <td>
                                <center>{{ $i->satuan }}</center>
                            </td>
                            <td>
                                <center>{{ $i->kategori_barang }}</center>
                            </td>
                            <td>
                                <center>{{ $i->created_at }}</center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h6>Mengetahui,</h6>
                <br>
                <br>
                <h6>Pemilik Toko</h6>
            </div>
        </div>
    </div>
</div>

<style>
    .table-pink {
        background-color: pink;
        /* Warna latar belakang pink */
    }

    .table-pink th,
    .table-pink td {
        border: 1px solid pink;
        padding: 8px;
    }

    .table-pink th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: pink;
        /* Warna header pink */
        color: black;
    }

    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }

    .pagination li {
        margin: 0 3px;
    }

    .pagination li a {
        color: red;
        text-decoration: brown;
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 8px 12px;
        border-radius: 3px;
    }

    .pagination li a:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .pagination li.active span {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        padding: 8px 12px;
        border-radius: 3px;
    }

    .pagination li.disabled span {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
        padding: 8px 12px;
        border-radius: 3px;
    }
</style>

@endsection