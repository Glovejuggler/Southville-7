<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'date',
        'status'
    ];

    protected $dates = [
        'date'
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'event_id');
    }
}
