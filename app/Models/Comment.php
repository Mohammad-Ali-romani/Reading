<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name','email','comment','post_id'];
    use HasFactory;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }

}
