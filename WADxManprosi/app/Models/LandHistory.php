<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'soil_condition',
        'humidity',
    ];

    public function land()
    {
        return $this->belongsTo(Land::class);
    }

}
