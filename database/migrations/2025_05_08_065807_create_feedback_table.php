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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id(); // Trường id tự tăng
            $table->string('name')->nullable(); // Tên người gửi góp ý (có thể ẩn danh)
            $table->string('email')->nullable(); // Email người gửi (tùy chọn)
            $table->text('message'); // Nội dung góp ý
            $table->string('subject')->nullable(); // Tiêu đề góp ý (tùy chọn)
            $table->unsignedBigInteger('user_id')->nullable(); // ID của người dùng đã đăng nhập (nếu có)
            $table->timestamps(); // created_at và updated_at

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
