<?php

declare(strict_types=1);

namespace App\Entities;

class Usuario
{
    public function __construct() 
    {
        $this->id    = 0;
        $this->nome  = '';
        $this->email = '';
        $this->senha = '';
    }

    public int    $id;
    public string $nome;
    public string $email;
    public string $senha;
}