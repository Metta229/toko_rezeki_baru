@extends('layouts.sba')

@section('isinya')


<div class="mt-3 container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="border-0 shadow-lg card">
                <div class="p-0 col-md-12">
                    <div class="mt-0 container-fluid">
                        <div id="content-wrapper" class="d-flex flex-column">
                            <div id="content">
                                <!-- Topbar -->
                                <nav class="mb-5 bg-white shadow navbar navbar-expand navbar-light topbar static-top">
                                    <ul class="ml-auto navbar-nav">
                                        <li class="nav-item dropdown no-arrow">
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="mr-2 text-gray-600 d-lg-inline small">Selamat Datang, {{
                                                    Auth::user()->name }}</span>
                                            </a>
                                            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in"
                                                aria-labelledby="userDropdown">
                                                <a class="dropdown-item" href="#">
                                                    <i class="mr-2 text-gray-400 fas fa-user-alt fa-sm fa-fw"></i>
                                                    Profile
                                                </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#logoutModal">
                                                    <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
                                                    Logout
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Begin Page Content -->

                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                <div class="container-fluid">

                                    <!-- Page Heading -->
                                    <div class="mt-3 btn-group">
                                        <a href="{{ route('barangmasuk.create') }}" class="mr-2 btn btn-primary">Tambah
                                            Data Barang Masuk</a>
                                        <a href="{{ route('barangmasuk.index') }}" class="btn btn-primary">Refresh
                                            Data</a>
                                    </div>
                                    <div class="mb-4 shadow card">
                                        <div class="py-3 card-header">
                                            <h6 class="m-0 font-weight-bold text-primary">DATA BARANG MASUK</h6>
                                        </div>
                                        <!-- Search Form -->
                                        <div class="pr-3 d-flex justify-content-end">
                                            <form action="{{ route('barangmasuk.index') }}" method="GET"
                                                class="form-inline" style="margin-top: 10px;">
                                                <div class="input-group" style="width: 250px;">
                                                    <input type="text" name="search"
                                                        class="form-control form-control-sm"
                                                        placeholder="Cari Barang..." value="{{ request('search') }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Cari</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Tanggal</th>
                                                            <th>Nama Supplier</th>
                                                            <th>Nama Barang</th>
                                                            <th>Stok Masuk</th>
                                                            <th>Harga</th>
                                                            <th>Satuan</th>
                                                            <th>Pengaturan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($barangmasuk as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->tanggal }}</td>
                                                            <td>{{ $item->supplier->nama_supplier}}</td>
                                                            <td>{{ $item->barang->nama_barang }}</td>
                                                            <td>{{ $item->stok_masuk }}</td>
                                                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                                            <td>{{ $item->satuan }}</td>
                                                            <td class="text-left">
                                                                <a href="{{ route('barangmasuk.edit', $item->id) }}"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <form
                                                                    action="{{ route('barangmasuk.destroy', $item->id) }}"
                                                                    method="POST" style="display:inline;"
                                                                    onsubmit="return confirm('Anda yakin ingin menghapus Data?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <!-- Pagination -->
                                                <div class="mt-3 d-flex justify-content-center">
                                                    {!! $barangmasuk->links() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @push('styles')
                            <style>
                                /* Gaya Tabel */
                                .table-bordered {
                                    border: 1px solid #ddd;
                                }

                                .table-bordered th,
                                .table-bordered td {
                                    border: 1px solid #ddd;
                                }

                                /* Text Alignment */
                                .table th,
                                .table td {
                                    text-align: left;
                                    vertical-align: middle;
                                }

                                /* Gaya Pagination */
                                .pagination li a {
                                    color: #007bff;
                                    background-color: #fff;
                                    border: 1px solid #ddd;
                                    padding: 8px 12px;
                                    border-radius: 4px;
                                    transition: all 0.3s ease;
                                }

                                .pagination li a:hover {
                                    background-color: #e9ecef;
                                }

                                .pagination li.active span {
                                    background-color: #007bff;
                                    color: #fff;
                                    border-color: #007bff;
                                }
                            </style>
                            @endpush
                            @endsection