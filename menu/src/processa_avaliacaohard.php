<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}
$id_hardware = $_POST['id'];
var_dump($id_hardware);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_hardware = $_POST['id'];

   
    $query_validacao_hardware = "SELECT id FROM hardwares WHERE id = ?";
    $stmt_validacao_hardware = $mysqli->prepare($query_validacao_hardware);

    if ($stmt_validacao_hardware) {
        $stmt_validacao_hardware->bind_param("i", $id_hardware);
        $stmt_validacao_hardware->execute();
        $stmt_validacao_hardware->store_result();

        if ($stmt_validacao_hardware->num_rows == 0) {
            
            die("ID de hardware inválido.");
        }

        $stmt_validacao_hardware->close();
    } else {
        die("Erro na preparação da consulta de validação do hardware: " . $mysqli->error);
    }
    
    $id_usuario = $_SESSION['usuario']['id'];
    $qtd_estrela = $_POST["qtd_estrela"];
    $mensagem = $_POST["mensagem"];
    $query_inserir_avaliacao = "INSERT INTO comentarioavaliacaohardware (id_hardware, qtd_estrela, mensagem, id_usuario, created) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";
    $stmt_inserir_avaliacao = $mysqli->prepare($query_inserir_avaliacao);

    if ($stmt_inserir_avaliacao) {
        $stmt_inserir_avaliacao->bind_param("iisi", $id_hardware, $qtd_estrela, $mensagem, $id_usuario);
        $stmt_inserir_avaliacao->execute();
        $stmt_inserir_avaliacao->close();

        
        header("Location: view_hard.php?id=" . $id_hardware);
        exit();
    } else {
        echo "Erro ao preparar a declaração SQL para a inserção da avaliação: " . $mysqli->error;
    }
} else {
    echo "Método de requisição inválido.";
}
?>