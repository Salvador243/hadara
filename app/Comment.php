<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'picture_id', 'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function picture(){
        return $this->belongsTo(Picture::class);
    }
}
