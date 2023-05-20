<?php
    include "../model/conexao.php";

    $nome = $_POST['nome'];
    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql_code = "SELECT * FROM monitor WHERE email = '$email' ";
    $resultado = $conexao->query($sql_code);

    $sql_code1 = "SELECT * FROM visitante WHERE email = '$email'";
    $resultado1 = $conexao->query($sql_code1);

    if($resultado->num_rows == 0 && $resultado1->num_rows == 0) {   
        $sql_code2 = "SELECT * FROM administrador WHERE nome_completo = 'Tamires' ";
        $resultado2 = $conexao->query($sql_code2);
        $row = $resultado2->fetch_assoc();
        $email_adm = $row['email'];

        $sql_insert = "INSERT INTO monitor VALUES('$email','$senha','$nome','$bio', '$email_adm')";
        $result_insert = $conexao->query($sql_insert); 
        echo "Cadastrado com sucesso";

    } else {
        //header("location: ../view/cadastro.php");
        ?>
        <script>
            window.alert("Email já existente")
        </script>
<?php        
    }
?>