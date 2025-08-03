<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img', 'demo', 'link', 'idTG', 'idDM', 'moTa'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_product');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'idDM');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
