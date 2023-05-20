<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/login.css">
  <link rel="shortcut icon" href="../../assets/logo_ico.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../assets/dist/ui/trumbowyg.min.css">
  <title>Inseri Redação | Redatrix</title>
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

    <?php
    session_start();
    include "../../model/conexao.php";
    if(empty($_SESSION['token_monitor'])) {
        header("location: ../../index.php");
    } else {
    ?>
    <main class="main_cadastro">
        <h1 class="legend_cad"> Inserir Redações</h1>
        <form action="../../controller/redacoes.php" method="POST" class="form_cadastro">
        <label for="tema"><input type="text" id="tema" name="tema" maxlength="110" placeholder="Tema" required></label>

        <label for="autor"><input type="text" id="autor" name="autor" maxlength="50" placeholder="Autor" required></label>

        <label for="autor"><input type="text" id="nota" name="nota" placeholder="Nota" required></label>

        <label for="redacao">Redação</label>
            <textarea id="trumbowyg-demo" class= "trumbowyg-demo" name="redacao" rows="30" cols="80"  required></textarea>

        <label for="comentarios">Comentários</label>
            <textarea id="comentarios" name="comentarios" rows="10" cols="60" maxlength="500" required></textarea>

        <input type="submit" value="Adicionar" name="Adicionar" class="sendBtn">
    </form>
    <?php
        }
        ?>
    </main> 
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../assets/dist/trumbowyg.min.js"></script>
<script type="text/javascript" src="../../assets/dist/langs/pt_br.min.js"></script>
<script>
    $('.trumbowyg-demo').trumbowyg({
      lang: 'pt_br',
      btns: [
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']   
    ],  
      autogrow: true
    });

</script>
</html>