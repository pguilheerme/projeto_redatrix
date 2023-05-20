<?php
    session_start();
    include "../model/conexao.php";
    if(isset($_POST['email'])){
        $email_form = $_POST['email'];
    }
    if(isset($_POST['senha'])) {
        $senha_form = $_POST['senha'];
    }
    
    $sql_adm = "SELECT * FROM administrador WHERE nome_completo = 'Tamires' ";
    $resultado_adm = $conexao->query($sql_adm);
    $row = $resultado_adm->fetch_assoc();
    $email_adm = $row['email'];
    $senha_adm = $row['senha'];

    $sql_user = "SELECT * FROM visitante WHERE email = '$email_form'";
    $resultado_user =  $conexao->query($sql_user);
    $row1 = $resultado_user->fetch_assoc();

    $sql_monitor = "SELECT * FROM monitor WHERE email = '$email_form'  AND senha_monitor = '$senha_form' ";
    $resultado_monitor = $conexao->query($sql_monitor);
    $row2 = $resultado_monitor->fetch_assoc();

    if(empty($_SESSION['token_adm']) && empty($_SESSION['token_monitor'])) {  
            if($email_form == $email_adm && $senha_form == $senha_adm) {
                $_SESSION['token_adm'] = md5(sha1($senha_adm));
                header('location: ../view/professor/paginaAdm.php');
            } else if($email_form == $row2['email'] && $senha_form == $row2['senha_monitor']) {
                $_SESSION['token_monitor'] = md5(sha1($row2['senha']));
                $_SESSION['monitor'] = $row2['email'];
                header('location: ../view/monitor/paginaMonitor.php');
            } else if($email_form == $row1['email'] && $senha_form == $row1['senha']) {
                $_SESSION['token_user'] = md5(sha1($row1['senha'])) ;
                header('location: ../view/usuario/usuario.php');
            } else {
                echo "<script>window.alert('Erro na autenticação');</script> <script>location.href='javascript:history.back(1)'</script>";
            }
    }
    else {
?>
        <p>Login já feito</p>
        <a href="exit.php">Sair</a>
<?php
    }

?>
