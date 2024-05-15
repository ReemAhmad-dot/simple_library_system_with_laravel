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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreignId('user_id')->constrained();
            //$table->foreignId('book_id')->constrained();
            $table->unsignedInteger('book_id');
            //$table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->unique(['user_id','book_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
