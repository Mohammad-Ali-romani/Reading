<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class old_comment extends Model
{
    protected $fillable = ['id','comment'];
    use HasFactory;
}
