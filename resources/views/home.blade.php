@extends('layouts.sba')

@section('isinya')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="ml-auto navbar-nav">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 text-gray-600 d-none d-lg-inline small">{{ Auth::user()->name }}</span>
                        <img class="img-profile rounded-circle"
                            src="{{ Auth::user()->profile_image ? asset(Auth::user()->profile_image) : asset('path/to/undraw_profile_3') }}"
                            alt="User profile image" width="30" height="30">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
    </div>

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
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4 d-sm-flex align-items-center justify-content-between">
            <h1 class="mb-0 text-gray-800 h3">Dashboard</h1>
            <a href="/laporan" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">
                                    BARANG</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold"></div>
                            </div>
                            <div class="col-auto">
                                <i class="text-gray-300 fas fa-calendar fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
                <div class="py-2 shadow card border-left-success h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                    Earnings (Annual)</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="text-gray-300 fas fa-dollar-sign fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
                <div class="py-2 shadow card border-left-info h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">
                                    Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="mb-0 mr-3 text-gray-800 h5 font-weight-bold">50%
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mr-2 progress progress-sm">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="text-gray-300 fas fa-clipboard-list fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
                <div class="py-2 shadow card border-left-warning h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">
                                    Pending Requests</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="text-gray-300 fas fa-comments fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 col-lg-6">

            <!-- Approach -->
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                        CSS bloat and poor page performance. Custom CSS classes are used to create
                        custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the
                        Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="my-auto text-center copyright">
            <span>Copyright &copy; REZEKI BARU 2024</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Yakin Ingin Log Out</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection