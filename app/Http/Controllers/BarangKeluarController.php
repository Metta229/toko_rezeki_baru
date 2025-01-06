<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\barangkeluar;
use App\Models\Supplier;
use Illuminate\Http\Request;

class barangkeluarController extends Controller
{
    public function index()
    {
        $data['barangkeluar'] = barangkeluar::with(['supplier', 'barang'])->paginate(5);
        $data['judul'] = 'Data Barang Masuk';

        return view('barangkeluar_index', $data);
    }

    public function create()
    {
        $data['list_satuan'] = ['SACHET', 'SLOP', 'BUNGKUS', 'PCS', 'SACK', 'KARUNG', 'DUS', 'KG', 'PACK', 'LITER', 'BOTOL', 'KOTAK', 'KALENG'];
        $supplier = Supplier::selectRaw("id, concat(kode_supplier,' - ',nama_supplier) as tampil")->pluck('tampil', 'id');
        $barang = Barang::selectRaw("id, concat(kode_barang,' - ',nama_barang) as tampil")->pluck('tampil', 'id');

        return view('barangkeluar_create', [
            'judul' => 'Tambah Barang Masuk',
            'alamat_rute' => 'barangkeluar.store', // Pastikan rute sesuai
            'cara' => 'POST',
            'tombol' => 'Simpan',
            'supplier_id' => $supplier, // Data supplier yang diperlukan untuk dropdown
            'barang_id' => $barang, // Data barang yang diperlukan untuk dropdown
            'list_satuan' => $data['list_satuan'], // Mengirim list_satuan ke view
        ]);
    }

    public function store(Request $request)
    {
        // Validasi form input
        $request->validate([
            'supplier_id' => 'required',
            'barang_id' => 'required',
            'tanggal' => 'required|date',
            'Jumlah_keluar' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|string',
        ]);

        // Menyimpan data barang masuk
        $barangkeluar = new barangkeluar;
        $barangkeluar->supplier_id = $request->supplier_id;
        $barangkeluar->barang_id = $request->barang_id;
        $barangkeluar->tanggal = $request->tanggal;
        $barangkeluar->Jumlah_keluar = $request->Jumlah_keluar;
        $barangkeluar->harga = $request->harga;
        $barangkeluar->satuan = $request->satuan;
        $barangkeluar->save();

        return redirect()->route('barangkeluar.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $st = ['SACHET', 'SLOP', 'BUNGKUS', 'PCS', 'SACK', 'KARUNG', 'DUS', 'KG', 'PACK', 'LITER', 'BOTOL', 'KOTAK', 'KALENG'];

        // Ambil data barang masuk berdasarkan id
        $barangkeluar = barangkeluar::findOrFail($id);

        // Ambil semua supplier untuk dropdown
        $supplier = Supplier::pluck('nama_supplier', 'id');

        // Ambil semua barang untuk dropdown
        $barang = Barang::pluck('nama_barang', 'id');

        // Kirim data ke view
        return view('barangkeluar_edit', [
            'judul' => 'Edit Barang Masuk',
            'barangkeluar' => $barangkeluar,
            'supplier_id' => $supplier, // Data supplier
            'barang_id' => $barang, // Data barang
            'st' => $st,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id' => 'required',
            'tanggal' => 'required|date',
            'nama_supplier' => 'required|string',  // Menggunakan nama_supplier
            'nama_barang' => 'required|string',    // Menggunakan nama_barang
            'Jumlah_keluar' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|string',
        ]);

        // Temukan data barangkeluar yang akan diupdate
        $barangkeluar = barangkeluar::findOrFail($id);

        // Update data barang masuk
        $barangkeluar->update([
            'tanggal' => $request->tanggal,
            'nama_supplier' => $request->nama_supplier,  // Menggunakan nama_supplier
            'nama_barang' => $request->nama_barang,      // Menggunakan nama_barang
            'Jumlah_keluar' => $request->Jumlah_keluar,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('barangkeluar.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barangkeluar = barangkeluar::findOrFail($id);
        $barangkeluar->delete();

        return redirect()->route('barangkeluar.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}
