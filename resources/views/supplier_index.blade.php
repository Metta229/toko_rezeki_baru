@extends('layouts.sba')

@section('isinya')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <!-- Main Content -->
                <div class="col-md-12 p-0">
                    <div class="container-fluid mt-0">
                        <div id="content-wrapper" class="d-flex flex-column">
                            <div id="content">
                                <!-- Topbar -->
                                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-5 static-top shadow">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown no-arrow">
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="mr-2 d-lg-inline text-gray-600 small">Selamat Datang, {{
                                                    Auth::user()->name }}</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                aria-labelledby="userDropdown">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Profile
                                                </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#logoutModal">
                                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Logout
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Begin Page Content -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-3">
                                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold"> DATA SUPPLIER</h1>
                                </div>

                                <!-- Add New Item Button and Search Form -->
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="btn-group">
                                        <a href="{{ route('supplier.create') }}" class="btn btn-primary mr-2">Tambah
                                            Data Supplier</a>
                                        <a href="{{ route('supplier.index') }}" class="btn btn-primary">Refresh Data</a>
                                    </div>
                                    <!-- Search Form -->
                                    <form action="{{ route('supplier.index') }}" method="GET" class="form-inline">
                                        <div class="input-group" style="width: 250px;">
                                            <input type="text" name="search" class="form-control form-control-sm"
                                                placeholder="Cari Supplier" value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Table with borders and left-aligned text -->
                                <table class="table table-bordered table-hover table-responsive-md">
                                    <thead class="bg-light text-primary">
                                        <tr>
                                            <th class="text-left">ID</th>
                                            <th class="text-left">Kode Supplier</th>
                                            <th class="text-left">Nama Supplier</th>
                                            <th class="text-left">Alamat</th>
                                            <th class="text-left">Nomor Telepon</th>
                                            <th class="text-left">Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($supplier as $i)
                                        <tr>
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $i->kode_supplier }}</td>
                                            <td class="text-left">{{ $i->nama_supplier }}</td>
                                            <td class="text-left">{{ $i->alamat }}</td>
                                            <td class="text-left">{{ $i->nomor_hp }}</td>
                                            <td class="text-left">
                                                <!-- Edit Button -->
                                                <a href="{{ route('supplier.edit', ['id' => $i->id]) }}"
                                                    class="btn btn-success btn-sm">
                                                    Edit
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('supplier.destroy', $i->id) }}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Anda yakin ingin menghapus Data?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach


                                        @push('styles')
                                        <style>
                                            /* Add borders to the table */
                                            .table-bordered {
                                                border: 1px solid #ddd;
                                            }

                                            .table-bordered th,
                                            .table-bordered td {
                                                border: 1px solid #ddd;
                                                /* Add borders to each cell */
                                                padding: 12px 15px;
                                                /* Add some padding for readability */
                                            }

                                            /* Hover effect for table rows */
                                            .table-hover tbody tr:hover {
                                                background-color: #f1f1f1;
                                            }

                                            /* Adjust pagination styles */
                                            .pagination-container {
                                                margin-top: 20px;
                                            }

                                            .pagination {
                                                margin: 0;
                                            }

                                            .pagination li {
                                                margin: 0 2px;
                                            }

                                            .pagination li a {
                                                color: #007bff;
                                                text-decoration: none;
                                                background-color: #fff;
                                                border: 1px solid #ddd;
                                                padding: 8px 12px;
                                                border-radius: 4px;
                                                transition: background-color 0.3s, border-color 0.3s;
                                            }

                                            .pagination li a:hover {
                                                background-color: #e9ecef;
                                                border-color: #ddd;
                                            }

                                            .pagination li.active span {
                                                color: #fff;
                                                background-color: #007bff;
                                                border-color: #007bff;
                                                padding: 8px 12px;
                                                border-radius: 4px;
                                            }

                                            .pagination li.disabled span {
                                                color: #6c757d;
                                                pointer-events: none;
                                                background-color: #fff;
                                                border-color: #ddd;
                                                padding: 8px 12px;
                                                border-radius: 4px;
                                            }
                                        </style>
                                        @endpush
                                        @endsection