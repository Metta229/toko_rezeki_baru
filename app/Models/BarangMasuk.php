<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
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

    protected $table = 'barangmasuk';

    protected $fillable = [
        'tanggal', 'supplier', 'barang', 'stok_masuk', 'harga', 'satuan',
    ];

    protected $primaryKey = 'id';
}
