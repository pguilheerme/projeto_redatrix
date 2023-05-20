<?php
session_start();
include "../model/conexao.php";

if(isset($_POST['update'])){
    $bio = $_POST['bio'];
    $email = $_POST['email'];

    $sql = "UPDATE monitor SET bio = '$bio' WHERE email = '$email'";
    $resultado = $conexao->query($sql);
}
header("location: ../view/professor/monitores.php");
?>