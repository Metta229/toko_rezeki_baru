<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $data['barangkeluar'] = BarangKeluar::paginate(5);
        return view('barangkeluar_index', $data);
    }

    public function create()
    {
        $data['nama_barang'] = Barang::pluck('nama_barang');
        return view('barangkeluar_create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_barang' => 'required|string|max:100',
            'stok_keluar' => 'required|int',
        ]);

        BarangKeluar::create($request->all());

        return redirect('barangkeluar');
    }

    public function laporan()
    {
        $data['barangkeluar'] = BarangKeluar::all();
        return view('barangkeluar_laporan', $data);
    }
    public function edit(BarangKeluar $barangkeluar)
    {
        return view('barangkeluar_edit', compact('barangkeluar'));
    }

    public function update(Request $request, BarangKeluar $barangkeluar)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_barang' => 'required|string|max:100',
            'stok_keluar' => 'required|int',
        ]);

        $barangkeluar->update($request->all());

        return redirect('barangkeluar');
    }

    public function destroy(BarangKeluar $barangkeluar)
    {
        $barangkeluar->delete();

        return redirect('barangkeluar');
    }
}