<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Room_Beds()
    {
        return $this->hasMany(Room_Beds::class);
    }
}
