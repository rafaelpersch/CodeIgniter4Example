<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuario extends Entity
{
    protected $attributes = [
        'id' => 0,
        'nome' => '',
        'email' => '',
        'senha' => '',
    ];

    protected $casts = [
        'id' => 'int',
        'nome' => 'string',
        'email' => 'string',
        'senha' => 'string',
    ];
}
