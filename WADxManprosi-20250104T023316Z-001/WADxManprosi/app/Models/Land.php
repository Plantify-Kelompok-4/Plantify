<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'name', 'area'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function histories()
    {
        return $this->hasMany(LandHistory::class);
    }

}
