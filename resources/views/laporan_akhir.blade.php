@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center">
                    <!-- Store Name and Address -->
                    <h2>Toko Rezeki Baru</h2>
                    <p>Pematang Lumut</p>
                    <h3>Laporan Akhir</h3>
                </div>

                <div class="card-body p-4">
                    <table class="table table-hover table-responsive-md table-bordered strong">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Stok Masuk</th>
                                <th class="text-center">Stok Keluar</th>
                                <th class="text-center">Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                                <tr>
                                    <td class="text-center">{{ $item['nama_barang'] }}</td>
                                    <td class="text-center">{{ $item['stok_masuk'] }}</td>
                                    <td class="text-center">{{ $item['stok_keluar'] }}</td>
                                    <td class="text-center">{{ $item['sisa'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>
                    <a href="https://wa.link/446hj2">Admin 0878-9232-6435</a><br>
                    <a href="https://www.instagram.com/im_july2207?igsh=YTNsZnlodGdkeGF3">Instagram</a><br>
                    <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWsdHHVlKFxBXDzGJLxHMJNxSFnkmggmDTtVGbcwZxCttpLRxgHCtmbCddBPTpnJzWqHbpqWq">Email</a>
                </div>

                <div class="card-footer bg-light">
                    <h6 class="text">
                        Mengetahui,
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <strong>Pemilik Toko</strong>
                    </h6>
                    <button onclick="window.print()" class="btn btn-primary mt-3 d-print-none">Cetak Laporan</button>
                    <a href="/home" class="btn btn-secondary mt-3 ml-2 d-print-none">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            font-size: 1.25rem;
            text-align: center;
        }

        .card-body {
            padding: 30px;
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-responsive-md {
            overflow-x: auto;
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 15px;
            border: 1px solid #000;
        }

        .thead-dark th {
            background-color: #343a40;
            color: #fff;
        }

        .card-footer {
            background-color: #e9ecef;
            padding: 20px;
        }

        .card-footer h6 {
            margin: 0;
            font-size: 1rem;
            color: #555;
        }

        .card-footer strong {
            font-size: 1.1rem;
            color: #333;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .card, .card * {
                visibility: visible;
            }

            .card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                page-break-inside: avoid;
                border: none;
                box-shadow: none;
            }

            .card-header, .card-footer {
                background-color: black !important;
                color: #fff !important;
                -webkit-print-color-adjust: exact;
            }

            .card-body {
                padding: 0;
            }

            .table th, .table td {
                padding: 10px;
            }

            .thead-dark th {
                background-color: #343a40 !important;
                -webkit-print-color-adjust: exact;
            }

            .table-hover tbody tr:hover {
                background-color: transparent !important;
            }

            .btn {
                display: none !important;
            }

            .row, .col-md-12 {
                margin: 0;
                padding: 0;
            }
        }
    </style>
    @endpush
@endsection
