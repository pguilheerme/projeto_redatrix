<?php
    include "../model/conexao.php";
    if(isset($_POST['ok'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    }
    

    $sql_code = "SELECT * FROM visitante WHERE email = '$email' ";
    $resultado = $conexao->query($sql_code);

    $sql_code1 = "SELECT * FROM monitor WHERE email = '$email'";
    $resultado1 = $conexao->query($sql_code1);

    if($resultado->num_rows == 0 && $resultado1->num_rows == 0) {
        $sql_insert = "INSERT INTO visitante VALUES('$email','$senha','$nome')";
        $result_insert = $conexao->query($sql_insert);
        echo "<script>window.alert('Cadastro efetuado com suceso');</script> <script>location.href='javascript:history.back(1)'</script>";
    } else {
        ?>
        <script>
            window.alert("Email já existente");
            location.href = "javascript:history.back(1)";
        </script>
<?php        
    }
?>