<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paquete extends Model
{
    use HasFactory;
    protected $table = 'paquetes';
    
    protected function casts(): array
    {
        return[
            'destino'=>'string', 'incluye'=>'string',
            'descripcion'=>'string',
    ];
    }
}
