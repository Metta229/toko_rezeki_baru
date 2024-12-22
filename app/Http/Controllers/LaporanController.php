<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel barangmasuk dan barangkeluar
        $barangMasuk = DB::table('barangmasuk')->select('nama_barang', DB::raw('SUM(stok_masuk) as stok_masuk'))->groupBy('nama_barang')->get();
        $barangKeluar = DB::table('barangkeluar')->select('nama_barang', DB::raw('SUM(stok_keluar) as stok_keluar'))->groupBy('nama_barang')->get();

        // Menggabungkan data berdasarkan nama_barang
        $laporan = [];
        foreach ($barangMasuk as $bm) {
            $nama_barang = $bm->nama_barang;
            $stok_masuk = $bm->stok_masuk;

            $bk = $barangKeluar->firstWhere('nama_barang', $nama_barang);
            $stok_keluar = $bk ? $bk->stok_keluar : 0;

            $laporan[] = [
                'nama_barang' => $nama_barang,
                'stok_masuk' => $stok_masuk,
                'stok_keluar' => $stok_keluar,
                'sisa' => $stok_masuk - $stok_keluar,
            ];
        }

        // Mengembalikan view dengan data laporan
        return view('laporan_akhir', compact('laporan'));
    }
}
