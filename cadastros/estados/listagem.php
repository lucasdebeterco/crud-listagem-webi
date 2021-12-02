<?php
    $pagina_atual = filter_input(INPUT_GET,'paginacao', FILTER_SANITIZE_NUMBER_INT);		
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    $qnt_result_pg = 3;
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'base_crud');
    $result_estados = "SELECT * FROM estados LIMIT $inicio, $qnt_result_pg";
    $resultado_estados = mysqli_query($conn, $result_estados);
    $html = '<br>';
    $html .= '<table border="1" class="table table-striped"><tr><td>Id</td><td>Sigla</td><td>Nome</td><td>Ação</td></tr>';

    while($row_estado = mysqli_fetch_assoc($resultado_estados)){
        $html .= '<tr>';
        $html .= "<td>" . $row_estado['id'] . "</td>";
        $html .= "<td>" . $row_estado['sigla'] . "</td>";
        $html .= "<td>" . $row_estado['nome'] . "</td>";
        $html .= "<td><a href='?modulo=estados&pagina=alterar&id=" . $row_estado['id'] ."'>Alterar </a>";
        $html .= "<a href='?modulo=estados&pagina=deletar&id=" . $row_estado['id'] ."'>Excluir</a></td>";
        $html .= '</tr>';
    }
    $html .= '</table>';
    echo $html;

    $result_pg = "SELECT COUNT(id) AS num_result FROM estados";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
    $max_links = 100;

    echo "<a href='painel.php?modulo=estados&pagina=listagem&paginacao=1'>Primeira</a> ";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){
            echo "<a href='painel.php?modulo=estados&pagina=listagem&paginacao=$pag_ant'>$pag_ant</a> ";
        }
    }

    echo "$pagina ";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $quantidade_pg){
            echo "<a href='painel.php?modulo=estados&pagina=listagem&paginacao=$pag_dep'>$pag_dep</a> ";
        }
    }

    echo "<a href='painel.php?modulo=estados&pagina=listagem&paginacao=$quantidade_pg'>Ultima</a>";
?>