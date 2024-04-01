<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

if (isset($_POST['categoriaId'])) {
    $categoriaId = $_POST['categoriaId'];

    // Consulta para obter a contagem
    $sql_count = $mysqli->query("SELECT COUNT(*) as total FROM jogos WHERE categoria LIKE '%$categoriaId%';");

    $sql_jogos_categoria = $mysqli->query("SELECT * FROM jogos WHERE categoria LIKE '%$categoriaId%';");

    if (!$sql_jogos_categoria) {
        die("Erro ao consultar jogos por categoria: " . $mysqli->error);
    }
    $total_jogos = $sql_count->fetch_assoc()['total'];
    $output = '';
    while ($arquivo = $sql_jogos_categoria->fetch_assoc()) {
        $output .= '<a href="view.php?id=' . $arquivo['id'] . '">';
        $output .= '<div class="card">';
        if (isset($arquivo['path'])) {
            $path = $arquivo['path'];
        } else {
            $path = "";
        }
        $titulo = $arquivo['titulo'];

        if (file_exists($path) && is_readable($path)) {
            $output .= '<img class="card img" height="100"  src="' . $path . '" alt="">';
        } else {
            $output .= '<p>Imagem não encontrada: ' . $path . '</p>';
        }

        $output .= '<h2>' . $titulo . '</h2>';
        $output .= '</div>';
        $output .= '</a>';
    }
    echo '<h1>Jogos</h1>';
    echo '<h1 class="card-counter">(' . $total_jogos . ')</h1>';

    echo $output;
} else {
    echo "Categoria não especificada";
}
?>