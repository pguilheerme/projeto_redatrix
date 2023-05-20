<?php
    session_start();
    include "../../model/conexao.php";
    if(empty($_SESSION['token_monitor'])) {
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
    <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
    <title>Redações | Redatrix</title>
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
        <h1 class="h1-user"> Mural de Redações </h1>
            <?php

            $sql = "SELECT id_redacao, tema, autor, nota, redacao, comentarios FROM redacoes";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    $id = $row['id_redacao'];
                    $tema = $row["tema"];
                    $autor = $row["autor"];
                    $nota = $row["nota"];
                    $redacao = $row["redacao"];
                    $comentarios = $row["comentarios"];

                    echo "<p class='p-monitor'><strong>Tema: </strong> " . $tema . "</p>";
                    echo "<p class='p-monitor'><strong>Autor: </strong> " . $autor . "</p>";
                    echo "<p class='p-nota'><strong>Nota: </strong> " . $nota . "</p>";
                    echo "<p class='p-monitor'><strong>Redação: </strong> " . "<div class='p-redacao'>$redacao</div>" . "</p>";
                    echo "<p class='p-comentario'><strong>Comentários: </strong> " . $comentarios . "</p>";
                    echo "<a class='btnClean' class='btn btn-primary' href='../../controller/excluirDados.php?id_redacao=$row[id_redacao]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                    <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                </svg>
            </a> ";

            echo "</br>";
                    echo "<hr>";
                }
            } else {
                echo "Nenhum Resultado";
            }
        ?>

        <?php
            }
        ?>
</body>
</html>