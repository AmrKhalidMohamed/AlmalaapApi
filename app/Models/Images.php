<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }
    protected $fillable = [
        'image_path',
        'room_id'
    ];
}
