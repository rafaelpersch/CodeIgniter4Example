<?php

namespace App\Repositories;

class UsuarioRepository
{
    private $db;

    public function __construct($db) 
    {
        $this->db = $db;
    }

    public function insert(\App\Entities\Usuario $usuario): \App\Entities\Usuario
    {
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome:, :email:, :senha:);";

        $this->db->query($query, [
            'nome'    => $usuario->nome,
            'email'   => $usuario->email,
            'senha'   => $usuario->senha,
        ]);

        $usuario->id = $this->db->insertID();

        return $usuario;
    }

    public function update(\App\Entities\Usuario $usuario): \App\Entities\Usuario
    {
        $query = "UPDATE usuarios SET nome = :nome: , email = :email:, senha = :senha: WHERE id = :id: ;";

        $this->db->query($query, [
            'id'      => $usuario->id,
            'nome'    => $usuario->nome,
            'email'   => $usuario->email,
            'senha'   => $usuario->senha,
        ]);

        return $usuario;
    }

    public function delete(int $id): void
    {
        $query = "DELETE FROM usuarios WHERE id = :id: ;";

        $this->db->query($query, [
            'id'      => $id,
        ]);
    }

    public function selectById($id): ?\App\Entities\Usuario
    {
        $query = "SELECT id, nome, email FROM usuarios WHERE id = :id: ;";

        $result = $this->db->query($query, [
            'id'  => $id
        ]);

        foreach ($result->getResult() as $row) {
            $usuario        = new \App\Entities\Usuario();
            $usuario->id    = $row->id;
            $usuario->nome  = $row->nome;
            $usuario->email = $row->email;
            return $usuario;
        }

        return null;
    }

    public function select(): array
    {
        $array = array();

        $query = "SELECT id, nome, email FROM usuarios ";

        $result = $this->db->query($query);

        foreach ($result->getResult() as $row) {
            $usuario        = new \App\Entities\Usuario();
            $usuario->id    = $row->id;
            $usuario->nome  = $row->nome;
            $usuario->email = $row->email;
            
            $array[] = $usuario;
        }

        return $array;
    }
}