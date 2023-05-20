<?php
    session_start();
    include "../../model/conexao.php";
    if(empty($_SESSION['token_monitor'])) {
        header("location: ../../index.php");
    } else {      
        if(isset($_GET['pesquisar']))  {
            $pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);
            $buscar = $_GET['pesquisar'];
            $_SESSION['buscar'] = $buscar;
           
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
    <title>Repertórios | Redatrix</title>
</head>
    <header class="header">
                    <div class="logo">
                        <img src="">
                    </div>
                    
                    <nav class="nav">
                        <ul class="navbar">
                            <li>
                                <a href="inserirRepertorio.php">Adicionar repertorio</a>
                            </li>
                            <li>
                                <a href="visualizar.php">Repertórios</a>
                            </li>
                            <li>
                                <a href="inserirVideos.php">Adicionar vídeos</a>
                            </li>
                            <li>
                                <a href="visualizarVideos.php">Vídeos</a>
                            </li>
                            <li>
                                <a href="inserirRedacoes.php">Adicionar Redações</a>
                            </li>
                            <li>
                                <a href="visualizarRedacoes.php">Redações</a>
                            </li>
                            <li class="btnExit">
                                <a class="aExit" href="../../controller/exit.php">Deslogar</a>
                            </li>
                        </ul>
                    </nav>
                </header>
<body>
<form action= "" method="get" class="search">
        <label for="pesquisar"><input class="inputSearch" type="search" name="pesquisar" id="pesquisar" placeholder="Pesquisar"></label>
        <button type="submit" class="btnSearch">buscar</button>
    </form>
    <span id="msgAlerta"></span>
    <div class="repertorio">
        <span class="lista-r"></span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="../../assets/custom.js"></script>
</body>
</html>

<?php
        } else if(empty($_GET['pesquisar'])){
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
    <title>Repertórios | Redatrix</title>
</head>
<body>
    <header class="header">
                        <div class="logo">
                        <a href="paginaMonitor.php"><img src="../../assets/logo_img.png"></a>
                        </div>
                        
                        <nav class="nav">
                            <ul class="navbar">
                                <li>
                                    <a href="inserirRepertorio.php">Adicionar repertorio</a>
                                </li>
                                <li>
                                    <a href="visualizar.php">Repertórios</a>
                                </li>
                                <li>
                                    <a href="inserirVideos.php">Adicionar vídeos</a>
                                </li>
                                <li>
                                    <a href="visualizarVideos.php">Vídeos</a>
                                </li>
                                <li>
                                    <a href="inserirRedacoes.php">Adicionar Redações</a>
                                </li>
                                <li>
                                    <a href="visualizarRedacoes.php">Redações</a>
                                </li>
                                <li class="btnExit">
                                    <a class="aExit" href="../../controller/exit.php">Deslogar</a>
                                </li>
                            </ul>
                        </nav>
                    </header>
                    <form action= "" method="get" class="search">
        <label for="pesquisar"><input class="inputSearch" type="search" name="pesquisar" id="pesquisar" placeholder="Pesquisar"></label>
        <button type="submit" class="btnSearch">buscar</button>
    </form>
    </form>
    <span id="msgAlerta"></span>
    <div class="repertorio">
        <span class="lista-r"></span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="../../assets/custom.js"></script>
</body>
</html>
<?php
        } else {
            echo "Erro: nenhum usuário encontrado";
        }
    }
?>