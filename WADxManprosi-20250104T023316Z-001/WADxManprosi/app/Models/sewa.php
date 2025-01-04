<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sewa extends Model
{
    use SoftDeletes;
    
    protected $table = 'sewa';
    
    protected $fillable = [
        'nama_sewa',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'tanggal_mulai_sewa',
        'tanggal_akhir_sewa'
    ];

    protected $casts = [
        'tanggal_mulai_sewa' => 'date',
        'tanggal_akhir_sewa' => 'date',
        'harga' => 'decimal:2'
    ];

    // Relasi ke model Pupuk jika diperlukan
    public function pupuk()
    {
        return $this->belongsTo(Pupuk::class, 'nama_pupuk', 'nama_pupuk');
    }
}
