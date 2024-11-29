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
        Schema::create('basketball_tips', function (Blueprint $table) {
            $table->id();
            $table->text('league');
            $table->text('homeTeam');
            $table->text('awayTeam');
            $table->text('selection');
            $table->text('result')->default('N/A');
            $table->date('date')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basketball_tips');
    }
};
