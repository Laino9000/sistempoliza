<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'policy_id',
        'reference_number',
        'amount',
        'payment_method',
        'status',
        'date',
    ];
}
