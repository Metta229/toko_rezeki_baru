<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier'; // Tabel yang benar

    protected $primaryKey = 'id'; // Jika primary key Anda bukan 'id'

    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'alamat',
        'nomor_hp',
    ];
}
