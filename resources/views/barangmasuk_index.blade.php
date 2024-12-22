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
                                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold">DATA BARANG MASUK</h1>
                                </div>

                                <!-- Add New Item Button and Search Form -->
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="btn-group">
                                        <a href="{{ route('barangmasuk.create') }}" class="btn btn-primary mr-2">Tambah
                                            Data
                                            Produk</a>
                                        <a href="{{ route('barangmasuk.index') }}" class="btn btn-primary">Refresh
                                            Data</a>
                                    </div>
                                    <!-- Search Form -->
                                    <form action="{{ route('barangmasuk.index') }}" method="GET" class="form-inline">
                                        <div class="input-group" style="width: 250px;">
                                            <input type="text" name="search" class="form-control form-control-sm"
                                                placeholder="Cari produk..." value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Body Card -->
                                <div class="card-body p-4">
                                    <!-- Tabel Barang Masuk -->
                                    <table class="table table-bordered table-hover table-responsive-md">
                                        <thead class="bg-light text-primary">
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
                                            {{-- <script>
                                                // Mengonversi data barangmasuk ke format JSON dan menampilkannya di console
                                                var barangMasukData = @json($barangmasuk);
                                                console.log(barangMasukData);
                                            </script> --}}
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->supplier}}</td>
                                                <td>{{ $item->barang }}</td>
                                                <td>{{ $item->stok_masuk }}</td>
                                                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('barangmasuk.edit', $item->id) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                    <!-- Tombol Hapus -->
                                                    <form action="{{ route('barangmasuk.destroy', $item->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Anda yakin ingin menghapus Data?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Pagination -->
                                    <div class="d-flex justify-content-center mt-3">
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