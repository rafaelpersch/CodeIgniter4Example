<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\BaseController;

class UsuarioController extends BaseController
{
    private $db;

    public function __construct() 
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $usuarioRepository = new \App\Repositories\UsuarioRepository($this->db);
        
        $data['usuarios'] = $usuarioRepository->select();

        return view('/usuarios/index', $data);
    }

    public function create()
    {
        $data['usuario'] = new \App\Entities\Usuario();

        return view('/usuarios/register', $data);
    }

    public function store()
    {
        $usuarioRepository = new \App\Repositories\UsuarioRepository($this->db);

        $usuario        = new \App\Entities\Usuario();
        $usuario->id    = intval($this->request->getPost('id'));
        $usuario->nome  = $this->request->getPost('nome');
        $usuario->email = $this->request->getPost('email');
        $usuario->senha = $this->request->getPost('senha');

        if ($usuario->id > 0)
        {
            $usuarioRepository->update($usuario);
        }
        else
        {
            $usuarioRepository->insert($usuario);
        }

        //$_SESSION['user'] = (array)$usuario;

        return redirect()->to('/usuarios');
    }

    public function edit($id = null)
    {
        $usuarioRepository = new \App\Repositories\UsuarioRepository($this->db);

        $data['usuario'] = $usuarioRepository->selectById((intval($id)));

        return view('/usuarios/register', $data);
    }

    public function delete($id = null)
    {
        $usuarioRepository = new \App\Repositories\UsuarioRepository($this->db);
        
        $usuarioRepository->delete(intval($id));

        return redirect()->to('/usuarios');
    }
}
