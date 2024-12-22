<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $supplier = Supplier::all();
        $search = $request->get('search');

        // Query to get the supplier, applying the search filter if provided
        $supplier = Supplier::when($search, function ($query, $search) {
            return $query->where('nama_supplier', 'like', "%{$search}%")
                ->orWhere('kode_supplier', 'like', "%{$search}%");
        })->paginate(10);

        return view('supplier_index', compact('supplier'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat supplier baru
        return view('supplier_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_supplier' => 'required',
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil ditambahkan');
    }

    public function laporan()
    {
        $data['supplier'] = Supplier::all();

        return view('supplier_laporan', $data);
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        $data['supplier'] = $supplier;

        return view('supplier_edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_supplier' => 'required',
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil dihapus');
    }
}
