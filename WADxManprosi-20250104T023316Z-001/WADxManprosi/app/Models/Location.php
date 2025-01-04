<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = ['name', 'user_id']; 

    public function lands()
    {
        return $this->hasMany(Land::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
