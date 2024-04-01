<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT preco FROM jogos WHERE id = $id";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["preco"];
    } else {
        echo "0";
    }
} else {
    echo "ID do jogo não especificado.";
}

$mysqli->close();
?>