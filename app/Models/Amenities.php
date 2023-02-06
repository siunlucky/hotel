<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $table = "Amenities";

    public function Room_Amenities()
    {
        return $this->hasMany(Room_Amenities::class);
    }
}
