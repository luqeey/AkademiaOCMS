<?php

namespace App\Arrival\Models;

use Model;

class Arrival extends Model
{
    /**
     * @var string
     */
    protected $table = 'arrivals';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'arrival_date'];
}
