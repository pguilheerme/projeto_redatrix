<?php
    session_start();
    include "../../model/conexao.php";
    if(empty($_SESSION['token_adm'])) {
        header("location: ../../index.php");
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
    <title>Inserir Monitor | Redatrix</title>
</head>
<?php include "header.php"?>
<body>
    <main class="main_cadastro">
        <h1 class="legend_cad">Cadastro de Novos Monitores</h1>
        <form action="../../controller/insertMonitor.php" method="post" class="form_cadastro">
            <label for="nome"><input type="text" name="nome" id="nome" required placeholder="Nome Completo"></label>

            <label for="email"><input type="text" name="email" id="email" required placeholder="Email"></label>

            <label for="senha"><input type="password" name="senha" id="senha" required placeholder="Senha"></label>
            <label for="bio">Biografia</label>
            <textarea name="bio" id="bio" cols="30" rows="10" required ></textarea>
            <button type="submit" name="ok" class="sendBtn">Cadastrar</button>
        </form>
    </main>
</body>
</html>

<?php
    }
?>