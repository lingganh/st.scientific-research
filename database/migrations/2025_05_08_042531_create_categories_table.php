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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Trường id tự tăng
            $table->string('name'); // Tên danh mục
            $table->text('description')->nullable(); // Mô tả về danh mục, có thể null
            $table->unsignedBigInteger('parent_id')->nullable(); // ID của danh mục cha (cho phép tạo danh mục đa cấp), có thể null
            $table->timestamps(); // created_at và updated_at

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
