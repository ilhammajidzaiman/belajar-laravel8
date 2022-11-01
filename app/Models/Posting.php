<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $guarded = ['id','updated_at','created_at'];
    // protected $fillable = ['id_posting', 'id_category'];
}
