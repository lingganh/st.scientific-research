<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img', 'demo', 'link', 'idTG', 'idDM', 'moTa'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'idTG');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'idDM');
    }
}
