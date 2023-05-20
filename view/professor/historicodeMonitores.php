<?php
session_start();
include "../../model/conexao.php";
if(empty($_SESSION['token_adm'])) {
    header("location: ../../index.php");
} else {
?>
    <title>Inserir Histórico | Redatrix</title>
    <?php include "header.php"?>
    <main class="main_cadastro">
        <h1 class="legend_cad"> Inserir Monitores ao Histórico</h1>
        <form action="historico.php" method="POST" class="form_cadastro">

        <label for="nome_monitor"><input type="text" id="nome_monitor" name="nome_monitor" placeholder="Nome do monitor" required></label>

        <label for="historico">Histórico:</label> 
        <textarea id="historico" name="historico" rows="10" cols="60" required></textarea>

        <input type="submit" value="Adicionar" name="Adicionar" class="sendBtn">
        </form>
        </main>
    <?php
    }
    ?>
</body>
</html>