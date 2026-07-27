<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;


class policies extends Model
{
    protected $table = 'policies';

    use SoftDeletes;

    protected $fillable = [
        'id',
        'policy_number',
        'user_id',
        'client_id',
        'insured_name',
        'total',
        'currency',
        'start_date',
        'end_date',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

     public function asegurdado()
    {
        return $this->belongsTo(clientes::class, 'client_id', 'id');
    }
}
