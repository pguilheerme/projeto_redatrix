<?php
session_start();
include "../../model/conexao.php";
if(empty($_SESSION['token_adm'])) {
    header("location: ../../index.php");
} else {
    if(!empty($_GET['email'])){
        $email = $_GET['email'];
        $mostre = "SELECT * FROM monitor WHERE email = '$email' ";
        $result = $conexao->query($mostre);

        if($result->num_rows > 0){
            $excluir = "DELETE FROM monitor WHERE email = '$email' ";
            $resultado_excluir = $conexao->query($excluir);
        }
    }
    header("location: monitores.php");
}
?>