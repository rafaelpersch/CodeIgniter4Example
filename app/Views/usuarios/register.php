<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form method="post" action="/usuarios/store">
        <input type="hidden" name="id" value="<?=$usuario->id;?>"/>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?=$usuario->nome;?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?=$usuario->email;?>" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
