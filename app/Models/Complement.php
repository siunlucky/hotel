<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function roomTypes()
    {
        return $this->belongsToMany(RoomType::class, 'room_complement');
    }
}
