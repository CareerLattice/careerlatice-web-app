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
            $table->text('description');

            $table->string('person_in_charge');
            $table->string('contact_person');
            $table->boolean('is_active')->default(true);
            $table->string('job_picture')->nullable();

            $table->text(column: 'requirement')->nullable();
            $table->text('benefit')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->onUpdate('cascade');
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
