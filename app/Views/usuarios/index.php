<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<div class="container mt-5">

    <div class="d-flex align-items-center">
        <div style="width: 50%;">
            <h1>Lista de Usuários</h1>
        </div>
        <div style="width: 50%;" class="d-flex justify-content-end">
            <a href="/usuarios/create" class="btn btn-success">Novo</a>
        </div>
    </div>    

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario->id; ?></td>
                <td><?= $usuario->nome; ?></td>
                <td><?= $usuario->email; ?></td>
                <td>
                    <a href="<?= "/usuarios/edit/{$usuario->id}"; ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="<?= "/usuarios/delete/{$usuario->id}"; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>