<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<h1>Listagem de Usuários</h1>
<table>
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
                    <a href="<?= "/usuarios/edit/{$usuario->id}"; ?>">Editar</a>
                    <a href="<?= "/usuarios/delete/{$usuario->id}"; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>