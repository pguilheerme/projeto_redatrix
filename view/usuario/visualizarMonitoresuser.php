<?php
session_start();
include "../../model/conexao.php";  
?>
<?php
$sql = "SELECT nome_completo, bio FROM monitor";

$resultado = $conexao->query($sql);
?>

<?php include "header.php"?>
<body>
    <h1 class="h1-user">Monitores Ativos</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Biografia</th>
            </tr>
        </thead>
        <tbody>
            <td>
                <?php
                // Loop através dos resultados e exibe os nomes e as biografias dos monitores ativos
                if ($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nome_completo"] . "</td>";
                        echo "<td>" . $row["bio"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Não há monitores ativos.</td></tr>";
                }
                ?>
            </td>
        </tbody>
    </table>
</body>
</html>
