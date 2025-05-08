<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name',  'description', 'parent_id'];

    /**
     * Lấy danh mục cha.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Lấy các danh mục con.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Lấy tất cả các sản phẩm thuộc về danh mục này.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'idDM');
    }
}
