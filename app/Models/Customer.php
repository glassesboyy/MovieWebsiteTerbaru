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
        'movie_id',
        'show_time',
        'ticket_quantity',
        'customer_name',
        'customer_email',
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
