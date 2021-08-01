<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Picture extends Model
{

    protected $fillable = [
        'user_id', 'path', 'title', 'description',
    ];

    /**
     * Model's relationships
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }


}
