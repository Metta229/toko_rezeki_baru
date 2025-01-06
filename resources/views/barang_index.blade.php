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
                                        <a href="{{ route('barang.create') }}" class="mr-2 btn btn-primary">Tambah Data
                                            Barang</a>
                                        <a href="{{ route('barang.index') }}" class="btn btn-primary">Refresh Data</a>
                                    </div>
                                    <div class="mb-4 shadow card">
                                        <div class="py-3 card-header">
                                            <h6 class="m-0 font-weight-bold text-primary">DATA BARANG</h6>
                                        </div>
                                        <!-- Search Form -->
                                        <div class="pr-3 d-flex justify-content-end">
                                            <form action="{{ route('barang.index') }}" method="GET" class="form-inline"
                                                style="margin-top: 10px;">
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
                                                            <th class="text-left">ID</th>
                                                            <th class="text-left">Kode Barang</th>
                                                            <th class="text-left">Kategori Barang</th>
                                                            <th class="text-left">Nama Barang</th>
                                                            <th class="text-left">Satuan</th>
                                                            <th class="text-left">Stok Saat Ini</th>
                                                            <th class="text-left">Harga Beli</th>
                                                            <th class="text-left">Harga Jual</th>
                                                            <th class="text-left">Pengaturan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($barang as $i)
                                                        <tr>
                                                            <td class="text-left">{{ $loop->iteration }}</td>
                                                            <td class="text-left">{{ $i->kode_barang }}</td>
                                                            <td class="text-left">{{ $i->kategori_barang }}</td>
                                                            <td class="text-left">{{ $i->nama_barang }}</td>
                                                            <td class="text-left">{{ $i->satuan }}</td>
                                                            <td class="text-left">{{ $i->stok}}</td>
                                                            <td class="text-left">Rp {{ number_format($i->harga_beli, 0,
                                                                ',',
                                                                '.') }}</td>
                                                            <td class="text-left">Rp {{ number_format($i->harga_jual, 0,
                                                                ',',
                                                                '.') }}</td>
                                                            <td class="text-left">
                                                                <a href="{{ route('barang.edit', $i->id) }}"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <form action="{{ route('barang.destroy', $i->id) }}"
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
                                                <!-- Back Button (Visible Only If Searching) -->
                                                @if(request('search'))
                                                <div class="mb-4">
                                                    <a href="{{ route('barang.index') }}"
                                                        class="btn btn-dark btn-sm">Kembali ke Daftar
                                                        Barang</a>
                                                </div>
                                                @endif
                                                <!-- Pagination with preserved search parameter -->
                                                <div class="mt-3 d-flex justify-content">
                                                    {!! $barang->appends(['search' =>
                                                    request('search')])->onEachSide(2)->links() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <footer class="bg-white sticky-footer">
                            <div class="container my-auto">
                                <div class="my-auto text-center copyright">
                                    <span>Copyright &copy; REZEKI BARU 2025</span>
                                </div>
                            </div>
                        </footer>
                        <!-- End of Footer -->
                    </div>
                </div>
            </div>
            @endsection