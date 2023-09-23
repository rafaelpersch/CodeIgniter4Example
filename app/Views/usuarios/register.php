<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<h1>Cadastrar Usuário</h1>
<form method="post" action="/usuarios/store">
    <input type="hidden" name="id" value="<?= $usuario->id; ?>" />

    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?= $usuario->nome; ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $usuario->email; ?>" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required><br>

    <button type="submit">Cadastrar</button>
</form>

<?= $this->endSection() ?>