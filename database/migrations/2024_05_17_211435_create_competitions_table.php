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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable()->unique();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('delaiinsc')->nullable();
            $table->string('sessions')->nullable();
            $table->string('genre')->nullable();
            $table->string('categorie')->nullable();   
            $table->string('lieu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
