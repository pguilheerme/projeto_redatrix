<?php
include ("../model/conexao.php");
if(isset($_POST['ok'])){
    $nome = $_POST['nome'];
    $link = $_POST['link'];
    $desc = $_POST['desc'];
    $tempo = time();
}

$mostre = "SELECT * FROM videos WHERE link = '$link' ";
$result = $conexao->query($mostre);
if($result->num_rows == 0){
    $sql = "INSERT INTO videos VALUES(NULL,'$nome','$link','$desc','$tempo')";
    $resultado = $conexao->query($sql);
    echo "<script>window.alert('Vídeo adicionado com sucesso!');</script> <script>location.href='javascript:history.back(1)'</script>";
} else {
    echo "<script>window.alert('Não foi possível cadastrar o vídeo!');</script> <script>location.href='javascript:history.back(1)'</script>";
}


?>