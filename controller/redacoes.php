<?php
include "../model/conexao.php";

$tema = $_POST['tema'];
$autor = $_POST['autor'];
$nota = $_POST['nota'];
$redacao = $_POST['redacao'];
$comentario = $_POST['comentarios'];

$salvarRedacao = "SELECT * FROM redacoes WHERE redacao = '$redacao' ";
$resultado = $conexao->query($salvarRedacao);
echo mysqli_error($conexao);
if($resultado->num_rows == 0) {
    $sql_insert = "INSERT INTO redacoes VALUES(NULL, '$tema','$autor','$nota','$redacao','$comentario')";
    $result_insert = $conexao->query($sql_insert);
    echo "<script>window.alert('Redação adicionada com sucesso');</script> <script>location.href='javascript:history.back(1)'</script>";
} else {
    echo "<script>window.alert('Erro: Redação já existente!');</script> <script>location.href='javascript:history.back(1)'</script>";
}
