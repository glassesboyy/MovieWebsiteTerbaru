<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id',          // Foreign key untuk movie_tickets
        'show_time',          // Jam tayang
        'ticket_quantity',    // Jumlah tiket
        'customer_name',      // Nama pemesan
        'customer_email',     // Email pemesan
    ];

    /**
     * Relasi dengan model MovieTicket.
     * Setiap customer terkait dengan satu film.
     */
    public function movieTicket()
    {
        return $this->belongsTo(MovieTicket::class, 'movie_id');
    }
}
