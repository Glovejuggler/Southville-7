<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id'
    ];

    protected $appends = [
        'member'
    ];

    public function getMemberAttribute()
    {
        return Member::find($this->member_id);
    }
}
