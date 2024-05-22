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
        Schema::create('epreuve_athcomp', function (Blueprint $table) {
            $table->foreignId('athcomp_id')->constrained()->onDelete('cascade');
            $table->foreignId('epreuve_id')->constrained()->onDelete('cascade');
            $table->primary(['athcomp_id','epreuve_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epreuve_athcomp');
    }
};
