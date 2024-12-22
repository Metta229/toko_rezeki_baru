<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barangmasuk'; // Nama tabel

    protected $fillable = [
        'tanggal', 'supplier', 'barang', 'stok_masuk', 'harga', 'satuan',
    ];

    // Relasi ke Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier', 'id'); // menghubungkan ke 'id' di tabel supplier
    }

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang', 'id'); // menghubungkan ke 'id' di tabel barang
    }

    protected $primaryKey = 'id';
}
