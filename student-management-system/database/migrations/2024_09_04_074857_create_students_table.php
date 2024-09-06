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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // Limiting length to 100 characters
            $table->unsignedTinyInteger('age'); // Tiny integer, assuming age is below 255
            $table->string('address')->nullable(); // Making address nullable if it's optional
            $table->string('mobile', 10 ); // Limiting length for mobile, considering country codes
            $table->string('parent', 100); // Limiting length to 100 characters
            $table->string('parent_mobile',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
