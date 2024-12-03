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
        Schema::create('user_skills', function (Blueprint $table) {
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('applier_id')->constrained('appliers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->primary(['skill_id', 'applier_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_skills');
    }
};
