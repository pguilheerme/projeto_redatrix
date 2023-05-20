<?php
include("../../model/conexao.php");
session_start();

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);
if(!empty($pagina)){
    // calcular o início visualização
    $qnt_result_pg = 3; // quantidade de registro por página
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    if(isset($_SESSION['buscar'])){
        $sql = "SELECT nome,link,descricao,data_public FROM videos WHERE
        nome LIKE '%$_SESSION[buscar]%' OR descricao LIKE '%$_SESSION[buscar]%'
        ORDER BY data_public DESC LIMIT $inicio, $qnt_result_pg";
    } else {
        $sql = "SELECT nome,link,descricao,data_public FROM videos ORDER BY data_public DESC LIMIT $inicio, $qnt_result_pg";
    }
$resultado = $conexao->query($sql);

$dados = "";

while($linha = mysqli_fetch_assoc($resultado)){ 
    extract($linha);
    $data = date('d-m-Y' , $data_public);
    
    $dados .= "
            <h2 class='p-monitor'>$nome</h2><br>
            <iframe width:'400' height:'600' src='https://www.youtube.com/embed/$link' frameborder='0' allowfullscreen></iframe><br>
            <p class='p-monitor'>Descrição: $descricao</p>
            <p class='p-monitor'>Data de publicação: $data</p>  
        ";
}

//paginação -> somar a quantidade
if(isset($_SESSION['buscar'])){
    $pg = "SELECT COUNT(id_video) AS num_result FROM videos WHERE nome LIKE '%$_SESSION[buscar]%' OR descricao LIKE '%$_SESSION[buscar]%' ";
} else {
    $pg = "SELECT COUNT(id_video) AS num_result FROM videos";
}
$result_pg = $conexao->query($pg);
$row_pg = $result_pg->fetch_assoc();

//Quantidade de páginas
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg); // ceil -> arredonda o valor sempre para cima
$max_links = 2;

$dados .= "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'>";
$dados .= "<li class='page-item'>
<a class='page-link' href='#' onclick='listarVideos(1)'>Primeira página</a>
</li>";

for($pagina_ant = $pagina - $max_links; $pagina_ant <= $pagina -1; $pagina_ant++ ) {
    if($pagina_ant >= 1){
        $dados .= "<li class='page-item'><a class='page-link' onclick='listarVideos($pagina_ant)' href='#'>$pagina_ant</a></li>";
    } 
}
$dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

for($pag_dep = $pagina +1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarVideos($pag_dep)'>$pag_dep</a></li>";
    }
}

$dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarVideos($quantidade_pg)'>Última página</a></li>";
$dados .= "</ul></nav>";

echo "$dados";
} else {
    echo "Erro: nenhum usuário encontrado";
}
?>
