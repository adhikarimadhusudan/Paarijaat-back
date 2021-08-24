<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'audio',
        'user_id',
        'album_id',
    ];

    public function album() {
        return $this->belongsTo(Album::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
