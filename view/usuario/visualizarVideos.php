<?php
session_start();
include "../../model/conexao.php";
if(empty($_SESSION['token_user'])) {
    header("location: ../../index.php");
} else {
    if(isset($_GET['pesquisar'])){
        $buscar = $_GET['pesquisar'];
        $_SESSION['buscar'] = $buscar;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Vídeos | Redatrix</title>
</head>
    <header class="header">
                <div class="logo">
                    <a href="usuario.php"><img src="../../assets/logo_img.png"></a>
                </div>
                
                <nav class="nav">
                    <ul class="navbar">
                        <li>
                            <a href="visualizarRepertorios.php">Repertórios</a>
                        </li>
                        <li>
                            <a href="visualizarVideos.php">Videoaulas</a>
                        </li>
                        <li>
                            <a href="visualizarRedacoesuser.php">Redações</a>
                        </li>
                        <li>
                            <a href="sobresite.php">Sobre</a>
                        </li>
                        <li class="btnExit">
                            <a class="aExit" href="../../controller/exit.php">Deslogar</a>
                        </li>
                    </ul>
                </nav>
            </header>
<body>
<h1 class="h1-user">Listar Vídeos</h1>
    <form action= "" method="get" class="search">
        <label for="pesquisar"><input class="inputSearch" type="search" name="pesquisar" id="pesquisar" placeholder="Pesquisar"></label>
        <button type="submit" class="btnSearch">"Erro:  <li>
        <a href="visualizarMonitoresuser.php">Monitores Ativos</a>
    </li>
    <li>
        <a href="visualizarHistoricouser.php">Histório de Monitores</a>
</body>
</html>

<?php
    } else if(empty($_GET['pesquisar'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
    <title>Vídeos | Redatrix</title>
</head>
    <header class="header">
                    <div class="logo">
                    <a href="usuario.php"><img src="../../assets/logo_img.png"></a>
                    </div>
                    
                    <nav class="nav">
                        <ul class="navbar">
                            <li>
                                <a href="visualizarRepertorios.php">Repertórios</a>
                            </li>
                            <li>
                                <a href="visualizarVideos.php">Videoaulas</a>
                            </li>
                            <li>
                                <a href="visualizarRedacoesuser.php">Redações</a>
                            </li>
                            <li>
                                <a href="sobresite.php">Sobre</a>
                            </li>
                            <li class="btnExit">
                                <a class="aExit" href="../../controller/exit.php">Deslogar</a>
                            </li>
                        </ul>
                    </nav>
                </header>
<body>
    <h1 class="h1-user">Listar Vídeos</h1>
    <form action= "" method="get" class="search">
        <label for="pesquisar"><input class="inputSearch" type="search" name="pesquisar" id="pesquisar" placeholder="Pesquisar"></label>
        <button type="submit" class="btnSearch">buscar</button>
    </form>
        <div class="videos">
            <span class="listar-videos"></span>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="../../assets/custom1.js"></script>
</body>
</html>
<?php
    }  else {
        echo "nenhum usuário encontrado";
    }
}
?>

