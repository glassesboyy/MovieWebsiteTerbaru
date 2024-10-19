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
    Schema::create('movie_tickets', function (Blueprint $table) {
        $table->id();
        $table->string('movie_title'); // Title of the movie
        $table->text('description')->nullable(); // Optional movie description
        $table->string('genre')->nullable(); // Movie genre (e.g., Action, Drama)
        $table->string('poster')->nullable(); // Image or poster URL
        $table->date('release_date'); // Movie release date
        $table->time('show_time'); // Show time of the movie
        $table->bigInteger('price'); // Ticket price
        $table->integer('available_seats')->default(0); // Available seats for the show
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_tickets');
    }
};
