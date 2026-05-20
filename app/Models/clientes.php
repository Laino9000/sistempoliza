<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';

     protected $fillable = [
        'identity',
        'name',
        'lastname',
        'telephone',
        'age',
        'id_declarations',
        'photo_ID_path'
    ];

}
