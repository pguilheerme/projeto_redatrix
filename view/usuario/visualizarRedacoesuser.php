<?php
    include "../../model/conexao.php";
?>

    <?php include "header.php"?>
    <body>
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
            echo "<p class='p-monitor'><strong>Redação: </strong> " . "<p class='p-redacao'>$redacao</p>" . "</p>";
            echo "<p class='p-comentario'><strong>Comentários: </strong> " . $comentarios . "</p>";
    echo "</br>";
            echo "<hr>";
         }
     } else {
        echo "Nenhum Resultado";
      }
 ?>
    </body>
    </html>
