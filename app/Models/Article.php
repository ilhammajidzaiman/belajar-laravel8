<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'tbl_articles';
    protected $guarded = ['id'];
    // protected $fillable = ['id_user', 'title', 'slug', 'content', 'truncated', 'image'];
}
