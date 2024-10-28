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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('job_type');
            $table->string('title');
            $table->string('address');
            $table->text('skill_required');
            $table->text('description');
            $table->text('requirement');
            $table->string('person_in_charge');
            $table->string('contact_person');
            $table->boolean('is_active');
            $table->string('job_picture');
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
