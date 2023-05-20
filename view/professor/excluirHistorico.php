<?php
session_start();
include "../../model/conexao.php";

if (empty($_SESSION['token_adm'])) {
  header("location: ../../index.php");

} else {
  if (!empty($_GET['id_historico'])) {
    $id = $_GET['id_historico'];

    $mostre = "SELECT * FROM historico_monitor WHERE id_historico = '$id'";
    $result = $conexao->query($mostre);

    if ($result->num_rows > 0) {
      $excluir = "DELETE FROM historico_monitor WHERE id_historico = '$id'";
      $resultado_excluir = $conexao->query($excluir);
    }
  }
  header("location: visualizarHistorico.php");
}

?>