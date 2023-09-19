<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //$usuario = new \App\Entities\Usuario();

        $usuarioModel = new \App\Models\UsuarioModel();

        $user = $usuarioModel->find(5);

        var_dump($user->id);

        /*$user2       = new \App\Entities\Usuario();
        $user2->nome = 'foo';
        $user2->email= 'foo@example.com.br.co';
        $usuarioModel->save($user2);*/

        $eee = new \App\Repositories\UsuarioRepository();
        echo $eee->nene();

        return view('welcome_message');
    }
}
