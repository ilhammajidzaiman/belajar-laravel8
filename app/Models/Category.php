<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    // use SoftDeletes;
    // nama tabel kustom
    protected $table = 'tbl_categorys';
    // 
    // 'title' => $request->title,
    //         'slug' => $request->slug,
    //         'article' => $request->article,
    //         'image' => $request->image,
    // yang boleh di isi
    // protected $guarded = ['id'];
    protected $fillable = ['category', 'slug'];
    // yang tidak boleh di isi
    // protected $guarded = ['title', 'slug', 'article', 'image'];
}
