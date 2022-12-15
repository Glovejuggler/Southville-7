<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'title',
        'content',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class, 'post_id');
    }
}
