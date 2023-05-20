<?php
session_start();
include "../../model/conexao.php";
if(empty($_SESSION['token_adm'])) {
    header("location: ../../index.php");
} else {

$nome = $_POST['nome_monitor'];
$historico = $_POST['historico'];

$salvarHistorico = "SELECT * FROM historico_monitor WHERE historico = '$historico' ";
$resultado = $conexao->query($salvarHistorico);

if($resultado->num_rows == 0) {
    $sql_insert = "INSERT INTO historico_monitor VALUES(NULL, '$nome','$historico')";
    $result_insert = $conexao->query($sql_insert);
    echo "Histórico adicionado com sucesso!";
} else {
    echo "Histórico não adicionado!";
}
?>
<?php
}
?>