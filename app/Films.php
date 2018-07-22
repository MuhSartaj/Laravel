<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'realease_date', 'rating', 'ticket_price', 'country', 'genre', 'photo'
    ];
}
