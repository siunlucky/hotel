<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Type extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = "Room_Type";

    public function Room_Amenities()
    {
        return $this->hasMany(Room_Amenities::class);
    }

    public function Room_beds()
    {
        return $this->hasMany(Room_Beds::class);
    }
}
