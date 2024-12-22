@extends('layouts.sba')

@section('isinya')
<div class="container-fluid p-8" style="background-color: transparentwhite;">
    <div class="row m-0">
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
                                        <!-- Profile Image -->
                                        <img class="img-profile rounded-circle mr-2"
                                            src="{{ Auth::user()->profile_image ? asset(Auth::user()->profile_image) : asset('path/to/default-avatar.jpg') }}"
                                            alt="User profile image" width="30" height="30">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name
                                            }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <!-- End of Topbar -->

                        <!-- Welcome Alert Box -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat datang di Sistem Persediaan Barang Rezeki Baru!</strong>
                            <div>
                                <small>Jika ada kendala, hubungi: <strong>087892326435 (Admin)</strong></small>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <!-- Begin Page Content -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-3">
                            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Dashboard</h1>
                        </div>

                        <!-- Top Dashboard Boxes -->
                        <div class="row text-white m-0">
                            <div class="col-md-3 mb-3">
                                <div class="card bg-info shadow-sm">
                                    <div class="card-body">
                                        <p>Barang</p>
                                        <a href="/barang" class="text-white">More info <i
                                                class="bi bi-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card bg-success shadow-sm">
                                    <div class="card-body">
                                        <p>Supplier</p>
                                        <a href="/supplier" class="text-white">More info <i
                                                class="bi bi-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card bg-warning shadow-sm">
                                    <div class="card-body">
                                        <p>Barang Masuk</p>
                                        <a href="/barangmasuk" class="text-white">More info <i
                                                class="bi bi-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card bg-danger shadow-sm">
                                    <div class="card-body">
                                        <p>Barang Keluar</p>
                                        <a href="/barang" class="text-white">More info <i
                                                class="bi bi-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stock Report Table -->
                        <div class="card mx-2 mb-3">
                            <div class="card-header">Laporan Stok Barang</div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Satuan</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Batas Minimal Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Insert dynamic product rows here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <p>&copy; {{ date('Y') }} Toko Rezeki Baru. All rights reserved.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection