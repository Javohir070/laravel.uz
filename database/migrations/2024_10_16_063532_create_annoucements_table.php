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
        Schema::create('annoucements', function (Blueprint $table) {
            $table->id();
            $table->string('title', 600);
            $table->text('descriptions');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('status',['opened', 'finished', 'coming_soon', 'another_possibil']);
            $table->integer('views')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annoucements');
    }
};
