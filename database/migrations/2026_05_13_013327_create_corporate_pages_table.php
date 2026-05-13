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
            $table->json('corporate_info')->nullable();
            $table->text('facilities_description')->nullable();
            $table->json('affiliates')->nullable(); 
            $table->json('facilities')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('corporate_pages');
    }
};
