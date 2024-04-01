<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

if (isset($_POST['categoriaId'])) {
    $categoriaId = $_POST['categoriaId'];
	
	 $sql_count = $mysqli->query("SELECT COUNT(*) as total FROM hardwares WHERE categoriahw LIKE '%$categoriaId%';");


    $sql_hardware_categoria = $mysqli->query("SELECT * FROM hardwares WHERE categoriahw LIKE '%$categoriaId%';");

    if (!$sql_hardware_categoria) {
        die("Erro ao consultar o hardware por categoria: " . $mysqli->error);
    }
	 $total_hardwares = $sql_count->fetch_assoc()['total'];
    $output = '';
    while ($arquivo = $sql_hardware_categoria->fetch_assoc()) {
        $output .= '<a href="view_hard.php?id=' . $arquivo['id'] . '">';
        $output .= '<div class="card">';
        if (isset($arquivo['path'])) {
            $path = $arquivo['path'];
        } else {
            $path = "";
        }
        $nome_hard = isset($arquivo['nome_hard']) ? $arquivo['nome_hard'] : "Sem título";

        if (file_exists($path) && is_readable($path)) {
            $output .= '<img class="card img" height="100"  src="' . $path . '" alt="">';
        } else {
            $output .= '<p>Imagem não encontrada: ' . $path . '</p>';
        }

        $output .= '<h2>' . $nome_hard . '</h2>';
        $output .= '</div>';
        $output .= '</a>';
    }
	echo '<h1>Hardwares</h1>';
    echo '<h1 class="card-counter"style="margin-left: 55px;">(' . $total_hardwares . ')</h1>';
    echo $output;
} else {
    echo "Categoria não especificada";
}
?>