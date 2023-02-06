<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Amenities extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = "Room_Amenities";

    public function Room_Types()
    {
        return $this->belongsToMany(Room_Type::class, 'room_type_id');
    }

    public function Amenities()
    {
        return $this->belongsTo(Amenities::class, 'id_amenities');
    }
}
