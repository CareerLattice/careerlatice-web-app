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
        Schema::create('appliers', function (Blueprint $table) {
            $table->id();
            $table->string('headline')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->timestamp('start_date_premium')->nullable();
            $table->timestamp('end_date_premium')->nullable();
            $table->string('cv_url')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appliers');
    }
};
