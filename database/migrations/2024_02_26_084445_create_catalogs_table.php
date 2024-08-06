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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['steam','playstation','xbox','gog','epicgames']);
            $table->string('image')->nullable();
            $table->string('name');
            $table->integer('price');
            $table->integer('quantity');
            $table->enum('sale', ['0', '1'])->default('0');
            $table->integer('pricesale')->default('0');
            $table->string('type');
            $table->date('date');
            $table->string('publisher');
            $table->string('developer');
            $table->string('platforms');
            $table->string('genre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
