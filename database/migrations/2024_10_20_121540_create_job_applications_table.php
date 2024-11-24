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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('pending');

            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('applier_id')->constrained('appliers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('job_id')->constrained('job_vacancies')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
