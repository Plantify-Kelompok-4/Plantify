<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class alatPertanian extends Model
{
    use SoftDeletes;
    
    // Menentukan nama tabel yang benar
    protected $table = 'alat_pertanian';
    
    protected $fillable = [
        'nama_alat',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'kategori'
    ];
}
