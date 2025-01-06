<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {

        // Dapatkan hasil pencarian dengan paginasi
        $query = Barang::query();
        if ($request->has('search') && $request->search) {
            $query->where('nama_barang', 'like', '%'.$request->search.'%')
                ->orWhere('kode_barang', 'like', '%'.$request->search.'%')
                ->orWhere('kategori_barang', 'like', '%'.$request->search.'%');

        }
        $barang = Barang::orderBy('id', 'desc')->get();
        $barang = $query->paginate(10);

        return view('barang_index', compact('barang'));
    }

    public function create()
    {
        $data['list_satuan'] = ['SACHET', 'SLOP', 'BUNGKUS', 'PCS', 'SACK', 'KARUNG', 'DUS', 'KG', 'PACK', 'LITER', 'BOTOL', 'KOTAK', 'KALENG'];
        $data['list_kategori'] = ['SABUN', 'MINYAK', 'BERAS', 'PASTA GIGI', 'ROKOK', 'CEMILAN', 'PENYEDAP RASA', 'KECAP & SAUS', 'SUSU', 'KOPI', 'TEH', 'SHAMPOO', 'SAGU & TEPUNG', 'GULA', 'BIHUN', 'MINUMAN', 'MIE'];

        return view('barang_create', $data);
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string',
            'stok' => 'required|numeric|min:1',
            'harga_jual' => 'required|numeric', // Validasi harga harus ada dan numeric
            'harga_beli' => 'required|numeric',
        ]);

        // Mapping kategori berdasarkan kode barang
        $kodeKategoriMap = [
            'my' => 'MINYAK',
            'br' => 'BERAS',
            'sb' => 'SABUN',
            'rk' => 'ROKOK',
            'cm' => 'CEMILAN',
            'pr' => 'PENYEDAP RASA',
            'ks' => 'KECAP & SAUS',
            'ss' => 'SUSU',
            'kp' => 'KOPI',
            'th' => 'TEH',
            'sp' => 'SHAMPOO',
            'st' => 'SAGU & TEPUNG',
            'gl' => 'GULA',
            'bh' => 'BIHUN',
            'mn' => 'MINUMAN',
            'me' => 'MIE',
        ];

        // Tentukan kategori berdasarkan kode awal
        $kodeAwal = strtolower(substr($request->kode_barang, 0, 2));
        $kategori_barang = $kodeKategoriMap[$kodeAwal] ?? 'Lainnya';

        // Simpan data barang
        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'kategori_barang' => $kategori_barang,
            'harga_jual' => $request->harga_jual, // Pastikan ini berisi angka yang benar
            'harga_beli' => $request->harga_beli,
        ]);

        // Flash message untuk notifikasi
        session()->flash('success', 'Data telah berhasil tersimpan.');

        // Redirect ke halaman tabel barang
        return redirect()->route('barang.index');
    }

    public function laporan()
    {
        $data['barang'] = Barang::all();

        return view('barang_laporan', $data);
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $data['barang'] = $barang;
        $data['list_satuan'] = ['SACHET', 'SLOP', 'BUNGKUS', 'PCS', 'SACK', 'KARUNG', 'DUS', 'KG', 'PACK', 'LITER', 'BOTOL', 'KOTAK', 'KALENG'];
        $data['list_kategori'] = ['SABUN', 'MINYAK', 'BERAS', 'PASTA GIGI', 'ROKOK', 'CEMILAN', 'PENYEDAP RASA', 'KECAP & SAUS', 'SUSU', 'KOPI', 'TEH', 'SHAMPOO', 'SAGU & TEPUNG', 'GULA', 'BIHUN', 'MINUMAN', 'MIE'];

        return view('barang_edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string',
            'stok' => 'required|numeric|min:1',
            'harga_jual' => 'required|numeric', // Validasi harga harus ada dan numeric
            'harga_beli' => 'required|numeric',
        ]);
        // Peta kode kategori ke nama kategori
        $kodeKategoriMap = [
            'my' => 'MINYAK',
            'br' => 'BERAS',
            'sb' => 'SABUN',
            'rk' => 'ROKOK',
            'cm' => 'CEMILAN',
            'pr' => 'PENYEDAP RASA',
            'ks' => 'KECAP & SAUS',
            'ss' => 'SUSU',
            'kp' => 'KOPI',
            'th' => 'TEH',
            'sp' => 'SHAMPOO',
            'st' => 'SAGU & TEPUNG',
            'gl' => 'GULA',
            'bh' => 'BIHUN',
            'mn' => 'MINUMAN',
            'me' => 'MIE',
        ];

        // Ambil dua huruf awal dari kode barang
        $kodeAwal = strtolower(substr($request->kode_barang, 0, 2));

        // Tentukan kategori berdasarkan kode awal
        $kategori_barang = $kodeKategoriMap[$kodeAwal] ?? 'Lainnya';

        // Update data barang
        $barang = Barang::findOrFail($id);
        $barang->update(array_merge($request->all(), ['kategori_barang' => $kategori_barang]));
        $barang->harga_jual = $request->harga_jual;
        $barang->harga_beli = $request->harga_beli;

        // Redirect ke halaman daftar barang
        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data barang
        $barang = Barang::findOrFail($id);
        $barang->delete();

        // Redirect ke halaman daftar barang
        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil terhapus.');
    }
}
