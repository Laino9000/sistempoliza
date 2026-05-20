<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class declarations extends Model
{
    
    protected $table = 'health_declarations';
    protected $primaryKey = 'id';

     protected $fillable = [
        'has_hypertension',
        'has_diabetes',
        'heart_disease',
        'has_ninguna',
        'has_none'
    ];

}
