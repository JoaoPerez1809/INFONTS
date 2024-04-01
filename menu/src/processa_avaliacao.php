<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}
$id_jogo = $_POST['id'];
var_dump($id_jogo);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jogo = $_POST['id'];

    $query_validacao_jogo = "SELECT id FROM jogos WHERE id = ?";
    $stmt_validacao_jogo = $mysqli->prepare($query_validacao_jogo);

    if ($stmt_validacao_jogo) {
        $stmt_validacao_jogo->bind_param("i", $id_jogo);
        $stmt_validacao_jogo->execute();
        $stmt_validacao_jogo->store_result();

        if ($stmt_validacao_jogo->num_rows == 0) {
            die("ID de jogo inválido.");
        }

        $stmt_validacao_jogo->close();
    } else {
        die("Erro na preparação da consulta de validação do jogo: " . $mysqli->error);
    }
    
    $id_usuario = $_SESSION['usuario']['id'];
    $qtd_estrela = $_POST["qtd_estrela"];
    $mensagem = $_POST["mensagem"];
    $query_inserir_avaliacao = "INSERT INTO comentarioavaliacaojogo (id_jogo, qtd_estrela, mensagem, id_usuario, created) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";
    $stmt_inserir_avaliacao = $mysqli->prepare($query_inserir_avaliacao);

    if ($stmt_inserir_avaliacao) {
        $stmt_inserir_avaliacao->bind_param("iisi", $id_jogo, $qtd_estrela, $mensagem, $id_usuario);
        $stmt_inserir_avaliacao->execute();
        $stmt_inserir_avaliacao->close();
        
        header("Location: view.php?id=" . $id_jogo);
        exit();
    } else {
        echo "Erro ao preparar a declaração SQL para a inserção da avaliação: " . $mysqli->error;
    }
} else {
    echo "Método de requisição inválido.";
}
?>