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
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('n_carte')->nullable()->unique();
            $table->date('date_naissance');
            $table->string('photo')->nullable();
            $table->string('groupage')->nullable();
            $table->string('adress')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('n_telephone')->nullable()->unique();
            $table->string('categorie')->nullable();
            $table->string('genre')->nullable();
            $table->string('temp_eng')->nullable();
            $table->string('club_name')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->enum('validation',['accept','en attente','refuse'])->default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};
