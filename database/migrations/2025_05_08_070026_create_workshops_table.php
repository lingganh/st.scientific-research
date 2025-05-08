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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id(); // Trường id tự tăng
            $table->string('title'); // Tên hội thảo
            $table->string('slug')->unique()->nullable(); // Đường dẫn thân thiện (URL), duy nhất và có thể null
            $table->text('description')->nullable(); // Mô tả về hội thảo, có thể null
            $table->dateTime('start_time')->nullable(); // Thời gian bắt đầu hội thảo
            $table->dateTime('end_time')->nullable(); // Thời gian kết thúc hội thảo
            $table->string('location')->nullable(); // Địa điểm tổ chức
            $table->integer('capacity')->nullable(); // Số lượng người tham gia tối đa
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
