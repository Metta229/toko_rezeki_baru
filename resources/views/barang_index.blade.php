@extends('layouts.sba')

@section('isinya')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
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
                                <div class="d-sm-flex align-items-center mb-3">
                                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold"> DATA BARANG</h1>
                                </div>

                                <!-- Add New Item Button and Search Form -->
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="btn-group">
                                        <a href="{{ route('barang.create') }}" class="btn btn-primary mr-2">Tambah Data
                                            Barang</a>
                                        <a href="{{ route('barang.index') }}" class="btn btn-primary">Refresh Data</a>
                                    </div>
                                    <!-- Search Form -->
                                    <form action="{{ route('barang.index') }}" method="GET" class="form-inline">
                                        <div class="input-group" style="width: 250px;">
                                            <input type="text" name="search" class="form-control form-control-sm"
                                                placeholder="Cari Barang..." value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <table class="table table-bordered table-hover table-responsive-md">
                                    <thead class="bg-light text-primary">
                                        <tr>
                                            <th class="text-left">ID</th>
                                            <th class="text-left">Kode Barang</th>
                                            <th class="text-left">Nama Barang</th>
                                            <th class="text-left">Satuan</th>
                                            <th class="text-left">Kategori Barang</th>
                                            <th class="text-left">Harga</th>
                                            <th class="text-left">Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $i)
                                        <tr>
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $i->kode_barang }}</td>
                                            <td class="text-left">{{ $i->nama_barang }}</td>
                                            <td class="text-left">{{ $i->satuan }}</td>
                                            <td class="text-left">{{ $i->kategori_barang }}</td>
                                            <td class="text-left">Rp {{ number_format($i->harga, 0, ',', '.') }}</td>
                                            <td class="text-left">
                                                <a href="{{ route('barang.edit', $i->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <form action="{{ route('barang.destroy', $i->id) }}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Anda yakin ingin menghapus Data?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Back Button (Visible Only If Searching) -->
                                @if(request('search'))
                                <div class="mb-4">
                                    <a href="{{ route('barang.index') }}" class="btn btn-dark btn-sm">Kembali ke Daftar
                                        Barang</a>
                                </div>
                                @endif

                                <!-- Pagination with preserved search parameter -->
                                <div class="d-flex justify-content mt-3">
                                    {!! $barang->appends(['search' => request('search')])->onEachSide(2)->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@push('styles')
<style>
    /* Adjust the search box width */
    .input-group {
        max-width: 250px;
    }

    /* Ensure the table cells have defined borders */
    .table-bordered {
        border: 1px solid #ddd;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #ddd;
    }

    /* Add some padding inside table cells */
    .table th,
    .table td {
        padding: 12px 15px;
    }

    /* Hover effect for rows */
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>
@endpush
@endsection