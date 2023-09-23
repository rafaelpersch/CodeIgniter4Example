<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\BaseController;

class UsuarioController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $usuarioRepository = new \App\Repositories\UsuarioRepository($db);
        
        $data['usuarios'] = $usuarioRepository->select();

        $db->close();

        return view('usuarios/index', $data);
    }

    public function create()
    {
        $data['usuario'] = new \App\Entities\Usuario();

        return view('usuarios/register', $data);
    }

    /*public function store()
    {
        $model = new ProdutoModel();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'descricao' => $this->request->getPost('descricao'),
            'preco' => $this->request->getPost('preco'),
        ];

        $model->insert($data);

        return redirect()->to('/usuarios');
    }*/

    public function edit($id = null)
    {
        $db = \Config\Database::connect();

        $usuarioRepository = new \App\Repositories\UsuarioRepository($db);

        $data['usuario'] = $usuarioRepository->selectById((intval($id)));

        $db->close();

        return view('usuarios/register', $data);
    }

    public function delete($id = null)
    {
        /*$db = \Config\Database::connect();

        $usuarioRepository = new \App\Repositories\UsuarioRepository($db);
        
        $usuarioRepository->delete(intval($id));

        $db->close();*/


        echo base_url('usuarios');

        //return redirect()->to(base_url('usuarios'));
    }
}
