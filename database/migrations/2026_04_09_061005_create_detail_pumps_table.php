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
        Schema::create('detail_pumps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_pump_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pump_type_id')->constrained()->cascadeOnDelete();
            $table->string('model_name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pumps');
    }
};
