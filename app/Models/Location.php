<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'locations';

    // The attributes that are mass assignable.
    protected $fillable = ['name'];

    // Optionally, you can define relationships or other model properties here.

    public function lands()
    {
        return $this->hasMany(Land::class);
    }
}
