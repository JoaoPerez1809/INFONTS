<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];

    $titulo = $_POST['titulo'];

    $query = "UPDATE jogos SET titulo='$titulo' WHERE id='$edit_id'";
    $result = $mysqli->query($query);

    if ($result) {
        echo "Jogo atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o jogo: " . $mysqli->error;
    }
} else {
    echo "Requisição inválida.";
}
?>