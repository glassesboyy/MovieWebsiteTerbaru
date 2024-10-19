<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieTicket extends Model
{
    use HasFactory;

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'movie_title',
        'description',
        'genre',
        'poster',
        'release_date',
        'show_time',
        'price',
        'available_seats',
    ];
}
