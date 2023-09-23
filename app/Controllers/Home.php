<?php

declare(strict_types=1);

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();

        //$db->transBegin();

        $usuarioRepository = new \App\Repositories\UsuarioRepository($db);

        /*$user2       = new \App\Entities\Usuario();
        $user2->nome = 'fooxxx';
        $user2->email= 'bhjgguygyuguygu';
        $user2->senha= '222222';
        $usuarioRepository->insert($user2);*/

        var_dump($usuarioRepository->selectById(9));
        
        var_dump($usuarioRepository->select());

        //$db->transCommit();

        //$db->transRollback();

        /*
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
        }
        */

        $db->close();

        return view('welcome_message');
    }
}
