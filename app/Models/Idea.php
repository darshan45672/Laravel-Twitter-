<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    // protected $with = ['user:id,name,image','comments.users:id,name,image'] ;

    // protected $guarded = [];
    protected $fillable = [
        'content',
        'user_id',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
