<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pump_test_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('hero_image')->nullable();
            $table->longText('main_description')->nullable();
            $table->json('specifications')->nullable();
            $table->json('equipments')->nullable();
            $table->longText('pump_test_lines')->nullable();
            $table->json('pump_test_with_engine')->nullable();
            $table->json('latest_activities')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pump_test_facilities');
    }
};
