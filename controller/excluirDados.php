<?php
session_start();
include "../model/conexao.php";
if(empty($_SESSION['token_monitor'])) {
    header("location: ../index.php");
} else {
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        if(!empty($id)){
            $excluir = "DELETE FROM repertorio WHERE id_repertorio = '$id' ";
            $resultado = $conexao->query($excluir);
            if($resultado->execute()){
                $retorna = ['erro' => false, 'msg' => "div class='alert alert-sucess' role='alert'>Usuário apagado com sucesso</div> "];
            } else {
                $retorna = ['erro' => true, 'msg' => "div class='alert alert-danger' role='alert'>Erro: Usuário não apagado!</div> "];
            }
    } else {
        $retorna = ['erro' => true, 'msg' => "div class='alert alert-danger' role='alert'>Erro: Nenhum Usuário encontrado!</div> "];
    }
    echo json_encode($retorna);
    }
    
    if (!empty($_GET['id_redacao'])) {
        $id = $_GET['id_redacao'];
        
         $excluir = "DELETE FROM redacoes WHERE id_redacao = $id";
         $resultado_excluir = $conexao->query($excluir);
        
        if ($resultado_excluir) {
            echo "<script>window.alert('Redação apagada com sucesso!');</script> <script>location.href='../view/monitor/visualizarRedacoes.php'</script>";
        } else {
            echo "Erro ao excluir redação.";
        }

}
?>