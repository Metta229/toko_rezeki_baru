<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barangkeluar';

    protected $fillable = [
        'tanggal',
        'nama_barang',
        'stok_keluar',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'nama_barang', 'nama_barang');
    } 
}
