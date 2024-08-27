<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Usuário</title>
</head>
<body>
    <h1>Adicionar Usuário</h1>
    <form method="POST" action="processaAddUsuario.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>