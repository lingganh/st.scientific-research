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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Trường id tự tăng
            $table->string('name'); // Trường tên sản phẩm (varchar)
            $table->string('img')->nullable(); // Trường đường dẫn ảnh (varchar), có thể null
            $table->string('demo')->nullable(); // Trường demo (varchar), có thể null
            $table->string('link')->nullable(); // Trường link (varchar), có thể null
            $table->unsignedBigInteger('idTG')->nullable(); // Khóa ngoại liên kết với bảng tác giả (unsigned big integer), có thể null
            $table->unsignedBigInteger('idDM')->nullable(); // Khóa ngoại liên kết với bảng danh mục (unsigned big integer), có thể null
            $table->text('moTa')->nullable(); // Trường mô tả sản phẩm (text), có thể null
            $table->timestamps(); // Tạo cột created_at và updated_at
            $table->double('price')->nullable();
            $table->integer('count')->nullable();
            $table->integer('luotBan')->nullable();
             $table->foreign('idTG')->references('id')->on('authors')->onDelete('set null');
            $table->foreign('idDM')->references('id')->on('categories')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
