<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    protected $table = 'barangkeluar';

    protected $fillable = [
        'tanggal', 'supplier', 'barang', 'jumlah_keluar', 'harga', 'satuan',
    ];

    protected $primaryKey = 'id';
}
