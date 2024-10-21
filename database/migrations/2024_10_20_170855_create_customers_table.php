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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('movie_id') // Relasi ke film
                ->constrained('movie_tickets')
                ->onDelete('cascade');
            $table->time('show_time'); // Jam tayang
            $table->integer('ticket_quantity'); // Jumlah tiket dipesan
            $table->string('customer_name'); // Nama pemesan
            $table->string('customer_email'); // Email pemesan
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
