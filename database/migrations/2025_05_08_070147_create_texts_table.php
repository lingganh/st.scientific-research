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
        Schema::create('texts', function (Blueprint $table) {
            $table->id(); // Trường id tự tăng
            $table->string('key')->unique(); // Khóa duy nhất để xác định đoạn văn bản (ví dụ: 'homepage_title', 'footer_copyright')
            $table->text('value')->nullable(); // Nội dung văn bản
            $table->string('locale')->default('vi'); // Ngôn ngữ của văn bản (ví dụ: 'vi', 'en')
            $table->timestamps(); // created_at và updated_at

            $table->unique(['key', 'locale']); // Đảm bảo mỗi khóa chỉ có một giá trị cho mỗi ngôn ngữ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('texts');
    }
};
