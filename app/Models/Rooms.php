<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(Images::class, 'room_id');
    }

    protected $fillable = [
        'id',
        'room_number',
        'capacity',
        'price',
        'description',
        'ArDescription',
        'branch'
    ];
}
