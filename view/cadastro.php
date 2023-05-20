<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="shortcut icon" href="../assets/logo_ico.ico" type="image/x-icon">
    <title>Cadastro | Redatrix</title>
</head>
<body  class="body_cadastro">
    <main class="main_cadastro">

        <h1 class="legend_cad">Cadastro</h1>
        <form action="../controller/insert.php" method="post" class="form_cadastro">
            <label for="nome"><input type="text" name="nome" id="nome" required placeholder="Digite o seu nome"></label>
            <label for="email"><input type="email" name="email" id="email" required placeholder="Digite o seu email"></label>
            <label for="senha"><input type="password" name="senha" id="senha" required placeholder="Digite a sua senha"></label>
            <button type="submit" name="ok" class="sendBtn">Cadastrar</button>
        </form>
        <p>Já possui uma conta? <a href="login.php">Fazer login</a></p>
    </main>
</body>
</html>