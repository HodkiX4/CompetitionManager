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
            $table->id()->primary();
            $table->string('name');
            $table->integer('year');
            $table->string('available_languages');
            $table->integer('point_for_good_answer');
            $table->integer('point_for_bad_answer');
            $table->integer('point_for_no_answer');
            $table->timestamps();

            $table->unique(['name','year']);
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
