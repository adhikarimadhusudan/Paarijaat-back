<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function episodes() {
        return $this->hasMany(Episode::class);
    }
}
