<?php

namespace App\Models;

// importa a classe Model e hasfactory para fazer alguns testes
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    // verificar  database\factories\DeviceFactory.php para mais informações
    use HasFactory;

    protected $table = 'devices';

    protected $fillable =  [

        'name',
        'ip',
        'user_id',
        'ikev2',
        'user',
        'password',
        'created_at',
        'updated_at'
    ];

}
