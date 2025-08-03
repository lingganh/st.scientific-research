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
            $table->id();
            $table->string('name');
            $table->string('img')->nullable();
            $table->string('demo')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('idTG')->nullable();
            $table->unsignedBigInteger('idDM')->nullable();
            $table->text('moTa')->nullable();
            $table->text('contact_info')->nullable();
            $table->timestamps();
            $table->double('old_price')->nullable();
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
