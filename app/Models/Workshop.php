<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'start_time', 'end_time', 'location', 'capacity'];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',

    ];
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('img');
            $table->string('location');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workshop');
    }
}
