<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'kategori_barang',
        'nama_barang',
        'satuan',
        'stok',
        'harga_beli',
        'harga_jual',
    ];
}
