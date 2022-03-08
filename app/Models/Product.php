<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Ramsey\Uuid\v1;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'cate_id',
        'name',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'tax',
        'slug',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}
