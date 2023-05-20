<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
    <title>Inseri Vídeos | Redatrix</title>
</head>
<body>
    <header class="header">
                    <div class="logo">
                    <a href="paginaMonitor.php"><img src="../../assets/logo_img.png"></a>
                    </div>
                    
                    <nav class="nav">
                        <ul class="navbar">
                            <li>
                                <a href="inserirRepertorio.php">Adicionar repertorio</a>
                            </li>
                            <li>
                                <a href="visualizar.php">Repertórios</a>
                            </li>
                            <li>
                                <a href="inserirVideos.php">Adicionar vídeos</a>
                            </li>
                            <li>
                                <a href="visualizarVideos.php">Vídeos</a>
                            </li>
                            <li>
                                <a href="inserirRedacoes.php">Adicionar Redações</a>
                            </li>
                            <li>
                                <a href="visualizarRedacoes.php">Redações</a>
                            </li>
                            <li class="btnExit">
                                <a class="aExit" href="../../controller/exit.php">Deslogar</a>
                            </li>
                        </ul>
                    </nav>
                </header>

        <?php
        session_start();
        include "../../model/conexao.php";
        if(empty($_SESSION['token_monitor'])) {
            header("location: ../../index.php");
        } else {
        ?>
        <main class="main_cadastro">
            <form action="../../controller/videos.php" method="post" class="form_cadastro">
                <h1  class="legend_cad">Inserção de Vídeos</h1>
                <label for="nome">
                    <input type="text" name="nome" id="nome" placeholder="Nome do vídeo" required>
                </label>
                <label for="link">
                    <input type="text" name="link" id="link" placeholder="Link" required>
                </label>
                <label for="desc">Descrição</label>
                <textarea name="desc" id="desc" cols="30" rows="6"></textarea>
                <button type="submit" name="ok" class="sendBtn">
                    Cadastrar
                </button>
            </form>
            <?php
            }
            ?>
    </main>
</body>
</html>