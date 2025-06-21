<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Khóa ngoại tới bảng products
            $table->unsignedBigInteger('user_id');    // Khóa ngoại tới bảng users (người đánh giá)
            $table->unsignedTinyInteger('rating');      // Số sao đánh giá (từ 1 đến 5)
            $table->text('comment')->nullable();      // Nội dung bình luận
            $table->timestamps();                     // created_at, updated_at

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
