<?php 
include("../model/conexao.php");
session_start();


$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);  
if(!empty($pagina)){
    // calcular o início visualização
    $qnt_result_pg = 2; // quantidade de registro por página
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    if(isset($_SESSION['buscar'])){
        $sql = "SELECT r.id_repertorio,r.nome_autor, r.citacao, r.data_citacao,t.nome AS id_tematica, tp.nome AS id_tipo_repertorio
        FROM repertorio r 
        INNER JOIN tematica t ON r.id_tematica = t.id_tematica
        INNER JOIN tipo_repertorio tp ON r.id_tipo_repertorio = tp.id_tipo_repertorio WHERE r.nome_autor LIKE '%$_SESSION[buscar]%'
        OR r.citacao LIKE '%$_SESSION[buscar]%' OR t.nome LIKE '%$_SESSION[buscar]%' OR tp.nome LIKE '%$_SESSION[buscar]%'
        ORDER BY r.data_citacao DESC LIMIT $inicio,$qnt_result_pg";
    } else{
        $sql = "SELECT r.id_repertorio,r.nome_autor, r.citacao, r.data_citacao,t.nome AS id_tematica, tp.nome AS id_tipo_repertorio
        FROM repertorio r 
        INNER JOIN tematica t ON r.id_tematica = t.id_tematica
        INNER JOIN tipo_repertorio tp ON r.id_tipo_repertorio = tp.id_tipo_repertorio ORDER BY r.data_citacao DESC LIMIT $inicio,$qnt_result_pg";
    }

$result = $conexao->query($sql); 
echo mysqli_error($conexao);

if ($result->num_rows > 0) {
    $citacoes_por_tematica = array();

    while($row = $result->fetch_assoc()) {
        $tema = $row["id_tematica"];
        $citacao = $row["citacao"];
        $nome_autor = $row["nome_autor"];
        $time = $row['data_citacao'];
        $data = date('d/m/Y', $time);
        $tipo = $row["id_tipo_repertorio"];
        $id = $row['id_repertorio'];
    
        if (!array_key_exists($tema, $citacoes_por_tematica)) {
            $citacoes_por_tematica[$tema] = array();
            }
    
        $citacoes_por_tematica[$tema][] = array(
            "id_repertorio" => $id,
            "nome_autor" => $nome_autor, 
            "citacao" => $citacao, 
            "data_citacao" => $data,
            "id_tipo_repertorio" => $tipo
        );
    }
    $dados = "";
    // Percorre o array associativo para imprimir as citações por eixo temático
    foreach ($citacoes_por_tematica as $tema => $citacoes) {
    $dados .= "<h2 class='p-tema'>Eixo Temático: $tema</h2>";

    foreach ($citacoes as $citacao) {
        $dados .="<p class='p-monitor'><strong>Nome do autor: </strong> " . $citacao["nome_autor"] . "</p>";
        $dados .="<p class='p-monitor'><strong>Citação: </strong> " . $citacao["citacao"] . "</p>";
        $dados .="<p class='p-monitor'><strong>Tipo de Repertorio: </strong> " . $citacao["id_tipo_repertorio"] . "</p>";
        $dados .="<p class='p-monitor'><strong>Data da publicação: </strong> " . $citacao["data_citacao"] . "</p>";
        $dados .="<a class='btnClean' class = 'btn btn-primary' onclick='apagarRepertorio($citacao[id_repertorio])'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                        <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                    </svg>
                </a> ";
        $dados .= "</br>";
    }
    $dados .= "<hr>";
    }

//paginação -> somar a quantidade
if(isset($_SESSION['buscar'])){
    $pg = "SELECT COUNT(id_repertorio) AS num_result, r.nome_autor, r.citacao, r.data_citacao,t.nome AS id_tematica, tp.nome AS id_tipo_repertorio
    FROM repertorio r 
    INNER JOIN tematica t ON r.id_tematica = t.id_tematica
    INNER JOIN tipo_repertorio tp ON r.id_tipo_repertorio = tp.id_tipo_repertorio WHERE r.nome_autor LIKE '%$_SESSION[buscar]%'
    OR r.citacao LIKE '%$_SESSION[buscar]%' OR t.nome LIKE '%$_SESSION[buscar]%' OR tp.nome LIKE '%$_SESSION[buscar]%'";
} else {
    $pg = "SELECT COUNT(id_repertorio) AS num_result FROM repertorio ";
}
$result_pg = $conexao->query($pg);
$row_pg = $result_pg->fetch_assoc();

//Quantidade de páginas
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg); // ceil -> arredonda o valor sempre para cima
$max_links = 2;


$dados .= "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'>";
$dados .= "<li class='page-item'>
<a class='page-link' href='#' onclick='listarRepertorio(1)'>Primeira página</a>
</li>";

for($pagina_ant = $pagina - $max_links; $pagina_ant <= $pagina -1; $pagina_ant++ ) {
    if($pagina_ant >= 1){
        $dados .= "<li class='page-item'><a class='page-link' onclick='listarRepertorio($pagina_ant)' href='#'>$pagina_ant</a></li>";
    } 
}
$dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

for($pag_dep = $pagina +1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarRepertorio($pag_dep)'>$pag_dep</a></li>";
    }
}

$dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarRepertorio($quantidade_pg)'>Última página</a></li>";
$dados .= "</ul></nav>";

echo "$dados";

    } else {
    echo "Não foram encontrados resultados.";
    }

} else {
    echo "Erro: nenhum usuário encontrado";
}

?>
