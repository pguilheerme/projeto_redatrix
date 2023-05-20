<?php
session_start();
include "../../model/conexao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
    <title>Sobre</title>
</head>
<body class="body_monitor">
<?php include "header.php"?>
    <h1 style="text-align:center">Informações gerais sobre o site</h1><br>
    <img src="" alt="" >Imagem dos Monitores</img>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam dolorum impedit soluta voluptas perspiciatis aut, accusamus earum eius ab, eveniet placeat omnis! Quasi, laudantium consequuntur recusandae veniam reprehenderit dicta suscipit.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ipsa atque recusandae repellat libero! Suscipit distinctio dolore architecto iste praesentium numquam, accusantium dolorem voluptates earum exercitationem obcaecati voluptatum veniam iure!</p>

    <h1 style="display:flex; align-items:center; justify-content:center;margin-top:3%;"> Histórico de Monitores </h1>
    <hr>
        <?php


        $sql = "SELECT id_historico, nome_monitor, historico FROM historico_monitor";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            while($rowm = $resultado->fetch_assoc()) {
                $id = $rowm["id_historico"];
                $nome = $rowm["nome_monitor"];
                $historico = $rowm["historico"];
                

                echo "<p class='p-monitor'><strong>Nome do Monitor: </strong> " . $nome . "</p>";
                echo "<p class='p-monitor'><strong>Biografia:  </strong> " .  $historico . "</p>";
        echo "</br>";
                echo "<hr>";
            }
        } else {
            echo "Nenhum Resultado";
        }
    ?>
</body>
    
</body>
</html>