<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['license_plate', 'owner_name'];

    public function parkings()
    {
        return $this->hasMany(Parking::class);
    }
}
