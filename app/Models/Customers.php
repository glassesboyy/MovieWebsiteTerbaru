<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'movie_title',
        'show_time',
        'num_tickets',
        'total_price',
        'booking_date',
    ];
}
