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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();

            $table->string('image', 255)->nullable();
            $table->string('name', 100);
            $table->integer('age')->nullable();
            $table->string('breed', 50)->nullable(); 
            $table->text('description')->nullable();
            $table->string('health_status', 255)->nullable();
            $table->enum('size', ['Small', 'Medium', 'Large'])->nullable(); 
            $table->enum('gender', ['Male', 'Female'])->nullable(); 
            $table->boolean('available_for_adoption')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
