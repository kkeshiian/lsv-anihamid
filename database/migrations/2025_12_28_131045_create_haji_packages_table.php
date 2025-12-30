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
        Schema::create('haji_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['reguler', 'plus', 'furoda'])->default('reguler');
            $table->decimal('price', 12, 2);
            $table->integer('duration'); // in days
            $table->text('description');
            $table->text('facilities');
            $table->integer('quota')->nullable();
            $table->string('estimated_departure')->nullable();
            $table->string('hotel')->nullable();
            $table->string('airline')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('haji_packages');
    }
};
