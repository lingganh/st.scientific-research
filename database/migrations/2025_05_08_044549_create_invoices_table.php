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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID của người dùng (khách hàng)
            $table->string('invoice_code')->unique(); // Mã hóa đơn duy nhất
            $table->decimal('total_amount', 10, 2)->default(0); // Tổng tiền hóa đơn
            $table->timestamp('invoice_date'); // Ngày lập hóa đơn
            $table->string('shipping_address')->nullable(); // Địa chỉ giao hàng
            $table->string('payment_method')->nullable(); // Phương thức thanh toán
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
