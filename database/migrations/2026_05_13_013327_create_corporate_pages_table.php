<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('corporate_pages', function (Blueprint $table) {
            $table->id();

            // Kolom untuk Corporate Data
            $table->json('corporate_info')->nullable();
            $table->text('facilities_description')->nullable();
            $table->json('affiliates')->nullable();
            $table->json('facilities')->nullable();

            // Kolom untuk Corporate Profile
            $table->text('profile_content')->nullable();
            $table->string('strategy_image')->nullable();
            $table->json('quality_safety_policy')->nullable();
            $table->text('quality_policy_content')->nullable();
            $table->text('core_competence_content')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('corporate_pages');
    }
};
