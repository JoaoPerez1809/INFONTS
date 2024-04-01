<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}


if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM comentarioavaliacaohardware WHERE id_hardware = $id";
    $result= $mysqli->query($query);
    
    $query = "DELETE FROM hardwares WHERE id = $id";
    $result = $mysqli->query($query);

    if ($result) {
        
        header("Location: hardware.php");
        exit();
    } else {
        echo "Erro ao excluir o hardware: " . $mysqli->error;
    }
}


$mysqli->close();
?>