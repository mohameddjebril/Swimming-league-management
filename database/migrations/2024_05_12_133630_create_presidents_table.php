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
        Schema::create('presidents', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('n_telephone')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('adress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presidents');
    }
};
