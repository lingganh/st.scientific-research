<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id(); // Trường id tự tăng
            $table->string('name'); // Tên giải thưởng
             $table->text('description')->nullable(); // Mô tả về giải thưởng, có thể null
            $table->unsignedBigInteger('product_id')->unique()->nullable(); // ID của sản phẩm đoạt giải, duy nhất và có thể null
            $table->timestamps(); // created_at và updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
    }
};
