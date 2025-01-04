<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pupuk extends Model
{
    use SoftDeletes;

    protected $table = 'pupuk';
    
    protected $fillable = [
        'nama_pupuk',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'kategori'
    ];
}
