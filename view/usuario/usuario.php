<?php
    session_start();
    include "../../model/conexao.php";
    if(empty($_SESSION['token_user'])) {
        header("location: ../../index.php");
    } else {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
    <title>Página do usuário | Redatrix</title>
</head>
<body>

<header class="header">
        <div class="logo">
            <a href="usuario.php"><img src="../../assets/logo_img.png"></a>
        </div>
        
        <nav class="nav">
            <ul class="navbar">
                <li>
                    <a href="visualizarRepertorios.php">Repertórios</a>
                </li>
                <li>
                    <a href="visualizarVideos.php">Videoaulas</a>
                </li>
                <li>
                    <a href="visualizarRedacoesuser.php">Redações</a>
                </li>
                <li>
                    <a href="sobresite.php">Sobre</a>
                </li>
                <li class="btnExit">
                    <a class="aExit" href="../../controller/exit.php">Deslogar</a>
                </li>
            </ul>
        </nav>
    </header>
    <main id="main_all">
            <div class="conteiner-text">
                
                <h1>Redatrix</h1>
                <p>
                    Sua Redação é aqui.
                </p>     
            </div>

            <div class="conteiner-image_fundo">
                <img src="../../assets/img-svg.svg">
            </div>
</body>
</html>
<?php
    }
?>