<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','release_date','rating','ticket_price','country','genre','photo'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
