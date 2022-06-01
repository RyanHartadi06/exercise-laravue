<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name_products', 'price', 'slug', 'image'];

    public function category()
    {
        return $this->hasOne(CategoryProducts::class, 'id', 'category_id');
    }
}
