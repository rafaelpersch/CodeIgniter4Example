<?php

declare(strict_types=1);

namespace App\Entities;

class Usuario
{
    public int    $id;
    public string $nome;
    public string $email;
    public string $senha;
}