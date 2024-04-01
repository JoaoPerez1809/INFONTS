<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}


if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM comentarioavaliacaojogo WHERE id_jogo = $id";
    $result= $mysqli->query($query);
    
    $query = "DELETE FROM jogos WHERE id = $id";
    $result = $mysqli->query($query);

    if ($result) {
        
        header("Location: jogos.php");
        exit();
    } else {
        echo "Erro ao excluir o jogo: " . $mysqli->error;
    }
}


$mysqli->close();
?>