<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Beds extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = "Room_Beds";


    public function Room_Types()
    {
        return $this->belongsToMany(Room_Type::class, 'id_room_type');
    }

    public function Beds()
    {
        return $this->belongsToMany(Beds::class, 'id_beds');
    }
}
