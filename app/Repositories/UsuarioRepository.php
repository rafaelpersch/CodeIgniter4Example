<?php

namespace App\Repositories;

class UsuarioRepository
{
    public function nene(): string
    {
        $db = \Config\Database::connect();

        $query = $db->query('SELECT nome, email FROM usuarios');

        foreach ($query->getResult() as $row) {
            echo $row->nome;
            echo $row->email;
        }
        return 'haha';
    }
}
