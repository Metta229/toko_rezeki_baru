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

        $barang = $query->paginate(10);

        return view('barang_index', compact('barang'));
    }

    public function create()
    {
        $data['list_satuan'] = ['SACHET', 'SLOP', 'BUNGKUS', 'PCS', 'KARUNG', 'DUS', 'KG', 'PACK', 'LITER', 'BOTOL', 'KOTAK', 'KALENG'];
        $data['list_kategori'] = ['SABUN', 'MINYAK', 'BERAS', 'PASTA GIGI', 'ROKOK', 'CEMILAN', 'PENYEDAP RASA', 'KECAP & SAUS', 'SUSU', 'KOPI', 'TEH', 'SHAMPOO', 'SAGU & TEPUNG', 'GULA', 'BIHUN', 'MINUMAN', 'MIE'];

        return view('barang_create', $data);
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric', // Validasi harga harus ada dan numeric
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
            'kategori_barang' => $kategori_barang,
            'harga' => $request->harga, // Pastikan ini berisi angka yang benar
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
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
        $data['list_satuan'] = ['SACHET', 'SLOP', 'BUNGKUS', 'PCS', 'KARUNG', 'DUS', 'KG', 'PACK', 'LITER', 'BOTOL', 'KOTAK', 'KALENG'];
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
            'harga' => 'required|numeric', // Memastikan harga adalah angka dan tidak negatif
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
        $barang->harga = $request->harga;

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
