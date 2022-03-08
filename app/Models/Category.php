<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='category';
    protected $fillable=[
        'name',
        'slug',
        'name',
        'description',
        'status',
        'image',
        'popular',
        'meta_title',
        'meta_descrip',
        'meta_keywords',
    ];
}
