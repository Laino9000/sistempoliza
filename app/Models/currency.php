<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class currency extends Model
{
    protected $table = 'exchange_rates';

    protected $fillable = [
        'id',
        'currency',
        'rate',
        'date',
    ];
}
