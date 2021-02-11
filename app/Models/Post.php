<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title','content','photo','category_id'];
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function newses(){
        return $this->hasMany(News::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
