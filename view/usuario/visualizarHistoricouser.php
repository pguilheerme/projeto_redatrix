<?php
    session_start();
    include "../../model/conexao.php";
    if(empty($_SESSION['token_user'])) {
        header("location: ../../index.php");
    } else {
?>
<?php include "header.php"?>
<body class="body_monitor">
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
                echo "<p class='p-monitor'><strong>Biografia </strong> " . $historico . "</p>";
        echo "</br>";
                echo "<hr>";
            }
        } else {
            echo "Nenhum Resultado";
        }
    ?>
</body>
</html>
<?php
    }
?>