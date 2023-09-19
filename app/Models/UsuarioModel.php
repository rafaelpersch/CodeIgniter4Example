<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Usuario::class;
    //protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'nome',
        'email',
        'senha' 
    ];
    protected $useTimestamps = false;

    /*public function getAuthor() : null|Models\Author
    {
        # Check if current entity has been loaded.
        if ($this->author_id)
        {
            # Assuming you have a model Author with constructor
            # that's taking in first argument as int|object to instantiate local entity.
            return new Models\Author($this->author_id);

            # Or if you go very CI native you could instead do it like this:
            $author = new Models\Author();
            $author->entity = $author->find($this->author_id);

            # Either way we're returning current entity's submodule.
            return $author;
        }

        # Nothing found.
        return null;
    }*/
}
