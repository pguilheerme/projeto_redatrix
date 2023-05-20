<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="shortcut icon" href="../assets/logo_ico.ico" type="image/x-icon">
    <title>Login | Redatrix</title>
</head>
<body class="body_cadastro">
    <main class="main_cadastro">
        <form action="../controller/autentica.php" method="post" class="form_cadastro">
            <h1 class="legend_cad">Login</h1>
            <label for="email"><input type="email" name="email" id="email" required placeholder="Digite o seu email"></label>
            <label for="senha"><input type="password" name="senha" id="senha" required placeholder="Digite a sua senha"></label>
            <button type="submit" class="sendBtn">Entrar</button>
        </form>
        <p>Não possui uma conta? <a href="cadastro.php">Fazer cadastro.</a> </p>
    </main>
    
</body>
</html>