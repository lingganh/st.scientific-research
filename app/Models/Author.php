<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name',  'bio'];

    /**
     * Lấy tất cả các sản phẩm của tác giả này.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'author_product');
    }
}
