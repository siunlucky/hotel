<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoRoomType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "photo_room_type";

    public function RoomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
